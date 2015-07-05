<?php require 'template/inicio.php'; ?>

<div class="contenedor">
	<div class="avatar">
		<img  src="img/avatares/<?= $user_avatar ?>">		
		<form action="src/inserts/ins_subir_foto.php" method="post" enctype="multipart/form-data">
			<label for="avatar">Cambia tu foto de perfil</label>
			<input type="hidden" name="id_usuario" value="<?= $userId ?>">
			<input type="file" id="avatar" name="avatar"> 
			<input id="btn_subir_avatar" type="submit" value="" style="display: none;">
		</form>
	</div>
	<div class="detalles">
		<div class="seccion">
			<div> Usuario: </div> 
			<p><?= $user_user ?></p>	
		</div>
		<div class="seccion">
			<div> Contraseña : </div>
			<p>********</p>	
		</div>
		<div class="seccion">
			<div> Nombre:  </div>
			<p><?= $user_name ?></p>	
		</div>
		<div class="seccion">
			<div> E-mail: </div>
			<p><?= $email ?></p>	
		</div>
	</div>	
</div>
<?php require 'template/fin.php'; ?>
