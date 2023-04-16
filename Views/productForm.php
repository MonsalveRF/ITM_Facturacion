<?php require_once 'header.php';
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Productos</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Formulario de producto</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="ProductController.php?action=<?php echo $result = $formularioEditar ? "editProduct" : "addProduct"; ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="idProducto" value="<?php echo $result = $formularioEditar ? "{$product->getIdproducto()}" : ""; ?>">
                    <div class="form-group">
                        <label for="codigoProducto">Código producto</label>
                        <input type="text" name="codigoProducto" class="form-control form-control-user" id="codigoProducto" value="<?php echo $result = $formularioEditar ? "{$product->getCodigoproducto()}" : ""; ?>">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <input type="text" name="descripcion" class="form-control form-control-user" id="descripcion" aria-describedby="descripcion" placeholder="" value="<?php echo $result = $formularioEditar ? "{$product->getDescripcion()}" : ""; ?>">
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input type="number" name="precio" class="form-control form-control-user" id="precio" placeholder="" value="<?php echo $result = $formularioEditar ? "{$product->getPrecio()}" : ""; ?>">
                    </div>
                    <div class="form-group">
                        <label for="proveedor">Proveedor</label>
                        <select id="proveedor" name="proveedor" class="form-control">
                            <option>Seleccionar proveedor</option>
                            <?php
                            $selectContent = "";
                            if (!empty($providers)) {
                                foreach ($providers as $provider) {
                                    if ($formularioEditar) {
                                        if ($provider->getProveedor() == $product->getProveedor()) {
                                            $selectContent .= "<option value='{$provider->getCodproveedor()}' selected>{$provider->getProveedor()}</option>";
                                        }
                                    }
                                    $selectContent .= "<option value='{$provider->getCodproveedor()}'>{$provider->getProveedor()}</option>";
                                }
                            }
                            echo $selectContent;
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="existencia">Existencia</label>
                        <input type="number" name="existencia" class="form-control form-control-user" id="existencia" placeholder="" value="<?php echo $result = $formularioEditar ? "{$product->getExistencia()}" : ""; ?>">
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" name="foto" class="form-control form-control-user" id="foto" placeholder="foto">
                        <center>
                            <?php  $imgUrl = $formularioEditar ? "data:image/jpg;charset=utf8;base64,".base64_encode($product->getFoto()) : "#"; ?>
                            <img id="previewFoto" src="<?php echo $result = $formularioEditar ? $imgUrl : "#"; ?>" style="width: 200px; height: 200px;" />
                        </center>
                    </div>

                    <input type="submit" class="btn btn-primary btn-block" value="<?php echo $result = $formularioEditar ? "Editar" : "Agregar"; ?>" />
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#previewFoto').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#foto").change(function() {
            readURL(this);
        });
    </script>
</div>
<!-- /.container-fluid -->
<?php
require 'footer.php'; ?>