<?php require 'header.php';
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <?php 
        if(isset($message)){
            /* message */
            
            echo ("<script> alert('{$message}''); </script>");
        }
    ?>
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
                <a href='ProductController.php?action=addProductView' class='btn btn-success'>Agregar</a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>codigo producto</th>
                            <th>descripcion</th>
                            <th>proveedor</th>
                            <th>precio</th>
                            <th>existencia</th>
                            <th>foto</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        /* $product */
                        $tableContent = "";
                        if (!empty($products)) {
                            foreach ($products as $product) {
                                $imgHTML = "";
                                if(!empty($product->getFoto())){
                                    $imgHTML =  "<img src='data:image/jpg;charset=utf8;base64,".base64_encode($product->getFoto())."' style='width: 100px; height: 100px;' />";
                                }
                                $tableContent .= "
                                <tr>
                                <th>{$product->getCodigoproducto()}</th>
                                <th>{$product->getDescripcion()}</th>
                                <th>{$product->getProveedor()}</th>
                                <th>{$product->getPrecio()}</th>
                                <th>{$product->getExistencia()}</th>
                                <th>{$imgHTML}</th>
                                <th><a href='ProductController.php?action=editProductView&id={$product->getIdproducto()}' class='btn btn-info btn-circle'><i class='fas fa-info-circle'></i></a></th>
                                <th><a href='ProductController.php?action=deleteProduct&id={$product->getIdproducto()}' class='btn btn-danger btn-circle'><i class='fas fa-trash'></i></a></th>
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