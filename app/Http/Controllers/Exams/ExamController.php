<?php

namespace App\Http\Controllers\Exams;

use App\Repository\ExamRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExamController extends Controller
{
    protected $Exam;

    public function __construct(ExamRepositoryInterface $Exam)
    {
        $this->Exam =$Exam;
    }

    public function index()
    {
        return $this->Exam->index();
    }


    public function create()
    {
        return $this->Exam->create();
    }


    public function store(Request $request)
    {
        return $this->Exam->store($request);
    }

    public function edit($id)
    {
        return $this->Exam->edit($id);
    }


    public function update(Request $request, $id)
    {
        return $this->Exam->update($request);
    }


    public function destroy($request)
    {
        return $this->Exam->destroy($request);
    }
}
