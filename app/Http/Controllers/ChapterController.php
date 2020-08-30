<?php

namespace App\Http\Controllers;

use App\Course;
use App\Chapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChapterController extends Controller
{
	public function index()
	{
		$chapters = Chapter::all();
		return response()->json(['status' => 'success', 'data' => $chapters]);
	}

	public function show($id)
	{
		$chapter = Chapter::find($id);
		if (!$chapter) {
			return response()->json(['status' => 'error', 'message' => 'Chapter not Found'], 404);
		}

		return response()->json(['status' => 'success', 'data' => $chapter]);
	}

	public function create(Request $request)
	{
		$rules = [
			'name' => 'required|string',
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

		$chapter = Chapter::create($data);
		return response()->json(['status' => 'success', 'data' => $chapter]);
	}

	public function update(Request $request, $id)
	{
		$rules = [
			'name' => 'string',
			'course_id' => 'integer',
		];

		$data = $request->all();

		$validator = Validator::make($data, $rules);

		if ($validator->fails()) {
			return response()->json([
				'status' => 'error',
				'message' => $validator->errors()
			], 400);
		}

		$chapter = Chapter::find($id);
		if (!$chapter) {
			return response()->json(['status' => 'error', 'message' => 'Chapter not Found'], 404);
		}

		$courseId = $request->input('course_id');
		$course = Course::find($courseId);
		if (!$course) {
			return response()->json(['status' => 'error', 'message' => 'Course not Found'], 404);
		}

		$chapter->fill($data);

		$chapter->save();
		return response()->json(['status' => 'success', 'data' => $chapter]);
	}

	public function destroy($id)
	{
		$chapter = Chapter::find($id);
		if (!$chapter) {
			return response()->json(['status' => 'error', 'message' => 'Chapter not Found'], 404);
		}

		$chapter->delete();
		return response()->json(['status' => 'success', 'message' => 'Chapter has been deleted']);
	}
}
