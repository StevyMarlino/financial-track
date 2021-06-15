@extends('layouts.dashboard')

@section('title')
    Details
@endsection

@section('heading')
    Details
@endsection

@section('content')
 
    <div class="container-fluid mt--5  kiakiak">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <div class="card shadow-soft border-light p-4 p-md-5 position-relative">
                    <div class="d-flex justify-content-between pb-4 pb-md-5 mb-4 mb-md-5 border-bottom border-light">
  
                        <div class="col-md-6">
                            <img src="#" height="90" class="mr-3" alt="GlobexcamLogo"><br>
                            <span>Invoice #{{ $detail['invoice']['id'] }}</span>
                        </div>
  
                        <div class="col-md-3 text-right ">
                            <span class="text-red font-weight-bold">{{ $detail['invoice']['status'] }}</span>
  
  
                        </div>
  
                        <div class="impression">
                            <div class="col-md-3 text-center">
                                <button onclick="window.print();"><i class="fa fa-print" aria-hidden="true" ></i></button>
                            </div>
                        </div>
  
                    </div>
                    <div class="col-md-12 mb-6 justify-content-between">
                        <div class="row">
                            <div class="col-md text-left">
                                <h3>Invoice To:</h3>
                                <p>{{ $detail['invoice']['client']['lastname'] }} {{ $detail['invoice']['client']['firstname'] }}</p>
                                <p>{{ $detail['invoice']['client']['city'] }}</p>
                                <p>{{ $detail['invoice']['client']['country'] }}</p>
                            </div>
                            <div class="col-md text-right">
                                <h3>Pay To:</h3>
                                <p>GLOBEXCAM COMPANY LIMITED</p>
  
                                <p>Bank : ECOBANK</p>
                                <p>Account : 0200 1226 2137 9401</p>
                                {{--                                <p>CP 1063 MIRABEL, QC</p>--}}
  
                                <p>CAMEROON, YAOUNDE</p>
                                <p>Tel: 670 858 799 / 695 476 763</p>
                                <p>Taxe ( {{ $detail['invoice']['taxrate'] }}
                                    %): {{ $detail['invoice']['tax'] }}</p>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md text-left">
                                <h3>Payment Method(s):</h3>
                                <p>{{ ($detail['invoice']['payment_module'] == 0)? 'No payment method' : "Money-Transfer" }}</p> 
                            </div>
                            <div class="col-md text-right">
                                <h3>Invoice Date:</h3>
                                <p>{{ $detail['invoice']['duedate'] }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table mb-0 ">
                                    <thead class="bg-light border-top">
                                    <tr>
                                        <th scope="row" class="border-0 text-left">Invoice Items</th>
                                        <th scope="row" class="border-0"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row" class="text-left font-weight-bold h6">Description</th>
                                        <td class="font-weight-bold text-right">Amount</td>
                                    </tr>
                                    @foreach($detail['invoice']['items'] as $item)
  
                                        <tr>
                                            <th scope="row"
                                                class="text-left font-weight-bold h6">{{ $item['description'] }} *
                                            </th>
                                            <td class="text-right">{{ number_format($item['amount']) }} XAF</td>
                                        </tr>
  
                                    @endforeach
  
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-end text-right mb-4 py-2 border-bottom">
                                <div class="mt-2">
                                    <table class="table table-clear">
                                        <tbody>
                                        <tr>
                                            <td class="left"><strong>Sub Total</strong></td>
                                            <td class="right">{{ number_format($detail['invoice']['subtotal']) }}
                                                XAF
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="left"><strong>Taxe </strong></td>
                                            <td class="right"> ({{ $detail['invoice']['taxrate'] }}
                                                %): {{ number_format($detail['invoice']['tax']) }} XAF
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="left"><strong>Total</strong></td>
                                            <td class="right">
                                                <strong>{{ number_format($detail['invoice']['total']) }}
                                                    XAF</strong></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="border-top">
                                    <tr>
                                        <th scope="row" class="border-0 text-left">Transaction Date</th>
                                        <th scope="row" class="border-0 text-center">Gateway</th>
                                        <th scope="row" class="border-0 text-right">Amount</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row" class="text-left font-weight-bold h6">{{ $detail['invoice']['date'] }}</th>
                                        <td class="font-weight-bold text-center">{{ ($detail['invoice']['payment_module'] == 0)? 'No payment method' : "Money-Transfer" }}</td>
                                        <td class="font-weight-bold text-right">{{ number_format($detail['invoice']['total']) }}
                                            XAF
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 

  <style>
    @media print {
        body * {
        visibility: hidden;
        }
        .kiakiak * {
        visibility: visible;
        }
        .impression * {
            visibility: hidden;
        }
       
    }
</style>

@endsection
