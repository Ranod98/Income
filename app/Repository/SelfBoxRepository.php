<?php


namespace App\Repository;


use App\Models\Incentive;
use App\Models\SelfBox;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SelfBoxRepository implements SelfBoxInterface
{

    public function index()
    {
        $selfBoxes = SelfBox::all();

        return view('dashboard.selfBoxes.index',compact('selfBoxes'));
    }//end of index

    public function create()
    {
        return view('dashboard.selfBoxes.create');
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
            $selfBox = new SelfBox();

            $selfBox->date = $request->date;
            $selfBox->credit = $request->credit;
            $selfBox->percentage = 100;
            $selfBox->note = $request->note ;

            $selfBox->save();

            DB::commit();

            toastr()->success(trans('main.data_saved'));
            return redirect()->route('dashboard.selfboxes.index');
        }catch (\Exception $exception){

            DB::rollBack();
            toastr()->error(trans('main.error'));

            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }//end of try

    }//end of store

    public function show($id)
    {
        $selfBox = SelfBox::findOrFail($id);
        return view('dashboard.selfBoxes.print',compact('selfBox'));
    }//end of show

    public function edit($id)
    {
        $selfBox = SelfBox::findOrFail($id);


        return view('dashboard.selfBoxes.edit',compact('selfBox'));
    }//end of edit

    public function update($request, $id)
    {
        DB::beginTransaction();

        try {

            //خه‌زنكردنی پڕی پاره‌ی هه‌ڵگرتن
            $selfBox = SelfBox::findOrFail($id);

            $selfBox->date = $request->date;
            $selfBox->credit = $request->credit;
            $selfBox->note = $request->note ;

            $selfBox->save();

            DB::commit();

            toastr()->success(trans('main.data_updated'));
            return redirect()->route('dashboard.selfboxes.index');
        }catch (\Exception $exception){

            DB::rollBack();
            toastr()->error(trans('main.error'));

            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }//end of try
    }//end of update

    public function destroy($id)
    {
        try {
            SelfBox::destroy($id);
            toastr()->error(trans('main.data_deleted'));
            return redirect()->route('dashboard.selfboxes.index');
        }catch (\Exception $exception){

            toastr()->error(trans('main.error'));


            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }//end of catch

    }//end of  destroy
}
