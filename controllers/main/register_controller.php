<?php
require_once('controllers/main/base_controller.php');
require_once('models/user.php');


// Form validation function
function validateInput($data) {
    $errors = [];
    
    // Validate fname (2-30 characters)
    if (!preg_match("/^.{2,30}$/", $data['fname'])) {
        $errors['fname'] = "Họ phải từ 2-30 ký tự";
    }
    
    // Validate lname (2-30 characters)
    if (!preg_match("/^.{2,30}$/", $data['lname'])) {
        $errors['lname'] = "Tên phải từ 2-30 ký tự";
    }
    
    // Validate email
    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Email không hợp lệ";
    }
    
    // Validate phone (exactly 10 digits)
    if (!preg_match("/^[0-9]{10}$/", $data['phone'])) {
        $errors['phone'] = "Số điện thoại phải có đúng 10 chữ số";
    }
    
    // Validate age (positive number)
    if (!is_numeric($data['age']) || $data['age'] <= 0) {
        $errors['age'] = "Tuổi phải là số dương";
    }
    
    // Validate password (min 8 chars, no special characters)
    if (!preg_match("/^[a-zA-Z0-9]{8,}$/", $data['pass'])) {
        $errors['pass'] = "Mật khẩu phải ít nhất 8 ký tự và không chứa ký tự đặc biệt";
    }

	// Validate gender (must be 0 or 1)
	if (!isset($data['gender']) || !in_array($data['gender'], ['0', '1'])) {
		$errors['gender'] = "Vui lòng chọn giới tính";
	}
    
    return $errors;
}


class RegisterController extends BaseController
{
	function __construct()
	{
		$this->folder = 'register';
	}

	public function index()
	{
		$this->render('index');
	}

	public function submit()
	{
		$data = [
            'fname' => $_POST['fname'],
            'lname' => $_POST['lname'],
            'age' => $_POST['age'],
            'gender' => $_POST['gender'],
            'phone' => $_POST['phone'],
            'email' => $_POST['email'],
            'pass' => $_POST['pass']
		];

		// Validate input
        $errors = validateInput($data);

		if (!empty($errors)) {
            $err = implode(", ", $errors);
            $data = array('err' => $err);
            $this->render('index', $data);
            return;
        }

		 // Check if email already exists
		 if (User::getvalidate($data['email']) > 0) {
            $err = "Tài khoản đã tồn tại";
            $data = array('err' => $err);
            $this->render('index', $data);
        } else {
            User::insert(
                $data['email'],
                'public/img/user/default.jpg',
                $data['fname'],
                $data['lname'],
                $data['gender'],
                $data['age'],
                $data['phone'],
                $data['pass']
            );
            header('Location: index.php?page=main&controller=layouts&action=index');
        }
		
	}

	public function editInfo()
	{
		session_start();
		$email = $_SESSION['guest'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$gender = $_POST['gender'];
		$age = $_POST['age'];
		$phone = $_POST['phone'];
		// Photo

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
				header('Location: index.php?page=main&controller=layouts&action=index' . $user_id);
				exit;
			}
	
			// Kiểm tra kích thước file
			if ($_FILES["fileToUpload"]["size"] > 5000000) {
				$_SESSION['err'] = "Sorry, your file is too large.";
				header('Location: index.php?page=main&controller=layouts&action=index' . $user_id);
				exit;
			}
	
			// Kiểm tra lỗi upload
			if ($_FILES['fileToUpload']['error'] !== UPLOAD_ERR_OK) {
				$_SESSION['err'] = "Error occurred during file upload.";
				header('Location: index.php?page=main&controller=layouts&action=index' . $user_id);
				exit;
			}
	
			// Di chuyển file mới
			if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				$_SESSION['err'] = "Error occurred while moving the uploaded file.";
				header('Location: index.php?page=main&controller=layouts&action=index' . $user_id);
				exit;
			}
		}
		// Update
		$change_info = User::update($email, $target_file, $fname, $lname, $gender, $age, $phone);
		header('Location: index.php?page=main&controller=layouts&action=index');
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