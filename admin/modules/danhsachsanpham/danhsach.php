  
<?php
if(isset($_GET['action']) && $_GET['action'] == 'xoa'){
if(isset($_GET['id'])){
  // Lấy id cần xóa
  $id = $_GET['id'];

  // Câu query
  $query = "DELETE FROM products WHERE id = $id";

  // Thực hiện câu query
  if(mysqli_query($connection, $query)){
      echo 'xóa thành công';
  }else{  
      echo "Có lỗi khi xóa sản phẩm";
  }

  // mysqli_close($connection);
}
}
if (isset($_GET['category'])) {
  $data = getProductByCategory($_GET['category']);
} else {
  $data = getAllProduct();
}
?>
<div class="card">
  <div class="card-header">
    Lọc sản phẩm
  </div>
  <div class="card-body">
    <?php if (!empty(getAllProductCategories())) : ?>
      <form action="/admin/index.php" class="form-inline" method="GET">
        <input type="hidden" name="pages" value="danhsachsanpham">
        <input type="hidden" name="action" value="danhsach">
        <select name="category" id="category" class="form-control mr-3">
          <?php foreach (getAllProductCategories() as $category) : ?>
            <option <?= (isset($_GET['category']) && $_GET['category'] === $category['id']) ? 'selected' : '' ?> value="<?= $category['id'] ?>">
              <?= $category['name'] ?>
            </option>
          <?php endforeach; ?>
        </select>
        <button type="submit" class="btn btn-primary">
          Lọc dữ liệu
        </button>
      </form>
    <?php endif; ?>
  </div>
</div>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Danh sách sản phẩm</h3>
        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

            <div class="input-group-append">
              <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0" style="height: 300px;">
        <?php
        if (!empty(getAllProduct())) :
        ?>
          <table class="table table-head-fixed text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Giá sản phẩm</th>
                <th>Ngày đăng</th>
                <th>Hành động </th>
                <th>ảnh</th>
                
              </tr> 
            </thead>
            <tbody>
              <?php
              foreach ($data as $product) : ?>
                <tr>
                  <td><?= $product['id'] ?></td>
                  <td><?= $product['name'] ?></td>
          
                  <td>
                    <?= number_format($product['sale_price'], 0, ',', '.')  ?> <br>
                    Giá gốc: <del><?= number_format($product['price'], 0, ',', '.')  ?></del>
                  </td>
                  <td><?=  date('d-m-Y', strtotime($product['created_at']))  ?></td>
                  <td>
                    <a href="/admin/?pages=danhsachsanpham&action=sua&id=<?=$product['id']?>" class="btn btn-primary">Sửa</a>
                    <a href="/admin/?pages=danhsachsanpham&action=xoa&id=<?=$product['id']?>" class="btn btn-danger">Xóa</a>
                  </td>
                  <td>
                    <img src="/admin/<?= $product['thumbnail'] ?>" width="50" alt="">
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        <?php else : ?>
          <div class="card-body">
            <p>Đang cập nhật dữ liệu</p>
          </div>
        <?php endif; ?>
      </div>
      <!-- /.card-body -->
    </div>
  <?php 
