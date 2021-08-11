<?php

namespace App\Http\Controllers\dashboard\Bank;

use App\Http\Controllers\Controller;
use App\Repository\BankInterface;
use Illuminate\Http\Request;

class BankController extends Controller
{
    protected $bank;
    public function __construct(BankInterface $bank)
    {
        $this->bank = $bank;
    }

    public function index()
    {
        return $this->bank->index();
    }//end of index

    public function create()
    {
        return $this->bank->create();
    }//end of create


    public function store(Request $request)
    {

        return $this->bank->store($request);
    }//end of store


    public function show($id)
    {
        return $this->bank->show($id);
    }//end of show


    public function edit($id)
    {
        return $this->bank->edit($id);
    }//end of edit


    public function update(Request $request, $id)
    {

        return $this->bank->update($request,$id);

    }//end of update


    public function destroy($id)
    {
        return $this->bank->destroy($id);
    }//end of destroy
}
