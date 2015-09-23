$(document).on('ready', inicio);
function inicio()
{	
	$('.popup .cajaDialogo .titulo .cerrar').on('click', cerrarCajaDialogo);
	$('#LogIn').on('click', logIn);
	$('#btnContacto').on('click', insContacto);
	$('#Register').on('click', PreRegister);	
	$('#confirmarCuenta').on('click', confirmarCuenta);
	$('#btn_notificaciones').on('click', mostrarNotificaciones);
	$('#nuevoServicio, #nuevoCliente, #nuevoServicio, #nuevoUsuario').on('click', nuevoUsuario);
	$('#nuevoPreServicio').on('click', nuevoPreServicio);
	$('#btnPreOrden').on('click', insPreOrden);
	$('.usuario').on('click', ioMenu);
	$('.previo').on('click', chatear);
	$('.chatAmigo .titulo').on('click', listaDeChats);
	$('#btnInsCompra').on('click', insCompra);
	$('#btnInsItemCompra').on('click', insItemCompra);
	$('#avatar').on('change', cambiar_avatar);
	$('#ver_pendientes').on('click', ver_pendientes);
	//inserts
	$('#btnNotaCliente').on('click', insOrdenServicio);
	$('#btnInsCliente').on('click', insCliente);
	$('#btn_ins_menu').on('click', insNuevoMenu);
	$('#btnInsProveedor').on('click', insProveedor);
	
	$('#btnInsProducto').on('click', insProducto);
	//update
	$('#actualizarMenusUsuarios').on('click', upd_acceso_menus_usuario);	
	
	//eventos random
	$("#programacion").on('click', verificarCheck);
}
function verificarCheck()
{
	var estado = $("#programacion").is(":checked");
	console.log('El estado es: ' + estado);
	if(estado == true)
	{
		$('.fecha_programada').css('display','block');
		$('.popup .nuevaOrdenServicio').css('height','480px');
		console.log('entro en el if');
	}
	else
	{
		console.log('entro en el else');
		$('.fecha_programada').css('display','none');
		$('.popup .nuevaOrdenServicio').css('height','430px');	
	}
}
function ver_pendientes()
{
	$('#btn_ver_pendientes').click();
}
function cambiar_avatar()
{
	$('#btn_subir_avatar').click(); 
}
function cambiar_imagen_producto(obj)
{
	var boton = $(obj).parent('form').children('#btn_change_img_product');
	console.log('se ejecuto funcion cambir imagen producto con el boton: ' + boton);
	boton.click();
}
function insItemCompra()
{
	var url = "src/inserts/insItemCompra.php";

	$.ajax({
		type: "POST",
		url: url,
		data: $("#frmNuevoItemCompra").serialize(),
		success: function(data){
			$(".notificacion-emergente").html(data);
			notificacionEmergente();
			setTimeout ("location.reload()", 5000);
			}
	});
	cerrarCajaDialogo();
	return false;
}
function insCompra()
{
	var url = "src/inserts/insCompra.php";

	$.ajax({
		type: "POST",
		url: url,
		data: $("#frmNuevaCompra").serialize(),
		success: function(data){
			$(".notificacion-emergente").html(data);
			notificacionEmergente();
			setTimeout ("location.reload()", 5000);
			}
	});
	cerrarCajaDialogo();
	return false;
}
function insProveedor()
{
	console.log('MFNuevoProveedor');
	var url = "src/inserts/ins_nuevo_proveedor.php";
	var formulario = $('#frm_nuevo_proveedor');
	$.ajax({
		type: "POST",
		url: url,
		data: $(formulario).serialize(),
		success: function(data){
			$(".notificacion-emergente").html(data);
			notificacionEmergente();
			}
	});
	setTimeout ("location.reload()", 5000);
	$('.vaciar').val('');
	cerrarCajaDialogo();
	return false;
}
function mostraCajaDialogo(parametro)
{
	cerrarCajaDialogo();
	console.log('ejecuto mostraCajaDialogo: ' + parametro);
	$(parametro).slideToggle();
}
function cerrarCajaDialogo()
{
	$('.popup').css('display', 'none');
}
function guardadoLocal(obj)
{	
	var disparador = obj;
	var id_cliente = $(disparador).children('.descripcion').children('#id_cliente').text()
	var nombre_cliente = $(disparador).children('.descripcion').children('#nombre_cliente').text()
	console.log('deberia llenar sessionStorage');
	sessionStorage.setItem("nombre_cliente", nombre_cliente);
	sessionStorage.setItem("id_cliente", id_cliente);
	$('#formNotaCliente #id_cliente').val(sessionStorage.getItem("id_cliente"));
	$('#formNotaCliente #nombre_cliente').val(sessionStorage.getItem("nombre_cliente"));
	mostraCajaDialogo('#dNewOrdenService');
}
function guardadoLocalProducto(obj)
{	
	var disparador = obj;
	var id_servicio = $(disparador).children('.descripcion').children('#id_servicio').text()
	var id_producto = $(disparador).children('.descripcion').children('#id_producto').text()
	console.log('deberia llenar sessionStorage');
	sessionStorage.setItem("id_servicio", id_servicio);
	sessionStorage.setItem("id_producto", id_producto);
	insItemServicio();
}
function insItemServicio()
{
	var id_servicio = sessionStorage.getItem("id_servicio");
	var id_producto = sessionStorage.getItem("id_producto");
	window.location = 'src/inserts/insItemServicio.php?id_servicio=' + id_servicio + '&id_producto=' + id_producto;
}
function insCliente()
{
    
	//VARIABLES A RECOGER
    cliente_nombre = $('#formInsCliente').children('#nombre_cliente').val();
	cliente_numero = $('#formInsCliente').children('#numero_cliente').val();
	cliente_email  = $('#formInsCliente').children('#email_cliente').val();
	    
	if(cliente_nombre == '')
	{
		cerrarCajaDialogo();
		$(".notificacion-emergente").html('El campo de nombre es obligatorio');
		notificacionEmergente();
	}
	else if (cliente_numero == '') {
		cerrarCajaDialogo();
		$(".notificacion-emergente").html('El campo de numero es obligatorio');
		notificacionEmergente();	
	}else{ 
        $(".notificacion-emergente").html('Procesando...');
		notificacionEmergente();	
        url = "src/inserts/ins_cliente.php";
        console.log('deberia estar insertando en: ' + url);
        
        $.ajax({ 
            type: "POST",
            url: url,
            data: $("#formInsCliente").serialize(),
            success: function(data){
                var dExito = data;
                sessionStorage.setItem("exito", dExito);
                console.log(dExito);
            }
        });		
        setTimeout(insercionClienteExito, 2000);
        setTimeout(comportamientoClientePagina, 5000);
	}//fin del else
    
    setTimeout(function(){$('#dNewCliente .vaciar').val('')}, 10000);    
	return false;
}
function insercionClienteExito(){
    var exito = sessionStorage.getItem("exito");
    if(exito == "exito"){
        console.log('entró con exito');
        $(".notificacion-emergente").html('Cliente registrado correctamente');
        sessionStorage.setItem("cliente_nombre", cliente_nombre);
        cerrarCajaDialogo();
        notificacionEmergente();
    }else{
        console.log('no pasó con exito');
        $(".notificacion-emergente").html(exito);
        notificacionEmergente();
    }
}
function comportamientoClientePagina(){
    var pagina = $('#pagina').val();
    if(pagina == 'clientes'){
        console.log('pagina: ' + pagina);
    }else
        if(pagina == 'orden_servicio'){
        console.log('pagina: ' + pagina);
        mostraCajaDialogo('#dNewOrdenService');
        var sCliente = 'src/selects/lis_ultimo_cliente.php'; 
        $.ajax({
            type: "POST",
            url: sCliente,
            data: $("#formInsCliente").serialize(),
            success: function(data){
                var id_utl_client = data;
                console.log('El id del cliente insertado es: ' + id_utl_client);	
                sessionStorage.setItem("id_cliente", id_utl_client);
                $('#formNotaCliente #id_cliente').val(sessionStorage.getItem("id_cliente"));
                $('#formNotaCliente #nombre_cliente').val(sessionStorage.getItem("cliente_nombre"));	
                }
        });	
    }
}
function insProducto()
{
	console.log('MFNuevoProducto');
	var url = "src/inserts/ins_nuevo_producto.php";
	var formulario = $('#nuevoProducto');
	$.ajax({
		type: "POST",
		url: url,
		data: $(formulario).serialize(),
		success: function(data){
			$(".notificacion-emergente").html(data);
			notificacionEmergente();
			setTimeout ("location.reload()", 5000);
			}
	});
	$('.vaciar').val('');
	cerrarCajaDialogo();
	return false;
}
function notificacionEmergente()
{
	$('.notificacion-emergente').css('display','block');
	setTimeout ('ocultarEmergente()', 8000);
}
function ocultarEmergente()
{ 
    $('.notificacion-emergente').css('display','none');
    $('.notificacion-emergente').html('');
}
function funcando()
{
	alert('estoy funcando');
}
function ioMenu()
{
	$('.menu').animate({
        width: "toggle",
        opacity: "toggle"
    });  
}


