@extends('layouts.master3')

@section('title')
    @lang('main.incomes_list') - {{$income->id}}
@endsection

@section('content')

        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex">
                    <h2>@lang('incomes.income_id')-{{$income->id}}</h2>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>@lang('incomes.date')</th>
                                <td>{{ $income->date }}</td>
                                <th>@lang('incomes.type')</th>
                                <td>{{__('incomes.'.$income->income_type)}}</td>
                            </tr>
                            <tr>
                                <th>@lang('incomes.amount')</th>
                                <td>{{ $income->credit }}</td>
                                <th>@lang('incomes.note')</th>
                                <td>{{ $income->note }}</td>
                            </tr>
                            <tr>
                                <th colspan="2">@lang('main.created_at')</th>
                                <td colspan="2">{{ $income->created_at }}</td>
                            </tr>
                        </table>

                        <h3>@lang('incomes.income_details')</h3>

                        <table class="table">


                            <tbody>
                            <tr>
                                <td colspan="3"></td>
                                <th colspan="2">@lang('incomes.incentive')</th>
                                <td>{{ $income->incentive->credit }}</td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <th colspan="2">@lang('incomes.selfBox')</th>
                                <td>{{ $income->selfBox->credit }}</td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <th colspan="2">@lang('incomes.learnBox')</th>
                                <td>{{ $income->learnBox->credit }}</td>
                            </tr>
                            <tr>

                                <td colspan="3"></td>
                                <th colspan="2">@lang('incomes.necessaryBox')</th>
                                <td>{{ $income->necessaryBox->credit }}</td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <th colspan="2">@lang('incomes.expense')</th>
                                <td>{{ $income->expense->credit }}</td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    <script>
        window.print();
    </script>
@endsection

