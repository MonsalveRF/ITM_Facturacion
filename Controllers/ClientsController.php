<?php
require '../Models/ClientsModel.php';

class ClientsController extends ClientsModel
{

    public function addClientsView()
    {

        $formularioEditar = false;
        require '../Views/clientsForm.php';
    }
    public function addClients()
    {

        $nit = $_POST["nit"];
        $nombre = $_POST["nombre"];
        $telefono = $_POST["telefono"];
        $direccion = $_POST["direccion"];
       

        $this->insertCliente(
            $nit,
            $nombre,
            $telefono,
            $direccion
        );

        echo "<script> alert('Cliente agregado correctamente'); window.location.href='ClientsController.php';</script>";
    }
    public function editClientsView()
    {
        $formularioEditar = true;
        $idcliente = $_GET['id'];
        $clients = $this->getClient($idcliente);
        require '../Views/clientsForm.php';
    }
    public function editClients()
    {
        $idcliente = $_POST["Idcliente"];
        $nit = $_POST["nit"];
        $nombre = $_POST["nombre"];
        $telefono = $_POST["telefono"];
        $direccion = $_POST["direccion"];

        $this->updateClient($idcliente, $nit, $nombre, $telefono, $direccion);
        /* notification */
        echo "<script> alert('Cliente actualizado correctamente'); window.location.href='ClientsController.php';</script>";
    }
    public function deleteClients($id)
    {

        $this->deleteClientById($id);
        /* notification */
        echo "<script> alert('Cliente eliminado correctamente'); window.location.href='ClientsController.php';</script>";
    }
    public function clientsView()
    {

        $clients = $this->getClients();

        require '../Views/clients.php';
    }

}
session_start();
if(!$_SESSION['idUsuario']){
    header('Location: LoginController.php?action=loginView');
}
$Controller = new ClientsController();
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
        $action = 'clientsView';
    }
}


switch ($action) {

    case 'addClientsView':
        $Controller->addClientsView();
        break;
    case 'addClients':
        $Controller->addClients();
        break;
    case 'editClientsView':
        $Controller->editClientsView();
        break;
    case 'editClients':
        $Controller->editClients();
        break;
    case 'deleteClients':
        $Controller->deleteClients($id);
        break;
    case 'clientsView':
        $Controller->clientsView();
        break;
    default:
        $Controller->clientsView();
        break;
}
