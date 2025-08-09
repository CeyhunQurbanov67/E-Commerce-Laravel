@extends("Idareetme.layouts.master")
@section("title","Esas Sehife")
@section("content")
    <h1>Kategoriya Idareetmesi</h1>
    <h1 class="sub-header">Form</h1>
    <form action="{{route("Idareetme.kategoriya.save",["id"=>$x->id ?? 0])}}" method="POST">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="ust_id">Ust Kategoriya</label>
                    <select name="ust_id" id="ust_id" class="form-control">
                        @foreach($kategoriyalar as $kategoriya)
                            <option value="{{$kategoriya->id}}">{{$kategoriya->name}}</option>
                        @endforeach
                    </select>
                </div>
                @include("layouts.partials.alert")
                @include("layouts.partials.errors")
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputPassword1">Kategoriya adi</label>
                    <input type="text" name="name" class="form-control"  placeholder="Kategoriya adi"
                    value="{{old("slug",$x->name)}}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputPassword1">Slug</label>
                    <input type="text" name="slug" class="form-control"  placeholder="slug"
                           value="{{old("slug",$x->slug)}}">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">{{$x->id > 0 ? "Yadda saxla" : "Guncelle" }}</button>
    </form>
@endsection
