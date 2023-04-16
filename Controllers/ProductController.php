<?php
require '../Models/ProductModel.php';

class ProductController extends ProductModel
{

    public function addProductView()
    {
        $providers = $this->providerClass->getProviders();
        $formularioEditar = false;
        require '../Views/ProductForm.php';
    }
    public function addProduct()
    {

        $codigoproducto = $_POST["codigoProducto"];
        $descripcion = $_POST["descripcion"];
        $precio = $_POST["precio"];
        $proveedor = $_POST["proveedor"];
        $existencia = $_POST["existencia"];
        $foto = $this->verifyImage();

        $this->insertProduct(
            $codigoproducto,
            $descripcion,
            $precio,
            $proveedor,
            $existencia,
            $foto
        );

        echo "<script> alert('Producto agregado correctamente'); window.location.href='ProductController.php';</script>";
    }
    public function editProductView()
    {
        $formularioEditar = true;
        $idProducto = $_GET['id'];
        $product = $this->getProduct($idProducto);
        $providers = $this->providerClass->getProviders();
        require '../Views/ProductForm.php';
    }
    public function editProduct()
    {
        $idProducto = $_POST["idProducto"];
        $codigoproducto = $_POST["codigoProducto"];
        $descripcion = $_POST["descripcion"];
        $precio = $_POST["precio"];
        $proveedor = $_POST["proveedor"];
        $existencia = $_POST["existencia"];
        $foto = $this->verifyImage();

        $this->updateProduct($idProducto, $codigoproducto, $descripcion, $precio, $proveedor, $existencia, $foto);
        /* notification */
        echo "<script> alert('Producto actualizado correctamente'); window.location.href='ProductController.php';</script>";
    }
    public function deleteProduct($id)
    {

        $this->deleteProductById($id);
        /* notification */
        echo "<script> alert('Producto eliminado correctamente'); window.location.href='ProductController.php';</script>";
    }
    public function productsView()
    {

        $products = $this->getProducts();

        require '../Views/Products.php';
    }


    public function verifyImage()
    {


        $imgContent = "";
        $status = $statusMsg = '';


        $status = 'error';
        /* Ver se cargo */
        if (!empty($_FILES["foto"]["name"])) {
            // informacion del archivo
            $fileName = basename($_FILES["foto"]["name"]);
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

            // Allow certain file formats 
            $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
            if (in_array($fileType, $allowTypes)) {
                $image = $_FILES['foto']['tmp_name'];
                $imgContent = addslashes(file_get_contents($image));

                return $imgContent;
            } else {
                $statusMsg = 'error';
            }
        } else {
            $statusMsg = 'Imagen no cargada.';
        }

        echo "<script> alert('{$statusMsg}'); window.location.href='ProductController.php';</script>";

        return $imgContent;
    }
}
session_start();
if(!$_SESSION['idUsuario']){
    header('Location: LoginController.php?action=loginView');
}
$Controller = new ProductController();
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
        $action = 'productsView';
    }
}


switch ($action) {

    case 'addProductView':
        $Controller->addProductView();
        break;
    case 'addProduct':
        $Controller->addProduct();
        break;
    case 'editProductView':
        $Controller->editProductView();
        break;
    case 'editProduct':
        $Controller->editProduct();
        break;
    case 'deleteProduct':
        $Controller->deleteProduct($id);
        break;
    case 'productsView':
        $Controller->productsView();
        break;
    default:
        $Controller->productsView();
        break;
}
