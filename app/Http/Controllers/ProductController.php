<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\AddedProduct;
use App\Models\PrintedProduct;
use App\Models\SearchCustomer;
use App\Models\Report;
use Illuminate\Support\Str;
use Session;
use PDF;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    function show_product(){
        if(session()->has('user')){
            $products = Product::all();
            $added_products =AddedProduct::all();
            return view('admin_dash', ['products'=>$products, 'added_products'=>$added_products]);
        }
        else{
            return redirect('/login');
        }
    }

    function add_product(Request $req){
        if(session()->has('user')){
            $product = Product::find($req->product_id);

            $add_product = new AddedProduct;
            $add_product->product_id = $product->id;
            $add_product->name = $product->name;
            $add_product->qty = $req->product_qty;
            $add_product->type = $req->type;
            if($req->type == "Iron"){
                $add_product->total = ($product->iron_rate * $req->product_qty);
                $add_product->unit_price = $product->iron_rate;
            }
            else if($req->type == "Wash"){
                $add_product->total = ($product->wash_rate * $req->product_qty);
                $add_product->unit_price = $product->wash_rate;
            }

            $add_product->save();

            return redirect('/admin_dash');

        }
        else{
            return redirect('/login');
        }
    }

    function delete($id){
        if(session()->has('user')){
            $pid = \Crypt::decrypt($id);
            $data = AddedProduct::find($pid);

            $data->delete();
            return redirect('admin_dash');
        }
        else{
            return redirect('/login');
        }
    }
    function print(Request $req){
        if(session()->has('user')){
            $dels = PrintedProduct::all();
            foreach ($dels as $del){
                $del->delete();
            }
            $printed = new PrintedProduct;
            $report = new Report;
            $in_total = 0;
            $iron_total = 0;
            $iron_worker_total = 0;
            $wash_total = 0;
            $wash_worker_total = 0;
            $total_income = 0;

            $all_cloth = null;
            $printed->phone = $req->cusomer_no;

            if($req->discount == null){
                $printed->discount = 0;
            }else{
                $printed->discount = $req->discount;
            }
            if($req->service == null){
                $printed->service = 0;
            }else{
                $printed->service = $req->service;
            }
            
            if($req->customer_name == null){
                $printed->name = 'N/A';    
            }
            else{
                $printed->name = $req->customer_name;
            }
            if($req->recieved == null){
                $printed->recieved = Str::ucfirst(Session::get('user')['name']);
            }
            else{
                $printed->recieved = $req->recieved;
            }
            if($req->advance == null){
                $printed->status = 'Due';
            }
            else{
                $printed->status = 'Paid';
            }
            $cloths = AddedProduct::all();
            foreach ($cloths as $cloth){
                $all_cloth .= $cloth['product_id'].'+'.$cloth['name'].'+'.$cloth['type'].'+'.$cloth['qty'].'+'.$cloth['unit_price'].',';
                $in_total = $cloth['total']+$in_total;

                $product = Product::find($cloth['product_id']);
                if($cloth['type'] == "Iron"){
                    $iron_total = ($cloth['qty'] * $cloth['unit_price']) + $iron_total;
                    $iron_worker_total = ($cloth['qty'] * $product['iron_worker_rate']) + $iron_worker_total;
                }
                else if($cloth['type'] == "Wash"){
                    $wash_total = ($cloth['qty'] * $cloth['unit_price']) + $wash_total;
                    $wash_worker_total = ($cloth['qty'] * $product['wash_worker_rate']) + $wash_worker_total;
                }
            }

            $printed->cloth_bref = $all_cloth;
            $printed->total = $in_total + $req->service;
            AddedProduct::truncate(); 

            $report->name = $printed->name;
            $report->phone = $printed->phone;
            $report->recieved = $printed->recieved;
            $report->iron_worker = 'tapos';
            $report->wash_worker = 'dhopa-1';
            $report->status = $printed->status;
            $report->service = $printed->service;
            $report->cloth_bref = $all_cloth; 
            $report->iron_total = $iron_total;
            $report->iron_worker_total = $iron_worker_total;
            $report->iron_income = $iron_total - $iron_worker_total;
            $report->wash_total = $wash_total;
            $report->wash_worker_total = $wash_worker_total;
            $report->wash_income = $wash_total - $wash_worker_total;
            $report->discount = $printed->discount;
            $total_income = (($iron_total - $iron_worker_total) + ($wash_total - $wash_worker_total) + $printed->service) - $printed->discount;
            $report->total_income = $total_income;
            $printed->save();
            $report->save();
           

            $mpdf = new \Mpdf\Mpdf([
                'default_font_size' => 15,
                'default_font' => 'nikosh',
                // 'margin_left' => 10,
                // 'margin_right' => 5,
                'margin_top' => 5,
            ]);

            $mpdf->writeHtml($this->pdfHtml());

            $mpdf->output();

                 

            // return $pdf->stream('bill.pdf');





            
            // return redirect('admin_dash');
        }
        else{
            return redirect('/login');
        }
    }

    public function pdfHtml(){
        $output = view('pdf');
        return $output;
    }


    function show(){
        if(session()->has('user')){
            $searches = SearchCustomer::all();
            return view('search_customer', ['searches'=>$searches]);
        }
        else{
            return redirect('/login');
        }
    }

    function search_customer(Request $req){
        if(session()->has('user')){
            // SearchCustomer::truncate();
            $sort_customers = Report::all();
            foreach ($sort_customers as $sort){
                if($sort['phone'] == $req->customer_mobile && $sort['status'] == 'Due'){
                    $search = new SearchCustomer;
                    $search->id = $sort['id'];
                    $search->phone = $sort['phone'];
                    $search->name = $sort['name'];
                    $search->recieved = $sort['recieved'];
                    $search->cloth_bref = $sort['cloth_bref'];
                    // $search->total = $sort['total_income'];
                    $search->discount = $sort['discount'];
                    $search->service = $sort['service'];
                    $search->status = $sort['status'];
                    $search->created_at = $sort['created_at'];
                    $search->save();
                }
            }  
            
            return redirect('search_customer');
        }
        else{
            return redirect('/login');
        }
    }

    function show_change_rate(){
        if(session()->has('user')){
            $products = Product::all();
            return view('change_rate', ['products'=>$products]);
        }
        else{
            return redirect('/login');
        }
    }

    function edit_product($id){
        if(session()->has('user')){
            $pid = \Crypt::decrypt($id);            
            $product = Product::find($pid);
            return view('change_each_price', ['product'=>$product]);
        }
        else{
            return redirect('/login');
        }
    }

    function update_product(Request $req){
        if(session()->has('user')){
            $product = Product::find($req->id);
            $product->iron_rate = $req->iron_rate;
            $product->iron_worker_rate = $req->iron_worker_rate;
            $product->wash_rate = $req->wash_rate;
            $product->wash_worker_rate = $req->wash_worker_rate;
            $product->save();
            return redirect('/change_rate');
         }
        else{
            return redirect('/login');
        }
        
    }

    function showbyId(){
        if(session()->has('user')){
            $searches = SearchCustomer::all();
            return view('search_id', ['searches'=>$searches]);
        }
        else{
            return redirect('/login');
        }
    }

    function searchId(Request $req){
        if(session()->has('user')){
            // SearchCustomer::truncate();
            $invoice = $req->customer_invoice;
            $sort_id = Report::all();
            foreach($sort_id as $sort){
                if($sort['id'] == $invoice){
                    $search = new SearchCustomer;
                    $search->id = $sort['id'];
                    $search->phone = $sort['phone'];
                    $search->name = $sort['name'];
                    $search->recieved = $sort['recieved'];
                    $search->cloth_bref = $sort['cloth_bref'];
                    // $search->total = $sort['total_income'];
                    $search->discount = $sort['discount'];
                    $search->service = $sort['service'];
                    $search->status = $sort['status'];
                    $search->created_at = $sort['created_at'];
                    $search->save();
                }
            }
            
            return redirect('search_id');
            
        }
        else{
            return redirect('/login');
        }


        
    }

    function showforDelete(){
        if(session()->has('user')){
            $searches = SearchCustomer::all();
            return view('delete_invoice', ['searches'=>$searches]);
        }
        else{
            return redirect('/login');
        }
    }

    function deleteId(Request $req){
        if(session()->has('user')){
            // SearchCustomer::truncate();
            $invoice = $req->customer_invoice;
            $sort_id = Report::all();
            foreach($sort_id as $sort){
                if($sort['id'] == $invoice){
                    $search = new SearchCustomer;
                    $search->id = $sort['id'];
                    $search->phone = $sort['phone'];
                    $search->name = $sort['name'];
                    $search->recieved = $sort['recieved'];
                    $search->cloth_bref = $sort['cloth_bref'];
                    // $search->total = $sort['total_income'];
                    $search->discount = $sort['discount'];
                    $search->service = $sort['service'];
                    $search->status = $sort['status'];
                    $search->created_at = $sort['created_at'];
                    $search->save();
                }
            }
            
            return redirect('delete_invoice');
            
        }
        else{
            return redirect('/login');
        }
    }


    
}
