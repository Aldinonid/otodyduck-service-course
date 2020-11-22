<?php

namespace App\Http\Controllers;

use App\Tool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ToolController extends Controller
{
	public function index(Request $request)
	{

		$course_id = $request->query('course_id');

		$tools = Tool::all();

		if (isset($course_id)) {
			$tools = Tool::join('course_tools', 'tools.id', '=', 'course_tools.tool_id')->where('course_tools.course_id', '=', $course_id)->select('tools.*')->get();
		}

		return response()->json(['status' => 'success', 'data' => $tools]);
	}

	public function show($id)
	{
		$tool = Tool::find($id);
		if (!$tool) {
			return response()->json(['status' => 'error', 'message' => 'Tool not Found'], 404);
		}

		return response()->json(['status' => 'success', 'data' => $tool]);
	}

	public function create(Request $request)
	{
		$rules = [
			'name' => 'required|string',
			'url' => 'required|url',
			'image' => 'required|url',
		];

		$data = $request->all();

		$validator = Validator::make($data, $rules);

		if ($validator->fails()) {
			return response()->json([
				'status' => 'error',
				'message' => $validator->errors()
			], 400);
		}

		$tool = Tool::create($data);
		return response()->json(['status' => 'success', 'data' => $tool]);
	}

	public function update(Request $request, $id)
	{
		$rules = [
			'name' => 'required|string',
			'url' => 'required|url',
			'image' => 'required|url',
		];

		$data = $request->all();

		$validator = Validator::make($data, $rules);

		if ($validator->fails()) {
			return response()->json([
				'status' => 'error',
				'message' => $validator->errors()
			], 400);
		}

		$tool = Tool::find($id);
		if (!$tool) {
			return response()->json(['status' => 'error', 'message' => 'Tool not Found'], 404);
		}

		$tool->fill($data);

		$tool->save();
		return response()->json(['status' => 'success', 'data' => $tool]);
	}

	public function destroy($id)
	{
		$tool = Tool::find($id);
		if (!$tool) {
			return response()->json(['status' => 'error', 'message' => 'Tool not Found'], 404);
		}

		$tool->delete();
		return response()->json(['status' => 'success', 'message' => 'Tool has been deleted']);
	}
}
