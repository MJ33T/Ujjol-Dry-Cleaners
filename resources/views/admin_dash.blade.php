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
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Men's Clothing</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                <th>#</th>
                                <th>পণ্যের নাম</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                @if($product['category']=="Men's Clothing")
                                <tr>
                                <td>{{$product['id']}}</td>
                                <td>{{$product['name']}}</td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Winter Clothing(Men)</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                <th>#</th>
                                <th>পণ্যের নাম</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                @if($product['category']=="Winter Clothing")
                                <tr>
                                <td>{{$product['id']}}</td>
                                <td>{{$product['name']}}</td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Women's Clothing</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                <th>#</th>
                                <th>পণ্যের নাম</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                @if($product['category']=="Women's Clothing")
                                <tr>
                                <td>{{$product['id']}}</td>
                                <td>{{$product['name']}}</td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Winter Clothing(Women)</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                <th>#</th>
                                <th>পণ্যের নাম</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                @if($product['category']=="Women")
                                <tr>
                                <td>{{$product['id']}}</td>
                                <td>{{$product['name']}}</td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Others</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                <th>#</th>
                                <th>পণ্যের নাম</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                @if($product['category']=="Others")
                                <tr>
                                <td>{{$product['id']}}</td>
                                <td>{{$product['name']}}</td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Blanket</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                <th>#</th>
                                <th>পণ্যের নাম</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                @if($product['category']=="Blanket")
                                <tr>
                                <td>{{$product['id']}}</td>
                                <td>{{$product['name']}}</td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Curtains</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                <th>#</th>
                                <th>পণ্যের নাম</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                @if($product['category']=="Curtains")
                                <tr>
                                <td>{{$product['id']}}</td>
                                <td>{{$product['name']}}</td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
            <!-- /.row -->  
            <br>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Add Products</h3>
                        </div>
                        <form action="admin_dash" method="POST">
                            @csrf
                            <div class="card-body" style="height: 300px;" >
                                <div class="row">
                                    
                                    <label>Enter Product No</label>
                                    <input name="product_id" type="text" class="form-control form-control-lg" required placeholder="Product Serial No">
                                    
                                    <label>Enter Product Quantity</label>
                                    <input name="product_qty" type="text" class="form-control form-control-lg" required placeholder="Product Quantity">
                                    
                                    <label for="">Iron Or Wash</label>
                                    <select name="type" id="type" class="form-control form-control-lg">
                                        <option value="Iron">Iron</option>
                                        <option value="Wash">Wash</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Add Product</button>
                            </div>    
                        </form>
                        
                        
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Print Preview</h3>
                        </div>
                        <div class="card-body table-responsive p-0" style="height: 300px;" >
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                    <th>#</th>
                                    <th>কাজের বিবরন</th>
                                    <th>পণ্যের পরিমান</th>
                                    <th>পণ্যের মজুরি</th>
                                    <th>মোট</th>
                                    <th>সরিয়ে ফেলুন</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $in_total = 0;
                                    @endphp
                                    @foreach ($added_products as $adp)
                                    <tr>
                                    <td>{{$adp['id']}}</td>
                                    <td>{{$adp['name']." (".$adp['type'].")"}}</td>
                                    <td>{{$adp['qty']}}</td>
                                    <td>{{$adp['unit_price']}}</td>
                                    <td>{{$adp['total']}}</td>
                                    <td><a href="delete_added_product/{{Crypt::encrypt($adp['id'])}}" type="submit" class="btn btn-danger">Delete</a></td>
                                    </tr>
                                    @php
                                        $in_total = $adp["total"] + $in_total    
                                    @endphp
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
                            <form action="print_bill" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <input name="customer_name" type="text" class="form-control form-control-md" placeholder="Customer Name">
                                    </div>
                                    <div class="col">
                                        <input name="cusomer_no" type="text" class="form-control form-control-md" required placeholder="Phone No">
                                    </div>
                                    <div class="col">
                                        <input name="recieved" type="text" class="form-control form-control-md"  placeholder="Recieved By">
                                    </div>
                                    <div class="col">
                                        <input name="advance" type="text" class="form-control form-control-md"  placeholder="Advance Pay">
                                    </div>
                                    <div class="col">
                                        <input name="discount" type="text" class="form-control form-control-md"  placeholder="Discount">
                                    </div>
                                    <div class="col">
                                        <input name="service" type="text" class="form-control form-control-md"  placeholder="Service Charge">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Print</button>
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

<style>
    @media (min-width: 768px){
  .seven-cols .col-md-1,
  .seven-cols .col-sm-1,
  .seven-cols .col-lg-1  {
    width: 100%;
    *width: 100%;
  }
}

@media (min-width: 992px) {
  .seven-cols .col-md-1,
  .seven-cols .col-sm-1,
  .seven-cols .col-lg-1 {
    width: 14.285714285714285714285714285714%;
    *width: 14.285714285714285714285714285714%;
  }
}
</style>
  
  