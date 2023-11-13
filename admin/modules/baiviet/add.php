<?php
// khi bấm submit thì hứng dữ liệu post chuyền giá trị vào function thực hiện câu truy vấn để tạo bài viết  
if ($_SERVER["REQUEST_METHOD"] == "POST"){ 
$name = $_POST['tieuDe'];
echo $name;
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



$slug = create_slug($name);
$content = $_POST['content'];
$post_category_id = $_POST['post_category_id']??1;
echo $slug." ".$image_url;
createPost($name, $slug, $image_url,$post_category_id, $content);
}
?>



<?php
    // echo "<pre>";
    // print_r($_FILES['thumbnail']);
    // echo "</pre>";
    // for($i = 0; $i < sizeof($_FILES['thumbnail']['name']);$i++)
    // {

    // }
    // $post = [
    //     "name" => $_POST['tieude'],

    // ];
    // var_dump($post);
?>


<?php
    // echo isset($_POST['tieuDe'])??"";
    // echo '<hr>';
    // echo isset($_POST['tieuDe'])?$_POST['tieuDe']:"";
    // echo '<hr>';
   
    // if(empty($_POST['tieuDe'])){
    //     $_SESSION['error']['tieuDe'] = true;
    // }
?>




<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Thêm Bài viết</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
            </div>
            <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputText1">Tiêu đề bài viết </label>
                <input name="tieuDe" type=" text" required class="form-control" id="exampleInputText1"
                    placeholder="nhập tên bài viết">

                <?php if(isset($_SESSION['error']) && $_SESSION['error']['tieuDe']):?>
                <small class="text-danger">xin mời nhập tiêu đề và không để trống</small>
                <?php 
                unset($_SESSION['error']['tieuDe']);
                endif;
                ?>
            </div>
            <div class="form-group">
                <label for="exampleInputText1">Danh mục</label>
                <input name="post_category_id" type=" text" class="form-control" id="exampleInputText1"
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
                        <input type="file" name="thumbnail" class="custom-file-input" id="exampleInputFile" multiple>
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
                <textarea id="summernote" name="content" placeholder="nhập nội dung">
              </textarea>
            </div>
            <div class="form-group">
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Đăng</button>
        </div>
    </form>
</div>
