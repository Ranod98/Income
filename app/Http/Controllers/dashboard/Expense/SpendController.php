<?php

namespace App\Http\Controllers\dashboard\Expense;

use App\Http\Controllers\Controller;
use App\Repository\SpendInterface;
use Illuminate\Http\Request;

class SpendController extends Controller
{

    protected $spend;

    public function __construct(SpendInterface  $spend)
    {
        $this->spend = $spend;
    }
    public function index()
    {
        return $this->spend->index();
    }//end of index

    public function create()
    {

        return $this->spend->create();

    }//end of create


    public function store(Request $request)
    {
        return $this->spend->store($request);

    }//end of store


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        return $this->spend->edit($id);
    }//end of edit


    public function update(Request $request, $id)
    {
        return $this->spend->update($request,$id);
    }//end of update

    public function destroy($id)
    {
        return $this->spend->destroy($id);
    }//end of destroy
}
