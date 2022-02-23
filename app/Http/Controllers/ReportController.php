<?php

namespace App\Http\Controllers;
use App\Models\PrintedProduct;
use App\Models\Report;
use App\Models\ReportCopy;
use App\Models\Utility;
use App\Models\SearchCustomer;
use PDF;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    function show_all_report(){
        if(session()->has('user')){
            $data = Report::orderBy('created_at', 'DESC')->get();
            return view('all_reports', ['reports' =>  $data]);
        }
        else{
            return redirect('/login');
        }
    }

    function show_daily_report(){
        if(session()->has('user')){
            $data = Report::orderBy('created_at', 'DESC')->get();

            return view('daily_report', ['reports' => $data]);
        }
        else{
            return redirect('/login');
        }
        
    }

    function report_search(Request $req){
        if(session()->has('user')){
            ReportCopy::truncate();
            $from = $req->from_date;
            $to = $req->to_date; 
            
            $results = DB::table('reports')->select()
                        ->whereDate('created_at', '>=', $from)
                        ->whereDate('created_at', '<=', $to)
                        ->orderBy('created_at', 'DESC')
                        ->get();

            foreach ($results as $result){
                $report = new ReportCopy;
                $report->id = $result->id;
                $report->name = $result->name;
                $report->phone = $result->phone;
                $report->recieved = $result->recieved;
                $report->cloth_bref = $result->cloth_bref;
                $report->iron_total = $result->iron_total;
                $report->iron_worker_total = $result->iron_worker_total;
                $report->wash_total = $result->wash_total;
                $report->wash_worker_total = $result->wash_worker_total;
                $report->iron_income = $result->iron_income;
                $report->wash_income = $result->wash_income;
                $report->total_income = $result->total_income;
                $report->service = $result->service;
                $report->discount = $result->discount;
                $report->iron_worker = $result->iron_worker;
                $report->wash_worker = $result->wash_worker;
                $report->created_at = $result->created_at;
                $report->save();
            }

            $data = ReportCopy::all();
            return view('report_search', ['reports' => $data]);
        }
        else{
            return redirect('/login');
        }   
    }

    function shares(){
        if(session()->has('user')){
            $data = Report::all();
            $utility = Utility::all();
            return view('all_shares', ['reports' =>  $data, 'utilitys' => $utility]);
        }
        else{
            return redirect('/login');
        }
    }

    function shares_search(Request $req){
        if(session()->has('user')){
            $from = $req->from_date;
            $to = $req->to_date; 
            
            $results = DB::table('reports')->select()
                        ->whereDate('created_at', '>=', $from)
                        ->whereDate('created_at', '<=', $to)
                        ->orderBy('created_at', 'DESC')
                        ->get();
            $utility = DB::table('utilities')->select()
                        ->whereDate('created_at', '>=', $from)
                        ->whereDate('created_at', '<=', $to)
                        ->orderBy('created_at', 'DESC')
                        ->get();
            return view('shares_search', ['reports' => $results, 'utilitys' => $utility]);
        }
        else{
            return redirect('/login');
        }
    }

    function paid_status(Request $req){
        if(session()->has('user')){
            $report = Report::find($req->report_id);
            $report->status = 'Paid';
            $report->save();
            SearchCustomer::truncate();
            return redirect('/search_id'); 
        }
        else{
            return redirect('/login');
        }
    }

    function deletebyId(Request $req){
        if(session()->has('user')){
            $report = Report::find($req->report_id);
            $report->delete();
            SearchCustomer::truncate();
            return redirect('/admin_dash'); 
        }
        else{
            return redirect('/login');
        
        }
    }

    function wash_worker_invoice(Request $req){
        if(session()->has('user')){
            $mpdf = new \Mpdf\Mpdf([
                'default_font_size' => 15,
                'default_font' => 'nikosh',
                // 'margin_left' => 10,
                // 'margin_right' => 5,
                'margin_top' => 5,
            ]);

            $mpdf->writeHtml($this->pdfHtml_wash());

            $mpdf->output();

        }
        else{
            return redirect('/login');
        
        }
    }
    public function pdfHtml_wash(){
        $output = view('wash_pdf');
        return $output;
    }


    function iron_worker_invoice(Request $req){
        if(session()->has('user')){
            $mpdf = new \Mpdf\Mpdf([
                'default_font_size' => 15,
                'default_font' => 'nikosh',
                // 'margin_left' => 10,
                // 'margin_right' => 5,
                'margin_top' => 5,
            ]);

            $mpdf->writeHtml($this->pdfHtml_iron());

            $mpdf->output();

        }
        else{
            return redirect('/login');
        
        }
    }
    public function pdfHtml_iron(){
        $output = view('iron_pdf');
        return $output;
    }

    function tony_invoice(Request $req){
        if(session()->has('user')){
            $mpdf = new \Mpdf\Mpdf([
                'default_font_size' => 15,
                'default_font' => 'nikosh',
                // 'margin_left' => 10,
                // 'margin_right' => 5,
                'margin_top' => 5,
            ]);

            $mpdf->writeHtml($this->pdfHtml_tony());

            $mpdf->output();

        }
        else{
            return redirect('/login');
        
        }
    }
    public function pdfHtml_tony(){
        $output = view('tony_pdf');
        return $output;
    }

    function iron_wash_add_view(){
        if(session()->has('user')){
            return view('iron_wash_add');

        }
        else{
            return redirect('/login');
        
        }
    }
    function iron_worker_add(Request $req){
        if(session()->has('user')){
            $report = Report::find($req->iron_invoice);
            $report->iron_worker = $req->iron_worker;
            $report->update();
            
            return redirect('iron_wash_add');

        }
        else{
            return redirect('/login');
        
        }
    }

    function wash_worker_add(Request $req){
        if(session()->has('user')){
            $report = Report::find($req->wash_invoice);
            $report->wash_worker = $req->wash_worker;
            $report->update();
            
            return redirect('iron_wash_add');

        }
        else{
            return redirect('/login');
        
        }
    }

    function iron_worker_view(){
        if(session()->has('user')){
            $irons = ReportCopy::all();
            return view('iron_worker', ['reports'=>$irons]);
        }
        else{
            return redirect('/login');
        }
    }

    function wash_worker_view(){
        if(session()->has('user')){
            $washes = ReportCopy::all();
            return view('wash_worker', ['reports'=>$washes]);
        }
        else{
            return redirect('/login');
        }
    }

    function iron_worker_search(Request $req){
        if(session()->has('user')){
            ReportCopy::truncate();
            $from = $req->from_date;
            $to = $req->to_date;
            $worker = $req->iron_worker;

            $results = DB::table('reports')->select()
                        ->whereDate('created_at', '>=', $from)
                        ->whereDate('created_at', '<=', $to)
                        ->orderBy('created_at', 'DESC')
                        ->get();

            foreach($results as $result){
                if($result->iron_worker == $worker){
                    $report = new ReportCopy;
                    $report->id = $result->id;
                    $report->name = $result->name;
                    $report->phone = $result->phone;
                    $report->recieved = $result->recieved;
                    $report->cloth_bref = $result->cloth_bref;
                    $report->iron_total = $result->iron_total;
                    $report->iron_worker_total = $result->iron_worker_total;
                    $report->wash_total = $result->wash_total;
                    $report->wash_worker_total = $result->wash_worker_total;
                    $report->iron_income = $result->iron_income;
                    $report->wash_income = $result->wash_income;
                    $report->total_income = $result->total_income;
                    $report->created_at = $result->created_at;
                    $report->iron_worker = $result->iron_worker;
                    $report->wash_worker = $result->wash_worker;
                    $report->save();        
                }
            }
            return redirect('iron_worker');

        }
        else{
            return redirect('/login');
        }
        
    }

    function wash_worker_search(Request $req){
        if(session()->has('user')){
            ReportCopy::truncate();
            $from = $req->from_date;
            $to = $req->to_date;
            $worker = $req->wash_worker;

            $results = DB::table('reports')->select()
                        ->whereDate('created_at', '>=', $from)
                        ->whereDate('created_at', '<=', $to)
                        ->orderBy('created_at', 'DESC')
                        ->get();

            foreach($results as $result){
                if($result->wash_worker == $worker){
                    $report = new ReportCopy;
                    $report->id = $result->id;
                    $report->name = $result->name;
                    $report->phone = $result->phone;
                    $report->recieved = $result->recieved;
                    $report->cloth_bref = $result->cloth_bref;
                    $report->iron_total = $result->iron_total;
                    $report->iron_worker_total = $result->iron_worker_total;
                    $report->wash_total = $result->wash_total;
                    $report->wash_worker_total = $result->wash_worker_total;
                    $report->iron_income = $result->iron_income;
                    $report->wash_income = $result->wash_income;
                    $report->total_income = $result->total_income;
                    $report->created_at = $result->created_at;
                    $report->iron_worker = $result->iron_worker;
                    $report->wash_worker = $result->wash_worker;
                    $report->save();        
                }
            }
            return redirect('wash_worker');

        }
        else{
            return redirect('/login');
        }
        
    }


    function mobile_report_view(){
        if(session()->has('user')){
            $reports = ReportCopy::all();
            return view('mobile_report', ['reports'=>$reports]);
        }
        else{
            return redirect('/login');
        }
    }

    function mobile_report_search(Request $req){
        if(session()->has('user')){
            $mobile = $req->customer_mobile;
            $results = Report::all();
            foreach($results as $result){
                if($result->phone == $mobile){
                    $report = new ReportCopy;
                    $report->id = $result->id;
                    $report->name = $result->name;
                    $report->phone = $result->phone;
                    $report->recieved = $result->recieved;
                    $report->cloth_bref = $result->cloth_bref;
                    $report->iron_total = $result->iron_total;
                    $report->iron_worker_total = $result->iron_worker_total;
                    $report->wash_total = $result->wash_total;
                    $report->wash_worker_total = $result->wash_worker_total;
                    $report->iron_income = $result->iron_income;
                    $report->wash_income = $result->wash_income;
                    $report->total_income = $result->total_income;
                    $report->created_at = $result->created_at;
                    $report->iron_worker = $result->iron_worker;
                    $report->wash_worker = $result->wash_worker;
                    $report->save();        
                }
            }
            return redirect('mobile_report');

        }
        else{
            return redirect('/login');
        }
    }

    function show_all_due_report(){
        if(session()->has('user')){
            $data = Report::orderBy('created_at', 'DESC')->get();
            return view('due_reports', ['reports' =>  $data]);
        }
        else{
            return redirect('/login');
        }
    }

    function show_all_paid_report(){
        if(session()->has('user')){
            $data = Report::orderBy('created_at', 'DESC')->get();
            return view('paid_reports', ['reports' =>  $data]);
        }
        else{
            return redirect('/login');
        }
    }

    function show_utility(){
        if(session()->has('user')){
            $data = Utility::orderBy('created_at', 'DESC')->get();
            return view('add_utility', ['reports' =>  $data]);
        }
        else{
            return redirect('/login');
        }
    }

    function add_ulility(Request $req){
        if(session()->has('user')){
            $utility = new Utility;
            if($req->rent == null){
                $utility->rent = 0;
            }else{
                $utility->rent = $req->rent;
            }
            if($req->electric == null){
                $utility->electric = 0;
            }else{
                $utility->electric = $req->electric;
            }
            if($req->others == null){
                $utility->others = 0;
            }else{
                $utility->others = $req->others;
            }
            $utility->save();
            return redirect('add_utility');
        }
        else{
            return redirect('/login');
        }
    }

    function paid_report_search_view(){
        if(session()->has('user')){
            $reports = ReportCopy::all();
            return view('paid_report_search', ['reports'=>$reports]);
        }
        else{
            return redirect('/login');
        }
    }

    function paid_report_search(Request $req){
        if(session()->has('user')){
            ReportCopy::truncate();
            $from = $req->from_date;
            $to = $req->to_date;

            $results = DB::table('reports')->select()
                        ->whereDate('created_at', '>=', $from)
                        ->whereDate('created_at', '<=', $to)
                        ->orderBy('created_at', 'DESC')
                        ->get();

            foreach($results as $result){
                if($result->status == 'Paid'){
                    $report = new ReportCopy;
                    $report->id = $result->id;
                    $report->name = $result->name;
                    $report->phone = $result->phone;
                    $report->recieved = $result->recieved;
                    $report->cloth_bref = $result->cloth_bref;
                    $report->iron_total = $result->iron_total;
                    $report->iron_worker_total = $result->iron_worker_total;
                    $report->wash_total = $result->wash_total;
                    $report->wash_worker_total = $result->wash_worker_total;
                    $report->iron_income = $result->iron_income;
                    $report->wash_income = $result->wash_income;
                    $report->total_income = $result->total_income;
                    $report->discount = $result->discount;
                    $report->service = $result->service;
                    $report->created_at = $result->created_at;
                    $report->iron_worker = $result->iron_worker;
                    $report->wash_worker = $result->wash_worker;
                    $report->save();        
                }
            }
            return redirect('paid_report_search');

        }
        else{
            return redirect('/login');
        }
    }
    
}
  