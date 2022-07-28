$(document).ready(function() {

    //datos quien recibe
    var nomRec = $("#nom_rec").val();
    var dniRec = $("#dni_rec").val();
    var telRec = $("tel_rec").val();
    var dirRec = $("#dir_rec").val();
    var locRec = $("#loc_rec").val();
    var cpRec = $("#cp_rec").val();
    var provRec = $("#prov_rec").val();

    $("#cargar_env").click(function(e) {
        //datos del cliente
        var nomCli = $("#nom_cli").val();
        var dniCli = $("#dni_cli").val();
        var telCli = $("#tel_cli").val();
        var dirCli = $("#dir_cli").val();
        var locCli = $("#loc_cli").val();
        var cpCli = $("#cp_cli").val();
        var provCli = $("#prov_cli").val();
        if ($(this).prop("checked") == true) {
            $("#nom_rec").val(nomCli);
            $("#dni_rec").val(dniCli);
            $("#tel_rec").val(telCli);
            $("#dir_rec").val(dirCli);
            $("#loc_rec").val(locCli);
            $("#cp_rec").val(cpCli);
            $("#prov_rec").val(provCli);
            $("#nom_rec").focus();
        } else {
            $("#nom_rec").val(nomRec);
            $("#dni_rec").val(dniRec);
            $("tel_rec").val(telRec);
            $("#dir_rec").val(dirRec);
            $("#loc_rec").val(locRec);
            $("#cp_rec").val(cpRec);
            $("#prov_rec").val(provRec);
            $("#nom_rec").focus();
        }

    });
});