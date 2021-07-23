<?php

namespace App\Http\Controllers\dashboard\Incentive;

use App\Http\Controllers\Controller;
use App\Repository\IncentiveInterface;
use Illuminate\Http\Request;

class incentiveController extends Controller
{

    protected $incentive;
    public function __construct(IncentiveInterface $incentive)
    {
        $this->incentive = $incentive;
    }//end of const

    public function index()
    {
        return $this->incentive->index();
    }//end of index

    public function create()
    {
        return $this->incentive->create();
    }//end of create


    public function store(Request $request)
    {

        return $this->incentive->store($request);
    }//end of store


    public function show($id)
    {
        return $this->incentive->show($id);
    }//end of show


    public function edit($id)
    {
        return $this->incentive->edit($id);
    }//end of edit


    public function update(Request $request, $id)
    {

        return $this->incentive->update($request,$id);

    }//end of update


    public function destroy($id)
    {
        return $this->incentive->destroy($id);
    }//end of destroy
}
