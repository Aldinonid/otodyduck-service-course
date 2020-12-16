<?php

namespace App\Http\Controllers;

use App\Review;
use App\Chapter;
use App\MyCourse;
use App\Course;
use App\Tool;
use App\CourseTool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
	public function index(Request $request)
	{
		$q = $request->query('q');
		$status = $request->query('status');
		$category = $request->query('category');
		$mentor = $request->query('mentor_id');

		$courses = Course::all();

		if (isset($q)) {
			$courses = Course::whereRaw("name LIKE '%" . strtolower($q) . "%'")->get();
		}

		if (isset($status)) {
			$courses = Course::where('status', $status)->get();
		}

		if (isset($mentor)) {
			$courses = Course::where('mentor_id', $mentor)->get();
		}

		if (isset($q) && isset($status)) {
			$courses = Course::whereRaw("name LIKE '%" . strtolower($q) . "%'")->where('status', $status)->get();
		}

		if (isset($category) && isset($status)) {
			$courses = Course::where('category', $category)->where('status', $status)->get();
		}

		foreach ($courses as $course) {
			$course->mentor_id = getUser($course->mentor_id)['data'];
		}

		return response()->json(['status' => 'success', 'data' => $courses]);
	}

	public function show($slug)
	{
		$id = Course::where('slug', $slug)->first()->id;

		$course = Course::with('chapter.lesson')
			->with('images')
			->find($id);

		if (!$course) {
			return response()->json([
				'status' => 'error',
				'message' => 'Course not Found'
			], 404);
		}

		$reviews = Review::where('course_id', '=', $id)->get()->toArray();
		if (count($reviews) > 0) {
			$userIds = array_column($reviews, 'user_id');
			$users = getUserByIds($userIds);
			if ($users['status'] === 'error') {
				$reviews = [];
			} else {
				foreach ($reviews as $key => $review) {
					$userIndex = array_search($review['user_id'], array_column($users['data'], 'id'));
					$reviews[$key]['users'] = $users['data'][$userIndex];
				}
			}
		}

		//? SQL is like
		//* SELECT tools.* FROM tools INNER JOIN course_tools ct ON ct.tool_id = tools.id WHERE ct.course_id = 2

		$tools = Tool::join('course_tools', 'tools.id', '=', 'course_tools.tool_id')->where('course_tools.course_id', '=', $id)->select('tools.*')->get();
		$totalStudents = MyCourse::where('course_id', '=', $id)->count();
		$totalVideos = Chapter::where('course_id', '=', $id)->withCount('lesson')->get()->toArray();
		$finalTotalVideos = array_sum(array_column($totalVideos, 'lesson_count'));
		$course['mentor_id'] = getUser($course['mentor_id'])['data'];
		$course['reviews'] = $reviews;
		$course['total_videos'] = $finalTotalVideos;
		$course['total_students'] = $totalStudents;
		$course['tools'] = $tools;


		return response()->json([
			'status' => 'success',
			'data' => $course
		]);
	}

	public function create(Request $request)
	{
		$rules = [
			'name' => 'required|string',
			'certificate' => 'required|boolean',
			'thumbnail' => 'required|url',
			'type' => 'required|in:free,premium',
			'status' => 'required|in:draft,published',
			'price' => 'integer',
			'level' => 'required|in:all level,beginner,intermediate,advanced',
			'description' => 'string',
			'category' => 'required|in:design,development,soft skill',
			'mentor_id' => 'required|integer',
		];

		$data = $request->all();

		$validator = Validator::make($data, $rules);

		if ($validator->fails()) {
			return response()->json([
				'status' => 'error',
				'message' => $validator->errors()
			], 400);
		}

		//? Check name should be unique ?//
		$name = $request->input('name');
		$isNameExisting = Course::where('name', $name)->exists();
		if ($isNameExisting) {
			return response()->json(['status' => 'error', 'message' => 'Course Name must be unique']);
		}

		$mentorId = $request->input('mentor_id');
		$mentor = getUser($mentorId);
		if ($mentor['status'] === 'error') {
			return response()->json(['status' => $mentor['status'], 'message' => $mentor['message']], $mentor['http_code']);
		}

		if (!$request->input('price')) {
			if ($request->input('type') === 'premium') {
				return response()->json(['status' => 'error', 'message' => 'Premium course should have price'], 400);
			}
		}

		$slug = ['slug' => createSlug($data['name'])];
		$data = array_merge($data, $slug);

		$toolIds = $request->input('tool_id');
		$tool = count($toolIds) > 0 ? Tool::whereIn('id', $toolIds)->get()->toArray() : null;


		if (!$tool) {
			if ($tool === []) {
				return response()->json(['status' => 'error', 'message' => 'Tool not Found'], 404);
			}

			$course = Course::create($data);
			true;
		} else {
			$course = Course::create($data);
			$courseId = $course['id'];
			foreach ($tool as $i) {
				$toolData = [
					'course_id' => $courseId,
					'tool_id' => $i['id']
				];
				CourseTool::create($toolData);
			}

			$course['tool'] = array($tool);
		}

		return response()->json(['status' => 'success', 'data' => $course]);
	}

	public function update(Request $request, $id)
	{
		$rules = [
			'name' => 'string',
			'certificate' => 'boolean',
			'thumbnail' => 'url',
			'type' => 'in:free,premium',
			'status' => 'in:draft,published',
			'price' => 'integer',
			'level' => 'in:all level,beginner,intermediate,advanced',
			'description' => 'string',
			'category' => 'in:design,development,soft skill',
			'mentor_id' => 'integer',
		];

		$data = $request->all();

		$validator = Validator::make($data, $rules);

		if ($validator->fails()) {
			return response()->json([
				'status' => 'error',
				'message' => $validator->errors()
			], 400);
		}

		$course = Course::find($id);
		if (!$course) {
			return response()->json(['status' => 'error', 'message' => 'Course not Found'], 404);
		}

		//? Check name should be unique ?//
		$name = $request->input('name');
		$isNameExisting = Course::where('name', $name)->where('id', 'NOT IN', $id)->exists();
		if ($isNameExisting) {
			return response()->json(['status' => 'error', 'message' => 'Course Name must be unique']);
		}

		$mentorId = $request->input('mentor_id');
		$mentor = getUser($mentorId);
		if ($mentor['status'] === 'error') {
			return response()->json(['status' => $mentor['status'], 'message' => $mentor['message']], $mentor['http_code']);
		}

		if (!$request->input('price')) {
			if ($request->input('type') === 'premium') {
				return response()->json(['status' => 'error', 'message' => 'Premium course should have price'], 400);
			}
		}

		$slug = ['slug' => createSlug($data['name'])];
		$data = array_merge($data, $slug);
		$course->fill($data);

		$toolIds = $request->input('tool_id');
		$tool = count($toolIds) >= 1 ? Tool::whereIn('id', $toolIds)->get()->toArray() : CourseTool::where('course_id', '=', $id)->delete();

		$course->save();

		if ($toolIds === []) {
			return response()->json(['status' => 'success', 'data' => $course]);
		}

		if (!$tool) {
			true;
		} else {
			CourseTool::where('course_id', '=', $id)->whereNotIn('tool_id', $toolIds)->delete();

			foreach ($tool as $i) {
				$isExistCourseTool = CourseTool::where('course_id', '=', $id)->where('tool_id', '=', $i['id'])->exists();

				if ($isExistCourseTool) {
					true;
				} else {
					$toolData = [
						'course_id' => $id,
						'tool_id' => $i['id']
					];

					CourseTool::create($toolData);
				}
			}

			$course['tool'] = $tool;
		}

		return response()->json(['status' => 'success', 'data' => $course]);
	}

	public function destroy($id)
	{
		$course = Course::find($id);
		if (!$course) {
			return response()->json(['status' => 'error', 'message' => 'Course not Found'], 404);
		}

		$course->delete();
		return response()->json(['status' => 'success', 'message' => 'Course has been deleted']);
	}
}
