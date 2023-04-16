<?php require 'header.php';
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <?php
    if (isset($message)) {
        /* message */

        echo ("<script> alert('{$message}''); </script>");
    }
    ?>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Clientes</h1>
    <p class="mb-4">Listado de Clientes</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Lista</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <a href='ClientsController.php?action=addClientsView' class='btn btn-success'>Agregar</a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nit</th>
                            <th>Nombre</th>
                            <th>Telefono</th>
                            <th>Direccion</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        /* $product */
                        $tableContent = "";
                        if (!empty($clients)) {
                            foreach ($clients as $obj) {
                                $tableContent .= "
                                <tr>
                                <th>{$obj->getNit()}</th>
                                <th>{$obj->getNombre()}</th>
                                <th>{$obj->getTelefono()}</th>
                                <th>{$obj->getDireccion()}</th>
                                <th><a href='ClientsController.php?action=editClientsView&id={$obj->getIdcliente()}' class='btn btn-info btn-circle'><i class='fas fa-info-circle'></i></a></th>
                                <th><a href='ClientsController.php?action=deleteClients&id={$obj->getIdcliente()}' class='btn btn-danger btn-circle'><i class='fas fa-trash'></i></a></th>
                                </tr>";
                            }
                        }
                        echo $tableContent;

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<?php
require 'footer.php'; ?>