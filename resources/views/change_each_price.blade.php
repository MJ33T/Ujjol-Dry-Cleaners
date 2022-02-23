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
                            <h3>Product Details</h3>
                        </div>
                        <div class="card-body" style="height: 350px;">
                            <h3>Product Name: {{$product['name']}}</h3>
                            <br>
                            <h3>Iron Rate: {{$product['iron_rate']}}</h3>
                            <br>
                            <h3>Iron Worker Rate: {{$product['iron_worker_rate']}}</h3>
                            <br>
                            <h3>Wash Rate: {{$product['wash_rate']}}</h3>
                            <br>
                            <h3>Wash Worker Rate: {{$product['wash_worker_rate']}}</h3>
                        </div>
                        <div class="card-footer">
                            <a href="/change_rate" type="submit" class="btn btn-primary">Back</a>
                        </div>
                    </div>    
                </div>                
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3>Update Price</h3>
                        </div>
                        <form action="/change_rate" method="POST">
                            @csrf
                            <div class="card-body" style="height: 350px;">
                                    <input type="hidden" name="id" value="{{$product['id']}}">
                                    <label for="">Iron Rate</label>
                                    <input name="iron_rate" type="text" class="form-control form-control-md" placeholder="Enter Iron Rate">
                                    <label for="">Iron Worker Rate</label>
                                    <input name="iron_worker_rate" type="text" class="form-control form-control-md" placeholder="Enter Iron Worker Rate">
                                    <label for="">Wash Rate</label>
                                    <input name="wash_rate" type="text" class="form-control form-control-md" placeholder="Enter Wash Rate">
                                    <label for="">Wash Worker Rate</label>
                                    <input name="wash_worker_rate" type="text" class="form-control form-control-md" placeholder="Enter Wash Worker Rate">
                                
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>    
                </div>
                
            </div>
        </div>
          <!-- Main row -->
    </section>
</div>

@endsection