$(function() {
	load(1);
});
function load(page){
	var query=$("#q").val();
	var per_page=10;
	var parametros = {"action":"ajax","page":page,'query':query,'per_page':per_page};
	$("#loader").fadeIn('slow');
	$.ajax({
		url:'../../ajax/proyecto/listar_proyectos_admin_inactivos.php',
		data: parametros,
		 beforeSend: function(objeto){
		$("#loader").html("Cargando...");
	  },
		success:function(data){
			$(".outer_div").html(data).fadeIn('slow');
			$("#loader").html("");
		}
	})
}

$('#restaurarProyectoAdminModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var ident_proy = button.data('ident_proy') 
  $('#restaurar_id').val(ident_proy)
})


$( "#restaurar_proyecto_admin" ).submit(function( event ) {
  var parametros = $(this).serialize();
	$.ajax({
			type: "POST",
			url: "../../ajax/proyecto/restaurar_proyecto_admin.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados").html("Enviando...");
			  },
			success: function(datos){
			$("#resultados").html(datos);
			load(1);
			$('#restaurarProyectoAdminModal').modal('hide');
		  }
	});
  event.preventDefault();
});