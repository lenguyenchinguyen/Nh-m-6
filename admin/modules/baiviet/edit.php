<?php
// tìm thấy $_GET['id'] thì sử lí tiếp
//khong thấy thì trả về trang 404

//  lấy id từ get từ đường dẫn sau đó truyền vào function getonepost lấy dữ liệu của bài viết cần chỉnh sửa sau đó in ra
//sau khi bấm submit hứng dữ liệu truyền vào function update để thụcư hiện câu truy vấn chỉnh sửa 
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = getOnePost($id);
    // tạo ra trang 404 r sử lí
    if ($_SERVER["REQUEST_METHOD"] == "POST"){ 
    $name = $_POST['tieuDe'];
    $slug = create_slug($name);
    $content = $_POST['content'];
    $post_category_id = $_POST['post_category_id']??1;
    
    $thumnail = $_FILES['thumbnail'];

    $folder_name = "uploads/" . date('Y')."/".date('m');
    if(!is_dir($folder_name)){
        mkdir($folder_name, 0777,true);
    }

    $file = $thumnail['tmp_name'];
    $error = $thumnail['error'];
    $image_url = $folder_name.'/'.$thumnail['name'];

    if($error == 0 && move_uploaded_file($file, $image_url)){
        echo "upload xong";
    }else{
        echo "upload lỗi";
    }
    updatePost($name, $slug, $image_url , $post_category_id, $content, $id);
    } 
}


?>





<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Bài viết</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputText1">Tiêu đề bài viết </label>
                <input name="tieuDe" value="<?= $data['name'] ?>" required type=" text" class="form-control" id="exampleInputText1"
                    placeholder="nhập tên bài viết">

                <?php if(isset($_SESSION['error']) && $_SESSION['error']['tieuDe']):?>
                <small class="text-danger">xin mời nhập tiêu đề và không để trống</small>
                <?php 
                unset($_SESSION['error']['tieuDe']);
                endif;
                ?>
            </div>
            <div class="form-group">
                <label for="exampleInputText1">Danh muc</label>
                <input name="post_category_id" type=" text" required value="<?= $data['category_id'] ?>" class="form-control" id="exampleInputText1"
                    placeholder="nhập tên bài viết">
                
                <?php if(isset($_SESSION['error']) && $_SESSION['error']['danhmuc']):?>
                <small class="text-danger">xin mời nhập danh muc và không để trống</small>
                <?php 
                unset($_SESSION['error']['danhmuc']);
                endif;
                ?>
            </div>
            <div class="form-group">
                <label for="exampleInputFile"> hình ảnh</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name="thumbnail" value="<?= $data['thumbnail'] ?>" class="custom-file-input" id="exampleInputFile" multiple>
                        <label class="custom-file-label" for="exampleInputFile">Chọn file</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">Tải lên</span>
                    </div>
                </div>
            </div>
        </div>
            <div class="form-group">
                <label for="summernote" style="display:block;">Nội dung</label>
                <textarea id="summernote" name="content" placeholder="nhập nội dung" value="<?= $data['content'] ?>"></textarea>
            </div>
            <div class="form-group">
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Đăng</button>
        </div>
    </form>
            </div>