
<?php
// xóa sản phẩm
if(isset($_GET['action']) && $_GET['action'] == 'xoa'){
if(isset($_GET['id'])){
  // Lấy id cần xóa
  $id = $_GET['id'];

  // Câu query
  $query = "DELETE FROM posts WHERE id = $id";

  // Thực hiện câu query
  if(mysqli_query($connection, $query)){
      echo 'xóa thành công';
  }else{  
      echo "Có lỗi khi xóa sản phẩm";
  }

}
}

if (isset($_GET['category'])){
  $data = getPostBycartegory($_GET['category']);
} else {
  $data = getAllPost();
}
?>
<div class="card">
  <div class="card-header">
    Lọc Bài Viết
  </div>
  <div class="card-body">
    <?php if (!empty(getAllPostCategories())) : ?>
      <form action="/admin/index.php" class="form-inline" method="GET">
        <input type="hidden" name="pages" value="baiviet">
        <input type="hidden" name="action" value="list">
        <select name="category" id="category" class="form-control mr-3">
          <?php foreach (getAllPostCategories() as $category) : ?>
            <option <?= (isset($_GET['category']) && $_GET['category'] === $category['id']) ? 'selected' : '' ?> value="<?= $category['id'] ?>">
              <?= $category['name'] ?>
            </option>
          <?php endforeach; ?>
        </select>
        <button type="submit" class="btn btn-primary">
          Lọc Dữ Liệu
        </button>
      </form>
    <?php endif; ?>
  </div>
</div>



<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Danh sách bài viết</h3>

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
        if (!empty(getAllPost())) :
        ?>
          <table class="table table-head-fixed text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>Tên bài viết</th>
                <th>Ngày đăng</th>
                <th>Hành động</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($data as $post) :
              ?>
                <tr>
                  <td><?=  $post['id'] ?></td>
                  <td><?=  $post['name'] ?></td>
                  <td><?= date('d-m-Y',  strtotime("2023-08-18")) ?></td>
                  <td>
                    <a href="/admin/?pages=baiviet&action=edit&id=<?=$post['id']?>" class="btn btn-primary">Sửa</a>
                    <a href="/admin/?pages=baiviet&action=xoa&id=<?=$post['id']?>" class="btn btn-primary">Xóa</a>
                  </td>
                </tr>
              <?php endforeach; ?>
          </table>
        <?php else : ?>
          <div class="card-body">
            <p>Đang cập nhật dữ liệu</p>
          </div>
        <?php endif; ?>
      </div>
      <!-- /.card-body -->
    </div>  