@extends("layouts.master")
@section("title",$mehsul->mehsul_adi)
@section("content")
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{ route('MainPage') }}">Esas Sehife</a></li>
            @foreach($mehsul->kategoriyalar()->distinct()->get() as $kategoriya)
            <li><a href="{{route("kategoriya",$kategoriya->slug)}}">{{$kategoriya->name}}</a></li>
            @endforeach
            <li class="active">{{$mehsul->mehsul_adi}}</li>
        </ol>
        <div class="bg-content">
            <div class="row">
                <div class="col-md-5">
                    <img src="http://picsum.photos/400/200">
                    <hr>
                    <div class="row">
                        <div class="col-xs-3">
                            <a href="#" class="thumbnail"><img src="http://picsum.photos/60/60"></a>
                        </div>
                        <div class="col-xs-3">
                            <a href="#" class="thumbnail"><img src="http://picsum.photos/60/60"></a>
                        </div>
                        <div class="col-xs-3">
                            <a href="#" class="thumbnail"><img src="http://picsum.photos/60/60"></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <h1>{{$mehsul->mehsul_adi}}</h1>
                    <p class="price">{{$mehsul->qiymet}}</p>
                    <form action="{{route("sebet.elave_et")}}" method="POST">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$mehsul->id}}">
                        <input type="submit" value="Sebete elave et">
                    </form>
                </div>
            </div>

            <div>
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#t1" data-toggle="tab">{{$mehsul->aciqlama}}</a></li>
                </ul>
            </div>

        </div>
    </div>
@endsection
