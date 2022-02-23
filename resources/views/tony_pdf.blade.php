
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
    <br>
    <h4>তারিখ : {{date('d/m/Y')}}</h4>
    <table style="width: 100%">
        <thead>
            <tr>
                <th style="text-align: center">#</th>
                <th style="text-align: center">নাম</th>
                <th style="text-align: center">মোবাইল</th>
                <th style="text-align: center">মোট আইরোন</th>
                <th style="text-align: center">মোট ওয়াস</th>
                <th style="text-align: center">মোট ইনকাম</th>
                
            </tr>
        </thead>
        <tbody>
            
            @foreach ($cloths as $cloth)
            @php
                $date_match = explode(" ", $cloth['created_at']);
            @endphp
            @if($current_date == $date_match[0])
            <tr>
                <td style="text-align: center">{{$numto->bnNum($id++).'.'}}</td>
                @php
                    $time = date('h:i a', strtotime($data[1]));
                @endphp       
                <td style="text-align: center">{{$cloth['name']}}</td>
                <td style="text-align: center">{{$numto->bnNum($cloth['phone'])}}</td>
                <td style="text-align: center">{{$numto->bnNum($cloth['iron_income'])}}</td>
                <td style="text-align: center">{{$numto->bnNum($cloth['wash_income'])}}</td>
                <td style="text-align: center">{{$numto->bnNum($cloth['total_income'])}}</td>
                @php
                    $in_total = $cloth['total_income'] + $in_total;
                @endphp
            </tr>    
            @endif
            @endforeach
            
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td style="text-align: center">সর্বমোট</td>
                <td style="text-align: center">{{$numto->bnNum($in_total)}}</td>
            </tr>
        </tbody>
    </table>
    <div class="row">
        @php
            $taposh = ($in_total/100)*60;
            $tony = ($in_total/100)*40;
        @endphp
        <div class="col">
            <h4>তাপস (৬০%) : {{$numto->bnNum($taposh).' /-'}}</h4>
        </div>
        <div class="col">
            <h4>টনি (৪০%) : {{$numto->bnNum($tony).' /-'}}</h4>
        </div>
    </div>
</div>
</div>
