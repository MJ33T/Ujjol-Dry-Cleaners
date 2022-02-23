
@php
use App\Models\Report;
use App\Models\Product;



use Rakibhstu\Banglanumber\NumberToBangla;
$numto = new NumberToBangla();
$cloths = Report::all();


$current_date = date('Y-m-d');

$in_total = 0;
$id = 1;

$path = base_path('ujjol.png');
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$pic = 'data:image/' . $type . ';base64,' . base64_encode($data);

@endphp



<div class="row">
    <div class="col-md-12">
    <img src="{{$pic}}" width="100%" height="100px">
    <h5>Wash Worker Copy</h5>
    <h4>তারিখ : {{date('d/m/Y')}}</h4>
    <table style="width: 100%">
        <thead>
            <tr>
                <th style="text-align: center">#</th>
                <th style="text-align: center">কাজের বিবরন</th>
                <th style="text-align: center">পরিমান</th>
                <th style="text-align: center">রেট</th>
                <th style="text-align: center">মোট</th>
                
            </tr>
        </thead>
        <tbody>
            
            @foreach ($cloths as $cloth)
            @php
                $date_match = explode(" ", $cloth['created_at']);
            @endphp
            @if($current_date == $date_match[0])
            @php
                $result_arrs = explode (",", $cloth['cloth_bref']);
                $arr_len = count($result_arrs);
            @endphp
            
                @for($i = 0; $i<$arr_len-1; $i++)
                
                @php
                    $result = explode("+", $result_arrs[$i]);     
                @endphp
                @if ($result[2] == 'Wash')
            <tr>
                <td style="text-align: center">{{$numto->bnNum($id++).'.'}}</td>
                <td style="text-align: center">{{$result[1]}}</td>        
                <td style="text-align: center">{{$numto->bnNum($result[3])}}</td>
                @php
                    $pro = Product::find($result[0]);
                @endphp
                <td style="text-align: center">{{$numto->bnNum($pro['wash_worker_rate'])}}</td>
                <td style="text-align: center">{{$numto->bnNum($result[3] * $pro['wash_worker_rate'])}}</td>
                @php
                    $in_total = $result[3]*$pro['wash_worker_rate'] + $in_total;
                @endphp
                @endif    
                @endfor
            </tr>    
            @endif
            @endforeach
            
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td style="text-align: center">সর্বমোট</td>
                <td style="text-align: center">{{$numto->bnNum($in_total)}}</td>
            </tr>
        </tbody>
    </table>
</div>
</div>
