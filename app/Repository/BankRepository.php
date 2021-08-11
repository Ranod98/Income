<?php


namespace App\Repository;


use App\Models\Bank;
use App\Models\Incentive;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BankRepository implements BankInterface
{

    public function index()
    {
        $banks = Bank::all();

        return view('dashboard.banks.index',compact('banks'));
    }//end of index

    public function create()
    {
        return view('dashboard.banks.create');
    }//end of create

    public function store($request)
    {
        $request->validate([
            'credit' => 'required',
            'note' => 'required'
        ]);

        DB::beginTransaction();

        try {

            //خه‌زنكردنی پڕی پاره‌ی هه‌ڵگرتن
            $bank = new Bank();

            $bank->date = date('y-m-d');
            $bank->credit = $request->credit;
            $bank->note = $request->note ;

            $bank->save();

            DB::commit();

            toastr()->success(trans('main.data_saved'));
            return redirect()->route('dashboard.banks.index');
        }catch (\Exception $exception){

            DB::rollBack();
            toastr()->error(trans('main.error'));

            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }//end of try

    }//end of store

    public function show($id)
    {
        $bank = Bank::findOrFail($id);
        return view('dashboard.banks.print',compact('bank'));
    }//end of show

    public function edit($id)
    {
        $bank = Bank::findOrFail($id);


        return view('dashboard.banks.edit',compact('bank'));
    }//end of edit

    public function update($request, $id)
    {
        DB::beginTransaction();

        try {

            //خه‌زنكردنی پڕی پاره‌ی هه‌ڵگرتن
            $bank = Bank::findOrFail($id);

            $bank->credit = $request->credit;
            $bank->note = $request->note ;

            $bank->save();

            DB::commit();

            toastr()->success(trans('main.data_updated'));
            return redirect()->route('dashboard.banks.index');
        }catch (\Exception $exception){

            DB::rollBack();
            toastr()->error(trans('main.error'));

            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }//end of try
    }//end of update

    public function destroy($id)
    {
        try {
            Bank::destroy($id);
            toastr()->error(trans('main.data_deleted'));
            return redirect()->route('dashboard.banks.index');
        }catch (\Exception $exception){

            toastr()->error(trans('main.error'));


            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }//end of catch

    }//end of  destroy
}
