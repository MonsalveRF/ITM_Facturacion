<?php
require_once 'header.php';

?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"> Usuario</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Usuario</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="UserController.php?action=addUser" method="post">
                    <input type="hidden" name="idusuario" value="">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control form-control-user" id="nombre" value="">
                    </div>
                    <div class="form-group">
                        <label for="usuario">Usuario</label>
                        <input type="text" name="usuario" class="form-control form-control-user" id="usuario" value="">
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo</label>
                        <input type="email" name="correo" class="form-control form-control-user" id="correo" value="">
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" class="form-control form-control-user" id="password">
                    </div>
                    <div class="form-group">
                        <label for="idRol">Rol</label>
                        <select name="idRol" class="form-control form-control-user" id="idRol">
                            <?php
                            $selectContent = "";
                            if (!empty($roles)) {
                                foreach ($roles as $rol) {
                                    if ($formularioEditar) {
                                        if ($rol->getIdRol() == $user->getIdRol()) {
                                            $selectContent .= "<option value='{$rol->getIdRol()}' selected>{$rol->getRol()}</option>";
                                        }
                                    }
                                    $selectContent .= "<option value='{$rol->getIdRol()}'>{$rol->getRol()}</option>";
                                }
                            }

                            echo $selectContent;
                            ?>
                        </select>
                    </div>
                    <input type="submit" class="btn btn-primary btn-block" value="Agregar" />
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?php
require 'footer.php'; ?>