<?php

namespace App\Interfaces;

use App\Http\Requests\StudentRequest;

interface StudentService
{
    public function create(StudentRequest $request);
    public function update(StudentRequest $request, $id);
    public function delete($id);
    public function get();

}
