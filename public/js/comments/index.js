$(document).ready(function () {
    $("#tab-comment").DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        language: {
            url: "//cdn.datatables.net/plug-ins/1.10.25/i18n/Vietnamese.json"
        },
        columnDefs: [
            // Chỉ tắt searchable cho STT(0), Tiếp cận(3), Thao tác(6)
            { searchable: false, targets: [0, 3, 6] },
            // (tuỳ chọn) tắt order trên cột Thao tác
            { orderable: false, targets: 6 }
        ]
    });
});

$(".btn-edit").click(function (e) {
    var id = $(this).data("id");
    var content = $(this).data("content");
    // console.log(content);
    $("#EditStudentModal input[name='id']").val(id);
    $("#EditStudentModal input[name='content']").val(content);
    $('#EditStudentModal').modal('show');
});

$(".btn-delete").click(function (e) {
    var id = $(this).data("id");
    $("#DeleteStudentModal input[name='id']").val(id);
    $('#DeleteStudentModal').modal('show');
});
$(".btn-hide").click(function (e) {
    var id = $(this).data("id");
    $("#HideStudentModal input[name='id']").val(id);
    $('#HideStudentModal').modal('show');
});