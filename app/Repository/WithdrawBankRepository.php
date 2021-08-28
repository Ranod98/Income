<?php


namespace App\Repository;


use App\Models\Bank;

class WithdrawBankRepository implements WithdrawBankInterface
{

    public function index()
    {
        $amountOfWithdraw = Bank::select('credit')->sum('credit');

        $withdraws = Bank::where('debit','>',0)->get();


        return view('dashboard.banks.withdraw.index',compact('withdraws','amountOfWithdraw'));
    }//end of index

    public function create()
    {
        // TODO: Implement create() method.
    }

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

        try {

            Bank::destroy($id);
            toastr()->error(trans('main.data_deleted'));

            return redirect()->route('dashboard.withdraw-bank.index');


        }catch (\Exception $exception){
            toastr()->error(trans('main.error'));
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }    }//end of destroy
}
