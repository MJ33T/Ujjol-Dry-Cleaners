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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Update Product's Rate</h3>
                        </div>
                        <div class="card-body table-responsive p-0" style="height: 700px;">
                            <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                <th style="text-align: center">#</th>
                                <th style="text-align: center">পণ্যের নাম</th>
                                <th style="text-align: center">Iron Rate</th>
                                <th style="text-align: center">Iron Worker Rate</th>
                                <th style="text-align: center">Wash Rate</th>
                                <th style="text-align: center">Wash Worker Rate</th>
                                <th style="text-align: center">Update</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                <td style="text-align: center">{{$product['id']}}</td>
                                <td style="text-align: center">{{$product['name']}}</td>
                                <td style="text-align: center">{{$product['iron_rate']}}</td>
                                <td style="text-align: center">{{$product['iron_worker_rate']}}</td>
                                <td style="text-align: center">{{$product['wash_rate']}}</td>
                                <td style="text-align: center">{{$product['wash_worker_rate']}}</td>
                                <td style="text-align: center"> <a href="change_product_rate/{{Crypt::encrypt($product['id'])}}" type="submit" class="btn btn-warning">Edit</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
          <!-- Main row -->
    </section>
</div>

@endsection