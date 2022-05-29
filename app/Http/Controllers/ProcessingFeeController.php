<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\ProcessingFeeRepositoryInterface;

class ProcessingFeeController extends Controller
{
    protected $Processing;

    public function __construct(ProcessingFeeRepositoryInterface $Processing)
    {
        $this->Processing = $Processing;
    }

    public function index()
    {
        return $this->Processing->index();
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        return $this->Processing->store($request);
    }


    public function show($id)
    {
        return $this->Processing->show($id);
    }


    public function edit($id)
    {
        return $this->Processing->edit($id);
    }


    public function update(Request $request)
    {
        return $this->Processing->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->Processing->destroy($request);
    }
}
