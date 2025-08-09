@extends("layouts.master")
@section("title","sifarisler")
@section("content")
    <div class="container">
        <div class="bg-content">
            <h2>Siparişler</h2>
            @if(count($sifarisler)==0)
            <p>Henüz siparişiniz yok</p>
            @else
            <table class="table table-bordererd table-hover">
                <tr>
                    <th>Sifariş Kodu</th>
                    <th>Toplam Mebleg</th>
                    <th>Mehsul sayi</th>
                    <th>Durum</th>
                </tr>
                @foreach($sifarisler as $sifaris)
                <tr>
                    <td>SP-{{$sifaris->id}}</td>
                    <td>{{$sifaris->mebleg}}</td>
                    <td>{{$sifaris->sebet->mehsul_sayi()}}</td>
                    <td>{{$sifaris->veziyyet}}</td>
                    <td><a href="{{route("sifarisdetay",$sifaris->id)}}" class="btn btn-sm btn-success">Detay</a></td>
                </tr>
                @endforeach
            </table>
            @endif
        </div>
    </div
@endsection
