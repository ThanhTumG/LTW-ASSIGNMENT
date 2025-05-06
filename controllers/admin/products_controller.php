<?php
require_once('controllers/admin/base_controller.php');
require_once('models/product.php');

// Form validation function
function validateInput($data, $file) {
    $errors = [];
    
    // Validate name (2-100 characters)
    if (!preg_match("/^.{2,100}$/", $data['name'])) {
        $errors['name'] = "Tên sản phẩm phải từ 2-100 ký tự";
    }
    
    // Validate price (positive number)
    if (!is_numeric($data['price']) || $data['price'] <= 1000) {
        $errors['price'] = "Giá phải lớn hơn 1000";
    }
    
    // Validate description (min 10 characters)
    if (!preg_match("/^.{10,}$/", $data['description'])) {
        $errors['description'] = "Mô tả phải ít nhất 10 ký tự";
    }
    
    // Validate content (min 20 characters)
    if (!preg_match("/^.{20,}$/", $data['content'])) {
        $errors['content'] = "Nội dung phải ít nhất 20 ký tự";
    }
    
    // Validate image upload
    if (isset($file['fileToUpload']) && $file['fileToUpload']['size'] > 0) {
        $fileType = strtolower(pathinfo($file['fileToUpload']['name'], PATHINFO_EXTENSION));
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($fileType, $allowedTypes)) {
            $errors['fileToUpload'] = "Chỉ cho phép các định dạng JPG, JPEG, PNG, GIF";
        }
        if ($file['fileToUpload']['size'] > 500000) {
            $errors['fileToUpload'] = "Kích thước file phải nhỏ hơn 500KB";
        }
    } else {
        // For add action, image is required
        if (!isset($data['id'])) {
            $errors['fileToUpload'] = "Vui lòng chọn hình ảnh";
        }
    }
    
    return $errors;
}

class ProductsController extends BaseController
{
    function __construct()
    {
        $this->folder = 'products';
    }

    public function index()
    {
        $products = Product::getAll();
        $data = array('products' => $products);
        $this->render('index', $data);
    }

    public function add()
    {
        $data = [
            'name' => $_POST['name'],
            'price' => $_POST['price'],
            'description' => $_POST['description'],
            'content' => $_POST['content']
        ];

        // Validate input
        $errors = validateInput($data, $_FILES);

        if (!empty($errors)) {
            $products = Product::getAll();
            $data = array('products' => $products, 'err' => $errors);
            $this->render('index', $data);
            return;
        }

        $id = (string)date("Y_m_d_h_i_sa");
        $fileuploadname = (string)$id;
        $target_dir = "public/img/products/";
        $path = $_FILES['fileToUpload']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $fileuploadname .= ".";
        $fileuploadname .= $ext;
        $target_file = $target_dir . basename($fileuploadname);
        
        if (file_exists($target_file)) {
            $products = Product::getAll();
            $data = array('products' => $products, 'err' => ['fileToUpload' => "File đã tồn tại"]);
            $this->render('index', $data);
            return;
        }

        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
        Product::insert($data['name'], $data['price'], $data['description'], $data['content'], $target_file);
        header('Location: index.php?page=admin&controller=products&action=index');
    }

    public function edit()
    {
        $data = [
            'id' => $_POST['id'],
            'name' => $_POST['name'],
            'price' => $_POST['price'],
            'description' => $_POST['description'],
            'content' => $_POST['content']
        ];

        // Validate input
        $errors = validateInput($data, $_FILES);

        if (!empty($errors)) {
            $products = Product::getAll();
            $data = array('products' => $products, 'err' => $errors);
            $this->render('index', $data);
            return;
        }

        $id = $_POST['id'];
        $code = (string)date("Y_m_d_h_i_sa");
        $fileuploadname = (string)$code;
        $urlcurrent = Product::get((int)$id)->img;

        if (!isset($_FILES["fileToUpload"]) || $_FILES['fileToUpload']['tmp_name'] == "") {
            Product::update($id, $data['name'], $data['price'], $data['description'], $data['content'], $urlcurrent);
            header('Location: index.php?page=admin&controller=products&action=index');
            return;
        }

        $target_dir = "public/img/products/";
        $path = $_FILES['fileToUpload']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $fileuploadname .= ".";
        $fileuploadname .= $ext;
        $target_file = $target_dir . basename($fileuploadname);

        if (file_exists($target_file)) {
            $products = Product::getAll();
            $data = array('products' => $products, 'err' => ['fileToUpload' => "File đã tồn tại"]);
            $this->render('index', $data);
            return;
        }

        $file_pointer = $urlcurrent;
        unlink($file_pointer);
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
        Product::update($id, $data['name'], $data['price'], $data['description'], $data['content'], $target_file);
        header('Location: index.php?page=admin&controller=products&action=index');
    }

    public function delete()
    {
        $id = $_POST['id'];
        $urlcurrent = Product::get((int)$id)->img;
        unlink($urlcurrent);
        Product::delete($id);
        header('Location: index.php?page=admin&controller=products&action=index');
    }
}