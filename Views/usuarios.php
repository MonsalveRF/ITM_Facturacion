<?php 
require_once 'header.php';
require_once '../Models/UserModel.php';
?>
<!-- Begin Page Content -->
<div class="container-fluid">
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Usuarios</h1>
<p class="mb-4">Listado de Usuarios.</p>

<!-- Botón Agregar Usuario -->
<a href="UserController.php?action=addUserView">
    <button class="btn btn-primary">Agregar usuario</button>
</a>


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
                        <th>nombre</th>
                        <th>correo</th>
                        <th>usuario</th>
                        <th>fecha registro</th>
                        
                    </tr>
                </thead>
                <tbody>                    
                <?php
                    $tableContent = "";
                    $User = new UserModel();
                    $users = $User->getUsers();

                    if (!empty($users)) {
                        foreach ($users as $user) {
                            $tableContent .= "
                                <tr>
                                    <td>{$user->getNombre()}</td>
                                    <td>{$user->getCorreo()}</td>
                                    <td>{$user->getUsuario()}</td>
                                    <td>{$user->getFechaRegistro()}</td>
                                                                      
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