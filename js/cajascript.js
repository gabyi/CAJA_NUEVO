// JavaScript Document
$(document).ready(
function()
{
    $("#codigo").focus();
	eliminar();
	$("#mensaje").html("<p style='color:rgba(247,145,0,0.72)'>No existe busqueda activa</p>");
});

function buscar()
{
	
	var nombre=$("#profesio").val();
	var localidad=$("#localidad").val();
	
	//if(/^([0-9])*$/.test(code)) // Aca hago cumplir mi patron de codigo a buscar, podes obviarlo. Es solo un if
	//{
		$.post('destino.php', {"nombre":nombre, "localidad":localidad},
		function(mensaje)
		{
        	if(mensaje!="")
			{
				$("#grilla tbody").append(mensaje);
				$("#mensaje").html("");
				$("#profesio").val("");
				$("#profesio").focus();
			}
			else
				{
					$("#mensaje").html("<br><strong style='color:rgba(247,145,0,0.72)'>"+nombre+" en "+localidad+" </strong> "+" no se encuentran en la base de datos.");
					$("#localidad").val("");
					$("#profesio").focus();	
				}
		});
	/*}
	else
		{
			$("#mensaje").html("<strong style='color:rgba(247,145,0,0.72)'>"+code+"</strong>"+"  no es un codigo v&aacute;lido");
			$("#codigo").val("");
			$("#codigo").focus();
		}*/
}
