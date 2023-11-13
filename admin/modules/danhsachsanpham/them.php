<?php 
// khi bấm submit thì hứng dữ liệu product  chuyền giá trị vào function thực hiện câu truy vấn để thêm sản phẩm
if ($_SERVER["REQUEST_METHOD"] == "POST"){ 
$name = $_POST['name'];

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
$price = $_POST['price'];
$sale_price = $_POST['sale_price'];
$product_category_id = $_POST['product_category_id']??1;
echo $slug." ".$image_url ." ". $sale_price;
createProduct($name, $slug, $image_url, $price,$sale_price, $product_category_id, $content);
}

?>


<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Thêm sản phẩm</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">
                <label for="name">Tiêu đề sản phẩm</label>
                <input type="text"  class="form-control"  id="name" required name="name" placeholder="Vui lòng nhập tiêu đề sản phẩm">
            </div>
            <div class="form-group">
                <label for="thumbnail">Ảnh đại diện</label>
                <input type="file" required  class="form-control" id="thumbnail" name="thumbnail">
            </div>
            <div class="form-group">
                <label for="product_category_id">Danh mục</label>
                <input type="text" required  class="form-control" id="product_category_id" name="product_category_id">
            </div>
            <div class="form-group">
                <label for="summernote">Nội dung </label>
                <textarea class="form-control" required  id="summernote" name="content"></textarea>
            </div>
            <div class="form-group">
                <label for="price">Giá bán thường</label>
                <input type="number" class="form-control" id="price" name="price">
            </div>
            <div class="form-group">
                <label for="sale_price">Giá khuyến mãi</label>
                <input type="text" class="form-control" id="sale_price"  required name="sale_price" >
            </div>
            </div> 
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </form>
</div>
