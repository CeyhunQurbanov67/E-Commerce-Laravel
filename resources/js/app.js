import './bootstrap';
$(document).ready(function(){
    console.log("sayt tam yükləndi");
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$('.mehsul_eded_artir,.mehsul_eded_azalt').on('click',function(){
    var id = $(this).attr('data-id');
    var eded = $(this).attr('data-eded');
    $.ajax({
        type:'PATCH',
        url: '/sebet/guncelle/' + id,
        data: {eded: eded },
        success: function(result){
            window.location.href = '/sebet';
        }
    })
})
