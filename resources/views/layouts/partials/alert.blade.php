@if(session()->has("mesaj"))
    <div class="container">
        <div class="">{{session("mesaj")}}</div>
    </div>
@endif
