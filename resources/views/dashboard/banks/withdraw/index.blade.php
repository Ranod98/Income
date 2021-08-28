@extends('layouts.master')
@section('css')

@endsection

@section('title')
    @lang('main.withdraw_bank_list')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">@lang('main.home')</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ @lang('main.bank')</span>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ @lang('main.withdraw')</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title text-right mg-b-0">
                            @if ($amountOfWithdraw > 1)
                                <a href="{{route('dashboard.withdraw-bank.create')}}" class="btn btn-success-gradient btn-block">@lang('banks.add_new_withdraw_bank')</a>
                            @else
                                <a href="#" class="btn btn-success-gradient btn-block">@lang('banks.add_new_withdraw_bank')</a>

                            @endif

                        </h4>
                        <h4 class="card-title text-left mg-b-0">
                            @lang('banks.amountOfWithdraw'): {{$amountOfWithdraw}}


                        </h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @if($withdraws->count() == 0)

                            <h1 class="text-center">@lang('main.no_data')</h1>
                        @else
                            <table class="table text-md-nowrap" id="example2">
                                <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">#</th>
                                    <th class="wd-15p border-bottom-0">@lang('incomes.date')</th>
                                    <th class="wd-15p border-bottom-0">@lang('incomes.amount')</th>
                                    <th class="wd-15p border-bottom-0">@lang('incomes.note')</th>
                                    <th class="wd-10p border-bottom-0">@lang('incomes.processes')</th>

                                </tr>
                                </thead>
                                <tbody>


                                @foreach($withdraws as $index =>$bank)
                                    <tr>
                                        <td>{{$index + 10001}}</td>
                                        <td>{{$bank->date}}</td>
                                        <td>{{number_format($bank->debit)}}</td>
                                        <td>{{$bank->note}}</td>
                                        <td>

                                            <div class="btn-icon-list btn-sm">

                                                <a href="{{route('dashboard.withdraw-bank.edit',$bank->id)}}" class="btn btn-sm btn-indigo btn-icon"><i class="typcn typcn-edit"></i></a>

                                                <button type="button" class="btn btn-sm btn-primary btn-icon" data-toggle="modal" data-target="#Delete_incentive{{$bank->id}}" ><i class="typcn typcn-trash"></i></button>

                                                <a class="btn btn-sm btn-info btn-icon" href="{{route('dashboard.withdraw-bank.show',$bank->id)}}"><i class="typcn typcn-printer"></i></a>
                                            </div>

                                        </td>
                                    </tr>



                                    <div class="modal fade" id="Delete_incentive{{$bank->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5  class="modal-title" id="exampleModalLabel">@lang('banks.delete_bank')</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('dashboard.withdraw-bank.destroy',$bank->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')

                                                        <h5 >@lang('banks.confirm_delete_bank')</h5>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('main.close')}}</button>
                                                            <button  class="btn btn-danger">{{trans('main.delete')}}</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Deleted modal -->

                                @endforeach
                                @endif
                                </tbody>
                            </table>
                    </div>
                </div><!-- bd -->
            </div><!-- bd -->
        </div>

    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    @include('sweetalert::alert')
    <!-- Internal Data tables -->
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
    <!--Internal  Datatable js -->
    <script src="{{URL::asset('assets/js/table-data.js')}}"></script>


@endsection
