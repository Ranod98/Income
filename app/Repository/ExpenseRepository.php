<?php


namespace App\Repository;


use App\Models\Expense;
use App\Models\NecessaryBox;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ExpenseRepository implements ExpenseInterface
{

    public function index()
    {

        $expenses = Expense::all();

        return view('dashboard.expenses.index',compact('expenses'));
    }//end of index

    public function create()
    {
        return view('dashboard.expenses.create');
    }//end of create

    public function store($request)
    {

        $request->validate([
            'date' => 'required',
            'credit' => 'required',
            'note' => 'required'
        ]);

        DB::beginTransaction();

        try {

            //خه‌زنكردنی پڕی پاره‌ی هه‌ڵگرتن
            $expense = new  Expense();

            $expense->date = $request->date;
            $expense->credit = $request->credit;
            $expense->percentage = 100;
            $expense->note = $request->note ;

            $expense->save();

            DB::commit();

            toastr()->success(trans('main.data_saved'));
            return redirect()->route('dashboard.expenses.index');
        }catch (\Exception $exception){

            DB::rollBack();
            toastr()->error(trans('main.error'));

            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }//end of try

    }//end of store

    public function show($id)
    {
        $expense = Expense::findOrFail($id);
        return view('dashboard.expenses.print',compact('expense'));
    }//end of show

    public function edit($id)
    {
        $expense = Expense::findOrFail($id);


        return view('dashboard.expenses.edit',compact('expense'));
    }//end of edit

    public function update($request, $id)
    {
        DB::beginTransaction();

        try {

            //خه‌زنكردنی پڕی پاره‌ی هه‌ڵگرتن
            $expense = Expense::findOrFail($id);;

            $expense->date = $request->date;
            $expense->credit = $request->credit;
            $expense->note = $request->note ;

            $expense->save();

            DB::commit();

            toastr()->success(trans('main.data_updated'));
            return redirect()->route('dashboard.expenses.index');
        }catch (\Exception $exception){

            DB::rollBack();
            toastr()->error(trans('main.error'));

            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }//end of try
    }//end of update

    public function destroy($id)
    {
        try {
            Expense::destroy($id);
            toastr()->error(trans('main.data_deleted'));
            return redirect()->back();
        }catch (\Exception $exception){

            toastr()->error(trans('main.error'));


            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }//end of catch

    }//end of  destroy
}
