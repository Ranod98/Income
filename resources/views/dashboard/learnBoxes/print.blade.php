@extends('layouts.master3')

@section('title')
    @lang('main.learnBoxes_list') - {{$learnBox->id}}
@endsection

@section('content')

    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex">
                <h2>@lang('selfBoxes.learnBox_id')-{{$learnBox->id}}</h2>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>@lang('incomes.date')</th>
                            <td>{{ $learnBox->date }}</td>
                            <th>@lang('incentives.percentage')</th>
                            <td>{{$learnBox->percentage}}%</td>
                        </tr>
                        <tr>
                            <th>@lang('incomes.amount')</th>
                            <td>{{ $learnBox->credit }}</td>
                            <th>@lang('incomes.note')</th>
                            <td>{{ $learnBox->note }}</td>
                        </tr>
                        <tr>
                            <th colspan="2">@lang('main.created_at')</th>
                            <td colspan="2">{{ $learnBox->created_at }}</td>
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

