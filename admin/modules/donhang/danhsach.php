<div class="row">
  <div class="col-12">
  <?php
              if(isset($_GET['category'])){
                $data = getProductByCategory($_GET['category']);
              }else{
                $data = getAllProduct();
              }
            ?>
            <div class="card">
               <div class="card-heard">
                  Lọc sản phẩm
               </div>
               <div class="card-body">
                <?php
                    if(!empty(getAllProductCategories())):
                ?>
                <form action="/admin/index.php" class="form-inline" method = "GET">
                  <input type="hidden" name="pages" value="product">
                  <input type="hidden" name="action" value="list">
                  <select name="category" id="category" class="form-control mr-3">
                      <?php foreach(getAllProductCategories() as $category): ?>
                        <option
                          <?= (isset($_GET['category'])&&$_GET['category']===$category['id'])? 'selected':'' ?>
                          value="<?= $category['id'] ?>">
                                  <?= $category['name'] ?>
                        </option>
                        <?php endforeach;?>
                  </select>
                        <button type="submit" class="btn btn-primary">
                           Lọc dữ liệu
                        </button>
                </form>
                <?php endif; ?>
               </div>
            </div>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Danh sách đơn hàng</h3>

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
                <th>Tên người nhận</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Địa chỉ </th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($data as $others) :
              ?>
                <tr>
                  <td><?= $others['id'] ?></td>
                  <td><?= $others['name'] ?></td>
                  <td><?= $others['email'] ?></td>
                  <td><?= $others['sodienthoai'] ?></td>
                  <td><?= $others['diachi'] ?></td>
                  <td>
                    <?= number_format($product['sale_price'], 0 , ',' , '.')  ?> <br>
                    Giá gốc: <del><?= $product['sale_price']  ?></del>
                  </td>
                  <td><?= date('d-m-Y', strtotime($product['created_at'])) ?></td>
                  <td>
                    <a href="" class="btn btn-primary">Sửa</a>
                    <a href="" class="btn btn-primary">Xóa</a>
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