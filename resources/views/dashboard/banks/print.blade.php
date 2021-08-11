@extends('layouts.master3')

@section('title')
    @lang('main.bank') - {{$bank->id}}
@endsection

@section('content')

    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex">
                <h2>@lang('banks.bank_id')-{{$bank->id}}</h2>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th colspan="2">@lang('incomes.date')</th>
                            <td colspan="2">{{ $bank->date }}</td>
                        </tr>
                        <tr>
                            <th>@lang('incomes.amount')</th>
                            <td>{{ $bank->credit }}</td>
                            <th>@lang('incomes.note')</th>
                            <td>{{ $bank->note }}</td>
                        </tr>
                        <tr>
                            <th colspan="2">@lang('main.created_at')</th>
                            <td colspan="2">{{ $bank->created_at }}</td>
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

