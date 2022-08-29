<?php

namespace App\Interfaces;

use App\Http\Requests\StudentRequest;
use Illuminate\Database\Eloquent\Collection;

interface StudentRepository
{
    public function findAll(): Collection;
    public function create(StudentRequest $request);
    public function update(StudentRequest $request, int $id);
    public function delete(int $id);
}
