@extends('master')
@section('master')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <br>
    <section class="content">
        <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Invoice Search (Mobile)</h3>
                        </div>
                        <form action="search_customer" method="POST">
                            @csrf
                            <div class="card-body" style="height: 200px;" >
                                <div class="row">
                                    
                                    <label>Enter Mobile No</label>
                                    <input name="customer_mobile" type="text" class="form-control form-control-lg" required placeholder="Customer Mobile No">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>    
                        </form>   
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Customer Details</h3>
                                </div>
                                <div class="card-body" style="height: 340px;" >
                                    @foreach ($searches as $search)
                                    <h3>Customer Name: {{$search['name']}}</h3>
                                    <h3>Mobile No: {{$search['phone']}}</h3>
                                    <h3>Recieved By: {{$search['recieved']}}</h3>
                                    @php
                                        $data = explode(' ', $search['created_at']);
                                        $date = date('d/m/Y', strtotime($data[0]));
                                        $time = date('h:i:s a', strtotime($data[1]));
                                    @endphp
                                    <h3>Recieved Date: {{$date}}</h3>
                                    <h3>Recieved Time: {{$time}}</h3>
                                    <br>
                                    <h2>Status: {{$search['status']}}</h2>
                                    @endforeach
                                </div>
                                

                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Work Details</h3>
                        </div>
                        <div class="card-body table-responsive p-0" style="height: 600px;" >
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                    <th>#</th>
                                    <th>কাজের বিবরন</th>
                                    <th>পণ্যের পরিমান</th>
                                    <th>পণ্যের মজুরি</th>
                                    <th>মোট</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $arr_len = 0;
                                        $in_total = 0;
                                        $report_id = 0;
                                        foreach ($searches as $search){
                                            if($search['cloth_bref'] == null){
                                                return view('search_id');
                                            }
                                            else{
                                                $result_arrs = explode (",", $search['cloth_bref']);
                                            }
                                            $arr_len = count($result_arrs);
                                        }   
                                        

                                    @endphp
                                    @for($i = 0; $i<$arr_len-1; $i++)
                                        <tr>
                                            <td>{{$i+1}}</td>
                                            @php
                                                $result = explode("+", $result_arrs[$i]);     
                                                @endphp
                                            <td>{{$result[1]." (".$result[2].")"}}</td>
                                            <td>{{$result[3]}}</td>
                                            <td>{{$result[4]}}</td>
                                            <td>{{$result[3]*$result[4]}}</td>
                                            @php
                                                
                                                $in_total = ($result[3]*$result[4]) + $in_total;

                                            @endphp
                                        </tr>
                                    @endfor
                                    @foreach($searches as $search)
                                    @if($search['service'] != null)
                                    @php
                                        $in_total = $in_total + $search['service'];
                                    @endphp
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>সার্ভিস</td>
                                        <td>{{$search['service']}}</td>
                                    </tr>    
                                    @endif
                                    @if($search['discount'] != null)
                                    @php
                                        $in_total = $in_total - $search['discount'];
                                    @endphp
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>ছাড়</td>
                                        <td>{{$search['discount']}}</td>
                                    </tr>    
                                    @endif
                                    @endforeach
                                   
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>সর্বমোট</td>
                                        <td>{{$in_total}}</td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                            
                        </div>
                        <div class="card-footer">
                            <form action="paid_status" method="POST">
                                @csrf
                                <div class="row">
                                    @foreach ($searches as $report)
                                        <input name="report_id" type="hidden" value="{{$report['id']}}">
                                    @endforeach   
                                    <button type="submit" class="btn btn-primary">Paid</button>
                                </div>
                            </form>
                        </div>   
                    </div>
            </div>
            
          <!-- Main row -->
      </section>
</div>

@endsection