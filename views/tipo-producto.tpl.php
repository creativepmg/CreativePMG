<?php require 'template/inicio.php'; ?>
	<!-- Contenido mostrado -->
    <?php while ($arrProductos=mysqli_fetch_array($lis_productos)) {?>
        <div class="contenedorProductos">
            <div class="contenedorProducto">
                <div class="row2">
                    <div class="ContImgProducto">
                        <div class="imgProducto">
                            <img src="data:image/png;base64,<?= $arrProductos['IMAGEN'] ?>">
                            <form action="src/inserts/ins_subir_imgProducto.php" method="post" enctype="multipart/form-data">
                                <label for="avatar">Subir imagen</label>
                                <input type="hidden" name="id_producto" value="<?= $arrProductos['ID_PRODUCTO'] ?>">
                                <input type="file" id="avatar" name="producto"> 
                                <input id="btn_subir_avatar" type="submit" value="" style="display: none;">
                            </form>
                        </div>
                       
                        <div class="datosImg">
                            <div class="decripcion"><?= $arrProductos['DESCRIPCION'] ?></div>
                            <div class="editar"></div>
                            <div class="eliminar"></div>
                        </div>
                    </div>
                </div>
                <div class="row1">
                    <div class="cabecera">
                        <div class="idCabecera">id</div>
                        <div class="precioCabecera">precio</div>
                    </div>      
                    <div class="cuerpo">
                        <div class="id"><?= $arrProductos['ID_PRODUCTO'] ?></div>
                        <div class="precio"><?= $arrProductos['PRECIO_VENTA'] ?></div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- Nuevo Cliente  -->
    <?php require 'src/form/frm_nuevo_producto.php' ?>  

	<div class="botonNuevo" onclick="mostraCajaDialogo('#dNewProducto')"></div>
<?php require 'template/fin.php'; ?>