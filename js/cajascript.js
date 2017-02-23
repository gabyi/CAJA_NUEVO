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
		$.post('php/destino.php', {"nombre":nombre, "localidad":localidad, "partida":partida},
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
        var pactada=$("#tPactadasimple").val();
				var importe=$("#importe").val();
				var concepto=$("#concepto").val();
				var total=0; 

			$.ajax({
                data:  {"tasa":tasa, "vfdesde":vfdesde, "vfhasta":vfhasta, "importe":importe, "concepto":concepto, "pactada":pactada},
                url:   'php/intereses.php',
                type:  'post',
                success:  function (mensaje) {
                        //$("#grilla tbody").append("<tr class='prueba'>"+mensaje+"</tr>");
                        agregar(mensaje);
                        //calcular_total();
                        //calcular_interes();
                        $("#total").html(calcular_total(".total"));
    					$("#totInteres").html(calcular_total(".totInteres"));
    					$("#totImporte").html(calcular_total(".totImporte"));
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
    	
    	$("#total").html(calcular_total(".total"));
    	$("#totInteres").html(calcular_total(".totInteres"));
    	$("#totImporte").html(calcular_total(".totImporte"));
    	//calcular_interes();
	}


function calcular_total(tipo) 
	{
		var total=0;

		$(tipo).each(function()
			{

				total+=parseFloat($(this).html()) || 0;

			});
		

		//$("#total").html(round(total,2));
		return round(total,2);
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
		var fila='<tr class="selected" id="fila'+cont+'">'+mensaje+'</tr>';
		$('#grilla').append(fila);
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
  doc.write("<div align='center'><h4>Presupuesto de Cálculo de Intereses</h4>");
  doc.write("<table class='table-striped' border=\"0\" width=\"50%\"><tr><th colspan=\"3\">Caratula</th><th>"+$("#carat").val()+"</th></tr>");
  doc.write("</table>\n");
  doc.write("<div id='aca'></div>");
  doc.getElementById('aca').innerHTML=$("#intereses").html();
  doc.write('<script>window.print()');
  doc.close();

}

function imprJus() {
  var juiwin = window.open("", "juiwin","toolbar=0,status=1,menubar=0,left=50,top=100,scrollbars=1,resizable=1,width=950,height=670");
  var doc = juiwin.document; 
  doc.open(); 
  doc.write("<head><Title>Caja Forense de Abogados de La Pampa</title>");
  doc.write("<style>body,table, panel-heading, td, th {font-family:Arial, Helvetica, sans-serif; font-size:10px;}</style>");
  doc.write("<link href='css/bootstrap.min.css' rel='stylesheet'>");
  doc.write("<link href='css/fuentes.css' rel='stylesheet'>");
  doc.write("</head>");
  doc.write("<body onload='window.print()' bgcolor='#ffffff'><img style='width:100%' src='imagenes/logos/Sin titulo.png'>");
  doc.write("<div id='aca'></div>");
  doc.getElementById('aca').innerHTML=$("#tabla-juicios").html();
  doc.write('<script>window.print()');
  doc.close();

}

function mirarTasa()
  {
    var campos= "<div class='form-group' id='tasaPactada'><div class='col-sm-2 col-md-2 control-label' for='tasaPactada'><h4>Tasa Pactada</h4></div><div class='col-sm-4 col-md-4'><input type='text' class='form-control' id='tPactadasimple' name='tasaPactada' placeholder='' value=''></div>";

    //campos+="<div class='col-md-2 col-sm-2 control-label' for='dias'><h4>Días de tasa pactada</h4></div><div class='col-sm-4 col-md-4'>";
    //campos+="<select name='tasa' class='form-control' id='tasalist' name='fechacalc' placeholder='' value=''><option value='15' selected='selected'>15</option><option value='30'>30</option><option value='60'>60</option></select></div></div>";

  if($("#tasalist").val()=="pactadasimple")
    $("#formint").append(campos);
  else
    $("#tasaPactada").remove();
}


