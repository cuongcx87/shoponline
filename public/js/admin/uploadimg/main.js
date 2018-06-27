// Xem hình ảnh trước khi upload
function previewImg(event) {
	// Gán giá trị các file vào biến files
    var files = document.getElementById('image').files; 

    // Show khung chứa ảnh xem trước
    $('#formUpload .box-preview-img').show();

    // Dùng vòng lặp for để thêm các thẻ img vào khung chứa ảnh xem trước
    for (i = 0; i < files.length; i++)
    {
    	// Thêm thẻ img theo i
        $('#formUpload .box-preview-img').append('<div class="col-lg-4" id="div' + i +'"><button id="' + i +'" type="button" class="close" aria-label="Close"><span aria-hidden="true" class="text-danger">&times;</span></button><img style="margin:10px 0px" width = "92%" src="" id="' + i +'"></div>');

        // Thêm src vào mỗi thẻ img theo id = i
        $('#formUpload .box-preview-img img:eq('+i+')').attr('src', URL.createObjectURL(event.target.files[i]));
    }

    // Dùng vòng lặp for để xóa các thẻ img
    for (i = 0; i < files.length; i++)
    {
        $('#'+i).click(function() {
            var id = $(this).attr('id');
            // console.log(id);
            $('#div'+id).remove();
            // $(this).remove();
        });
    }    

    // Nút reset form upload
    $('#formUpload .btn-reset').on('click', function() {
        // Làm trống khung chứa hình ảnh xem trước
        $('#formUpload .box-preview-img').html('');

        // Hide khung chứa hình ảnh xem trước
        $('#formUpload .box-preview-img').hide();
    });
}

// 