function insPreOrden()
{
	console.log('Orden de servicio editada');
	var url = "../querys/insPreOrden.php";
	var formulario = $('#frmPreOrden');
	$.ajax({
		type: "POST",
		url: url,
		data: $(formulario).serialize(),
		success: function(data){
			$(".notificacion-emergente").html(data);
			notificacionEmergente();
			setTimeout ("location.reload()", 3000);
			}
	});
	$('.vaciar').val('');
	cerrarCajaDialogo();
	return false;
}
function nuevoPreServicio()
{
	console.log('Nuevo Pre servicio')
	$('.nuevaPreOrden').slideToggle();
}
function mostrarNotificaciones()
{
	$('.listaNotificaciones').slideToggle();
}
function verEditar(obj)
{
	var disparador = obj;
	$(disparador).parents('.item').children('.editarOrden').slideToggle();
	$(disparador).parents('.item').children('.detalle').slideToggle();
	$(disparador).parents('.item').children('.montos').slideToggle();
}
function updOrden(obj) 
{
	console.log('Orden de servicio editada');
	var url = "/querys/updOrden.php";
	var disparador = obj;
	var formulario = $(disparador).parents('#frmEditarOrden');
	$.ajax({
		type: "POST",
		url: url,
		data: $(formulario).serialize(),
		success: function(data){
			$(".notificacion-emergente").html(data);
			setTimeout ("location.reload()", 3000);
			notificacionEmergente();
			verEditar(disparador);
			}
	});
	$('.vaciar').val('');
	return false;
}
function updOrdenFinalizada(obj)
{
	var url = "/querys/updOrdenFinalizada.php";
	var disparador = obj;
	var formulario = $(disparador).parents('.item').children('#frmFinalizado');
	$.ajax({
		type: "POST",
		url: url,
		data: $(formulario).serialize(),
		success: function(data){
			$(".notificacion-emergente").html(data);
			notificacionEmergente();
			}
	});
	$('.vaciar').val('');
	setTimeout ("location.reload()", 3000);
	return false;
}
function insOrdenServicio()
{
	var url = "src/inserts/ins_orden_servicio.php";
	console.log('Deberia estar insertando')
	$.ajax({
		type: "POST",
		url: url,
		data: $("#formNotaCliente").serialize(),
		success: function(data){
			$(".notificacion-emergente").html(data);
				notificacionEmergente();
			}
	});
	$('.vaciar').val('');
	cerrarCajaDialogo();
	setTimeout ("location.reload()", 3000);
	return false;
}

