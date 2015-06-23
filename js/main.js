$(document).on('ready', inicio);
function inicio()
{	
	$('#LogIn').on('click', logIn);
	$('#btnContacto').on('click', insContacto);
	$('#botonNuevoMenu').on('click', nuevoMenu);
	$('#Register').on('click', PreRegister);	
	$('#confirmarCuenta').on('click', confirmarCuenta);
	$('#actualizarMenusUsuarios').on('click', updUsuario);
	$('#btnInsCliente').on('click', insCliente);
	$('#btn_notificaciones').on('click', mostrarNotificaciones);
	$('#btnNotaCliente').on('click', insOrdenServicio);
	$('#nuevoServicio, #nuevoCliente, #nuevoServicio, #nuevoUsuario').on('click', nuevoUsuario);
	$('#nuevoPreServicio').on('click', nuevoPreServicio);
	$('#btnPreOrden').on('click', insPreOrden);
	$('#btnInsProducto').on('click', insProducto);
	$('.usuario').on('click', ioMenu);
	$('.previo').on('click', chatear);
	$('.chatAmigo .titulo').on('click', listaDeChats);
	$('.cerrarPopups').on('click', cerrarPopups);
	$('.cajaDialogo .formulario .encabezado .cerrar').on('click', cerrarCajaDialogo);
	$('#btnInsProveedor').on('click', insProveedor);
	$('#btnInsCompra').on('click', insCompra);
	$('#btnInsItemCompra').on('click', insItemCompra);
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
	var url = "../querys/insProveedor.php";
	var formulario = $('#nuevoProveedor');
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
function mostraCajaDialogo(parametro)
{
	cerrarCajaDialogo();
	$(parametro).slideToggle();
}
function cerrarCajaDialogo()
{
	$('.cajaDialogo').css('display', 'none');
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
	var url = "../querys/insCliente.php";
	//VARIABLES A RECOGER
	var cliente_nombre = $('#formInsCliente').children('#nombre_cliente').val();
	var cliente_numero = $('#formInsCliente').children('#numero_cliente').val();
	var cliente_email = $('#formInsCliente').children('#email_cliente').val();
	//SETIADO DE VARIABLES EN SESSION STORAGE
	sessionStorage.setItem("cliente_nombre", cliente_nombre);
	
	

	$.ajax({
		type: "POST",
		url: url,
		data: $("#formInsCliente").serialize(),
		success: function(data){
			var id_utl_client = data;
			console.log(id_utl_client);	
			sessionStorage.setItem("id_cliente", id_utl_client);
			$('#formNotaCliente #id_cliente').val(sessionStorage.getItem("id_cliente"));
			$('#formNotaCliente #nombre_cliente').val(sessionStorage.getItem("cliente_nombre"));	
			}
	});
	$('.vaciar').val('');
	mostraCajaDialogo('#dNewOrdenService');
	//setTimeout ("location.reload()", 3000);
	return false;
}
function insProducto()
{
	console.log('MFNuevoProducto');
	var url = "src/inserts/insProducto.php";
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
	$('.notificacion-emergente').slideToggle();
	setTimeout ('ocultarEmergente()', 5000);
}
function ocultarEmergente()
{
	$('.notificacion-emergente').animate({
        height: "toggle",
        opacity: "toggle"
    });  
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
	cerrarPopups();
	setTimeout ("location.reload()", 3000);
	return false;
}
function insOrdenServicio()
{
	var url = "/querys/insOrdenServicio.php";

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
	cerrarPopups();
	setTimeout ("location.reload()", 3000);
	return false;
}

function updUsuario()
{
	var url = "querys/updUsuario.php";

	$.ajax({
		type: "POST",
		url: url,
		data: $("#formMenuUsuarios").serialize(),
		success: function(data){
			$(".notificacion-emergenteRegister").html(data);
			notificacionEmergente();
			}
	});
	$('.vaciar').val('');
	cerrarPopups();
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
function nuevoMenu()
{
	console.log('Insertado nuevo cliente');
	$('.popMenus').slideToggle();
	var url = "/querys/insNuevoMenu.php";
	$.ajax({
		type: "POST",
		url: url,
		data: $("#nuevoMenu").serialize(),
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
	$('.popMenus').slideToggle();
}
function cerrarPopups()
{
	$('.popup,.cajaDialogo').css('display', 'none');
	$('.vaciar').val('');
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
	var url = "querys/login.php";

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