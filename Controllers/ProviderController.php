<?php
require '../Models/ProviderModel.php';

class ProviderController extends ProviderModel
{

    public function addProviderView()
    {
        $formularioEditar = false;
        require '../Views/ProviderForm.php';
    }
    public function addProvider()
    {

        $proveedor = $_POST['proveedor'];
        $contacto = $_POST['contacto'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];

        $this->insertProvider(
            $proveedor,
            $contacto,
            $telefono,
            $direccion
        );

        echo "<script> alert('Proveedor agregado correctamente'); window.location.href='ProviderController.php';</script>";
    }
    public function editProviderView()
    {
        $formularioEditar = true;
        $idProveedor = $_GET['id'];
        $provider = $this->getProvider($idProveedor);

        require '../Views/ProviderForm.php';
    }
    public function editProvider()
    {
        $idProveedor = $_POST["codproveedor"];
        $proveedor = $_POST['proveedor'];
        $contacto = $_POST['contacto'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];

        $this->updateProvider(
            $idProveedor,
            $proveedor,
            $contacto,
            $telefono,
            $direccion
        );
        /* notification */
        echo "<script> alert('Proveedor actualizado correctamente'); window.location.href='ProviderController.php';</script>";
    }
    public function deleteProvider($id)
    {
        $this->deleteProviderById($id);
        /* notification */
        echo "<script> alert('Proveedor eliminado correctamente'); window.location.href='ProviderController.php';</script>";
    }
    public function providerView()
    {
        $providers = $this->getProviders();

        require '../Views/Providers.php';
    }

}
session_start();
if(!$_SESSION['idUsuario']){
    header('Location: LoginController.php?action=loginView');
}
$Controller = new ProviderController();
/* Accion */
if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else {
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
    } else {
        $action = 'providerView';
    }
}


switch ($action) {

    case 'addProviderView':
        $Controller->addProviderView();
        break;
    case 'addProvider':
        $Controller->addProvider();
        break;
    case 'editProviderView':
        $Controller->editProviderView();
        break;
    case 'editProvider':
        $Controller->editProvider();
        break;
    case 'deleteProvider':
        $Controller->deleteProvider($id);
        break;
    case 'providerView':
        $Controller->providerView();
        break;
    default:
        $Controller->providerView();
        break;
}
