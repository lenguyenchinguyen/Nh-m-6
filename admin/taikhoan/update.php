<h1>THÊM MỚI SẢN PHẨM</h1>
<form action="index.php?act=update-user" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="" class="form-label">ID khách hàng</label>
        <input type="text" name="id" placeholder="" disabled class="form-control" aria-describedby="">
        <input type="hidden" name="id" value="<?php echo $user['id'] ?>" />
    </div>
    <div class="mb-3">
        <label for="" class="form-label">User</label>
        <input type="text" class="form-control" name="user" placeholder="Nhập vào tên" value="<?php echo $user['user'] ?>">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Password</label>
        <input type="password" class="form-control" name="pass" placeholder="" value="<?php echo $user['pass'] ?>">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" placeholder="Nhập email" value="<?php echo $user['email'] ?>">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Address</label>
        <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ" value="<?php echo $user['address'] ?>">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Tel</label>
        <input type="text" class="form-control" name="tel" placeholder="Nhập vào sđt" value="<?php echo $user['tel'] ?>">
    </div>
    <div class="mb-3">
        <label for="">Role</label>
        <div class="form-control">
            <label for="" class="radio-inline"><input type="radio" name="role" value="0">Khách hàng </label>
            <label for="" class="radio-inline"><input type="radio" name="role" value="1" checked>Nhân viên</label>
        </div>
    </div>


    <button type="submit" name="btn-update" class="btn btn-primary">Submit</button>
    <button type="reset" class="btn btn-primary">Nhập lại</button>
    <a href="index.php?act=list-account"><input class="btn btn-primary" type="button" value="DANH SÁCH" /></a>
</form>