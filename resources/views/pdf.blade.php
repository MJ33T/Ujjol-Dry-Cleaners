
@php
    use App\Models\PrintedProduct;
    use Rakibhstu\Banglanumber\NumberToBangla;
    $numto = new NumberToBangla();

    $cloths = PrintedProduct::all();

    $in_total = 0;
    $in_total_one = 0;

    $path = base_path('ujjol.png');
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $pic = 'data:image/' . $type . ';base64,' . base64_encode($data);
@endphp


<style>
    #table_left{
        width: 49%;
        float: left;
        min-width: 1200px;
        table-layout: fixed;
    }

    #table_right {
        width: 49%;
        float: right;
        min-width: 1200px;
        table-layout: fixed;
        /* padding-left: 1px; */
        
    }
    #name, #date{
        width: 40%;
        float: left;
        
        font-size: .7em;
    }
    #invoice_no{
        width: 60%;
        float: left;
        
        font-size: .7em;
    }
    #copy{
        width: 40%;
        float: right;
        font-size: .7em;
       
    }
    #return{
        width: 100%;
        float: left;
        font-size: .8em;
    }
    #mobile, #time{
        width: 60%;
        float: right;
        font-size: .7em;
    }
    table{
        border: 1px solid black;
        
        /* border-bottom: 1px solid black; */
   
    }
</style>


<div id="table_left">
    <img src="{{$pic}}" width="95%" height="75px">
    @foreach ($cloths as $cloth)
    <div class="row">
    <div id="invoice_no">
        Invoice No : UDC-{{$cloth['id']}}
    </div>
    <div id="copy">
        Shop Copy
    </div>
    </div>
    <div class="row">
        <div id="name">
            নাম : {{$cloth['name']}} 
        </div>
        <div id="mobile">
            মোবাইল : {{$cloth['phone']}}
        </div>
    </div>
    <div class="row">
        @php
            $data = explode(' ', $cloth["created_at"]);
            $date = date('d/m/Y', strtotime($data[0]));
            $time = date('h:i:s a', strtotime($data[1]));
        @endphp
        <div id="date">
            তারিখ : {{$date}} 
        </div>
        <div id="time">
            সময় : {{$time}}
        </div>
    </div>
    
    @php
        $NextDate=Date('d/m/Y', strtotime('+3 days'));
    @endphp
    <div class="row">
        <div id="return">
            প্রদানের তারিখ : {{$NextDate}} 
        </div>
    </div>
    <div id="return">
        গ্রহণকারী : {{$cloth['recieved']}}
    </div>
    @endforeach
    <table>
    <thead>
        <tr>
        <th style="text-align: center; border-right: 1px solid black; border-bottom: 1px solid black;">#</th>
        <th style="text-align: center; border-right: 1px solid black; border-bottom: 1px solid black;">কাজের বিবরন</th>
        <th style="text-align: center; border-right: 1px solid black; border-bottom: 1px solid black;">পরিমান</th>
        <th style="text-align: center; border-right: 1px solid black; border-bottom: 1px solid black;">রেট</th>
        <th style="text-align: center; border-bottom: 1px solid black;">মোট</th>
        </tr>
    </thead>
    <tbody>
        @php
            $arr_len = 0;
            $in_total = 0;
                                        
            foreach ($cloths as $cloth){
                $result_arrs_left = explode (",", $cloth['cloth_bref']);
                $in_total_left =  $cloth['total'] - $cloth['discount'];         
                $arr_len_left = count($result_arrs_left);
            }   
        @endphp
    @for($i = 0; $i<$arr_len_left-1; $i++)
    <tr>
        <td style="text-align: center; border-right: 1px solid black;">{{$numto->bnNum($i+1).'.'}}</td>
        @php
            $result_left = explode("+", $result_arrs_left[$i]);     
        @endphp
        <td style="text-align: center; border-right: 1px solid black;">{{$result_left[1]." (".$result_left[2].")"}}</td>
        <td style="text-align: center; border-right: 1px solid black;">{{$numto->bnNum($result_left[3])}}</td>
        <td style="text-align: center; border-right: 1px solid black;">{{$numto->bnNum($result_left[4])}}</td>
        <td style="text-align: center;">{{$numto->bnNum($result_left[3]*$result_left[4]).'/-'}}</td>
    </tr>
    @endfor
    @foreach($cloths as $cloth)
    @if($cloth['service'] != 0)
    <tr>
        <td style="border-top: 1px solid black"></td>
        <td style="border-top: 1px solid black"></td>
        <td style="border-top: 1px solid black"></td>
        <td style="text-align: center; border-top: 1px solid black; border-right: 1px solid black; border-left: 1px solid black;">সার্ভিস</td>
        <td style="text-align: center; border-top: 1px solid black">{{$numto->bnNum($cloth['service']).'/-'}}</td>
    </tr>
    @endif
    @if($cloth['discount'] != 0)
    <tr>
        <td style="border-top: 1px solid black"></td>
        <td style="border-top: 1px solid black"></td>
        <td style="border-top: 1px solid black"></td>
        <td style="text-align: center; border-top: 1px solid black; border-right: 1px solid black; border-left: 1px solid black;">ছাড়</td>
        <td style="text-align: center; border-top: 1px solid black">{{$numto->bnNum($cloth['discount']).'/-'}}</td>
    </tr>
    @endif
    @endforeach
    <tr>
        <td style="border-top: 1px solid black"></td>
        <td style="border-top: 1px solid black"></td>
        <td style="border-top: 1px solid black"></td>
        <td style="text-align: center; border-top: 1px solid black; border-right: 1px solid black; border-left: 1px solid black;">সর্বমোট</td>
        <td style="text-align: center; border-top: 1px solid black">{{$numto->bnNum($in_total_left).'/-'}}</td>
    </tr>
    </tbody>
