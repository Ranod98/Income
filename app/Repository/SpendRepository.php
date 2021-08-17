<?php


namespace App\Repository;


use App\Models\Expense;

class SpendRepository implements SpendInterface
{

    public function index()
    {

        $from = date('Y-m');


        $spends = Expense::where('date',$from)->Where('debit','>',0)->get();

        $expenses  =Expense::where('date',$from)->get();

        $spendOfMonth = 0;

        foreach ($expenses as $expens){

            $spendOfMonth  += $expens->credit - $expens->debit;
        }


        return view('dashboard.expenses.spends.index',compact('spends','spendOfMonth'));

    }//end of index

    public function create()
    {

        $from = date('Y-m');
        $expenses  =Expense::where('date',$from)->get();

        $spendOfMonth = 0;

        foreach ($expenses as $expens){

            $spendOfMonth  += $expens->credit - $expens->debit;
        }//end for each


        return view('dashboard.expenses.spends.create',compact('spendOfMonth'));
    }//end of create

    public function store($request)
    {
        // TODO: Implement store() method.
    }

    public function show($id)
    {
        // TODO: Implement show() method.
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    public function update($request, $id)
    {
        // TODO: Implement update() method.
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
    }
}
