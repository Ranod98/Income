<?php


namespace App\Repository;


use App\Models\Expense;
use App\Models\Incentive;
use App\Models\Income;
use App\Models\LearnBox;
use App\Models\NecessaryBox;
use App\Models\SelfBox;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\In;


class IncomeRepository implements IncomeInterface
{

    public function index()
    {

        $incomes = Income::all();
        return view('dashboard.incomes.index',compact('incomes'));

    }//end of index

    public function create()
    {

        return view('dashboard.incomes.create');
    }//end of create

    public function store($request)
    {
        DB::beginTransaction();

        try {



            $amount = $request->credit;

            $data['selfBox'] = $amount *       ($request->selfBox / 100);;
            $data['learnBox'] = $amount *   ($request->learnBox / 100);;
            $data['necessaryBox'] = $amount*   ($request->necessaryBox / 100);;
            $data['incentive'] = $amount *  ($request->incentive / 100);
            $data['expense'] = $amount *   ($request->expense / 100);;

            //خه‌زنكردنی داهات
            $income = new Income();

            $income->date = $request->date;
            $income->credit = $request->credit;
            $income->income_type = $request->type;
            $income->note = $request->note;
            $income->save();

            //خه‌زنكردنی پڕی پاره‌ی هه‌ڵگرتن
            $incentive = new Incentive();

            $incentive->date = $request->date;
            $incentive->income_id = $income->id;
            $incentive->credit = $data['incentive'];
            $incentive->percentage = $request->incentive;
            $incentive->note = $request->date ."ڕێژه‌ی پاره‌ی به‌رواری-";

            $incentive->save();

            //خه‌زنكردنی پڕی پاره‌ی بۆ خۆت

            $selfBox = new SelfBox();

            $selfBox->date = $request->date;
            $selfBox->income_id = $income->id;
            $selfBox->credit = $data['selfBox'];
            $selfBox->percentage = $request->selfBox;
            $selfBox->note = $request->date ."ڕێژه‌ی پاره‌ی به‌رواری-";

            $selfBox->save();

            //خه‌زنكردنی پڕی پاره‌ی فێربوون

            $learnBox = new LearnBox();

            $learnBox->date = $request->date;
            $learnBox->income_id = $income->id;
            $learnBox->credit = $data['selfBox'];
            $learnBox->percentage = $request->learnBox;
            $learnBox->note = $request->date ."ڕێژه‌ی پاره‌ی به‌رواری-";

            $learnBox->save();

            //خه‌زنكردنی پڕی پاره‌ی پێویستی

            $necessaryBox = new  NecessaryBox();

            $necessaryBox->date = $request->date;
            $necessaryBox->income_id = $income->id;
            $necessaryBox->credit = $data['necessaryBox'];
            $necessaryBox->percentage = $request->necessaryBox;
            $necessaryBox->note = $request->date ."ڕێژه‌ی پاره‌ی به‌رواری-";

            $necessaryBox->save();

            //خه‌زنكردنی پڕی پاره‌ی مه‌سڕوفات

            $expense = new  Expense();

            $expense->date = $request->date;
            $expense->income_id = $income->id;
            $expense->credit = $data['expense'];
            $expense->percentage = $request->expense;
            $expense->note = $request->date ."ڕێژه‌ی پاره‌ی به‌رواری-";

            $expense->save();


            DB::commit();





            toastr()->success(trans('main.data_saved'));
            return redirect()->route('dashboard.incomes.index');


        }catch (\Exception $exception){

            DB::rollBack();
            toastr()->error(trans('main.error'));

            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }//end of catch
    }//end of store

    public function show($id)
    {
        $income   = Income::findOrFail($id);


        return view('dashboard.incomes.print',compact('income'));
    }//end of show

    public function edit($id)
    {

        $income = Income::findOrFail($id);

        return view('dashboard.incomes.edit',compact('income'));

    }//end of edit

    public function update($request, $id)
    {
        DB::beginTransaction();


        try {



            $amount = $request->credit;

            $data['selfBox'] = $amount *       ($request->selfBox / 100);;
            $data['learnBox'] = $amount *   ($request->learnBox / 100);;
            $data['necessaryBox'] = $amount*   ($request->necessaryBox / 100);;
            $data['incentive'] = $amount *  ($request->incentive / 100);
            $data['expense'] = $amount *   ($request->expense / 100);;

            //خه‌زنكردنی داهات
            $income = Income::findOrFail($id);

            $income->date = $request->date;
            $income->credit = $request->credit;
            $income->income_type = $request->type;
            $income->note = $request->note;
            $income->save();

            //خه‌زنكردنی پڕی پاره‌ی هه‌ڵگرتن
            $incentive =Incentive::where('income_id',$income->id)->first();

            $incentive->date = $request->date;
            $incentive->income_id = $income->id;
            $incentive->credit = $data['incentive'];
            $incentive->percentage = $request->incentive;
            $incentive->note = $request->date ."ڕێژه‌ی پاره‌ی به‌رواری-";

            $incentive->save();

            //خه‌زنكردنی پڕی پاره‌ی بۆ خۆت

            $selfBox = SelfBox::where('income_id',$income->id)->first();

            $selfBox->date = $request->date;
            $selfBox->income_id = $income->id;
            $selfBox->credit = $data['selfBox'];
            $selfBox->percentage = $request->selfBox;
            $selfBox->note = $request->date ."ڕێژه‌ی پاره‌ی به‌رواری-";

            $selfBox->save();

            //خه‌زنكردنی پڕی پاره‌ی فێربوون

            $learnBox =  LearnBox::where('income_id',$income->id)->first();

            $learnBox->date = $request->date;
            $learnBox->income_id = $income->id;
            $learnBox->credit = $data['selfBox'];
            $learnBox->percentage = $request->learnBox;
            $learnBox->note = $request->date ."ڕێژه‌ی پاره‌ی به‌رواری-";

            $learnBox->save();

            //خه‌زنكردنی پڕی پاره‌ی پێویستی

            $necessaryBox = NecessaryBox::where('income_id',$income->id)->first();

            $necessaryBox->date = $request->date;
            $necessaryBox->income_id = $income->id;
            $necessaryBox->credit = $data['necessaryBox'];
            $necessaryBox->percentage = $request->necessaryBox;
            $necessaryBox->note = $request->date ."ڕێژه‌ی پاره‌ی به‌رواری-";

            $necessaryBox->save();

            //خه‌زنكردنی پڕی پاره‌ی مه‌سڕوفات

            $expense = Expense::where('income_id',$income->id)->first();

            $expense->date = $request->date;
            $expense->income_id = $income->id;
            $expense->credit = $data['expense'];
            $expense->percentage = $request->expense;
            $expense->note = $request->date ."ڕێژه‌ی پاره‌ی به‌رواری-";

            $expense->save();


            DB::commit();

            toastr()->success(trans('main.data_updated'));
            return redirect()->route('dashboard.incomes.index');


        }catch (\Exception $exception){

            toastr()->error(trans('main.error'));

            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }//end of catch
    }//end of update

    public function destroy($id)
    {

        try {

            Income::destroy($id);
            toastr()->error(trans('main.data_deleted'));
            return redirect()->route('dashboard.incomes.index');

        }catch (\Exception $exception){

            toastr()->error(trans('main.error'));


            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }//end of catch

    }//end of destroy
}//end of income
