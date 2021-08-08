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
    @lang('selfBoxes.add_new_expense')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">@lang('main.home')</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ @lang('main.expenses')</span>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ @lang('main.create')</span>
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
                    <h4 class="card-title mb-1">@lang('selfBoxes.add_expense')</h4>
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
                    <form class="form-horizontal" action="{{route('dashboard.expenses.store')}}" method="post" data-parsley-validate="">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">@lang('incomes.date'): <span class="tx-danger">*</span></label>
                            <input type="month" class="form-control date" id="date" placeholder="Date" name="date" required="">
                        </div>
                        <div class="form-group">
                            <label class="form-label">@lang('incomes.amount'): <span class="tx-danger">*</span></label>
                            <input type="number"  class="form-control" id="credit" placeholder="{{__('incomes.amount')}}" name="credit" required="">
                        </div>


                        <div class="form-group">
                            <label class="form-label">@lang('incomes.note'): <span class="tx-danger">*</span></label>
                            <textarea class="form-control" id="note" rows="10" name="note" required=""></textarea>
                        </div>

                        <div class="form-group mb-0 mt-3 justify-content-end">
                            <div>
                                <button type="submit" class="btn btn-primary">@lang('incomes.save')</button>
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
