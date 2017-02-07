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
                        //$("#grilla tbody").append("<tr class='prueba'>"+mensaje+"</tr>");
                        agregar(mensaje);
                        calcular_total();
                }
        });

//$("#grilla tbody").append("<tr><td>"+importe+"</td></tr>");
//$("#mensaje").html("<strong style='color:rgba(247,145,0,0.72)'>"+concepto+"</strong>"+" no se encontr&oacute; en la base de datos");
            
           }

function Eliminar (t) 
	{	//no funciona porque no me deja agregar campos despues de borrar alguna fila
    	//document.getElementsByTagName("table")[0].setAttribute("id","tableid");
    	//document.getElementById("tableid").deleteRow(i);

    	//esta anda
    	var td = t.parentNode;
        var tr = td.parentNode;
        var table = tr.parentNode;
        table.removeChild(tr);

        //calcula totales
    	calcular_total();
	}


function calcular_total() 
	{
		var totalDeuda=0;

		$(".total").each(function()
			{

				totalDeuda+=parseFloat($(this).html()) || 0;

			});
		

		$("#total").html(round(totalDeuda,2));
	}


function round(x, digits)
	{
  		return parseFloat(x.toFixed(digits))
	}

	var cont=0;
	var id_fila_selected=[];


function agregar(mensaje)
	{
		cont++;
		var fila='<tr class="selected" id="fila'+cont+'" onclick="seleccionar(this.id);" selected>'+mensaje+'</tr>';
		$('#grilla').append(fila);
		//reordenar();
	}

function imprInt() {
  var juiwin = window.open("", "juiwin","toolbar=0,status=1,menubar=0,left=50,top=100,scrollbars=1,resizable=1,width=950,height=670");
  var doc = juiwin.document; 
  doc.open(); 
  doc.write("<head><Title>Caja Forense de Abogados de La Pampa</title>");
  doc.write("<style>body,table, panel-heading, td, th {font-family:Arial, Helvetica, sans-serif; font-size:10px;}</style>");
  doc.write("<link href='css/bootstrap.min.css' rel='stylesheet'>");
  doc.write("<link href='css/fuentes.css' rel='stylesheet'>");
  doc.write("</head>");
  doc.write("<body onload='window.print()' bgcolor='#ffffff'><img style='width:100%' src='imagenes/logos/Sin titulo.png'>");
  doc.write("<div align='center'><h4>Presupuesto de Interese</h4>");
  doc.write("<table class='table-striped' border=\"0\" width=\"50%\"><tr><th colspan=\"3\">Cálculo de intereses</th></tr>");
  doc.write("<tr><th>&nbsp;</th><th>Provincia de La Pampa</th><th>Extraña Jurisdiccion</th></tr>");
  doc.write("<tr><th>Bienes Gananciales</th><td align=\"center\">" + Formato($("#bg1").val()) + "</td><td align=\"center\">" + Formato($("#bg2").val()) + "</td></tr>");
  doc.write("<tr><th>Bienes Propios</th><td align=\"center\">" + Formato($("#bp1").val()) + "</td><td align=\"center\">" + Formato($("#bp2").val()) + "</td></tr>");
  doc.write("</table>\n");
  doc.write("<div id='aca'></div>");
  doc.getElementById('aca').innerHTML=$("#intereses").html();
  doc.write('<script>window.print()');
  doc.close();

}
