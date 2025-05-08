<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: index.php?page=admin&controller=login&action=index");
}
?>
<?php require_once('views/admin/header.php'); ?>
<?php require_once('views/admin/content_layouts.php'); ?>

<div class="content-wrapper">
    <!-- Tiêu đề trang -->
    <h1 style="margin-left: 10px">Bình luận đánh giá</h1>
    
    <section class="content">
        <div class="container-fluid"> 
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <!-- Nút Thêm mới + Modal Thêm mới -->
                            <button class="btn btn-primary mb-3" type="button" data-toggle="modal" data-target="#addUserModal">
                                Thêm mới
                            </button>
                            <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModal" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Thêm mới bình luận</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="index.php?page=admin&controller=comments&action=add" method="post">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Nội dung</label>
                                                    <input class="form-control" type="text" name="content" placeholder="Nội dung" />
                                                </div>
                                                <div class="form-group">
                                                    <label>ID bài viết</label>
                                                    <select class="form-control" name="news_id">
                                                        <?php foreach ($news as $new): ?>
                                                            <option value="<?= $new->id ?>"><?= $new->id ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Người dùng</label>
                                                    <select class="form-control" name="user_id">
                                                        <?php foreach ($users as $user): ?>
                                                            <option value="<?= $user->id ?>"><?= $user->email ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Đóng</button>
                                                <button class="btn btn-primary" type="submit">Thêm mới</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Bảng dữ liệu -->
                            <div class="table-responsive">
                                <table id="tab-comment" class="table table-bordered table-striped" style="margin-top:6px;">
                                    <thead>
                                        <tr class="text-center">
                                            <th>STT</th>
                                            <th>Mã bài viết</th>
                                            <th>Ngày</th>
                                            <th>Tiếp cận</th>
                                            <th>Nội dung</th>
                                            <th>Người dùng bình luận</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $index = 1;
                                        foreach ($comments as $comment):
                                            $status = $comment->approved ? 'Post' : 'Hide';
                                            $btnToggle = $comment->approved
                                                ? "<button class=\"btn-hide btn btn-danger btn-xs mr-1\" data-id=\"{$comment->id}\"><i class=\"fas fa-eye-slash\"></i></button>"
                                                : "<button class=\"btn-hide btn btn-success btn-xs mr-1\" data-id=\"{$comment->id}\"><i class=\"fas fa-eye\"></i></button>";
                                        ?>
                                        <tr class="text-center">
                                            <td><?= $index++ ?></td>
                                            <td><?= $comment->news_id ?></td>
                                            <td><?= $comment->date ?></td>
                                            <td><?= $status ?></td>
                                            <td><?= htmlspecialchars($comment->content) ?></td>
                                            <td><?= $comment->user_id ?></td>
                                            <td>
                                                <?= $btnToggle ?>
                                                <button class="btn-edit btn btn-primary btn-xs mr-1"
                                                    data-id="<?= $comment->id ?>"
                                                    data-content="<?= htmlspecialchars($comment->content) ?>">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn-delete btn btn-danger btn-xs"
                                                    data-id="<?= $comment->id ?>">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Modals (Đã di chuyển ra ngoài table) -->

                            <!-- Ẩn/Hiện bình luận -->
                            <div class="modal fade" id="HideStudentModal" tabindex="-1" role="dialog" aria-labelledby="HideStudentModal" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content bg-warning">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Ẩn/Hiện bình luận</h5>
                                            <button class="close" type="button" data-dismiss="modal"><span>&times;</span></button>
                                        </div>
                                        <form action="index.php?page=admin&controller=comments&action=hide" method="post">
                                            <div class="modal-body">
                                                <input type="hidden" name="id" />
                                                <p>Bạn có chắc chắn thay đổi trạng thái?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Đóng</button>
                                                <button class="btn btn-warning" type="submit">Xác nhận</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Xóa bình luận -->
                            <div class="modal fade" id="DeleteStudentModal" tabindex="-1" role="dialog" aria-labelledby="DeleteStudentModal" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content bg-danger">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Xóa bình luận</h5>
                                            <button class="close" type="button" data-dismiss="modal"><span>&times;</span></button>
                                        </div>
                                        <form action="index.php?page=admin&controller=comments&action=delete" method="post">
                                            <div class="modal-body">
                                                <input type="hidden" name="id" />
                                                <p>Bạn có chắc chắn muốn xóa?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Đóng</button>
                                                <button class="btn btn-danger" type="submit">Xóa</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Chỉnh sửa bình luận -->
                            <div class="modal fade" id="EditStudentModal" tabindex="-1" role="dialog" aria-labelledby="EditStudentModal" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Chỉnh sửa bình luận</h5>
                                            <button class="close" type="button" data-dismiss="modal"><span>&times;</span></button>
                                        </div>
                                        <form action="index.php?page=admin&controller=comments&action=edit" method="post">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>ID</label>
                                                    <input class="form-control" type="text" name="id" readonly />
                                                </div>
                                                <div class="form-group">
                                                    <label>Nội dung</label>
                                                    <input class="form-control" type="text" name="content" />
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Đóng</button>
                                                <button class="btn btn-primary" type="submit">Lưu thay đổi</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div><!-- /.card-body -->
                    </div><!-- /.card -->
                </div><!-- /.col-12 -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<?php require_once('views/admin/footer.php'); ?>

<!-- Add Javascripts -->
<script src="public/js/comments/index.js"></script>
<script src="public/plugins/moment/moment.min.js"></script>
</body>
</html>
