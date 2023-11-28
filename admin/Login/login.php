<?
  ob_start () ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://use.typekit.net/rjb4unc.js"></script>
    <script>try{Typekit.load({ async: true });}catch(e){}</script>
    <title>Document</title>
</head>
<style>
@import url('https://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css');
@import url(https://fonts.googleapis.com/css?family=Lato:400,300,700);

html {
   height: 100%;
}

body {
/* Remember to use the other versions for IE 10 and older browsers! */
display: flex;
justify-content: center;
align-items: center;
min-height: 100%;
font-family: 'lato', sans-serif;
color: #fff;
background: #222222;
background: #16222A; /* fallback for old browsers */
background: -webkit-linear-gradient(to top, #16222A , #3A6073); /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to top, #16222A , #3A6073); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}

.container {
	background:rgba(58,63,68,0.5);
  border-radius: 5px;
  box-shadow: 0 1.5px 0 0 rgba(0,0,0,0.1);
  width:450px;
  display: flex;  
  flex-direction: column;
}

.logo{
  font-family: "museo-slab";  
  font-size:20px;
  text-align: center;
  padding: 20px 20px 0;
  margin:0;
}

.login-item {
	color: #ffff;
	padding:25px 25px 0;
	margin: 20px 20px 0;	
	border-radius: 3px;
}

input {
  border: 0;
  color: inherit;
  font: inherit;
  margin: 0;
  outline: 0;
  padding: 0;
  -webkit-transition: background-color .3s;
  transition: background-color .3s;
}

.user:before {
  content: '\f007';
  font: 14px fontawesome;
	color: #5b5b5b;
}

.lock:before {
  content: '\f023';
  font: 14px fontawesome;
	color: #5b5b5b;
}

.form input[type="password"], .form input[type="text"], .form input[type="submit"] {
  width: 100%;
}

.form-login label,
.form-login input[type="text"],
.form-login input[type="password"],
.form-login input[type="submit"] {
  border-radius: 0.25rem;
  padding: 1rem;
  color: #3A3F44;  
}

.form-login label {
  background-color: #222222;
  border-bottom-right-radius: 0;
  border-top-right-radius: 0;
  padding-left: 1.25rem;
  padding-right: 1.25rem;
}

.form-login input[type="text"], .form-login input[type="password"] {
  background-color: #ffffff;
  border-bottom-left-radius: 0;
  border-top-left-radius: 0;
}
.form-login input[type="text"]:focus, .form-login input[type="text"]:hover, .form-login input[type="password"]:focus, .form-login input[type="password"]:hover {
  background-color: #eeeeee;
}
.form-login input[type="submit"] {
  background-color: #00B9BC;
  color: #eee;
  font-weight: bold;
  text-transform: uppercase;
}
.form-login input[type="submit"]:focus, .form-login input[type="submit"]:hover {
  background-color: #197071;
}
.form-field {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  margin-bottom: 2rem;
}


.hidden {
  border: 0;
  clip: rect(0 0 0 0);
  height: 1px;
  margin: -1px;
  overflow: hidden;
  padding: 0;
  position: absolute;
  width: 1px;
}

.text--center {
  text-align: center;
}

 
</style>
<body>

<div class="container">
    <div class="logo">Đăng Nhập</div>
    <div class="login-item">
      <form action="" method="post" class="form form-login">
        <div class="form-field">
          <label class="user" for="login-username"><span class="hidden">Username</span></label>
          <input name = 'ten' id="login-username" type="text" class="form-input" placeholder="Nhập Họ Tên" required>
        </div>

        <div class="form-field">
          <label class="lock" for="login-password"><span class="hidden">Password</span></label>
          <input name = 'matKhau' id="login-password" type="password" class="form-input" placeholder="Nhập Password" required>
        </div>

        <div class="form-field">
          <input type="submit" name = 'submit' value="Log in">
        </div>
      </form>
    </div>

    <?
      class  connect {
        function pdo_get_connection () {
          $dburl = "mysql:host=localhost;dbname=thu;charset=utf8";
          $username = 'root';
          $password = 'mysql';
          $conn = new PDO($dburl, $username, $password);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          return $conn;
        }

        function pdo_query($sql){
          $sql_args = array_slice(func_get_args(), 1);
          try{
          $conn = $this -> pdo_get_connection();
          $stmt = $conn->prepare($sql);
          $stmt->execute($sql_args);
          $rows = $stmt->fetchAll();
          return $rows;
          }
          catch(PDOException $e){
          throw $e;
          }
          finally{
          unset($conn);
          }
        }
      }
  ?>

  <?
    class user_pdo {
      function getList ($matKhau , $name) {
        $db = new connect () ;
        $select = "SELECT * FROM taikhoan WHERE role = 1" ;
        return $db -> pdo_query ($select) ;
      }
    }
  ?>

  <?
    if (isset ($_POST ['submit'])) {
      $username = $_POST ['ten'] ;
      $password = $_POST ['matKhau'] ;
      $user = new user_pdo () ;
      $checkUser = $user -> getList ($password , $username) ;
      foreach ($checkUser as $checkUser) {
          if ($checkUser ['user'] == $username && $checkUser ['pass'] == $password) {
            $_SESSION ['id'] = $checkUser ['id'] ;
            header ("Location: index.php?act=home") ;
          }
      }
    }
  ?>
</div>
</body>
</html>

<?
  ob_end_flush () ;
?>


