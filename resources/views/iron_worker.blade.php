@extends('master')
@section('master')

@php
    use App\Models\Product;
    use Rakibhstu\Banglanumber\NumberToBangla;
    $numto = new NumberToBangla();

    $iron_worker_intotal = 0;
    $iron_worker_total = 0
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
                            <h3>Iron Worker Reports</h3>
                            <form action="iron_worker_search" method="POST">
                                @csrf
                            <div class="row">
                                <div class="col-sm-3">
                                    <label for="">From Date </label>
                                    <input type="date" class="form-control" name="from_date">
                                </div> 
                                <div class="col-sm-3">
                                    <label for="">To Date </label>
                                    <input type="date" class="form-control" name="to_date">
                                </div>
                                <div class="col-sm-3">
                                    <label for="">Worker Name</label>
                                    <select name="iron_worker" id="iron_worker" class="form-control form-control-md">
                                        <option value="rakib">Rakib</option>
                                        <option value="tapos">Tapos</option>
                                    </select>
                                </div>
                                <div style="margin-top: 32px" class="col-sm-3">
                                    <button type="submit" class="btn btn-primary">Find</button>
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
                                <th style="text-align: center">Iron Worker Name</th>
                                <th style="text-align: center">Cloth Description</th>
                                <th style="text-align: center">Iron Worker Total</th>
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
                                <td rowspan="{{$arr_len}}" style="text-align: center">{{$report['iron_worker']}}</td>
                                
                                @php
                                    
                                @endphp
                                @for($i = 0; $i<$arr_len-1; $i++)
                                @php
                                    $result = explode("+", $result_arrs[$i]);
                                    $iron = Product::find($result[0]);
                                    $iron_worker_total = $iron['iron_worker_rate']*$result[3];
                                    $iron_worker_intotal = $iron_worker_total + $iron_worker_intotal;     
                                @endphp
                                    <tr>
                                        <td style="text-align: center">{{$result[1].' ('.$result[2].')'.'-'.$result[3]}}</td>
                                        <td style="text-align: center">{{$iron_worker_total}}</td>
                                    </tr>
                                @endfor
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col">
                                    <h4>Iron Worker : {{$iron_worker_intotal}}</h4>
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