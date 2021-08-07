<?php

namespace App\Http\Controllers\dashboard\NecessaryBox;

use App\Http\Controllers\Controller;
use App\Repository\NecessaryBoxInterface;
use Illuminate\Http\Request;

class NecessaryBoxController extends Controller
{
    protected $necessaryBox;
    public function __construct(NecessaryBoxInterface $necessaryBox)
    {
        $this->necessaryBox = $necessaryBox;
    }//end of const
    public function index()
    {
        return $this->necessaryBox->index();
    }//end of index

    public function create()
    {
        return $this->necessaryBox->create();
    }//end of create


    public function store(Request $request)
    {

        return $this->necessaryBox->store($request);
    }//end of store


    public function show($id)
    {
        return $this->necessaryBox->show($id);
    }//end of show


    public function edit($id)
    {
        return $this->necessaryBox->edit($id);
    }//end of edit


    public function update(Request $request, $id)
    {

        return $this->necessaryBox->update($request,$id);

    }//end of update


    public function destroy($id)
    {
        return $this->necessaryBox->destroy($id);
    }//end of destroy
}
