<?php


namespace App\Repository;


use App\Models\Incentive;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;

class IncentiveRepository implements IncentiveInterface
{

    public function index()
    {
       $incentives = Incentive::all();

       return view('dashboard.incentives.index',compact('incentives'));
    }//end of index

    public function create()
    {
       return view('dashboard.incentives.create');
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
            $incentive = new Incentive();

            $incentive->date = $request->date;
            $incentive->credit = $request->credit;
            $incentive->percentage = 100;
            $incentive->note = $request->note ;

            $incentive->save();

            DB::commit();

            toastr()->success(trans('main.data_saved'));
            return redirect()->route('dashboard.incentives.index');
        }catch (\Exception $exception){

            DB::rollBack();
            toastr()->error(trans('main.error'));

            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }//end of try

    }//end of store

    public function show($id)
    {
        // TODO: Implement show() method.
    }

    public function edit($id)
    {
        $incentive = Incentive::findOrFail($id);


        return view('dashboard.incentives.edit',compact('incentive'));
    }//end of edit

    public function update($request, $id)
    {
        DB::beginTransaction();

        try {

            //خه‌زنكردنی پڕی پاره‌ی هه‌ڵگرتن
            $incentive = Incentive::findOrFail($id);

            $incentive->date = $request->date;
            $incentive->credit = $request->credit;
            $incentive->note = $request->note ;

            $incentive->save();

            DB::commit();

            toastr()->success(trans('main.data_updated'));
            return redirect()->route('dashboard.incentives.index');
        }catch (\Exception $exception){

            DB::rollBack();
            toastr()->error(trans('main.error'));

            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }//end of try
    }//end of update

    public function destroy($id)
    {
        try {
            Incentive::destroy($id);
            toastr()->error(trans('main.data_deleted'));
            return redirect()->route('dashboard.incentives.index');
        }catch (\Exception $exception){

            toastr()->error(trans('main.error'));


            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }//end of catch

    }//end of  destroy
}//end if class
