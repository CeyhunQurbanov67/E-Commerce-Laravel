@extends("Idareetme.layouts.master")
@section("title","Kategoriya")
@section("content")
    <h1>Kategoriyalar</h1>
    <h1 class="sub-header">Table</h1>
    <div class="well">
        <div class="btn-group pull-right" role="group" aria-label="Basic example">
            <a href="{{route("Idareetme.kategoriya.yeni")}}" class="btn  btn-primary">Yeni</a>
        </div>
        <form action="{{route("Idareetme.kategoriya")}}" method="POST" class="form-inline">
            {{csrf_field()}}
            <div class="form-group">
                <label for="axtarilan"></label>
                <input name="axtarilan" id="axtarilan" placeholder="Axtar" value="{{old("axtarilan")}}"
                       class="form-control form-control-sm">
            </div>
            <div class="form-group">
                <label>Ust Kategoriya</label>
                <select class="form-control" name="ust">
                    @foreach($ust_kategoriyalar as $ust_kategoriya)
                        <option value="{{$ust_kategoriya->id}}" {{old("ust") == $ust_kategoriya->id ? "selected" : ""}}>{{$ust_kategoriya->name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Axtar</button>
            <a href="{{route("Idareetme.kategoriya")}}" class="btn btn-primary">Temizle</a>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Ust Kategoriya</th>
                <th>Kategoriya adi</th>
                <th>Slug</th>
                <th>Qeydiyyat tarixi</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($siyahi as $x)
                <tr>
                    <td>{{$x->id}}</td>
                    <td>{{$x->ust_kategoriya->name}}</td>
                    <td>{{$x->name}}</td>
                    <td>{{$x->slug}}</td>
                    <td>{{$x->CREATED_TIMESTAMP}}</td>
                    <td style="width: 100px">
                        <a href="{{route("Idareetme.kategoriya.update",$x->id)}}" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                            <span class="fa fa-pencil"></span>
                        </a>
                        <a href="{{route("Idareetme.kategoriya.sil",$x->id)}}" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Tooltip on top" onclick="return confirm('Are you sure?')">
                            <span class="fa fa-trash"></span>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$siyahi->appends("axtarilan",old("axtarilan"))->links()}}
    </div>
@endsection
