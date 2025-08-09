@extends("layouts.master")
@section("title","sebet")
@section("content")
    <div class="container">
        <div class="bg-content">
            <h2>Sepet</h2>
            @if(session()->has("mesaj"))
                <div class="container">
                    <div class="">{{session("mesaj")}}</div>
                </div>
            @endif
            @if(count(Cart::getContent())>0)
            <table class="table table-bordererd table-hover">
                <tr>
                    <th>Mehsul</th>
                    <th>Mehsul Adi</th>
                    <th>Qiymet</th>
                    <th>Eded</th>
                    <th>Toplam Mebleg</th>
                    <th></th>
                </tr>
                @foreach(Cart::getContent() as $cardItem)
                <tr>
                    <td style="width:120px"><img src="http://picsum.photos/120/100"></td>
                    <td>{{$cardItem->name}}</td>
                    <td>{{$cardItem->price}}</td>
                    <td><span style="padding: 10px 20px" >{{$cardItem->quantity}}</span></td>
                    <td>{{$cardItem->price * $cardItem->quantity}}</td>
                    <td>
                            <form action="{{route("sebet.sil",$cardItem->id)}}" method="POST">
                                {{csrf_field()}}
                                {{method_field("DELETE")}}
                                <input type="submit" class="btn btn-theme" value="Sebetden Sil">
                            </form>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <th colspan="4" class="text-right">Toplam</th>
                    <th>{{Cart::getTotal()}}</th>
                    <th colspan="4" class="text-right">KDV</th>
                    <th>{{number_format((Cart::getTotal()/100*18),2,".","")}}</th>
                    <th colspan="4" class="text-right">Umumi Mebleg</th>
                    <th>{{number_format((Cart::getTotal() +(Cart::getTotal()/100*18)),2,".","")}}</th>
                </tr>
            </table>
                <div>
                    <ul>
                        <li>
                            <form action="{{route("sebet.bosalt")}}" method="POST">
                                {{csrf_field()}}
                                {{method_field("DELETE")}}
                                <input type="submit" class="btn btn-success" value="Sebeti Bosalt">
                            </form>
                        </li>
                        <li>
                            <a href="{{route("odenis")}}" class="btn btn-success pull-right btn-lg">Ödenis Et</a>
                        </li>
                    </ul>


                </div>
            @else
                <p>Sebetinizde mehsul yoxdur</p>
            @endif
        </div>
    </div>>
@endsection
