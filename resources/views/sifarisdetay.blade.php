@extends("layouts.master")
@section("title","sifarisler")
@section("content")
    <div class="container">
        <div class="bg-content">
            <a href="{{route("sifarisler")}}"><i class="glyphicon glyphicon-arrow-left"></i>Sifarislere qayit</a>
            <h2>Sifariş (SF-{{$sifaris->id}})</h2>
            <table class="table table-bordererd table-hover">
                <tr>
                    <th>Mehsul Adi</th>
                    <th>Qiymet</th>
                    <th>Eded</th>
                    <th>Toplam Qiymet</th>
                    <th>Durum</th>
                </tr>
                @foreach($sifaris->sebet->sebet_mehsul as $x)
                <tr>
                    <td> <img src="http://picsum.photos/120/100"> {{$x->mehsul->mehsul_adi}}</td>
                    <td>{{$x->qiymet}}</td>
                    <td>{{$x->eded}}</td>
                    <td>{{$x->qiymet * $x->eded}}</td>
                    <td>{{$x->veziyyet}}</td>
                </tr>
                @endforeach
                <tr>
                    <th>Toplam Mebleg (KDV Daxil)</th>
                    <th>{{$sifaris->mebleg * 1.18}}</th>
                </tr>
            </table>
        </div>
    </div>
@endsection
