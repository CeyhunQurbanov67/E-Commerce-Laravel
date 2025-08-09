@extends("Idareetme.layouts.master")
@section("title","Mehsul")
@section("content")
    <h1>Mehsullar</h1>
    <h1 class="sub-header">Table</h1>
    <div class="well">
        <div class="btn-group pull-right" role="group" aria-label="Basic example">
            <a href="{{route("Idareetme.mehsul.yeni")}}" class="btn  btn-primary">Yeni</a>
        </div>
        <form action="{{route("Idareetme.mehsul")}}" method="POST" class="form-inline">
            {{csrf_field()}}
            <div class="form-group">
                <label for="axtarilan"></label>
                <input name="axtarilan" id="axtarilan" placeholder="Axtar" value="{{old("axtarilan")}}"
                       class="form-control form-control-sm">
            </div>
            <button type="submit" class="btn btn-primary">Axtar</button>
            <a href="{{route("Idareetme.mehsul")}}" class="btn btn-primary">Temizle</a>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Mehsul adi</th>
                <th>Slug</th>
                <th>Qiymet</th>
                <th>Qeydiyyat tarixi</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($siyahi as $x)
                <tr>
                    <td>{{$x->id}}</td>
                    <td>{{$x->mehsul_adi}}</td>
                    <td>{{$x->mehsul_slug}}</td>
                    <td>{{$x->qiymet}}</td>
                    <td>{{$x->CREATED_TIMESTAMP}}</td>
                    <td style="width: 100px">
                        <a href="{{route("Idareetme.mehsul.update",$x->id)}}" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                            <span class="fa fa-pencil"></span>
                        </a>
                        <a href="{{route("Idareetme.mehsul.sil",$x->id)}}" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Tooltip on top" onclick="return confirm('Are you sure?')">
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

