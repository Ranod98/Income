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
        try {


           $request->validate([
               'debit' => 'numeric'
           ]);

           if ($request->spendOfMonth < $request->debit) {
               return redirect()->back()->withErrors(['error'=>__('selfBoxes.dont_have_money')]);
           }

           Expense::create([
               'debit' => $request->debit,
               'note' => $request->note,
               'date' => date('Y-m')
           ]);


            toastr()->success(trans('main.data_updated'));
            return redirect()->route('dashboard.spends.index');


        }catch (\Exception $exception){
            toastr()->error(trans('main.error'));
            return redirect()->back()->withErrors(['error'=>$exception->getMessage()]);
        }
    }//end of store

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
        try {
            Expense::destroy($id);
            toastr()->error(trans('main.data_deleted'));
            return redirect()->back();
        }catch (\Exception $exception){

            toastr()->error(trans('main.error'));


            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }//end of catch
    }//end of destroy


}
