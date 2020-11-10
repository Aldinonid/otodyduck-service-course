<?php

namespace App\Http\Controllers;

use App\Course;
use App\MyCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MyCourseController extends Controller
{
	public function index(Request $request)
	{
		$myCourses = MyCourse::query()->with('course');

		$userId = $request->query('user_id');
		$courseId = $request->query('course_id');

		$myCourses->when($userId, function ($query) use ($userId) {
			return $query->where('user_id', '=', $userId);
		});

		$myCourses->when($courseId, function ($query) use ($courseId) {
			return $query->where('course_id', '=', $courseId);
		});

		$myCourses = $myCourses->get();

		foreach ($myCourses as $item) {
			$item['course']['mentor_id'] = getUser($item['course']['mentor_id'])['data'];
		}

		return response()->json(['status' => 'success', 'data' => $myCourses]);
	}

	public function create(Request $request)
	{
		$rules = [
			'user_id' => 'required|integer',
			'course_id' => 'required|integer',
		];

		$data = $request->all();

		$validator = Validator::make($data, $rules);

		if ($validator->fails()) {
			return response()->json([
				'status' => 'error',
				'message' => $validator->errors()
			], 400);
		}

		$courseId = $request->input('course_id');
		$course = Course::find($courseId);
		if (!$course) {
			return response()->json(['status' => 'error', 'message' => 'Course not Found'], 404);
		}

		$userId = $request->input('user_id');
		$user = getUser($userId);
		if ($user['status'] === 'error') {
			return response()->json(['status' => $user['status'], 'message' => $user['message']], $user['http_code']);
		}

		$isExist = MyCourse::where('course_id', '=', $courseId)->where('user_id', '=', $userId)->exists();
		if ($isExist) {
			return response()->json([
				'status' => 'error',
				'message' => 'You already enroll this course'
			], 409);
		}

		$myCourse = MyCourse::create($data);
		return response()->json(['status' => 'success', 'data' => $myCourse]);
	}
}
