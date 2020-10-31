<?php

namespace App\Http\Controllers;

use App\Review;
use App\Chapter;
use App\Mentor;
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
		$status = $request->input('status');

		if (isset($status)) {
			$courses = Course::where('status', '=', $status)->get();
			return response()->json(['status' => 'success', 'data' => $courses]);
		} else {
			$courses = Course::all();
			return response()->json(['status' => 'success', 'data' => $courses]);
		}
	}

	public function show($id)
	{
		$course = Course::with('chapter.lesson')
			->with('mentor')
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
			$users;
			if ($users['status'] === 'error') {
				$reviews = [];
			} else {
				foreach ($reviews as $key => $review) {
					$userIndex = array_search($review['user_id'], array_column($users['data'], 'id'));
					$reviews[$key]['users'] = $users['data'][$userIndex];
				}
			}
		}

		$tools = Tool::join('course_tools', 'tools.id', '=', 'course_tools.tool_id')->where('course_tools.course_id', '=', $id)->select('tools.*')->get();
		$totalStudents = MyCourse::where('course_id', '=', $id)->count();
		$totalVideos = Chapter::where('course_id', '=', $id)->withCount('lesson')->get()->toArray();
		$finalTotalVideos = array_sum(array_column($totalVideos, 'lesson_count'));
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

		$mentorId = $request->input('mentor_id');
		$mentor = Mentor::find($mentorId);
		if (!$mentor) {
			return response()->json(['status' => 'error', 'message' => 'Mentor not Found'], 404);
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

		$mentorId = $request->input('mentor_id');
		$mentor = Mentor::find($mentorId);
		if (!$mentor) {
			return response()->json(['status' => 'error', 'message' => 'Mentor not Found'], 404);
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
