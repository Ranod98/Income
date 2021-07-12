<?php

namespace App\Http\Controllers\dashboard\Income;

use App\Http\Controllers\Controller;
use App\Repository\IncomeInterface;
use Illuminate\Http\Request;

class IncomeController extends Controller
{


    protected $income;
    public function __construct(IncomeInterface $income)
    {
        $this->income = $income;
    }//end of const

    public function index()
    {
        return $this->income->index();
    }//end of index

    public function create()
    {
        return $this->income->create();
    }//end of create


    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'type'=> 'required',
            'credit' => 'required',
            'note' => 'required'
        ]);
        return $this->income->store($request);
    }//end of store


    public function show($id)
    {
        return $this->income->show($id);
    }//end of show


    public function edit($id)
    {
        return $this->income->edit($id);
    }//end of edit


    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required',
            'type'=> 'required',
            'credit' => 'required',
            'note' => 'required'
        ]);


        return $this->income->update($request,$id);

    }//end of update


    public function destroy($id)
    {
        return $this->income->destroy($id);
    }//end of destroy
}//end of controller
