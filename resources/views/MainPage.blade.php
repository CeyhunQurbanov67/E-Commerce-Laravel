@extends("layouts.master")
@section("title","MainPage")
@section("content")
    @if(session()->has("mesaj"))
        <div class="container">
              <div class="">{{session("mesaj")}}</div>
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <form class="navbar-form navbar-left" action="{{route("axtar")}}" method="post">
                        {{csrf_field()}}
                        <div class="input-group">
                            <input type="text" name="axtar" id="navbar-search" class="form-control" placeholder="Mehsul axtar" value="{{old("axtar")}}">
                            <span class="input-group-btn">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                        </div>
                    </form>
                    <div class="panel-heading">Alt Kategoriyalar</div>
                    <div class="list-group categories">
                        @foreach($kategoriyalar as $kategoriya)
                        <a href="{{ route ("kategoriya",$kategoriya->slug) }}" class="list-group-item"><i class="fa fa-television"></i>
                            {{$kategoriya->name}}
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @for($i=0;$i<count($mehsul_slider);$i++)
                        <li data-target="#carousel-example-generic" data-slide-to="{{$i}}" class="{{$i==0 ? "active" : ""}}">
                            @foreach($mehsul_slider as $x)
                                <a href="{{route("mehsul",$x->mehsul->mehsul_slug)}}"></a>
                            @endforeach
                        </li>
                        @endfor
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        @foreach($mehsul_slider as $key=>$value)
                        <div class="item {{$key==0 ? "active" : ""}}">
                            <img src="http://picsum.photos/640/400" alt="...">
                            <div class="carousel-caption">
                                {{$value->mehsul->mehsul_adi}}
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default" id="sidebar-product">
                    <div class="panel-heading">Günün furseti</div>
                    <div class="panel-body">
                        <a href="{{route("mehsul",$mehsul_gunun_furseti->mehsul_slug)}}">
                            <img src="http://picsum.photos/400/485" class="img-responsive">
                            {{$mehsul_gunun_furseti->mehsul_adi}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="products">
            <div class="panel panel-theme">
                <div class="panel-heading">One cixan mehsullar</div>
                <div class="panel-body">
                    <div class="row">
                        @foreach($mehsul_one_cixan as $X)
                        <div class="col-md-3 product">
                            <a href="{{route("mehsul",$X->mehsul_slug)}}"><img src="http://picsum.photos/200/200"></a>
                            <p><a href="#">{{$X->mehsul_adi}}</a></p>
                            <p class="price">129 ₺</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="products">
            <div class="panel panel-theme">
                <div class="panel-heading">Çox satilan mehsullar</div>
                <div class="panel-body">
                    <div class="row">
                        @foreach($mehsul_cox_satan as $Y)
                        <div class="col-md-3 product">
                            <a href="{{route("mehsul",$Y->mehsul_slug)}}"><img src="http://picsum.photos/200/200"></a>
                            <p><a href="#">{{$Y->mehsul_adi}}</a></p>
                            <p class="price">129 ₺</p>
                        </div>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="products">
            <div class="panel panel-theme">
                <div class="panel-heading">Endirimli mehsullar</div>
                <div class="panel-body">
                    <div class="row">
                        @foreach($mehsul_endirimli as $Z)
                        <div class="col-md-3 product">
                            <a href="{{route("mehsul",$Z->mehsul_slug)}}"><img src="http://picsum.photos/200/200"></a>
                            <p><a href="#">{{$Z->mehsul_adi}}</a></p>
                            <p class="price">129 ₺</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

