@extends("Idareetme.layouts.master")
@section("title","Sifaris")
@section("content")
    <h1>Sifaris Idareetmesi</h1>
    <h1 class="sub-header">Form</h1>
      <form action="{{route("Idareetme.sifaris.save",$x->id)}}" method="POST">
        {{csrf_field()}}
        @include("layouts.partials.alert")
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Ad Soyad</label>
                    <input type="text" name="adsoyad" class="form-control" placeholder="Ad soyad" value="{{old("adsoyad",$x->adsoyad)}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Telefon</label>
                    <input type="text" name="telefon" class="form-control" placeholder="Ad soyad" value="{{old("telefon",$x->telefon)}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Adress</label>
                    <input type="text" name="adress" class="form-control" placeholder="Ad soyad" value="{{old("adress",$x->adress)}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Veziyyet</label>
                    <input type="text" name="veziyyet" class="form-control" placeholder="Ad soyad" value="{{old("veziyyet",$x->veziyyet)}}">

                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">{{$x->id > 0 ? "Yadda saxla" : "Guncelle" }}</button>
          <div class="container">
              <div class="bg-content">
                  <table class="table table-bordererd table-hover">
                      <tr>
                          <th>Sifariş Kodu</th>
                          <th>Toplam Mebleg</th>
                          <th>Mehsul sayi</th>
                          <th>Durum</th>
                      </tr>
                      <tr>
                          <td>SP-{{$x->id}}</td>
                          <td>{{$x->mebleg}}</td>
                          <td>{{$x->sebet->mehsul_sayi()}}</td>
                          <td>{{$x->veziyyet}}</td>
                      </tr>
                  </table>
              </div>
          </div>
      </form>
@endsection
