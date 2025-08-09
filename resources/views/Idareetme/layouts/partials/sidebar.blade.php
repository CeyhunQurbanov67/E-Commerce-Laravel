<div class="list-group">

    <a href="{{route("Idareetme.esassehife")}}" class="list-group-item">
        <span class="fa fa-fw fa-dashboard"></span> Admin Sehifesi</a>

    <a href="{{route("Idareetme.mehsul")}}" class="list-group-item">
        <span class="fa fa-fw fa-dashboard"></span> Mehsullar
        <span class="badge badge-dark badge-pill pull-right">{{$statistika["toplam_mehsul"]}}</span>
    </a>

    <a href="{{route("Idareetme.kategoriya")}}" class="list-group-item">
        <span class="fa fa-fw fa-dashboard"></span> Kategoriyalar
        <span class="badge badge-dark badge-pill pull-right">{{$statistika["toplam_ust_kategoriyalar"]}}</span>
    </a>

    <a href="{{route("Idareetme.istifadeci")}}" class="list-group-item">
        <span class="fa fa-fw fa-dashboard"></span> Istifadeciler
        <span class="badge badge-dark badge-pill pull-right">{{$statistika["toplam_istifadeci"]}}</span>
    </a>

</div>
