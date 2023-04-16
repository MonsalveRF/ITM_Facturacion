<?php require 'header.php';
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Clientes</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Formulario de Clientes</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="ClientsController.php?action=<?php echo $result = $formularioEditar ? "editClients" : "addClients"; ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="Idcliente" value="<?php echo $result = $formularioEditar ? "{$clients->getIdcliente()}" : ""; ?>">
                    <div class="form-group">
                        <label for="nit">Nit</label>
                        <input type="number" name="nit" class="form-control form-control-user" id="nit" maxlength="11" aria-describedby="nit" placeholder="" value="<?php echo $result = $formularioEditar ? "{$clients->getnit()}" : ""; ?>">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control form-control-user" id="nombre" placeholder="" value="<?php echo $result = $formularioEditar ? "{$clients->getNombre()}" : ""; ?>">
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input type="text" name="telefono" class="form-control form-control-user" id="telefono" placeholder="" value="<?php echo $result = $formularioEditar ? "{$clients->getTelefono()}" : ""; ?>">
                    </div>
                    <div class="form-group">
                        <label for="direccion">Direccion</label>
                        <input type="text" name="direccion" class="form-control form-control-user" id="direccion" placeholder="" value="<?php echo $result = $formularioEditar ? "{$clients->getDireccion()}" : ""; ?>">
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