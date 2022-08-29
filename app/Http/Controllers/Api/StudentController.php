<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Http\Response\HttpResponse;
use App\Interfaces\StudentService;
use App\Models\Student;

class StudentController extends Controller
{

    private StudentService $service;

    /**
     * @param StudentService $service
     */
    public function __construct(StudentService $service)
    {
        $this->service = $service;
    }


    public function get()
    {
        $res = $this->service->get();
        return response()->toHttpCodeAndMap($res);
    }

    public function post(StudentRequest $request)
    {
        $res = $this->service->create($request);
        return response()->toHttpCodeAndMap($res);
    }

    public function put(StudentRequest $request, $id)
    {
        $res = $this->service->update($request, $id);
        return response()->toHttpCodeAndMap($res);
    }

    public function delete($id)
    {
        $res = $this->service->delete($id);
        return response()->toHttpCodeAndMap($res);
    }

}
