@extends("layouts.master")
@section("title",$kategoriya->name)
@section("content")
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="{{route("MainPage")}}">Anasayfa</a></li>
            <li class="active">{{$kategoriya->name}}</li>
        </ol>
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">{{$kategoriya->name}}</div>
                    <div class="panel-body">
                        <h3>Alt Kategoriler</h3>
                        <div class="list-group categories">
                            @if(count($alt_kategoriyalar)>0)
                            @foreach($alt_kategoriyalar as $alt_kategoriya)
                            <a href="#" class="list-group-item"><i class="fa fa-television"></i>{{$alt_kategoriya->name}}</a>
                            @endforeach
                                @endif
                        </div>
                        <h3>Fiyat Aralığı</h3>
                        <form>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> 100-200
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> 200-300
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                @if(count($mehsullar)>0)
                    Sırala
                    <a href="?order=coxsatanlar" class="btn btn-default">Çok Satanlar</a>
                    <a href="?order=yenimehsullar" class="btn btn-default">Yeni Ürünler</a>
                @endif
                <div class="products bg-content">
                    <div class="row">
                        @if(count($mehsullar)==0)
                            <div class="col-md-12">Hec bir mehsul yoxdur</div>
                        @endif
                        @foreach($mehsullar as $mehsul)
                        <div class="col-md-3 product">
                            <a href="{{route("mehsul",$mehsul->mehsul_slug)}}"><img src="http://picsum.photos/200/200"></a>
                            <p><a href="{{route("mehsul",$mehsul->mehsul_slug)}}">{{$mehsul->mehsul_adi}}</a></p>
                            <p class="price">{{$mehsul->qiymet}}₺</p>
                            <p><a href="#" class="btn btn-theme">Sepete Ekle</a></p>
                        </div>
                        @endforeach
                    </div>
                    {{request()->has("order") ? $mehsullar->appends(["order"=>request("order")])->links() : $mehsullar->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
