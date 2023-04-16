<?php require_once 'header.php';
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Proveedor</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Formulario de Proveedores</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="ProviderController.php?action=<?php echo $result = $formularioEditar ? "editProvider" : "addProvider"; ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="codproveedor" value="<?php echo $result = $formularioEditar ? "{$provider->getCodproveedor()}" : ""; ?>">
                    <div class="form-group">
                        <label for="proveedor">Proveedor</label>
                        <input type="text" name="proveedor" class="form-control form-control-user" id="proveedor" value="<?php echo $result = $formularioEditar ? "{$provider->getProveedor()}" : ""; ?>">
                    </div>
                    <div class="form-group">
                        <label for="contacto">Contacto</label>
                        <input type="text" name="contacto" class="form-control form-control-user" id="contacto" aria-describedby="contacto" placeholder="" value="<?php echo $result = $formularioEditar ? "{$provider->getContacto()}" : ""; ?>">
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input type="text" name="telefono" class="form-control form-control-user" id="telefono" placeholder="" value="<?php echo $result = $formularioEditar ? "{$provider->getTelefono()}" : ""; ?>">
                    </div>
                    <div class="form-group">
                        <label for="direccion">Direccion</label>
                        <input type="text" name="direccion" class="form-control form-control-user" id="direccion" placeholder="" value="<?php echo $result = $formularioEditar ? "{$provider->getDireccion()}" : ""; ?>">
                    </div>

                    <input type="submit" class="btn btn-primary btn-block" value="<?php echo $result = $formularioEditar ? "Editar" : "Agregar"; ?>" />
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?php
require 'footer.php'; ?>