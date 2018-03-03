
$(document).ready(function() {

    $("#preloaderGlobal").hide();
    if ( $(".btnAction2") ){
        $('.btnAction2').on('click', function(event) {
            event.preventDefault();
            var aID = event.currentTarget.id.split('-');
            var x = confirm("Desea eliminar el registro: "+aID[1]);
            if (!x){
                return false;
            }
            var Url = aID[5]+aID[1]+"/"+aID[1]+"/"+aID[4];
            // alert(Url);
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
            event.preventDefault();
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

    if ( $("#btnAsign0") ){
        $("#btnAsign0").on('click', function(event) {
            event.preventDefault();

            var x = $('.lstEleToAsign option:selected').val();
            var y = $('select[name="selTarget"] option:selected').val();

            if (isDefined(x)){
                alert("Seleccione una opción disponible");
                return false;
            }else{
                x='';
                $(".lstAlumnos option:selected").each(function () {
                    x += $(this).val() + "|";
                });

            }
            if (isDefined(parseInt(y)) || y <= 0){
                // $("#preloaderPrincipal").hide();
                alert("Seleccione un elemento");
                return false;
            }

            var Url = aID[5]+y+"/"+x+"/"+aID[3];
            // alert(Url);
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

});