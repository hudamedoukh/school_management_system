<?php

namespace App\Http\Controllers\Students;

use Illuminate\Http\Request;
use App\Repository\ReceiptStudentsRepositoryInterface;
use App\Http\Controllers\Controller;

class ReceiptStudentsController extends Controller
{
    protected $Receipt;

    public function __construct(ReceiptStudentsRepositoryInterface $Receipt)
    {
        $this->Receipt = $Receipt;
    }
    public function index()
    {
      return $this->Receipt->index();
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        return $this->Receipt->store($request);
    }


    public function show($id)
    {
       return $this->Receipt->show($id);
    }


    public function edit($id)
    {
        return $this->Receipt->edit($id);
    }


    public function update(Request $request)
    {
        return $this->Receipt->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->Receipt->destroy($request);
    }
}