</table>
<a>কথায়: {{$numto->bnMoney($in_total_left)}}</a>   
<br>
<small style="font-size: .6em">  => ক্যাশ মেমাে ছাড়া কাপড় লেনদেন করবেন না। অন্যথায়, কর্তৃপক্ষ দায়ী নয়।<br>=> আপনার কাপড় সঠিক ভাবে ডেলিভারী কর্মীকে বুঝিয়ে দিন এবং নেওয়ার সময়<br> যথাযথ ভাবে বুঝিয়া নিন।<br>=> ১ মাসের মধ্যে পণ্য না নিলে কর্তৃপক্ষ দায়ী নহে।</small>
</div>
      
<div id="table_right">
    <img src="{{$pic}}" width="100%" height="75px">
    @foreach ($cloths as $cloth)
    <div class="row">
        <div id="invoice_no">
            Invoice No : UDC-{{$cloth['id']}}
        </div>
        <div id="copy">
            Customer Copy
        </div>
    </div>
    <div class="row">
        <div id="name">
            নাম : {{$cloth['name']}} 
        </div>
        <div id="mobile">
            মোবাইল : {{$cloth['phone']}}
        </div>
    </div>
    <div class="row">
        @php
            $data = explode(' ', $cloth["created_at"]);
            $date = date('d/m/Y', strtotime($data[0]));
            $time = date('h:i:s a', strtotime($data[1]));
        @endphp
        <div id="date">
            তারিখ : {{$date}} 
        </div>
        <div id="time">
            সময় : {{$time}}
        </div>
    </div>
    
    <div class="row">
        <div id="return">
            প্রদানের তারিখ : {{$NextDate}} 
        </div>
    </div>
    <div id="return">
        গ্রহণকারী : {{$cloth['recieved']}}
    </div>
    @endforeach
    <table>
    <thead>
    <tr>
        <th style="text-align: center; border-right: 1px solid black; border-bottom: 1px solid black;">#</th>
        <th style="text-align: center; border-right: 1px solid black; border-bottom: 1px solid black;">কাজের বিবরন</th>
        <th style="text-align: center; border-right: 1px solid black; border-bottom: 1px solid black;">পরিমান</th>
        <th style="text-align: center; border-right: 1px solid black; border-bottom: 1px solid black;">রেট</th>
        <th style="text-align: center; border-bottom: 1px solid black;">মোট</th>
    </tr>
    </thead>
    <tbody>
        @php
            $arr_len = 0;
            $in_total = 0;
                                        
            foreach ($cloths as $cloth){
                $result_arrs = explode (",", $cloth['cloth_bref']);
                $in_total =  $cloth['total'] - $cloth['discount'];          
                $arr_len = count($result_arrs);
            }   
        @endphp
    @for($i = 0; $i<$arr_len-1; $i++)
    <tr>
        <<td style="text-align: center; border-right: 1px solid black;">{{$numto->bnNum($i+1).'.'}}</td>
        @php
            $result = explode("+", $result_arrs[$i]);     
        @endphp
        <td style="text-align: center; border-right: 1px solid black;">{{$result[1]." (".$result[2].")"}}</td>
        <td style="text-align: center; border-right: 1px solid black;">{{$numto->bnNum($result[3])}}</td>
        <td style="text-align: center; border-right: 1px solid black;">{{$numto->bnNum($result[4])}}</td>
        <td style="text-align: center;">{{$numto->bnNum($result[3]*$result[4]).'/-'}}</td>
    </tr>
    @endfor
    @foreach($cloths as $cloth)
    @if($cloth['service'] != 0)
    <tr>
        <td style="border-top: 1px solid black"></td>
        <td style="border-top: 1px solid black"></td>
        <td style="border-top: 1px solid black"></td>
        <td style="text-align: center; border-top: 1px solid black; border-right: 1px solid black; border-left: 1px solid black;">সার্ভিস</td>
        <td style="text-align: center; border-top: 1px solid black">{{$numto->bnNum($cloth['service']).'/-'}}</td>
    </tr>
    @endif
    @if($cloth['discount'] != 0)
    <tr>
        <td style="border-top: 1px solid black"></td>
        <td style="border-top: 1px solid black"></td>
        <td style="border-top: 1px solid black"></td>
        <td style="text-align: center; border-top: 1px solid black; border-right: 1px solid black; border-left: 1px solid black;">ছাড়</td>
        <td style="text-align: center; border-top: 1px solid black">{{$numto->bnNum($cloth['discount']).'/-'}}</td>
    </tr>
    @endif
    @endforeach
    <tr>
        <td style="border-top: 1px solid black"></td>
        <td style="border-top: 1px solid black"></td>
        <td style="border-top: 1px solid black"></td>
        <td style="text-align: center; border-top: 1px solid black; border-right: 1px solid black; border-left: 1px solid black;">সর্বমোট</td>
        <td style="text-align: center; border-top: 1px solid black">{{$numto->bnNum($in_total).'/-'}}</td>
    </tr>
    </tbody>
</table>
    <a>কথায়: {{$numto->bnMoney($in_total_left)}}</a>
<br>
<small style="font-size: .6em">  => ক্যাশ মেমাে ছাড়া কাপড় লেনদেন করবেন না। অন্যথায়, কর্তৃপক্ষ দায়ী নয়।<br>=> আপনার কাপড় সঠিক ভাবে ডেলিভারী কর্মীকে বুঝিয়ে দিন এবং নেওয়ার সময়<br> যথাযথ ভাবে বুঝিয়া নিন।<br>=> ১ মাসের মধ্যে পণ্য না নিলে কর্তৃপক্ষ দায়ী নহে।</small>

</div>

    




