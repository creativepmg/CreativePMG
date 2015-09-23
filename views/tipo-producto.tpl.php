<?php require 'template/inicio.php'; ?>
	<!-- Contenido mostrado -->
    <?php 
        $contador = 0;
        while ($arrProductos=mysqli_fetch_array($lis_productos)) {
        $contador = $contador + 1;
    ?>
        <div class="contenedorProductos">
            <div class="contenedorProducto">
                <div class="row2">
                    <div class="ContImgProducto">
                        <div class="imgProducto">
                            <img src="data:image/png;base64,<?= $arrProductos['IMAGEN'] ?>">
                            <form action="src/inserts/ins_subir_imgProducto.php" method="post" enctype="multipart/form-data">
                                <label for="avatar<?= $contador ?>">Subir imagen</label>
                                <input type="hidden" name="id_producto" value="<?= $arrProductos['ID_PRODUCTO'] ?>">
                                <input type="file" id="avatar<?= $contador ?>" name="producto" onchange="cambiar_imagen_producto(this)"> 
                                <input id="btn_change_img_product" type="submit" value="" style="display: none;">
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