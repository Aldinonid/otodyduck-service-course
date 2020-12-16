<?php

namespace App\Http\Controllers;

use App\Flow;
use App\Course;
use App\CourseFlow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FlowController extends Controller
{
  public function index()
  {
    $flows = Flow::all();

    foreach ($flows as $item) {
      $id = $item['id'];

      $courses = Course::join('course_flows', 'courses.id', '=', 'course_flows.course_id')->where('course_flows.flow_id', '=', $id)->select('courses.name', 'courses.slug', 'courses.level')->get();
      $item['courses'] = $courses;
      $item['total_course'] = count($item['courses']);
    }

    return response()->json(['status' => 'success', 'data' => $flows]);
  }

  public function show($slug)
  {
    $id = Flow::where('slug', $slug)->first()->id;
    $flow = Flow::find($id);
    if (!$flow) {
      return response()->json(['status' => 'error', 'message' => 'Flow not Found'], 404);
    }

    //? SQL is like
    //* SELECT courses.* FROM courses INNER JOIN course_flows cf ON cf.course_id = courses.id WHERE cf.flow_id = $id

    $courses = Course::join('course_flows', 'courses.id', '=', 'course_flows.course_id')->where('course_flows.flow_id', '=', $id)->select('courses.name', 'courses.slug', 'courses.level')->get();
    $flow['courses'] = $courses;

    return response()->json(['status' => 'success', 'data' => $flow]);
  }

  public function create(Request $request)
  {
    $rules = [
      'name' => 'required|string',
      'level' => 'required|string',
      'image' => 'url',
    ];

    $data = $request->all();

    $validator = Validator::make($data, $rules);

    if ($validator->fails()) {
      return response()->json([
        'status' => 'error',
        'message' => $validator->errors()
      ], 400);
    }

    $name = $request->input('name');
    $isNameExisting = Flow::where('name', $name)->exists();
    if ($isNameExisting) {
      return response()->json(['status' => 'error', 'message' => 'Flow Name must be unique']);
    }

    $slug = ['slug' => createSlug($data['name'])];
    $data = array_merge($data, $slug);

    $courseIds = $request->input('course_id');
    $course = count($courseIds) > 0 ? Course::whereIn('id', $courseIds)->get()->toArray() : null;


    if (!$course) {
      if ($course === []) {
        return response()->json(['status' => 'error', 'message' => 'Tool not Found'], 404);
      }

      $flow = Flow::create($data);
      true;
    } else {
      $flow = Flow::create($data);
      $flowId = $flow['id'];
      foreach ($course as $i) {
        $courseData = [
          'flow_id' => $flowId,
          'course_id' => $i['id']
        ];
        CourseFlow::create($courseData);
      }

      $course['tool'] = array($course);
    }

    return response()->json(['status' => 'success', 'data' => $flow]);
  }

  public function update(Request $request, $id)
  {
    $rules = [
      'name' => 'required|string',
      'level' => 'required|string',
      'image' => 'url',
    ];

    $data = $request->all();

    $validator = Validator::make($data, $rules);

    if ($validator->fails()) {
      return response()->json([
        'status' => 'error',
        'message' => $validator->errors()
      ], 400);
    }

    $flow = Flow::find($id);
    if (!$flow) {
      return response()->json(['status' => 'error', 'message' => 'Flow not Found'], 404);
    }

    $slug = ['slug' => createSlug($data['name'])];
    $data = array_merge($data, $slug);

    $flow->fill($data);

    $courseIds = $request->input('course_id');
    $course = count($courseIds) >= 1 ? Course::whereIn('id', $courseIds)->get()->toArray() : CourseFlow::where('flow_id', '=', $id)->delete();

    $flow->save();

    if (!$course) {
      true;
    } else {
      CourseFlow::where('flow_id', '=', $id)->whereNotIn('course_id', $courseIds)->delete();

      foreach ($course as $i) {
        $isExistCourseFlow = CourseFlow::where('flow_id', '=', $id)->where('course_id', '=', $i['id'])->exists();

        if ($isExistCourseFlow) {
          true;
        } else {
          $courseFlow = [
            'flow_id' => $id,
            'course_id' => $i['id']
          ];

          CourseFlow::create($courseFlow);
        }
      }

      $course['tool'] = $course;
    }

    if ($courseIds === []) {
      return response()->json(['status' => 'success', 'data' => $flow]);
    }



    return response()->json(['status' => 'success', 'data' => $flow]);
  }

  public function destroy($id)
  {
    $flow = Flow::find($id);
    if (!$flow) {
      return response()->json(['status' => 'error', 'message' => 'Flow not Found'], 404);
    }

    $flow->delete();
    return response()->json(['status' => 'success', 'message' => 'Flow has been deleted']);
  }
}
