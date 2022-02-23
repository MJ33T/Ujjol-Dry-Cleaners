@extends('master')
@section('master')

@php
    use Rakibhstu\Banglanumber\NumberToBangla;
    $numto = new NumberToBangla();

    $current_date = date('Y-m-d');

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
                            <h3>Add Utility Bill</h3>
                        </div>
                        <div class="card-body table-responsive p-0" style="height: 600px;">
                            <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                <th style="text-align: center">#</th>
                                <th style="text-align: center">Date</th>
                                <th style="text-align: center">Time</th>
                                <th style="text-align: center">Rent</th>
                                <th style="text-align: center">Electricity Bill</th>
                                <th style="text-align: center">Others Bill</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reports as $report)
                                @php
                                    $date_match = explode(" ", $report['created_at']);
                                @endphp
                                {{-- @if($current_date == $date_match[0]) --}}
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
                                <td rowspan="{{$arr_len}}" style="text-align: center">{{$report['rent']}}</td>
                                <td rowspan="{{$arr_len}}" style="text-align: center">{{$report['electric']}}</td>
                                <td rowspan="{{$arr_len}}" style="text-align: center">{{$report['others']}}</td>
                                </tr>
                                {{-- @endif --}}
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <form action="/add_utility" method="POST">
                                @csrf
                            <div class="row">
                                <div class="col">
                                    <label for="">Store Rent</label>
                                    <input type="text" class="form-control" name="rent" placeholder="Enter Store Rent">
                                </div> 
                                <div class="col">
                                    <label for="">Electricity Bill</label>
                                    <input type="text" class="form-control" name="electric" placeholder="Enter Electricity Bill">
                                </div>
                                <div class="col">
                                    <label for="">Other Bill</label>
                                    <input type="text" class="form-control" name="others" placeholder="Enter Other Bill">
                                </div>
                                <div style="margin-top: 30px" class="col">
                                    <button type="submit" class="btn btn-primary">ADD Utility</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
          <!-- Main row -->
    </section>
</div>

@endsection