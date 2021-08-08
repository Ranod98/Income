@extends('layouts.master3')

@section('title')
    @lang('main.expenses') - {{$expense->id}}
@endsection

@section('content')

    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex">
                <h2>@lang('selfBoxes.expense_id')-{{$expense->id}}</h2>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>@lang('incomes.date')</th>
                            <td>{{ $expense->date }}</td>
                            <th>@lang('incentives.percentage')</th>
                            <td>{{$expense->percentage}}%</td>
                        </tr>
                        <tr>
                            <th>@lang('incomes.amount')</th>
                            <td>{{ $expense->credit }}</td>
                            <th>@lang('incomes.note')</th>
                            <td>{{ $expense->note }}</td>
                        </tr>
                        <tr>
                            <th colspan="2">@lang('main.created_at')</th>
                            <td colspan="2">{{ $expense->created_at }}</td>
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

