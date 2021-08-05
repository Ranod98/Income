<?php

namespace App\Http\Controllers\dashboard\SelfBox;

use App\Http\Controllers\Controller;
use App\Repository\SelfBoxInterface;
use Illuminate\Http\Request;

class SelfBoxController extends Controller
{

    protected $selfBox;
    public function __construct(SelfBoxInterface $selfBox)
    {
        $this->selfBox = $selfBox;
    }//end of const
    public function index()
    {
        return $this->selfBox->index();
    }//end of index

    public function create()
    {
        return $this->selfBox->create();
    }//end of create


    public function store(Request $request)
    {

        return $this->selfBox->store($request);
    }//end of store


    public function show($id)
    {
        return $this->selfBox->show($id);
    }//end of show


    public function edit($id)
    {
        return $this->selfBox->edit($id);
    }//end of edit


    public function update(Request $request, $id)
    {

        return $this->selfBox->update($request,$id);

    }//end of update


    public function destroy($id)
    {
        return $this->selfBox->destroy($id);
    }//end of destroy
}
