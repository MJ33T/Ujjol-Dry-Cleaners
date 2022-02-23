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
                            <h3 class="card-title">Iron Worker Invoice Add</h3>
                        </div>
                        <form action="iron_worker_add" method="POST">
                            @csrf
                            <div class="card-body" style="height: 200px;" >
                                <div class="row">
                                    
                                    <label>Enter Invoice No</label>
                                    <input name="iron_invoice" type="text" class="form-control form-control-lg" required placeholder="Invoice No">

                                    <label for="">Worker Name</label>
                                    <select name="iron_worker" id="iron_worker" class="form-control form-control-lg">
                                        <option value="rakib">Rakib</option>
                                        <option value="tapos">Tapos</option>

                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Add Iron</button>
                            </div>    
                        </form>   
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Wash Worker Invoice Add</h3>
                        </div>
                        <form action="wash_worker_add" method="POST">
                            @csrf
                            <div class="card-body" style="height: 200px;" >
                                <div class="row">
                                    
                                    <label>Enter Invoice No</label>
                                    <input name="wash_invoice" type="text" class="form-control form-control-lg" required placeholder="Invoice No">
                                    
                                    <label for="">Worker Name</label>
                                    <select name="wash_worker" id="wash_worker" class="form-control form-control-lg">
                                        <option value="dhopa-2">Dhopa-2</option>
                                        <option value="dhopa-1">Dhopa-1</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Add Wash</button>
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