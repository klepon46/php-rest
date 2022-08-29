<?php

namespace App\Http\Services;

use App\Http\Requests\StudentRequest;
use App\Http\Response\HttpResponse;
use App\Interfaces\StudentRepository;
use App\Interfaces\StudentService;

class StudentServiceImpl implements StudentService
{

    private StudentRepository $repository;

    /**
     * @param StudentRepository $repository
     */
    public function __construct(StudentRepository $repository)
    {
        $this->repository = $repository;
    }


    public function create(StudentRequest $request)
    {
        return HttpResponse::created(data: [
            'student' => $this->repository->create($request)
        ]);
    }

    public function update(StudentRequest $request, $id)
    {
        $isUpdated = $this->repository->update($request, $id);
        if($isUpdated){
            return HttpResponse::ok();
        }

        return HttpResponse::notFound('User id ' . $id . ' not found');
    }

    public function delete($id)
    {
        $isDeleted = $this->repository->delete($id);
        if($isDeleted){
            return HttpResponse::ok();
        }

        return HttpResponse::notFound('User id ' . $id . ' not found');
    }

    public function get()
    {
        return HttpResponse::ok(data: [
            'students' => $this->repository->findAll()->toArray()
        ]);

    }
}
