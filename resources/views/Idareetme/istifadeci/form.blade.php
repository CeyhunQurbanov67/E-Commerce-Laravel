@extends("Idareetme.layouts.master")
@section("title","Esas Sehife")
@section("content")
    <h1>Istifadeci Idareetmesi</h1>
    <h1 class="sub-header">Form</h1>
    <form action="{{route("Idareetme.istifadeci.save",["id"=>$x->id ?? 0])}}" method="POST">
        {{csrf_field()}}
        <div class="row">

            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Ad Soyad</label>
                    <input type="text" name="adsoyad" class="form-control" placeholder="Ad soyad" value="{{old("adsoyad",$x->adsoyad)}}">
                </div>
                @include("layouts.partials.alert")
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control"  placeholder="Password">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="adress">Adress</label>
                    <input type="text" class="form-control" name="adress" placeholder="Adress" value="{{old("adress",$x->userdetay->adress)}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="address">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email" value="{{old("email",$x->email)}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="adress">Telefon</label>
                    <input type="text" class="form-control" name="telefon" placeholder="telefon" value="{{ old("telefon",$x->userdetay->telefon)}}">
                </div>
            </div>
        </div>
        <div class="checkbox">
            <label>
                <input type="hidden" name="active" value="0">
                <input type="checkbox" name="active" value="1" {{old("active",$x->active) ? "checked" : ""}}>Aktiv?
            </label>
        </div>
        <div class="checkbox">
            <label>
                <input type="hidden" name="admin" value="0">
                <input type="checkbox" name="admin" value="1" {{old("admin",$x->admin) ? "checked" : ""}}>Admin?
            </label>
        </div>
        <button type="submit" class="btn btn-primary">{{$x->id > 0 ? "Yadda saxla" : "Guncelle" }}</button>
    </form>
@endsection
