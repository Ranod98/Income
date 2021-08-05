@extends('layouts.master3')

@section('title')
    @lang('main.selfboxes_list') - {{$selfBox->id}}
@endsection

@section('content')

    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex">
                <h2>@lang('selfBoxes.selfBox_id')-{{$selfBox->id}}</h2>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>@lang('incomes.date')</th>
                            <td>{{ $selfBox->date }}</td>
                            <th>@lang('incentives.percentage')</th>
                            <td>{{$selfBox->percentage}}%</td>
                        </tr>
                        <tr>
                            <th>@lang('incomes.amount')</th>
                            <td>{{ $selfBox->credit }}</td>
                            <th>@lang('incomes.note')</th>
                            <td>{{ $selfBox->note }}</td>
                        </tr>
                        <tr>
                            <th colspan="2">@lang('main.created_at')</th>
                            <td colspan="2">{{ $selfBox->created_at }}</td>
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

