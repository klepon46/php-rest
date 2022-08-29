<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Http\Response\HttpResponse;
use App\Models\Student;

class StudentController extends Controller
{

    public function get()
    {
        $students = Student::query()->get();
        $res = HttpResponse::ok($students->toArray());

        return response()->toHttpCodeAndMap($res);
    }

    public static function post(StudentRequest $request)
    {
        $student = Student::query()->create($request->validated());
        $res = HttpResponse::created($student->toArray());

        return response()->toHttpCodeAndMap($res);
    }

    public function put(StudentRequest $request, $id)
    {
        $isUpdated = Student::query()->findOrFail($id)->update($request->validated());

        if($isUpdated){
            $res = HttpResponse::ok();
            return response()->toHttpCodeAndMap($res);
        }

        $res = HttpResponse::notFound('User id ' . $id . ' not found');
        return response()->toHttpCodeAndMap($res);
    }

    public function delete($id)
    {
        $isDeleted = Student::query()->findOrFail($id)->delete();

        if($isDeleted){
            $res = HttpResponse::ok();
            return response()->toHttpCodeAndMap($res);
        }

        $res = HttpResponse::notFound('User id ' . $id . ' not found');
        return response()->toHttpCodeAndMap($res);
    }

}
