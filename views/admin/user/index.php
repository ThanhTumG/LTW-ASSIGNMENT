<?php
session_start();
if (!isset($_SESSION["user"])) {
	header("Location: index.php?page=admin&controller=login&action=index");
}
?>
<?php
require_once('views/admin/header.php'); ?>

<!-- Add CSS -->


<?php
require_once('views/admin/content_layouts.php'); ?>


<!-- Code -->
<div class="content-wrapper">
	<!-- Add Content -->
	<!-- Content Header (Page header)-->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Quản lý Liên hệ khách hàng</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Quản lý Liên hệ khách hàng</li>
					</ol>
				</div>
			</div>
		</div>
		<!-- /.container-fluid-->
	</section>
	<!-- Main content-->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<!-- Button trigger modal-->
							 <div class="row gap-3">
								 <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addUserModal">Thêm mới</button>
								 <?php
								if (isset($_SESSION['err'])) {
									echo '<p class="text-danger">' . htmlspecialchars($_SESSION['err']) . '</p>';
									unset($_SESSION['err']); // Xóa lỗi sau khi hiển thị
								}
								?>
								</div>
							<!-- Modal-->
							<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModal" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Thêm người dùng</h5>
											<button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										</div>
										<form action="index.php?page=admin&controller=user&action=add" enctype="multipart/form-data" method="post">
											<div class="modal-body">
												
												
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>Họ và tên lót</label>
															<input class="form-control" type="text" placeholder="Họ và tên lót" name="fname" 
																required pattern=".{2,30}" title="Họ phải từ 2-30 ký tự"/>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label>Tên</label>
															<input class="form-control" type="text" placeholder="Tên" name="lname" 
																required pattern=".{2,30}" title="Tên phải từ 2-30 ký tự"/>
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>Tuổi</label>
															<input class="form-control" type="number" placeholder="Tuổi" name="age" 
																required min="1" title="Tuổi phải là số dương"/>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label>Giới tính:</label>
															<div class="row">
																<div class="col-md-4">
																	<div class="form-check">
																		<input class="form-check-input" type="radio" name="gender" value="1" required/>
																		<label>Nam</label>
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-check">
																		<input class="form-check-input" type="radio" name="gender" value="0" required/>
																		<label>Nữ</label>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>

												<div class="form-group">
													<label>Số điện thoại</label>
													<input class="form-control" type="tel" placeholder="Số điện thoại" name="phone" 
														required pattern="[0-9]{10}" title="Số điện thoại phải có đúng 10 chữ số"/>
												</div>

												<div class="form-group">
													<label>Email</label>
													<input class="form-control" type="email" placeholder="Email" name="email" 
														required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Email không hợp lệ"/>
												</div>

												<div class="form-group">
													<label>Mật khẩu</label>
													<input class="form-control" type="password" placeholder="Mật khẩu" name="password" 
														required pattern="[a-zA-Z0-9]{8,}" title="Mật khẩu phải ít nhất 8 ký tự và không chứa ký tự đặc biệt"/>
												</div>

												<div class="form-group">
													<label>Hình ảnh</label>
													<input type="file" name="fileToUpload" id="fileToUpload" accept=".jpg,.jpeg,.png,.gif" required/>
												</div>
											</div>
											<div class="modal-footer">
												<button class="btn btn-secondary" type="button" data-dismiss="modal">Đóng lại</button>
												<button class="btn btn-primary" type="submit">Thêm mới</button>
											</div>
										</form>
									</div>
								</div>
							</div>

							<table class="table table-bordered table-striped" id="tab-user">
								<thead>
									<tr class="text-center">
										<th>STT</th>
										<th>Hình ảnh</th>
										<th>Họ và tên lót</th>
										<th>Tên</th>
										<th>Giới tính</th>
										<th>Tuổi</th>
										<th>Số điện thoại</th>
										<th>Email</th>
										<th>Thao tác</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$index = 1;
									foreach ($user as $user) {
										echo "<tr class='text-center' style='height:300px; line-height:300px; white-space: nowrap;'>";
										echo "<td>" . $index++ . "</td>";
										echo "<td><div style=\"width: 200px;\" ><img style=\"width: 200px;\" src='$user->profile_photo'> </div></td>";
										echo "<td>" . $user->fname . "</td>";
										echo "<td>" . $user->lname . "</td>";
										echo "<td>" . (($user->gender == 1) ? "Nam" : "Nữ") . "</td>";
										echo "<td>" . $user->age . "</td>";
										echo "<td>" . $user->phone . "</td>";
										echo "<td>" . $user->email . "</td>";
										echo "<td>
											<btn class='btn-edit btn btn-primary btn-xs' style='margin-right: 5px' data-email='$user->email' data-fname='$user->fname' data-lname='$user->lname' data-gender='$user->gender' data-age='$user->age' data-phone='$user->phone' data-img='$user->profile_photo'> <i class='fas fa-edit'></i></btn>
											<btn class='btn-changepass btn btn-warning btn-xs' style='margin-right: 5px' data-email='$user->email'> <i class='fas fa-lock'></i></btn>
											<btn class='btn-delete btn btn-danger btn-xs' style='margin-right: 5px' data-email='$user->email' data-img='$user->profile_photo'> <i class='fas fa-trash'></i></btn>
											</td>";
										echo "</tr>";
									}
									?>
								</tbody>
							</table>

							<div class="modal fade" id="EditUserModal" tabindex="-1" role="dialog" aria-labelledby="EditUserModal" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Chỉnh sửa</h5>
											<button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										</div>
										<form action="index.php?page=admin&controller=user&action=editInfo" enctype="multipart/form-data" method="post">
											<div class="modal-body">
												<input type="hidden" name="email">
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<div class="row"> </div>
															<label>Họ và tên lót</label>
															<input class="form-control" type="text" placeholder="Họ và tên lót" name="fname" 
																required pattern=".{2,30}" title="Họ phải từ 2-30 ký tự"/>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<div class="row"> </div>
															<label>Tên</label>
															<input class="form-control" type="text" placeholder="Tên" name="lname" required pattern=".{2,30}" title="Tên phải từ 2-30 ký tự"/>
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>Tuổi</label>
															<input class="form-control" type="number" placeholder="Tuổi" name="age" 
															required min="1" title="Tuổi phải là số dương" />
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label>Giới tính:</label>
															<div class="row">
																<div class="col-md-4">
																	<div class="form-check">
																		<input class="form-check-input" type="radio" name="gender" value="1" id="Nam" require/>
																		<label>Nam</label>
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-check">
																		<input class="form-check-input" type="radio" name="gender" value="0" id="Nu"required />
																		<label>Nữ</label>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>

												<div class="form-group">
													<label>Số điện thoại</label>
													<input class="form-control" type="tel" placeholder="Số điện thoại" name="phone" 
													required pattern="[0-9]{10}" title="Số điện thoại phải có đúng 10 chữ số"/>
												</div>
												<div class="form-group">
													<label>Hình ảnh hiện tại </label>
													<input class="form-control" type="text" name="img" readonly />
												</div>
												<div class="form-group">
													<label>Hình ảnh mới</label>&nbsp
													<input type="file" name="fileToUpload" id="fileToUpload" />
													
												</div>
											</div>
											<div class="modal-footer">
												<button class="btn btn-secondary" type="button" data-dismiss="modal">Đóng lại</button>
												<button class="btn btn-primary" type="submit">Cập nhật</button>
											</div>
										</form>
									</div>
								</div>
							</div>

							<div class="modal fade" id="EditPassModal" tabindex="-1" role="dialog" aria-labelledby="EditPassModal" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Chỉnh sửa</h5>
											<button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										</div>
										<form action="index.php?page=admin&controller=user&action=editPass" method="post">
											<div class="modal-body">
												<input type="hidden" name="id" />
												<div class="form-group">
													<label>Email</label>
													<input class="form-control" type="text" placeholder="Email" name="email" readonly />
												</div>
												<div class="form-group">
													<label>New password</label>
													<input class="form-control" type="password" placeholder="Please enter your new password" name="new-password" />
												</div>
											</div>
											<div class="modal-footer">
												<button class="btn btn-secondary" type="button" data-dismiss="modal">Đóng lại</button>
												<button class="btn btn-primary" type="submit">Cập nhật</button>
											</div>
										</form>
									</div>
								</div>
							</div>

							<div class="modal fade" id="DeleteUserModal" tabindex="-1" role="dialog" aria-labelledby="DeleteUserModal" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content bg-danger">
										<div class="modal-header">
											<h5 class="modal-title">Xóa</h5>
											<button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										</div>
										<form action="index.php?page=admin&controller=user&action=delete" method="post">
											<div class="modal-body">
												<input type="hidden" name="email" />
												<input type="hidden" name="img" />
												<p>Bạn chắc chưa ?</p>
											</div>
											<div class="modal-footer">
												<button class="btn btn-danger btn-outline-light" type="button" data-dismiss="modal">Đóng lại</button>
												<button class="btn btn-danger btn-outline-light" type="submit">Xác nhận</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


	</section>
</div>


<?php
require_once('views/admin/footer.php'); ?>

<!-- Add Javascripts -->
<script src="public/js/user/index.js"></script>
</body>

</html>