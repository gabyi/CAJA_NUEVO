// JavaScript Document
$(document).ready(
	function()
{
    //$("#codigo").focus();
});

function buscar(partida)
{
	
	var nombre=$("#profesio").val();
	var localidad=$("#localidad").val();
	
	//if(/^([0-9])*$/.test(code)) // Aca hago cumplir mi patron de codigo a buscar, podes obviarlo. Es solo un if
	//{
		$.post('destino.php', {"nombre":nombre, "localidad":localidad, "partida":partida},
		function(mensaje)
		{
        	if(mensaje!="")
			{
				var array= eval(mensaje);
				$("#grilla tbody").html(array[0]);
				$("#pagination").html(array[1]);
				$("#profesio").val("");
				/*$("#grilla tbody").append(array[0]); estos se usan para concatenar a lo que ya habia
				$("#grilla1 tbody").append(array[1]); estos se utilizan para concatenar a los que ya habian
				$("#mensaje").html("");
				$("#profesio").focus();*/
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


function calcularTasa()
			{
            	var tasa=$("#tasalist").val();
            	var vfdesde=$("#vfdesde").val();
            	var vfhasta=$("#vfhasta").val();
				var importe=$("#importe").val();
				var concepto=$("#concepto").val();
				var total=0; 

			$.ajax({
                data:  {"tasa":tasa, "vfdesde":vfdesde, "vfhasta":vfhasta, "importe":importe, "concepto":concepto},
                url:   'php/intereses.php',
                type:  'post',
                success:  function (mensaje) {
                        $("#grilla tbody").append(mensaje);
                        calcular_total();
                }
        });

//$("#grilla tbody").append("<tr><td>"+importe+"</td></tr>");
//$("#mensaje").html("<strong style='color:rgba(247,145,0,0.72)'>"+concepto+"</strong>"+" no se encontr&oacute; en la base de datos");
            
           }

function Eliminar (i) 
	{
    	document.getElementsByTagName("table")[0].setAttribute("id","tableid");
    	document.getElementById("tableid").deleteRow(i);
    	calcular_total();
	}


function calcular_total() 
	{
		var totalDeuda=0;

		$(".total").each(function()
			{

				totalDeuda+=parseFloat($(this).html()) || 0;

			});
		round(totalDeuda,2);

		$("#total").html(totalDeuda);
	}


function round(x, digits)
	{
  		return parseFloat(x.toFixed(digits))
	}