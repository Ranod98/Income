<?php

namespace App\Http\Controllers\dashboard\LearBox;

use App\Http\Controllers\Controller;
use App\Repository\LearnBoxInterface;
use Illuminate\Http\Request;

class LearnBoxController extends Controller
{

    protected $learnBox;
    public function __construct(LearnBoxInterface $learnBox)
    {
        $this->learnBox = $learnBox;
    }//end of const
    public function index()
    {
        return $this->learnBox->index();
    }//end of index

    public function create()
    {
        return $this->learnBox->create();
    }//end of create


    public function store(Request $request)
    {

        return $this->learnBox->store($request);
    }//end of store


    public function show($id)
    {
        return $this->learnBox->show($id);
    }//end of show


    public function edit($id)
    {
        return $this->learnBox->edit($id);
    }//end of edit


    public function update(Request $request, $id)
    {

        return $this->learnBox->update($request,$id);

    }//end of update


    public function destroy($id)
    {
        return $this->learnBox->destroy($id);
    }//end of destroy
}
