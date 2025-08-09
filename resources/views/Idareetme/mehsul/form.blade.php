@extends("Idareetme.layouts.master")
@section("title","Mehsul")
@section("content")
    <h1>Mehsul Idareetmesi</h1>
    <h1 class="sub-header">Form</h1>
    <form action="{{route("Idareetme.mehsul.save",["id"=>$x->id ?? 0])}}" method="POST"
    enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            @include("layouts.partials.alert")
            @include("layouts.partials.errors")
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputPassword1">Mehsul adi</label>
                    <input type="text" name="mehsul_adi" class="form-control"  placeholder="Mehsul adi"
                           value="{{old("slug",$x->mehsul_adi)}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputPassword1">Mehsul slug</label>
                        <input type="text" name="mehsul_slug" class="form-control"  placeholder="Mehsul slug"
                           value="{{old("slug",$x->mehsul_slug)}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputPassword1">Aciqlama</label>
                    <input type="text" name="aciqlama" class="form-control"  placeholder="aciqlama"
                           value="{{old("slug",$x->aciqlama)}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputPassword1">Qiymet</label>
                    <input type="text" name="qiymet" class="form-control"  placeholder="qiymet"
                           value="{{old("slug",$x->qiymet)}}">
                </div>
            </div>

        </div>
        <div class="form-group">
            <label id="mehsul_sekli">Mehsul sekli</label><br>
            <input type="file" id="mehsul_sekli" name="mehsul_sekli">
        </div>
        <button type="submit" class="btn btn-primary">{{$x->id > 0 ? "Yadda saxla" : "Guncelle" }}</button>
    </form>
@endsection
