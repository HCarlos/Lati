
$(document).ready(function() {

    $("#preloaderGlobal").hide();
    if ( $(".btnAction2") ){
        $('.btnAction2').on('click', function(event) {
            event.defaultPrevented;
            var aID = event.currentTarget.id.split('-');
            var x = confirm("Desea eliminar el registro: "+aID[1]);
            if (!x){
                return false;
            }
            var Url = aID[5]+aID[1]+"/"+aID[1]+"/"+aID[4];
            $(function() {
                $.ajax({
                    method: "GET",
                    url: Url
                })
                    .done(function( response ) {
                        window.location.href = '/index/'+aID[3];
                    });
            });
        });
    }

    if ( $("#btnPrueba") ){
        $("#btnPrueba").on('click', function(event) {
            event.defaultPrevented;
            var Data = {'id':1};
            $(function() {
                $.ajax({
                    method: "GET",
                    url: "/catajax/"+1,
                    data: Data
                })
                    .done(function( response ) {
                        var dat = response.data[5];
                        alert(dat.titulo);
                        var datt = response.dataTable.original.data[5];
                        alert(datt.titulo);
                    });
            });
        });
    }
});