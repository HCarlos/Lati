
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
            $(function() {
                $.ajax({
                    method: "GET",
                    url: aID[5]+aID[1]+"/"+aID[1]+"/"+aID[4]
                })
                    .done(function( response ) {
                        window.location.href = '/index/'+aID[3];
                    });
            });
        });
    }



});