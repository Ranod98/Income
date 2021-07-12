@extends('layouts.master')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

    <!--Internal Sumoselect css-->

    @if(app()->getLocale() == "ku")
        <link rel="stylesheet" href="{{asset('assets/plugins/sumoselect/sumoselect-rtl.css')}}">
    @else
        <link rel="stylesheet" href="{{asset('assets/plugins/sumoselect/sumoselect.css')}}">

    @endif


@endsection

@section('title')
    @lang('incomes.edit_income')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">@lang('main.home')</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ @lang('main.incomes')</span>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ @lang('main.edit')</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card  box-shadow-0">
                <div class="card-header">
                    <h4 class="card-title mb-1">@lang('incomes.edit_income')</h4>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </div>
                <div class="card-body pt-0">
                    <form class="form-horizontal" action="{{route('dashboard.incomes.update',$income->id)}}" method="post" data-parsley-validate="">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label class="form-label">@lang('incomes.date'): <span class="tx-danger">*</span></label>
                            <input type="month" class="form-control" id="date" value="{{$income->date}}" placeholder="Date" name="date" required="">
                        </div>
                        <div class="form-group">
                            <label class="form-label">@lang('incomes.income_type'): <span class="tx-danger">*</span></label>
                            <select class="SlectBox form-control" name="type" id="type" required="" data-parsley-errors-container="#type">
                                <option value="">@lang('incomes.choose')</option>
                                <option value="drug-store" {{$income->income_type == "drug-store" ? 'selected':''}}>@lang('incomes.drug_store')</option>
                                <option value="freelancer" {{$income->income_type == "freelancer" ? 'selected':''}}>@lang('incomes.freelancer')</option>
                                <option value="unselect" {{$income->income_type == "work" ? 'selected':''}}>@lang('incomes.unselect')</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">@lang('incomes.amount'): <span class="tx-danger">*</span></label>
                            <input type="number"  class="form-control" value="{{$income->credit}}" id="credit" placeholder="{{__('incomes.amount')}}" name="credit" required="">
                        </div>

                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputEmail4">@lang('incomes.incentive')</label>
                                <input type="text" value="{{ old('incentive',$income->incentive->percentage) }}" name="incentive" class="form-control">
                                @error('incentive')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col">
                                <label for="inputEmail4">@lang('incomes.selfBox')</label>
                                <input type="text" value="{{ old('selfBox',$income->selfBox->percentage) }}" name="selfBox" class="form-control">
                                @error('selfBox')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col">
                                <label for="inputEmail4">@lang('incomes.learnBox')</label>
                                <input type="text" value="{{ old('learnBox',$income->learnBox->percentage) }}" name="learnBox" class="form-control">
                                @error('learnBox')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group col">
                                <label for="inputEmail4">@lang('incomes.necessaryBox')</label>
                                <input type="number" value="{{ old('necessaryBox',$income->necessaryBox->percentage) }}" name="necessaryBox" class="form-control">
                                @error('necessaryBox')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col">
                                <label for="inputEmail4">@lang('incomes.expense')</label>
                                <input type="number" value="{{ old('expense',$income->expense->percentage) }}" name="expense" class="form-control">
                                @error('expense')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="form-label">@lang('incomes.note'): <span class="tx-danger">*</span></label>
                            <textarea class="form-control" id="note" rows="10" name="note" required="">
                                {{$income->note}}
                            </textarea>
                        </div>

                        <div class="form-group mb-0 mt-3 justify-content-end">
                            <div>
                                <button type="submit" class="btn btn-primary">@lang('incomes.update')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Parsley.min js -->
    <script src="{{URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
    <!-- Internal Form-validation js -->
    <script src="{{URL::asset('assets/js/form-validation.js')}}"></script>


    <!--Internal  Form-elements js-->
    <script src="{{URL::asset('assets/js/advanced-form-elements.js')}}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js')}}"></script>

@endsection
