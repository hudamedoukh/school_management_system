<?php

namespace App\Http\Controllers\Quizzes;
use App\Http\Controllers\Controller;

use App\Repository\QuizRepositoryInterface;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    protected $Quizz;

    public function __construct(QuizRepositoryInterface $Quizz)
    {
        $this->Quizz =$Quizz;
    }

    public function index()
    {
        return $this->Quizz->index();
    }


    public function create()
    {
        return $this->Quizz->create();
    }


    public function store(Request $request)
    {

        return $this->Quizz->store($request);
    }

    public function edit($id)
    {
        return $this->Quizz->edit($id);
    }


    public function update(Request $request, $id)
    {
        return $this->Quizz->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->Quizz->destroy($request);
    }
}
