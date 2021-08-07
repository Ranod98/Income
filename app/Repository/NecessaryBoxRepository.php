<?php


namespace App\Repository;


use App\Models\LearnBox;
use App\Models\NecessaryBox;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class NecessaryBoxRepository implements NecessaryBoxInterface
{

    public function index()
    {

        $necessariesBoxes = NecessaryBox::all();

        return view('dashboard.necessaryBoxes.index',compact('necessariesBoxes'));
    }//end of index

    public function create()
    {
        return view('dashboard.necessaryBoxes.create');
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
            $necessaryBox = new NecessaryBox();

            $necessaryBox->date = $request->date;
            $necessaryBox->credit = $request->credit;
            $necessaryBox->percentage = 100;
            $necessaryBox->note = $request->note ;

            $necessaryBox->save();

            DB::commit();

            toastr()->success(trans('main.data_saved'));
            return redirect()->route('dashboard.necessariesboxes.index');
        }catch (\Exception $exception){

            DB::rollBack();
            toastr()->error(trans('main.error'));

            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }//end of try

    }//end of store

    public function show($id)
    {
        $necessaryBox = NecessaryBox::findOrFail($id);
        return view('dashboard.necessaryBoxes.print',compact('necessaryBox'));
    }//end of show

    public function edit($id)
    {
        $necessaryBox = NecessaryBox::findOrFail($id);


        return view('dashboard.necessaryBoxes.edit',compact('necessaryBox'));
    }//end of edit

    public function update($request, $id)
    {
        DB::beginTransaction();

        try {

            //خه‌زنكردنی پڕی پاره‌ی هه‌ڵگرتن
            $necessaryBox = NecessaryBox::findOrFail($id);

            $necessaryBox->date = $request->date;
            $necessaryBox->credit = $request->credit;
            $necessaryBox->note = $request->note ;

            $necessaryBox->save();

            DB::commit();

            toastr()->success(trans('main.data_updated'));
            return redirect()->route('dashboard.necessariesboxes.index');
        }catch (\Exception $exception){

            DB::rollBack();
            toastr()->error(trans('main.error'));

            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }//end of try
    }//end of update

    public function destroy($id)
    {
        try {
            NecessaryBox::destroy($id);
            toastr()->error(trans('main.data_deleted'));
            return redirect()->back();
        }catch (\Exception $exception){

            toastr()->error(trans('main.error'));


            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }//end of catch

    }//end of  destroy
}
