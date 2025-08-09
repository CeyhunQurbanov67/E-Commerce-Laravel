@extends('layouts.master')

@section('content')
    <div class="container">

        <ol class="breadcrumb">
            <li><a href="{{ route('MainPage') }}">Esas Sehife</a></li>
            <li class="active">Axtaris Neticesi</li>
        </ol>

        <div class="products bg-content">
            <div class="row">
                @if(count($mehsullar) == 0)
                    <div class="col-md-12 text-center">
                        Mehsul Tapilmadi!
                    </div>
                @endif

                @foreach($mehsullar as $mehsul)
                    <div class="col-md-3 product">
                        <a href=" {{route('mehsul',$mehsul->mehsul_slug) }}">
                            <img src="http://picsum.photos/200/200" alt="{{ $mehsul->mehsul_adi }}">
                    </a>
                    <p>
                        <a href="{{route('mehsul',$mehsul->mehsul_slug)}}">
                            {{ $mehsul->mehsul_adi }}
                        </a>
                    </p>
                    <p class="price">{{$mehsul->qiymet }} ₺</p>
                    </div>
                @endforeach
            </div>
            {{$mehsullar->appends(["axtar"=>old("axtar")])->links()}}
        </div>
    </div>
@endsection
