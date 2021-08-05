@extends('layouts.master')
@section('css')

@endsection

@section('title')
    @lang('main.selfboxes_list')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">@lang('main.home')</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ @lang('main.selfboxes')</span>
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

                            <a href="{{route('dashboard.selfboxes.create')}}" class="btn btn-success-gradient btn-block">@lang('incentives.add_new_incentive')</a>
                        </h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @if($selfBoxes->count() == 0)

                            <h1 class="text-center">@lang('main.no_data')</h1>
                        @else
                            <table class="table text-md-nowrap" id="example2">
                                <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">#</th>
                                    <th class="wd-15p border-bottom-0">@lang('incomes.date')</th>
                                    <th class="wd-20p border-bottom-0">@lang('incentives.resource')</th>
                                    <th class="wd-15p border-bottom-0">@lang('incomes.amount')</th>
                                    <th class="wd-15p border-bottom-0">@lang('incentives.percentage')</th>
                                    <th class="wd-15p border-bottom-0">@lang('incomes.note')</th>
                                    <th class="wd-10p border-bottom-0">@lang('incomes.processes')</th>

                                </tr>
                                </thead>
                                <tbody>


                                @foreach($selfBoxes as $index =>$selfBox)
                                    <tr>
                                        <td>{{$index + 10001}}</td>
                                        <td>{{$selfBox->date}}</td>
                                        <td>
                                            @if(isset($selfBox->income->income_type))

                                            {{__('incomes.'.$selfBox->income->income_type)}}
                                            @else
                                                @lang('incentives.none')
                                            @endif
                                        </td>
                                        <td>{{number_format($selfBox->credit)}}</td>
                                        <td>{{$selfBox->percentage}}%</td>
                                        <td>{{$selfBox->note}}</td>
                                        <td>

                                            <div class="btn-icon-list btn-sm">
                                                @if(isset($selfBox->income->income_type))
                                                    <a  class="btn btn-sm btn-indigo btn-icon disabled"><i class="typcn typcn-edit"></i></a>
                                                @else
                                                    <a href="{{route('dashboard.selfboxes.edit',$selfBox->id)}}" class="btn btn-sm btn-indigo btn-icon"><i class="typcn typcn-edit"></i></a>
                                                @endif


                                                    @if(isset($selfBox->income->income_type))
                                                        <button type="button" class="btn btn-sm btn-primary btn-icon disabled" data-toggle="modal"  ><i class="typcn typcn-trash"></i></button>
                                                    @else
                                                        <button type="button" class="btn btn-sm btn-primary btn-icon" data-toggle="modal" data-target="#Delete_incentive{{$selfBox->id}}" ><i class="typcn typcn-trash"></i></button>
                                                    @endif



                                                <button class="btn btn-sm btn-success btn-icon" data-effect="effect-fall" data-toggle="modal" href="#modaldemo{{$selfBox->id}}"><i class="typcn typcn-eye"></i></button>
                                                <a class="btn btn-sm btn-info btn-icon" href="{{route('dashboard.selfboxes.show',$selfBox->id)}}"><i class="typcn typcn-printer"></i></a>
                                            </div>

                                        </td>
                                    </tr>

                                    {{--show modal--}}
                                    <div class="modal effect-slide-in-right effect-scale effect-fall" id="modaldemo{{$selfBox->id}}" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                            <div class="modal-content modal-content-demo">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">@lang('main.selfboxes')</h6>
                                                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                                        <span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <label class="text-success">@lang('incomes.amount')</label>
                                                        </div>
                                                        <div class="col-4">@lang('incomes.note')</div>
                                                        <div class="col-4">@lang('incentives.percentage')</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">{{number_format($selfBox->credit)}}</div>
                                                        <div class="col-4">{{$selfBox->note}}</div>
                                                        <div class="col-4">{{$selfBox->percentage}}%</div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @if(!isset($selfBox->income->income_type))
                                        <div class="modal fade" id="Delete_incentive{{$selfBox->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5  class="modal-title" id="exampleModalLabel">@lang('selfBoxes.delete_selfBox')</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('dashboard.selfboxes.destroy',$selfBox->id)}}" method="post">
                                                            @csrf
                                                            @method('DELETE')

                                                            <h5 >@lang('selfBoxes.confirm_delete_selfBox')</h5>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('main.close')}}</button>
                                                                <button  class="btn btn-danger">{{trans('main.delete')}}</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    @endif
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
