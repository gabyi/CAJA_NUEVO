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
        /*$("#localidad").val("");
				$("#grilla tbody").append(array[0]); estos se usan para concatenar a lo que ya habia
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
function controlIntereses()
      {
        var tipoTasa=$("#tasalist").val();
        var fechaOrigen=$("#vfdesde").val;
        var fechaCalculo=$("#vfhasta").val;
        var tasa=$("#tasalist").val;
        var importe=$("#importe").val;
        var valido= false;

        return valido;
      }

function calcularTasa() //funcion para controlar los valores de intereses que no se pasen y que no pongan vacios
			{
        //if(controlIntereses())
        if(true)
        {
        var tasa=$("#tasalist").val();
        var vfdesde=$("#vfdesde").val();
        var vfhasta=$("#vfhasta").val();
        var pactada=$("#tPactadasimple").val();
				var importe=$("#importe").val();
				var concepto=$("#concepto").val();
        var saltos=$("#saltos").val();
				var total=0; 

			$.ajax({
                data:  {"tasa":tasa, "vfdesde":vfdesde, "vfhasta":vfhasta, "importe":importe, "concepto":concepto, "pactada":pactada, "saltos":saltos},
                url:   'php/intereses.php',
                type:  'post',
                success:  function (mensaje) 
                      {
                        //$("#grilla tbody").append("<tr class='prueba'>"+mensaje+"</tr>");
                        agregar(mensaje);
                        //calcular_total();
                        //calcular_interes();
                        $("#total").html(calcular_total(".total"));
    					          $("#totInteres").html(calcular_total(".totInteres"));
    					          $("#totImporte").html(calcular_total(".totImporte"));
                      }
              });
        }else
          {
            alert("aca pongo el control!!!!");
          }
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

//para imprimir los intereses
 function imprInt() {

  var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
  var f=new Date();
  //document.write(f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());

  var juiwin = window.open("", "juiwin","toolbar=0,status=1,menubar=0,left=50,top=100,scrollbars=1,resizable=1,width=670,height=900");
  var doc = juiwin.document; 
  doc.open(); 
  doc.write("<head><Title>Caja Forense de Abogados de La Pampa</title>");
  doc.write("<style>body,table, panel-heading, td, th {font-family:Arial, Helvetica, sans-serif; font-size:10px;}</style>");
  doc.write("<link href='css/bootstrap.min.css' rel='stylesheet'>");
  doc.write("<link href='css/fuentes.css' rel='stylesheet'>");
  doc.write("</head>");
  doc.write("<body onload='window.print()' bgcolor='#ffffff'><img style='width: 100%' src='imagenes/logos/Sin titulo.png'>");
  doc.write("<div align='center'><h4>Presupuesto de Cálculo de Intereses</h4>");
  doc.write("<table class='table-striped' border=\"0\" width=\"50%\"><tr><th colspan=\"3\">Caratula</th><th>"+$("#carat").val()+"</th></tr>");
  doc.write("</table>\n");
  doc.write("<div id='aca'></div>");
  doc.write("<div id='total-IniFin' class= 'well well-sm'>La información que se suministra no tiene validez legal. Los datos son meramente informativos, por lo que no constituyen ni reemplazan las liquidaciones formales que efectúan la Caja Forense de La Pampa y la Dirección General de Rentas. Para la programación de este aplicativo se han tomado como referencia las disposiciones de la Ley 1861 y de la Ley Impositiva.<br> Valor Provisorio de Tasas mes de " + meses[f.getMonth()] + " de " + f.getFullYear()+".-</div>");
  doc.getElementById('aca').innerHTML=$("#intereses").html();
  doc.write('<script>window.print()');
  doc.close();

}
//para imprimir los juicios
function imprJus() {
  var juiwin = window.open("", "juiwin","toolbar=0,status=1,menubar=0,left=50,top=100,scrollbars=1,resizable=1,width=670,height=900");
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

//para imprimir las sucesiones

 function imprJui() {
  var juiwin = window.open("", "juiwin","toolbar=0,status=1,menubar=0,left=50,top=100,scrollbars=1,resizable=1,width=670,height=900");
  var doc = juiwin.document; 
  doc.open(); 
  doc.write("<head><Title>Caja Forense de Abogados de La Pampa</title>");
  doc.write("<style>body,table, panel-heading, td, th {font-family:Arial, Helvetica, sans-serif; font-size:10px;}</style>");
  doc.write("<link href='css/bootstrap.min.css' rel='stylesheet'>");
  doc.write("<link href='css/fuentes.css' rel='stylesheet'>");
  doc.write("</head>");
  doc.write("<body onload='window.print()' bgcolor='#ffffff'><img style='width:100%' src='imagenes/logos/Sin titulo.png'>");
  doc.write("<div align='center'><h4>Presupuesto para Iniciación de Juicios</h4>");
  doc.write("<table class='table-striped' border=\"0\" width=\"50%\"><tr><th colspan=\"3\">Acervo Hereditario</th></tr>");
  doc.write("<tr><th>&nbsp;</th><th>Provincia de La Pampa</th><th>Extraña Jurisdiccion</th></tr>");
  doc.write("<tr><th>Bienes Gananciales</th><td align=\"center\">" + Formato($("#bg1").val()) + "</td><td align=\"center\">" + Formato($("#bg2").val()) + "</td></tr>");
  doc.write("<tr><th>Bienes Propios</th><td align=\"center\">" + Formato($("#bp1").val()) + "</td><td align=\"center\">" + Formato($("#bp2").val()) + "</td></tr>");
  doc.write("</table>\n");
  doc.write("<div id='aca'></div>");
  doc.getElementById('aca').innerHTML=$("#panel11").html();
  doc.write('<script>window.print()');
  doc.close();

}

function mirarTasa()
  {
    var pactadasimple= "<div class='form-group' id='pactadasimple'><div class='col-sm-2 col-md-2 control-label' for='pactadasimple'><h4>Tasa Pactada</h4></div><div class='col-sm-4 col-md-4'><input type='text' class='form-control' id='tPactadasimple' name='tasaPactada' placeholder='' value=''></div>";
    var compuestaSimple="<div id='compuestaSimple' class='form-group'><div class='col-sm-2 col-md-2 control-label' for='pactadasimple'><h4>Tasa Periodo</h4></div><div class='col-sm-4 col-md-4'><input type='text' class='form-control' id='tPactadasimple' name='tasaPactada' placeholder='' value=''></div><div class='col-sm-2 col-md-2 control-label' for='saltos'><h4>Periodo</h4></div><div class='col-sm-2 col-md-2'><select class='form-control' name='saltos' id='saltos' style=''><option value='30' selected='selected'> 30 </option><option value='60'>60 </option><option value='90'>90 </option><option value='120'>120 </option><option value='180'>180 </option></select></div>";

   
  if($("#tasalist").val()=="pactadasimple")
  {
    $("#compuestaSimple").remove();
    $("#formint").append(pactadasimple);
  }else
    {
      if($("#tasalist").val()=="compuestaSimple")
    {
      $("#pactadasimple").remove();
      $("#formint").append(compuestaSimple);
    }else
      {
        $("#compuestaSimple").remove();
        $("#pactadasimple").remove();
      } 
  }
  
}


