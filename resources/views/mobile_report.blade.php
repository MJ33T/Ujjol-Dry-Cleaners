@extends('master')
@section('master')

@php
    use Rakibhstu\Banglanumber\NumberToBangla;
    $numto = new NumberToBangla();

    $iron_intotal = 0;
    $iron_worker_intotal = 0;
    $wash_intotal = 0;
    $wash_worker_intotal = 0;
    $iron_income_intotal = 0;
    $wash_income_intotal = 0;
    $income_intotal = 0;
@endphp

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <br>
    <section class="content">
        <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Report Search (Mobile)</h3>
                            <br>
                            <form action="mobile_report_search" method="POST">
                                @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <input name="customer_mobile" type="text" class="form-control form-control-lg" required placeholder="Customer Mobile No">
                                </div>
                                <div style="margin-top: 6px" class="col-md-3">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                            </form>
                        </div>
                        <div class="card-body table-responsive p-0" style="height: 630px;">
                            <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                <th style="text-align: center">#</th>
                                <th style="text-align: center">Date</th>
                                <th style="text-align: center">Time</th>
                                <th style="text-align: center">Customer Name</th>
                                <th style="text-align: center">Customer Mobile</th>
                                <th style="text-align: center">Recieved</th>
                                <th style="text-align: center">Iron Total</th>
                                <th style="text-align: center">Iron Worker Total</th>
                                <th style="text-align: center">Wash Total</th>
                                <th style="text-align: center">Wash Worker Total</th>
                                <th style="text-align: center">Iron Income</th>
                                <th style="text-align: center">Wash Income</th>
                                <th style="text-align: center">Discount</th>
                                <th style="text-align: center">Service</th>
                                <th style="text-align: center">Total Income</th>
                                <th style="text-align: center">Cloth Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reports as $report)
                                @php
                                    $result_arrs = explode (",", $report['cloth_bref']);
                                    $arr_len = count($result_arrs);
                                @endphp
                                <tr>
                                <td rowspan="{{$arr_len}}" style="text-align: center">{{$report['id']}}</td>
                                @php
                                    $data = explode(" ", $report['created_at']);
                                    $date = date('d/m/Y', strtotime($data[0]));
                                    $time = date('h:i:s a', strtotime($data[1]));
                                @endphp
                                <td rowspan="{{$arr_len}}" style="text-align: center">{{$date}}</td>
                                <td rowspan="{{$arr_len}}" style="text-align: center">{{$time}}</td>
                                <td rowspan="{{$arr_len}}" style="text-align: center">{{$report['name']}}</td>
                                <td rowspan="{{$arr_len}}" style="text-align: center">{{$report['phone']}}</td>
                                <td rowspan="{{$arr_len}}" style="text-align: center">{{$report['recieved']}}</td>
                                <td rowspan="{{$arr_len}}" style="text-align: center">{{$report['iron_total']}}</td>
                                <td rowspan="{{$arr_len}}" style="text-align: center">{{$report['iron_worker_total']}}</td>
                                <td rowspan="{{$arr_len}}" style="text-align: center">{{$report['wash_total']}}</td>
                                <td rowspan="{{$arr_len}}" style="text-align: center">{{$report['wash_worker_total']}}</td>
                                <td rowspan="{{$arr_len}}" style="text-align: center">{{$report['iron_income']}}</td>
                                <td rowspan="{{$arr_len}}" style="text-align: center">{{$report['wash_income']}}</td>
                                <td rowspan="{{$arr_len}}" style="text-align: center">{{$report['discount']}}</td>
                                <td rowspan="{{$arr_len}}" style="text-align: center">{{$report['service']}}</td>
                                <td rowspan="{{$arr_len}}" style="text-align: center">{{$report['total_income']}}</td>
                                @php
                                    $iron_intotal = $report['iron_total'] + $iron_intotal;
                                    $iron_worker_intotal = $report['iron_worker_total'] + $iron_worker_intotal;
                                    $wash_intotal = $report['wash_total'] + $wash_intotal;
                                    $wash_worker_intotal = $report['wash_worker_total'] + $wash_worker_intotal;
                                    $iron_income_intotal = $report['iron_income'] + $iron_income_intotal;
                                    $wash_income_intotal = $report['wash_income'] + $wash_income_intotal;
                                    $income_intotal = $report['total_income'] + $income_intotal;
                                @endphp
                                @for($i = 0; $i<$arr_len-1; $i++)
                                @php
                                    $result = explode("+", $result_arrs[$i]);     
                                @endphp
                                    <tr><td style="text-align: center">{{$result[1].' ('.$result[2].')'.'-'.$result[3]}}</td></tr>
                                @endfor
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                            <div class="col">
                                <h4>Iron : {{$iron_intotal}}</h4>
                            </div>
                            <div class="col">
                                <h4>Wash : {{$wash_intotal}}</h4>
                            </div>
                            <div class="col">
                                <h4>Iron Worker : {{$iron_worker_intotal}}</h4>
                            </div>
                            <div class="col">
                                <h4>Wash Worker : {{$wash_worker_intotal}}</h4>
                            </div>
                            <div class="col">
                                <h4>Iron Income : {{$iron_income_intotal}}</h4>
                            </div>
                            <div class="col">
                                <h4>Wash Income : {{$wash_income_intotal}}</h4>
                            </div>
                            <div class="col">
                                <h4>Total Income : {{$income_intotal}}</h4>
                            </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
          <!-- Main row -->
    </section>
</div>

@endsection