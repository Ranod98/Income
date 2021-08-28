<?php

namespace App\Http\Controllers\dashboard\Bank;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Repository\WithdrawBankInterface;
use Illuminate\Http\Request;

class WithdrowBankController extends Controller
{
    protected $withdraw;
     public function __construct(WithdrawBankInterface $withdraw)
     {
         $this->withdraw = $withdraw;
     }

    public function index()
    {
        return $this->withdraw->index();
    }//end of index

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }//

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {

        return $this->withdraw->destroy($id);
    }//end of destroy
}
