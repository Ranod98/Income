@extends('layouts.master3')

@section('title')
    @lang('main.incomes_list')
@endsection

@section('content')

        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex">
                    <h2>{{ __('Frontend/frontend.invoice', ['invoice_number' => $income->id]) }}</h2>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>{{ __('Frontend/frontend.customer_name') }}</th>
                                <td>{{ $income->credit }}</td>
                                <th>{{ __('Frontend/frontend.customer_email') }}</th>
                                <td>{{ $income->credit }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Frontend/frontend.customer_mobile') }}</th>
                                <td>{{ $income->credit }}</td>
                                <th>{{ __('Frontend/frontend.company_name') }}</th>
                                <td>{{ $income->credit }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Frontend/frontend.invoice_number') }}</th>
                                <td>{{ $income->credit }}</td>
                                <th>{{ __('Frontend/frontend.invoice_date') }}</th>
                                <td>{{ $income->credit }}</td>
                            </tr>
                        </table>

                        <h3>{{ __('Frontend/frontend.invoice_details') }}</h3>

                        <table class="table">
                            <thead>
                            <tr>
                                <th></th>
                                <th>{{ __('Frontend/frontend.product_name') }}</th>
                                <th>{{ __('Frontend/frontend.unit') }}</th>
                                <th>{{ __('Frontend/frontend.quantity') }}</th>
                                <th>{{ __('Frontend/frontend.unit_price') }}</th>
                                <th>{{ __('Frontend/frontend.product_subtotal') }}</th>
                            </tr>
                            </thead>

                            <tfoot>
                            <tr>
                                <td colspan="3"></td>
                                <th colspan="2">{{ __('Frontend/frontend.sub_total') }}</th>
                                <td>{{ $income->credit }}</td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <th colspan="2">{{ __('Frontend/frontend.discount') }}</th>
                                <td>{{ $income->credit }}</td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <th colspan="2">{{ __('Frontend/frontend.vat') }}</th>
                                <td>{{ $income->credit }}</td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <th colspan="2">{{ __('Frontend/frontend.shipping') }}</th>
                                <td>{{ $income->credit }}</td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <th colspan="2">{{ __('Frontend/frontend.total_due') }}</th>
                                <td>{{ $income->credit }}</td>
                            </tr>

                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    <script>
        window.print();
    </script>
@endsection

