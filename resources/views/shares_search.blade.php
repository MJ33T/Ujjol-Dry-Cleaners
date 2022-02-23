@extends('master')
@section('master')

@php
    use Rakibhstu\Banglanumber\NumberToBangla;
    $numto = new NumberToBangla();
    $total = 0;
    $total_rent = 0;
    $total_elec = 0;
    $total_others = 0;
    foreach($reports as $report){
        if($report->status == 'Paid'){
            $total = $report->total_income + $total;
        }
    }
    foreach($utilitys as $ult){
        if($ult->rent == null){
            $total_rent = $total_rent + 0;    
        }
        else{
            $total_rent = $total_rent + $ult->rent;
        }
        if($ult->electric == null){
            $total_elec = $total_elec + 0;
        }else{
            $total_elec = $total_elec + $ult->electric;
        }
        if($ult->others == null){
            $total_others = $total_others + 0;    
        }
        else{
            $total_others = $total_others + $ult->others;
        }    
    }
    $grand_total = $total - ($total_rent + $total_elec + $total_others);

    $taposh = ($grand_total/100) * 50;
    $tony = ($grand_total/100) * 40;
    $monir = ($grand_total/100) * 10;
@endphp

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card-header">
                <h3>Shares</h3>
            </div>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
    <!-- /.content-header -->
  <br><br>
  <!-- Main content -->
  
    <section class="content">
        <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-4 col-4">
                
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>Tapos</h3>
                        <p style="font-size: 30px">{{$numto->bnNum($taposh).' টাকা'}}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-flame"></i>
                    </div>
                    
                </div>
            </div>
            <div class="col-lg-4 col-4">  
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>Tony</h3>
                        <p style="font-size: 30px">{{$numto->bnNum($tony).' টাকা'}}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-flame"></i>
                    </div>
                    
                </div>
            </div>
            <div class="col-lg-4 col-4">  
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>Monir</h3>
                        <p style="font-size: 30px">{{$numto->bnNum($monir).' টাকা'}}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-flame"></i>
                    </div>
                    
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        </div>  
        <!-- Main row -->
    </section>
  @endsection
 
  