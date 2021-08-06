<?php


namespace App\Repository;


use App\Models\LearnBox;
use App\Models\SelfBox;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LearnBoxRepository implements LearnBoxInterface
{

    public function index()
    {
        $learnBoxes = LearnBox::all();

        return view('dashboard.learnBoxes.index',compact('learnBoxes'));
    }//end of index

    public function create()
    {
        return view('dashboard.learnBoxes.create');
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
            $learnBox = new LearnBox();

            $learnBox->date = $request->date;
            $learnBox->credit = $request->credit;
            $learnBox->percentage = 100;
            $learnBox->note = $request->note ;

            $learnBox->save();

            DB::commit();

            toastr()->success(trans('main.data_saved'));
            return redirect()->route('dashboard.learnboxes.index');
        }catch (\Exception $exception){

            DB::rollBack();
            toastr()->error(trans('main.error'));

            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }//end of try

    }//end of store

    public function show($id)
    {
        $learnBox = LearnBox::findOrFail($id);
        return view('dashboard.learnBoxes.print',compact('learnBox'));
    }//end of show

    public function edit($id)
    {
        $learnBox = LearnBox::findOrFail($id);


        return view('dashboard.learnBoxes.edit',compact('learnBox'));
    }//end of edit

    public function update($request, $id)
    {
        DB::beginTransaction();

        try {

            //خه‌زنكردنی پڕی پاره‌ی هه‌ڵگرتن
            $learnBox = LearnBox::findOrFail($id);

            $learnBox->date = $request->date;
            $learnBox->credit = $request->credit;
            $learnBox->note = $request->note ;

            $learnBox->save();

            DB::commit();

            toastr()->success(trans('main.data_updated'));
            return redirect()->route('dashboard.learnboxes.index');
        }catch (\Exception $exception){

            DB::rollBack();
            toastr()->error(trans('main.error'));

            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }//end of try
    }//end of update

    public function destroy($id)
    {
        try {
            LearnBox::destroy($id);
            toastr()->error(trans('main.data_deleted'));
            return redirect()->back();
        }catch (\Exception $exception){

            toastr()->error(trans('main.error'));


            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }//end of catch

    }//end of  destroy
}
