@extends('layouts.master3')

@section('title')
    @lang('main.necessaryBoxes_list') - {{$necessaryBox->id}}
@endsection

@section('content')

    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex">
                <h2>@lang('selfBoxes.necessaryBox_id')-{{$necessaryBox->id}}</h2>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>@lang('incomes.date')</th>
                            <td>{{ $necessaryBox->date }}</td>
                            <th>@lang('incentives.percentage')</th>
                            <td>{{$necessaryBox->percentage}}%</td>
                        </tr>
                        <tr>
                            <th>@lang('incomes.amount')</th>
                            <td>{{ $necessaryBox->credit }}</td>
                            <th>@lang('incomes.note')</th>
                            <td>{{ $necessaryBox->note }}</td>
                        </tr>
                        <tr>
                            <th colspan="2">@lang('main.created_at')</th>
                            <td colspan="2">{{ $necessaryBox->created_at }}</td>
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

