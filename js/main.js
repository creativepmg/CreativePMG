$(document).on('ready', inicio);
function inicio()
{	
	$('#btnBuscarDominio').on('click', consultaDominio);
	$('#LogIn').on('click', logIn);
	$('#btnContacto').on('click', insContacto);
	$('#botonNuevoMenu').on('click', nuevoMenu);
	$('#Register').on('click', PreRegister);	
	$('#confirmarCuenta').on('click', confirmarCuenta);
	$('#actualizarMenusUsuarios').on('click', updUsuario);
	$('#btnInsCliente').on('click', insCliente);
	$('#btn_notificaciones').on('click', mostrarNotificaciones);
	$('#btnNotaCliente').on('click', insOrdenServicio);
	//$('#btnListo').on('click', updOrdenFinalizada);
	//$('#btnEditarOrden'),on('click', updOrden);

	$('.usuario img').on('click', mostrarOpcionesUsuario);
	$('.previo').on('click', chatear);
	$('.chatAmigo .titulo').on('click', listaDeChats);
	$('.botonNuevo').on('click', nuevoUsuario);
	$('.cerrarPopups').on('click', cerrarPopups);
}
function funcando()
{
	alert('estoy funcando');
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
			$("#respuesta").html(data);
			setTimeout ("location.reload()", 3000);
			}
	});
	$('.vaciar').val('');
	cerrarPopups();
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
			$("#respuesta").html(data);

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
			$("#respuesta").html(data);

			}
	});
	$('.vaciar').val('');
	cerrarPopups();
	setTimeout ("location.reload()", 3000);
	return false;
}
function insCliente()
{
	var url = "/querys/insCliente.php";

	$.ajax({
		type: "POST",
		url: url,
		data: $("#formInsCliente").serialize(),
		success: function(data){
			$("#respuesta").html(data);

			}
	});
	$('.vaciar').val('');
	cerrarPopups();
	setTimeout ("location.reload()", 3000);
	return false;
}
function updUsuario()
{
	var url = "/querys/updUsuario.php";

	$.ajax({
		type: "POST",
		url: url,
		data: $("#formMenuUsuarios").serialize(),
		success: function(data){
			$("#respuestaRegister").html(data);

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
			$("#respuestaContacto").html(data);
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
			$("#respuestaDominios").html(data);
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
			$("#respuesta").html(data);
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
	$('.popup').css('display', 'none');
}
function nuevoUsuario()
{
	console.log('Nuevo Usuario')
	$('.popNuevoUsuario').slideToggle();
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
			$("#respuestaConfirmacionCuenta").html(data);
			}
	});
	$('#respuestaConfirmacionCuenta').slideToggle();
	$('.vaciar').val('');
	return false;
}
function admin()
{
	window.location = '../'
}
function redireccionar()
{
	window.location = '../panel'
}
function ocultar()
{
	console.log('se ejecuto ocultar');
	$('#respuestaLogin').slideToggle();
	$('#respuestaConfirmacionCuenta').slideToggle();
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
	var url = "../querys/login.php";

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
			$("#respuestaRegister").html(data);
			}
	});
	$('.vaciar').val('');
	return false;
}