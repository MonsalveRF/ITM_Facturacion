<?php require 'header.php';
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Productos</h1>
    <p class="mb-4">Listado de Productos.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Lista</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>codproducto</th>
                            <th>descripcion</th>
                            <th>proveedor</th>
                            <th>precio</th>
                            <th>existencia</th>
                            <th>foto</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>codproducto</th>
                            <th>descripcion</th>
                            <th>proveedor</th>
                            <th>precio</th>
                            <th>existencia</th>
                            <th>foto</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        /* $product */

                        /* foreach ($products as $product) {


                            echo "<tr>
                            <td>product->get</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>$320,800</td>
                            </tr>";
                        } */

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