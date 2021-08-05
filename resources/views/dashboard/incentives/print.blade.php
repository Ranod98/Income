@extends('layouts.master3')

@section('title')
    @lang('main.incentives_list') - {{$incentive->id}}
@endsection

@section('content')

    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex">
                <h2>@lang('incentives.incentives_id')-{{$incentive->id}}</h2>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>@lang('incomes.date')</th>
                            <td>{{ $incentive->date }}</td>
                            <th>@lang('incentives.percentage')</th>
                            <td>{{$incentive->percentage}}%</td>
                        </tr>
                        <tr>
                            <th>@lang('incomes.amount')</th>
                            <td>{{ $incentive->credit }}</td>
                            <th>@lang('incomes.note')</th>
                            <td>{{ $incentive->note }}</td>
                        </tr>
                        <tr>
                            <th colspan="2">@lang('main.created_at')</th>
                            <td colspan="2">{{ $incentive->created_at }}</td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>
    </div>


    <script>
        window.print();
    </script>
@endsection