function upd_acceso_menus_usuario()
{
	var url = "src/update/upd_acceso_menus_usuario.php";
	console.log('permisos usuario');
	$.ajax({
		type: "POST",
		url: url,
		data: $("#formMenuUsuarios").serialize(),
		success: function(data){
			$(".notificacion-emergente").html(data);
			notificacionEmergente();
			}
	});
	$('.vaciar').val('');
	cerrarCajaDialogo();
	setTimeout ("location.reload()", 3000);
	return false;
}
function insContacto()
{
	var url = "/querys/insContacto.php";

	$.ajax({
		type: "POST",
		url: url,
		data: $("#formContacto").serialize(),
		success: function(data){
			$(".notificacion-emergenteContacto").html(data);
			notificacionEmergente();
			}
	});
	$('.vaciar').val('');
	return false;
}
function consultaDominio()
{
	
	var url = "/querys/consultaDominio.php";

	$.ajax({
		type: "POST",
		url: url,
		data: $("#formDominio").serialize(),
		success: function(data){
			$(".notificacion-emergenteDominios").html(data);
			notificacionEmergente();
			}
	});
	$('.vaciar').val('');
	return false;
}
function insNuevoMenu()
{
	console.log('Insertado nuevo cliente');
	$('.popMenus').slideToggle();
	var url = "src/inserts/ins_nuevo_menu.php";
	$.ajax({
		type: "POST",
		url: url,
		data: $("#form_ins_menu").serialize(),
		success: function(data){
			$(".notificacion-emergente").html(data);
			notificacionEmergente();
			}
	});
	$('.vaciar').val('');
	setTimeout ("location.reload()", 3000);
	return false;
}
function asignarMenu(obj)
{
	console.log('Mostrar formulario para asignarMenu');
	var disparador = obj;
	var idUsuario = $(disparador).parents('.tarjeta').children('#idUsuario').html();
	$('#inputIdUsuario').val(idUsuario);
	$('#acceso_menus').slideToggle();
}
function nuevoUsuario()
{
	console.log('Nuevo Usuario')
	$('.popNuevoUsuario').slideToggle();
	$('.cuadro_clientes').css('display', 'none');
}
function listaDeChats()
{
	$('.previo').removeClass('inactivo');
	$('.previo').addClass('activo');
	$('.chatAmigo').removeClass('activo');
	$('.chatAmigo').addClass('inactivo');		
}
function chatear()
{
	$('.previo').removeClass('activo');
	$('.previo').addClass('inactivo');
	$('.chatAmigo').removeClass('inactivo');
	$('.chatAmigo').addClass('activo');
	
}
function confirmarCuenta()
{
	var url = "../querys/confirmarCuenta.php";

	$.ajax({
		type: "POST",
		url: url,
		data: $("#formConfirmarCuenta").serialize(),
		success: function(data){
			$(".notificacion-emergenteConfirmacionCuenta").html(data);
			notificacionEmergente();
			}
	});
	$('.notificacion-emergenteConfirmacionCuenta').slideToggle();
	$('.vaciar').val('');
	return false;
}
function admin()
{
	window.location = ''
}
function redireccionar()
{
	window.location = 'panel'
}
function ocultar()
{
	console.log('se ejecuto ocultar');
	$('.notificacion-emergenteLogin').slideToggle();
	$('.notificacion-emergenteConfirmacionCuenta').slideToggle();
}
function timeOcultar()
{
	setTimeout ("ocultar()", 3000);
}
function logueado()
{
	console.log('se ejecuto login');
	setTimeout ("redireccionar()", 5000);
}
function mostrarOpcionesUsuario()
{
	console.log('estoy funcando')
	$('.opcionesUsuario').slideToggle();
}
function mostarMenu()
{
	console.log('estoy funcando')
	$('.opcionesUsuario').animate({
            width: "toggle",
            opacity: "toggle"
        });    
}
function logIn()
{
	console.log('deberias loguearte');
	var url = "src/validacion/login.php";

	$.ajax({
		type: "POST",
		url: url,
		data: $("#formLogIn").serialize(),
		success: function(data){
			$("#respuestaLogin").html(data);
			}
	});
	$('#respuestaLogin').slideToggle();
	return false;
}
function PreRegister()
{
	console.log('usuario pre registrado');
	$('.popNuevoUsuario').slideToggle();
	var url = "../querys/insPreRegistro.php";

	$.ajax({
		type: "POST",
		url: url,
		data: $("#formRegister").serialize(),
		success: function(data){
			$("#RespuestaRegister").html(data);
			notificacionEmergente();
			}
	});
	$('.vaciar').val('');
	return false;
}
//NOTIFICACIONES DE ESCRITORIO
var options = {
    body: "La orden de servicio Nro. 76 ha sido generada correctamente",
    icon: "img/ico.png"
};
 
//var notif = new Notification("Orden de servicio", options);

function GetWebNotificationsSupported() {
    return (!!window.Notification);
}
function AskForWebNotificationPermissions()
{
    if (Notification) {
        Notification.requestPermission();
    }
}
AskForWebNotificationPermissions();