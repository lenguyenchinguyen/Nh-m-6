
<?php
// tìm thấy $_GET['id'] thì sử lí tiếp
//khong thấy thì trả về trang 404

//  lấy id từ get từ đường dẫn sau đó truyền vào function getonepost lấy dữ liệu của bài viết cần chỉnh sửa sau đó in ra
// sau khi bấm submit hứng dữ liệu truyền vào function update để thụcư hiện câu truy vấn chỉnh sửa 
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // tạo ra trang 404 r sử lí
    if ($_SERVER["REQUEST_METHOD"] == "POST"){ 
    $name = $_POST['name'];
    $slug = create_slug($name);
    $content = $_POST['content'];
    $price = $_POST['price'];
    $sale_price = $_POST['sale_price'];
    $product_category_id = $_POST['product_category_id']??1;
    
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
    updateProduct($name, $slug, $image_url, $price, $sale_price, $product_category_id, $content, $id);

    }
    $data = getOneProduct($id);
}

?>


<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"> Sửa sản phẩm</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">
                <label for="name">Tiêu đề sản phẩm</label>
                <input type="text" value="<?= $data['name']?? ''?>" class="form-control"  id="name" required name="name" placeholder="Vui lòng nhập tiêu đề sản phẩm">
            </div>
            <div class="form-group">
                <label for="thumbnail">Ảnh đại diện</label>
                <input type="file" required value="<?= $data['thumbnail']?? '' ?>" class="form-control" id="thumbnail" name="thumbnail">
            </div>
            <div class="form-group">
                <label for="product_category_id">Danh mục</label>
                <input type="text" required  class="form-control" id="product_category_id" name="product_category_id">
            </div>
            <div class="form-group">
                <label for="summernote">Nội dung </label>
                <textarea class="form-control" required  id="summernote" name="content"><?= $data['content']?? '' ?></textarea>
            </div>
            <div class="form-group">
                <label for="price">Giá bán thường</label>
                <input type="number" value="<?= $data['price']?? '' ?>" class="form-control" id="price" name="price">
            </div>
            <div class="form-group">
                <label for="sale_price">Giá khuyến mãi</label>
                <input type="text" class="form-control" value="<?= $data['sale_price']?? '' ?>" id="sale_price"  required name="sale_price" >
            </div>
            <!-- <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input t ype="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Tải lên</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <textarea id="summernote"></textarea>
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
                </div> -->
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </form>
</div>