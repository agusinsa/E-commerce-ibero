$(document).ready(function(){

	var buscador = $("#table").DataTable();

	$("#busq").keyup(function(){

	// alert("hola");
    
    buscador.search($(this).val()).draw();
    
	if ($("#busq").val() == ""){
        $(".content-search").hide();
    }else{
         $(".content-search").show();
     }

    })

})

