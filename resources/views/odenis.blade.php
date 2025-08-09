@extends("layouts.master")
@section("title","odenis")
@section("content")
    <div class="container">
        <div class="bg-content">
            <h2>Ödeme</h2>
            <div class="row">
                <div class="col-md-5">
                    <h3>Ödenis Melumatlari</h3>
                    <form action="{{route("odenispost")}}" method="POST">
                        {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-8">
                            <label for="adsoyad">Ad Soyad</label>
                            <input type="text" class="form-control" name="adsoyad" value="{{auth()->user()->adsoyad}}" required>
                        </div>
                        <div class="col-md-8">
                            <label for="adress">Adress</label>
                            <input type="text" class="form-control" name="adress" value="{{$userdetay->adress}}" required>
                        </div>
                        <div class="col-md-8">
                            <label for="telefon">Telefon</label>
                            <input type="text" class="form-control" name="telefon" value="{{$userdetay->telefon}}"  required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kartno">Kredi Kartı Numarası</label>
                        <input type="text" class="form-control kredikarti" id="kartno" name="cardnumber" style="font-size:20px;" required>
                    </div>
                    <div class="form-group">
                        <label for="cardexpiredatemonth">Son Kullanma Tarihi</label>
                        <div class="row">
                            <div class="col-md-6">
                                Ay
                                <select name="cardexpiredatemonth" id="cardexpiredatemonth" class="form-control" required>
                                    <option>1</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                Yıl
                                <select name="cardexpiredateyear" class="form-control" required>
                                    <option>2017</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cardcvv2">CVV (Güvenlik Numarası)</label>
                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" class="form-control kredikarti_cvv" name="cardcvv2" id="cardcvv2" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-lg">Ödeme Yap</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
