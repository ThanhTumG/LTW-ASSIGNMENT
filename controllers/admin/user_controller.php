<?php
require_once('controllers/admin/base_controller.php');
require_once('models/user.php');

// Form validation function
function validateInput($formdata, $isAdd) {
    $errors = [];
    
    // Validate fname (2-30 characters)
    if (!preg_match("/^.{2,30}$/", $formdata['fname'])) {
        $errors['fname'] = "Họ phải từ 2-30 ký tự";
    }
    
    // Validate lname (2-30 characters)
    if (!preg_match("/^.{2,30}$/", $formdata['lname'])) {
        $errors['lname'] = "Tên phải từ 2-30 ký tự";
    }
    
    // Validate email
    if (!filter_var($formdata['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Email không hợp lệ";
    }
    
    // Validate phone (exactly 10 digits)
    if (!preg_match("/^[0-9]{10}$/", $formdata['phone'])) {
        $errors['phone'] = "Số điện thoại phải có đúng 10 chữ số";
    }
    
    // Validate age (positive number)
    if (!is_numeric($formdata['age']) || $formdata['age'] <= 0) {
        $errors['age'] = "Tuổi phải là số dương";
    }
    
	if ($isAdd) {
    // Validate password (min 8 chars, no special characters)
    	if (!preg_match("/^[a-zA-Z0-9]{8,}$/", $formdata['password'])) {
        	$errors['password'] = "Mật khẩu phải ít nhất 8 ký tự và không chứa ký tự đặc biệt";
    	}
	}
    
    // Validate gender (must be 0 or 1)
    if (!isset($formdata['gender']) || !in_array($formdata['gender'], ['0', '1'])) {
        $errors['gender'] = "Vui lòng chọn giới tính";
    }
    
    return $errors;
}

class UserController extends BaseController
{
	function __construct()
	{
		$this->folder = 'user';
	}

	public function index()
	{
		$user = User::getAll();
		$data = array('user' => $user);
		$this->render('index', $data);
	}

	public function add()
	{
		session_start();
		$formdata = [
            'fname' => $_POST['fname'],
            'lname' => $_POST['lname'],
            'age' => $_POST['age'],
            'gender' => isset($_POST['gender']) ? $_POST['gender'] : null,
            'phone' => $_POST['phone'],
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ];

        // Validate input
        $errors = validateInput($formdata, true);
        
		if (!empty($errors)) {
			$_SESSION['err'] = implode(", ", $errors);
			header('Location: index.php?page=admin&controller=user&action=index');
			exit;
		}

		// Photo
		$target_dir = "public/img/user/";
		$path = $_FILES['fileToUpload']['name'];
		$ext = pathinfo($path, PATHINFO_EXTENSION);
		echo $ext;
		$id = (string)date("Y_m_d_h_i_sa");
		$fileuploadname = (string)$id;
		$fileuploadname .= ".";
		$fileuploadname .= $ext;
		$target_file = $target_dir . basename($fileuploadname);
		if (file_exists($target_file)) {
			$_SESSION['err'] = "Sorry, file already exists.";
			header('Location: index.php?page=admin&controller=user&action=index');
			exit;
		}
		$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
		// Allow certain file formats
		if (!in_array($fileType, ["jpg", "png", "jpeg", "gif"])) {
        $_SESSION['err'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        header('Location: index.php?page=admin&controller=user&action=index');
        exit;
    	}
		if ($_FILES["fileToUpload"]["size"] > 5000000) {
			$_SESSION['err'] = "Sorry, your file is too large.";
			header('Location: index.php?page=admin&controller=user&action=index');
			exit;
		}
		// Try to upload file
        if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			$_SESSION['err'] = "Lỗi khi tải tệp lên";
			header('Location: index.php?page=admin&controller=user&action=index');
			exit;
		}

		// Add new
		 // Check if email already exists
		 if (User::getvalidate($formdata['email']) > 0) {
			$_SESSION['err'] = "Tài khoản đã tồn tại";
			header('Location: index.php?page=admin&controller=user&action=index');
			exit;
		}
			User::insert(
				$formdata['email'],
				$target_file,
				$formdata['fname'],
				$formdata['lname'],
				$formdata['gender'],
				$formdata['age'],
				$formdata['phone'],
				$formdata['password']
			);
			header('Location: index.php?page=admin&controller=user&action=index');
	}

	public function editInfo()
	{
		session_start();
		$formdata = [
            'fname' => $_POST['fname'],
            'lname' => $_POST['lname'],
            'age' => $_POST['age'],
            'gender' => isset($_POST['gender']) ? $_POST['gender'] : null,
            'phone' => $_POST['phone'],
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ];
		$target_file = $_POST['img'];

        // Validate input
        $errors = validateInput($formdata, false);
        
		if (!empty($errors)) {
			$_SESSION['err'] = implode(", ", $errors);
			header('Location: index.php?page=admin&controller=user&action=index');
			exit;
		}
		$target_file = $_POST['img'];
		if (!empty($_FILES['fileToUpload']['name'])) {
			// Xử lý ảnh mới
			$target_dir = "public/img/user/";
			$path = $_FILES['fileToUpload']['name'];
			$ext = pathinfo($path, PATHINFO_EXTENSION);
			$id = (string)date("Y_m_d_h_i_sa");
			$fileuploadname = $id . "." . $ext;
			$target_file = $target_dir . basename($fileuploadname);
	
			// Kiểm tra file đã tồn tại
			if (file_exists($target_file)) {
				$_SESSION['err'] = "Sorry, file already exists.";
				header('Location: index.php?page=admin&controller=user&action=index' . $user_id);
				exit;
			}
	
			// Kiểm tra định dạng file
			$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
			if (!in_array($fileType, ["jpg", "png", "jpeg", "gif"])) {
				$_SESSION['err'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				header('Location: index.php?page=admin&controller=user&action=index' . $user_id);
				exit;
			}
	
			// Kiểm tra kích thước file
			if ($_FILES["fileToUpload"]["size"] > 5000000) {
				$_SESSION['err'] = "Sorry, your file is too large.";
				header('Location: index.php?page=admin&controller=user&action=index' . $user_id);
				exit;
			}
	
			// Kiểm tra lỗi upload
			if ($_FILES['fileToUpload']['error'] !== UPLOAD_ERR_OK) {
				$_SESSION['err'] = "Error occurred during file upload.";
				header('Location: index.php?page=admin&controller=user&action=index' . $user_id);
				exit;
			}
	
			// Di chuyển file mới
			if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				$_SESSION['err'] = "Error occurred while moving the uploaded file.";
				header('Location: index.php?page=admin&controller=user&action=index' . $user_id);
				exit;
			}
		}
		// Update
		User::update(
			$formdata['email'],
			$target_file,
			$formdata['fname'],
			$formdata['lname'],
			$formdata['gender'],
			$formdata['age'],
			$formdata['phone'],
			$formdata['password']
		);
		header('Location: index.php?page=admin&controller=user&action=index');
	}

	public function editPass()
	{
		$email = $_POST['email'];
		$newpassword = $_POST['new-password'];
		echo $email . " " . $newpassword .  "\n";
		$change_pass = User::changePassword_($email, $newpassword);
		echo "change_pass";
		header('Location: index.php?page=admin&controller=user&action=index');
	}

	public function delete()
	{
		$email = $_POST['email'];
		$urlcurrent = $_POST['img'];
		unlink($urlcurrent);
		$delete_user = User::delete($email);
		header('Location: index.php?page=admin&controller=user&action=index');
	}
}