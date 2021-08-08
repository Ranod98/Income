<?php

namespace App\Http\Controllers\dashboard\Expense;

use App\Http\Controllers\Controller;
use App\Repository\ExpenseInterface;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    protected $expense;
    public function __construct(ExpenseInterface $expense)
    {
        $this->expense = $expense;
    }//end of const
    public function index()
    {
        return $this->expense->index();
    }//end of index

    public function create()
    {
        return $this->expense->create();
    }//end of create


    public function store(Request $request)
    {

        return $this->expense->store($request);
    }//end of store


    public function show($id)
    {
        return $this->expense->show($id);
    }//end of show


    public function edit($id)
    {
        return $this->expense->edit($id);
    }//end of edit


    public function update(Request $request, $id)
    {

        return $this->expense->update($request,$id);

    }//end of update


    public function destroy($id)
    {
        return $this->expense->destroy($id);
    }//end of destroy
}
