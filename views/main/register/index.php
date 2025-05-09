<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
  
	<title>GARENA</title>
	<meta content="" name="description">
	<meta content="" name="keywords">
  
	<!-- Favicons -->
	<link href="uploads/favicon.ico" rel="icon">
  
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  
	<!-- Vendor CSS Files -->
	<link href="public/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
	<link href="public/assets/vendor/aos/aos.css" rel="stylesheet">
	<link href="public/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="public/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="public/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="public/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
	<link href="public/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
	<link href="public/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  
	<link href="public/assets/css/style.css" rel="stylesheet">
	<link href="public/assets/css/main.css" rel="stylesheet">
	<link href="public/assets/css/util.css" rel="stylesheet">
</head>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form action="index.php?page=main&controller=register&action=submit" method="POST" class="login100-form validate-form">
					<span class="login100-form-title p-b-20">
						<strong>ĐĂNG KÝ</strong>
					</span>

					<?php
						if (isset($err))
						{
							echo '<p class="login-box-msg" style="color: red">' . $err . '</p>';
							unset($err);
						}
					?>	

				<div class="form-floating mb-3" data-validate="Valid email is required">
						<input type="email" class="form-control" name="email" id="floatingInput" 
							placeholder="name@example.com" required 
							pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
						<label for="floatingInput">Tài Khoản</label>
					</div>
					
					<div class="form-floating mb-3" data-validate="Password must be at least 8 characters, no special characters">
						<input type="password" class="form-control" name="pass" id="floatingPassword" 
							placeholder="Password" required 
							pattern="[a-zA-Z0-9]{8,}"
							title="Mật khẩu phải ít nhất 8 ký tự và không chứa ký tự đặc biệt">
						<label for="floatingPassword">Mật Khẩu</label>
					</div>

					<div class="form-floating mb-3 validate-input" data-validate="First name must be 2-30 characters">
						<input type="text" class="form-control" name="fname" id="floatingFname" 
							placeholder="First name" required 
							pattern=".{2,30}"
							title="Họ phải từ 2-30 ký tự">
						<span class="focus-input100"></span>
						<label for="floatingFname">Họ và tên lót</label>
					</div>

					<div class="form-floating mb-3 validate-input" data-validate="Last name must be 2-30 characters">
						<input type="text" class="form-control" name="lname" id="floatingLname" 
							placeholder="Last name" required 
							pattern=".{2,30}"
							title="Tên phải từ 2-30 ký tự">
						<span class="focus-input100"></span>
						<label for="floatingLname">Tên</label>
					</div>

					<div class="form-floating mb-3 validate-input" data-validate="Age must be a positive number">
						<input type="number" class="form-control" name="age" id="floatingAge" 
							placeholder="Age" required 
							min="1"
							title="Tuổi phải là số dương">
						<span class="focus-input100"></span>
						<label for="floatingAge">Tuổi</label>
					</div>

					<div class="form-floating validate-input" data-validate="Phone must be 10 digits">
						<input type="tel" class="form-control" name="phone" id="floatingPhone" 
							placeholder="Phone number" required 
							pattern="[0-9]{10}"
							title="Số điện thoại phải có đúng 10 chữ số">
						<span class="focus-input100"></span>
						<label for="floatingPhone">Số điện thoại</label>
					</div>

					<div class="form-check" style="padding-left: 0;" data-validate="Gender is required">
						<div class="row">
							<label class="col-md-3 col-form-label">Giới tính:</label>    
						</div>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="gender" value="1" required>
						<label class="form-check-label">Nam</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="gender" value="0" required>
						<label class="form-check-label">Nữ</label>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div>
							<a href="index.php?page=main&controller=login&action=index" class="txt1">
								Trở về trang Đăng nhập!
							</a>
						</div>

						<div>
							<a href="index.php?page=main&controller=layouts&action=index" class="txt1">
								Trở về trang chủ!
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<input class="login100-form-btn" type="submit" value="Đăng ký tài khoản">
					</div>
				</form>

				<div class="login100-more" style="background-image: url('public/assets/img/slide/garena_campus.jpg');">
				</div>
			</div>
		</div>
	</div>
	
</body>
</html>