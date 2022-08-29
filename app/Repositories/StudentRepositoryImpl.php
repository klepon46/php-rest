<?php

namespace App\Repositories;

use App\Http\Requests\StudentRequest;
use App\Interfaces\StudentRepository;
use App\Models\Student;
use Illuminate\Database\Eloquent\Collection;

class StudentRepositoryImpl implements StudentRepository
{
    protected Student $student;

    /**
     * @param Student $student
     */
    public function __construct(Student $student)
    {
        $this->student = $student;
    }

    public function findAll(): Collection
    {
        return Student::query()->get();
    }

    public function create(StudentRequest $request)
    {
        return Student::query()->create($request->validated());
    }

    public function update(StudentRequest $request, int $id)
    {
        return Student::query()->findOrFail($id)->update($request->validated());
    }

    public function delete(int $id): bool
    {
        return Student::query()->findOrFail($id)->delete();
    }
}
