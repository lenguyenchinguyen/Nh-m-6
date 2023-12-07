<h1>THÊM MỚI TÀI KHOẢN</h1>
<form action="index.php?act=add-user" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
    <div class="mb-3">
        <label for="" class="form-label">ID khách hàng</label>
        <input type="text" name="id" id="id" placeholder="Auto tăng" disabled class="form-control" aria-describedby="">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">User</label>
        <input type="text" class="form-control" name="user" id="user" placeholder="Nhập tên người dùng">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Password</label>
        <input type="password" class="form-control" name="pass" id="pass" placeholder="nhập password">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Nhập email">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Address</label>
        <input type="text" class="form-control" name="address" id="address" placeholder="Nhập địa chỉ">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Tel</label>
        <input type="text" class="form-control" name="tel" id="tel" placeholder="Nhập vào SDT">
    </div>
    <div class="mb-3">
        <label for="">Role</label>
        <div class="form-control">
            <label for="" class="radio-inline"><input type="radio" name="role" value="0">Khách hàng</label>
            <label for="" class="radio-inline"><input type="radio" name="role" value="1" checked>Nhân viên</label>
        </div>
    </div>

    <div id="error_message"></div>

    <button type="submit" name="btn-add" class="btn btn-primary">Submit</button>
    <button type="reset" class="btn btn-primary">Nhập lại</button>
    <a href="index.php?act=list-user"><input class="btn btn-primary" type="button" value="DANH SÁCH"/></a>
</form>

<script>
    function validateForm() {
    var user = document.getElementById("user").value; // Lấy giá trị trong trường "User"
    var pass = document.getElementById("pass").value; // Lấy giá trị trong trường "Password"
    var email = document.getElementById("email").value; // Lấy giá trị trong trường "Email"
    var address = document.getElementById("address").value; // Lấy giá trị trong trường "Address"
    var tel = document.getElementById("tel").value; // Lấy giá trị trong trường "Tel"

    // Kiểm tra nếu có trường nào bị bỏ trống, hiển thị thông báo và ngăn form submit

    if (user.trim() === "") {
        document.getElementById("error_message").innerHTML = "Vui lòng nhập họ tên";
        return false; // Ngăn form submit
    }

    if (pass.trim() === "") {
        document.getElementById("error_message").innerHTML = "Vui lòng nhập mật khẩu";
        return false; // Ngăn form submit
    }

    if (email.trim() === "") {
        document.getElementById("error_message").innerHTML = "Vui lòng nhập địa chỉ email";
        return false; // Ngăn form submit
    }

    if (address.trim() === ""){
        document.getElementById("error_message").innerHTML = "Vui lòng nhập địa chỉ";
        return false; // Ngăn form submit
    }

    if (tel.trim() === "") {
        document.getElementById("error_message").innerHTML = "Vui lòng nhập số điện thoại";
        return false; // Ngăn form submit
    }

    // Kiểm tra xem trường SĐT có chỉ chứa số hay không
    var telRegex = /^\d+$/;
    if (!telRegex.test(tel)) {
        document.getElementById("error_message").innerHTML = "Số điện thoại chỉ được nhập số";
        return false; // Ngăn form submit
    }

    // Nếu tất cả các trường đều được nhập đầy đủ và SĐT chỉ chứa số, cho phép form submit
    return true;
}

</script>
