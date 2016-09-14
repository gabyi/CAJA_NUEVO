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
	
	var code=$("#profesio").val();
	
	//if(/^([0-9])*$/.test(code)) // Aca hago cumplir mi patron de codigo a buscar, podes obviarlo. Es solo un if
	//{
		$.post('destino.php', {"code":code},
		function(mensaje)
		{
        	if(mensaje!="")
			{
				$("#grilla tbody").append(mensaje);
				$("#grilla tbody tr:odd").css("background-color", "while"); // le doy un color a las filas pares
				$("#grilla tbody tr:even").css("background-color", "#F2F2F2"); // le doy otro color a las filas impares
				$("#mensaje").html("");
				$("#profesio").val("");
				$("#profesio").focus();
				$("#mensaje").html("<p style='color:rgba(247,145,0,0.72)'>No existe busqueda activa</p>");
			}
			else
				{
					$("#mensaje").html("<strong style='color:rgba(247,145,0,0.72)'>"+code+"</strong>"+" no se encontr&oacute; en la base de datos");
					$("#profesio").val("");
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
