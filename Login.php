 <?php
 include_once'db/connect_db.php';
 session_start();
if(isset($_POST['btn_login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $select = $pdo->prepare("select * from tbl_user where username='$username' AND password='$password' ");
    $select->execute();
    $row = $select->fetch(PDO::FETCH_ASSOC);

    if($row['username']==$username AND $row['password']==$password AND $row['role']=="Admin" AND $row['is_active']=="1"){
        $_SESSION['user_id']=$row['user_id'];
        $_SESSION['username']=$row['username'];
        $_SESSION['email']=$row['email'];
        $_SESSION['role']=$row['role'];

        $message = 'success';
        header('refresh:2;dashboard.php');

    }else if($row['username']==$username AND $row['password']==$password AND $row['role']=="Operator" AND $row['is_active']=="1"){
        $_SESSION['user_id']=$row['user_id'];
        $_SESSION['username']=$row['username'];
        $_SESSION['email']=$row['email'];
        $_SESSION['role']=$row['role'];
        $message = 'success';
        header('refresh:2;dashboard.php');
    }else {
        $errormsg = 'error';
    }
}

?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>P&T Shop</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- link font chữ -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap">
  <!-- link icon -->
  <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css">
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <!-- link css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
  <link rel="stylesheet" href="./assets/css/base.css">
  <link rel="stylesheet" href="./assets/css/main.css">
  <link rel="stylesheet" href="./assets/css/reponsive1.css">
  <link rel="stylesheet" href="./assets/css/login.css">
  <link rel="icon" href="./assets/img/logo/main.png" type="image/x-icon" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./assets/css/fix.css">
  <link rel="stylesheet" href="./assets/themify-icons-font/themify-icons/themify-icons.css">
</head>
<style>
  form.example input[type=text] {
    padding: 10px;
    font-size: 17px;
    border: 1px solid grey;
    float: left;
    width: 80%;
    background: #f1f1f1;
  }

  form.example button {
    float: left;
    width: 20%;
    padding: 10px;
    background: #2196F3;
    color: white;
    font-size: 17px;
    border: 1px solid grey;
    border-left: none;
    cursor: pointer;
  }

  form.example button:hover {
    background: #0b7dda;
  }

  form.example::after {
    content: "";
    clear: both;
    display: table;
  }

  /* Mobile & tablet  */
  @media (max-width: 1023px) {
    .custom-btn {
      margin: unset;
    }
  }

  /* tablet */
  @media (min-width: 740px) and (max-width: 1023px) {
    .btn-blocker {
      display: block;
      width: 100%;
    }

    .show-hide {
      top: 56px;
    }
  }

  /* mobile */
  @media (max-width: 739px) {
    .btn-blocker {
      display: block;
      width: 100%;
    }

    .show-hide {
      top: 56px;
    }
  }
</style>

<body>
  <div class="overlay hidden"></div>
  <!-- mobile menu -->
  <div class="mobile-main-menu">
    <div class="drawer-header">
      <a href="">
        <div class="drawer-header--auth">
          <div class="_object">
            <img src="./assets/img/product/giayxah2.jpg" alt="">
          </div>
          <div class="_body">Đăng nhập
            <br>Nhận nhiều ưu đãi hơn
          </div>
        </div>
      </a>
    </div>
    <ul class="ul-first-menu">
      <li>
        <a href="">Đăng nhập</a>
      </li>
      <li>
        <a href="" class="abc">Đăng kí</a>
      </li>
    </ul>
    <!-- <ul class="ul-first-menu">
      <li>
        <a href="">Tài khoản của tôi</a>
      </li>
      <li>
        <a href="">Địạ chỉ của tôi</a>
      </li>
      <li>
        <a href="">Đơn mua</a>
      </li>
      <li>
        <a href="" class="list-like-noicte">Danh sách yêu thích</a>
        <span id="header__second__like--notice" class="header__second__like--notice">3</span>
      </li>
      <li>
        <a href="">Đăng xuất</a>
      </li> -->
    </ul>
    <div class="la-scroll-fix-infor-user">
      <div class="la-nav-menu-items">
        <div class="la-title-nav-items">
          <strong>Danh mục</strong>
        </div>
        <ul class="la-nav-list-items">
          <li class="ng-scope">
            <a href="./index.html">Trang chủ</a>
          </li>
          <li class="ng-scope">
            <a href="./intro.html">Giới thiệu</a>
          </li>
          <li class="ng-scope ng-has-child1">
            <a href="./Product.html">Sản phẩm <i class="fas fa-plus cong"></i> <i class="fas fa-minus tru hidden"></i></a>
            <ul class="ul-has-child1">
              <li class="ng-scope ng-has-child2">
                <a href="./Product.html">Tất cả sản phẩm <i class="fas fa-plus cong1" onclick="hienthi(1,`abc`)"></i> <i
                    class="fas fa-minus tru1 hidden" onclick="hienthi(1,`abc`)"></i></a>
                <ul class="ul-has-child2 hidden" id="abc">
                  <li class="ng-scope">
                    <a href="./Product.html">Bóng đá</a>
                  </li>
                  <li class="ng-scope">
                    <a href="./Product.html">Chạy</a>
                  </li>
                  <li class="ng-scope">
                    <a href="./Product.html">Cầu lông</a>
                  </li>
                  <li class="ng-scope">
                    <a href="./Product.html">Bóng rổ</a>
                  </li>
                  <li class="ng-scope">
                    <a href="./Product.html">Quần vợt</a>
                  </li>
                  <li class="ng-scope">
                    <a href="./Product.html">Bơi lội</a>
                  </li>
                  <li class="ng-scope">
                    <a href="./Product.html">GOLF</a>
                  </li>
                </ul>
              </li>
              <li class="ng-scope ng-has-child2">
                <a href="./Product.html">Quần áo <i class="fas fa-plus cong2" onclick="hienthi(2,`abc2`)"></i> <i
                    class="fas fa-minus tru2 hidden" onclick="hienthi(2,`abc2`)"></i></a>
                <ul class="ul-has-child2 hidden" id="abc2">
                  <li class="ng-scope">
                    <a href="./Product.html">Bóng đá</a>
                  </li>
                  <li class="ng-scope">
                    <a href="./Product.html">Chạy</a>
                  </li>
                  <li class="ng-scope">
                    <a href="./Product.html">Cầu lông</a>
                  </li>
                  <li class="ng-scope">
                    <a href="./Product.html">Bóng rổ</a>
                  </li>
                  <li class="ng-scope">
                    <a href="./Product.html">Quần vợt</a>
                  </li>
                  <li class="ng-scope">
                    <a href="./Product.html">Bơi lội</a>
                  </li>
                  <li class="ng-scope">
                    <a href="./Product.html">GOLF</a>
                  </li>
                </ul>
              </li>
              <li class="ng-scope ng-has-child2">
                <a href="./Product.html">Già dép<i class="fas fa-plus cong3" onclick="hienthi(3,`abc3`)"></i> <i
                    class="fas fa-minus tru3 hidden" onclick="hienthi(3,`abc3`)"></i></a>
                <ul class="ul-has-child2 hidden" id="abc3">
                  <li class="ng-scope">
                    <a href="./Product.html">Bóng đá</a>
                  </li>
                  <li class="ng-scope">
                    <a href="./Product.html">Chạy</a>
                  </li>
                  <li class="ng-scope">
                    <a href="./Product.html">Cầu lông</a>
                  </li>
                  <li class="ng-scope">
                    <a href="./Product.html">Bóng rổ</a>
                  </li>
                  <li class="ng-scope">
                    <a href="./Product.html">Quần vợt</a>
                  </li>
                  <li class="ng-scope">
                    <a href="./Product.html">Bơi lội</a>
                  </li>
                  <li class="ng-scope">
                    <a href="./Product.html">GOLF</a>
                  </li>
                </ul>
              </li>
              <li class="ng-scope ng-has-child2">
                <a href="./Product.html">Phụ kiện <i class="fas fa-plus cong4" onclick="hienthi(4,`abc4`)"></i> <i
                    class="fas fa-minus tru4 hidden " onclick="hienthi(4,`abc4`)"></i></a>
                <ul class="ul-has-child2 hidden" id="abc4">
                  <li class="ng-scope">
                    <a href="./Product.html">Bóng đá</a>
                  </li>
                  <li class="ng-scope">
                    <a href="./Product.html">Chạy</a>
                  </li>
                  <li class="ng-scope">
                    <a href="./Product.html">Cầu lông</a>
                  </li>
                  <li class="ng-scope">
                    <a href="./Product.html">Bóng rổ</a>
                  </li>
                  <li class="ng-scope">
                    <a href="./Product.html">Quần vợt</a>
                  </li>
                  <li class="ng-scope">
                    <a href="./Product.html">Bơi lội</a>
                  </li>
                  <li class="ng-scope">
                    <a href="./Product.html">GOLF</a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="ng-scope">
            <a href="./news.html">Tin tức</a>
          </li>
          <li class="ng-scope">
            <a href="./contact.html">Liên hệ</a>
          </li>
        </ul>
      </div>
    </div>
    <ul class="mobile-support">
      <li>
        <div class="drawer-text-support">Hỗ trợ</div>
      </li>
      <li>
        <i class="fas fa-phone-square-alt footer__item-icon">HOTLINE: </i>
        <a href="tel:19006750">19006750</a>
      </li>
      <li>
        <i class="fas fa-envelope-square footer__item-icon">Email: </i>
        <a href="mailto:support@sapo.vn">support@gmail.vn</a>
      </li>
    </ul>
  </div>
  <!-- end mobile menu -->
  <!-- header -->
  <header class="header">
    <div class="container">
      <div class="top-link clearfix hidden-sm hidden-xs">
        <div class="row">
          <div class="col-6 social_link">
            <div class="social-title">Theo dõi: </div>
            <a href=""><i class="fab fa-facebook" style="font-size: 24px; margin-right: 10px"></i></a>
            <a href=""><i class="fab fa-instagram" style="font-size: 24px; margin-right: 10px;color: pink;"></i></a>
            <a href=""><i class="fab fa-youtube" style="font-size: 24px; margin-right: 10px;color: red;"></i></a>
            <a href=""><i class="fab fa-twitter" style="font-size: 24px; margin-right: 10px"></i></a>
          </div>
          <div class="col-6 login_link">
            <ul class="header_link right m-auto">
              <li>
                <a href="./Login.php"><i class="fas fa-sign-in-alt mr-3"></i>Đăng nhập</a>
              </li>
              <li>
                <a href="./registration.php"><i class="fas fa-user-plus mr-3" style="margin-left: 10px;"></i>Đăng kí</a>
              </li>
            </ul>
            <!-- <ul class="nav nav__first right">
                <li class="nav-item nav-item__first nav-item__first-user">
                  <img src="./assets/img/product/noavatar.png" alt="" class="nav-item__first-img">
                  <span class="nav-item__first-name">Quốc Trung</span>
                  <ul class="nav-item__first-menu">
                    <li class="nav-item__first-item">
                      <a href="">Tài khoản của tôi</a>
                    </li>
                    <li class="nav-item__first-item">
                      <a href="">Địa chỉ của tôi</a>
                    </li>
                    <li class="nav-item__first-item">
                      <a href="">Đơn mua</a>
                    </li>
                    <li class="nav-item__first-item">
                      <a href="">Đăng xuất</a>
                    </li>
                  </ul>
                </li>
              </ul> -->
          </div>
        </div>
      </div>
      <div class="header-main clearfix">
        <div class="row">
          <div class="col-lg-3 col-100-h">
            <div id="trigger-mobile" class="visible-sm visible-xs"><i class="fas fa-bars"></i></div>
            <div class="logo">
              <a href="">
                <img src="./assets/img/logo/logomain.png" alt="">
              </a>
            </div>
            <div class="mobile_cart visible-sm visible-xs">
              <a href="./cart.html" class="header__second__cart--icon">
                <i class="fas fa-shopping-cart"></i>
                <span id="header__second__cart--notice" class="header__second__cart--notice">3</span>
              </a>
              <a href="./listlike.html" class="header__second__like--icon">
                <i class="far fa-heart"></i>
                <span id="header__second__like--notice" class="header__second__like--notice">3</span>
              </a>
            </div>
          </div>
          <div class="col-lg-6 m-auto pdt15">
            <form class="example" action="./Product.html">
              <input type="text" class="input-search" placeholder="Tìm kiếm.." name="search">
              <button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
            </form>
          </div>
          <div class="col-3 m-auto hidden-sm hidden-xs">
            <div class="item-car clearfix">
              <a href="./cart.html" class="header__second__cart--icon">
                <i class="fas fa-shopping-cart"></i>
                <span id="header__second__cart--notice" class="header__second__cart--notice">3</span>
              </a>
            </div>
            <div class="item-like clearfix">
              <a href="./listlike.html" class="header__second__like--icon">
                <i class="far fa-heart"></i>
                <span id="header__second__like--notice" class="header__second__like--notice">3</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <nav class="header_nav hidden-sm hidden-xs">
      <div class="container">
        <ul class="header_nav-list nav">
          <li class="header_nav-list-item "><a href="./index.html" >Trang chủ</a></li>
          <li class="header_nav-list-item"><a href="./intro.html">Giới thiệu</a></li>
          <li class="header_nav-list-item has-mega">
            <a href="./Product.html">Sản phẩm<i class="fas fa-angle-right" style="margin-left: 5px;"></i></a>
            <div class="mega-content" style="overflow-x: hidden;">
              <div class="row">
                <ul class="col-8 no-padding level0">
                  <li class="level1">
                    <a class="hmega" href="./Product.html">Tất cả sản phẩm</a>
                    <!-- <ul class="level1">
                        <li class="level2"><a href="">Bóng đá</a></li>
                        <li class="level2"><a href="">Bóng đá</a></li>
                        <li class="level2"><a href="">Bóng đá</a></li>
                        <li class="level2"><a href="">Bóng đá</a></li>
                      </ul> -->
                  </li>
                  <li class="level1">
                    <a class="hmega">Giày, dép</a>
                    <ul class="level1">
                      <li class="level2"><a href="./Product.html">Bóng đá</a></li>
                      <li class="level2"><a href="./Product.html">Chạy</a></li>
                      <li class="level2"><a href="./Product.html">Cầu lông</a></li>
                      <li class="level2"><a href="./Product.html">Bóng rổ</a></li>
                      <li class="level2"><a href="./Product.html">Quần vợt</a></li>
                    </ul>
                  </li>
                  <li class="level1">
                    <a class="hmega">Quần, áo</a>
                    <ul class="level1">
                      <li class="level2"><a href="./Product.html">Bóng đá</a></li>
                      <li class="level2"><a href="./Product.html">Chạy</a></li>
                      <li class="level2"><a href="./Product.html">Cầu lông</a></li>
                      <li class="level2"><a href="./Product.html">Bóng rổ</a></li>
                      <li class="level2"><a href="./Product.html">Quần vợt</a></li>
                    </ul>
                  </li>
                  <li class="level1">
                    <a class="hmega">Phụ kiện</a>
                    <ul class="level1">
                      <li class="level2"><a href="./Product.html">Bóng đá</a></li>
                      <li class="level2"><a href="./Product.html">Chạy</a></li>
                      <li class="level2"><a href="./Product.html">Cầu lông</a></li>
                      <li class="level2"><a href="./Product.html">Bóng rổ</a></li>
                      <li class="level2"><a href="./Product.html">Quần vợt</a></li>
                      <li class="level2"><a href="./Product.html">Bơi lội</a></li>
                      <li class="level2"><a href="./Product.html">Golf</a></li>
                    </ul>
                  </li>
                </ul>
                <div class="col-4">
                  <a href="">
                    <picture>
                      <img src="https://media.giphy.com/media/mj7HcKFq23oobJMcOG/giphy.gif" alt="" width="80%">
                    </picture>
                  </a>
                </div>
              </div>
            </div>
          </li>
          <li class="header_nav-list-item"><a href="./news.html">Tin tức</a></li>
          <li class="header_nav-list-item"><a href="./contact.html">Liên hệ</a></li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- end header -->
  <!-- login form -->
  <div class="container">
    <div class="login__form">
      <div class="row">
        <div class="col-sm-12 col-lg-6">
          <form action="" method="post" autocomplete="off" >  <!--<form action="" method="post" autocomplete="off"> --> 
            <h3 class="heading">ĐĂNG NHẬP</h3>
            <a href="" class="form__forgot-password">Bạn quên mật khẩu?</a>
            <div class="form-group">
              <label for="email" class="form-label">Email hoặc User-name</label>
             <!-- <input  name="username" type="text" placeholder="VD: email@domain.com" > --> <!-- id="email"   class="form-control"-->
             <input id="email" name="username" type="text" placeholder="VD: email@domain.com" class="form-control">
              <span class="form-message"></span>
            </div>

            <div class="form-group matkhau">
              <label for="password" class="form-label">Mật khẩu</label>
              <input id="password" name="password" type="password" placeholder="Nhập mật khẩu" class="form-control">
              <span class="show-hide"><i class="fas fa-eye" onclick="myFunction()"></i></span>
              <!-- <i class="fi-rs-eye-crossed undisplay" onclick="showhide()"></i> -->
              <span class="form-message"></span>
            </div>
            <button type="submit" class="text-muted text-center btn-block btn btn-primary btn-rect" name="btn_login">DANG NHAP</button>
            <h4>HOẶC</h4>
            <div class="form-social">
              <a href="" class="form-submit-social btn-blocker">
                <span>Facebook</span>
                <img src="./assets/icon/facebook.svg" alt="" class="form-submit-social--img">
              </a>
              <a href="" class="form-submit-social btn-blocker">
                <span>GOOGLE</span>
                <img src="./assets/icon/google.svg" alt="" class="form-submit-social--img">
              </a>
            </div>





            <!-- PHAN TU THEM -->



            <?php
                if(!empty($message)){
                  echo'<script type="text/javascript">
                    jQuery(function validation(){
                    swal("Login Success", "Welcome '.$_SESSION['role'].'", "success", {
                    button: "Continue",
                    });
                  });
                  </script>';
                  }else{}
                if(empty($errormsg)){
                }else{
                  echo'<script type="text/javascript">
                  jQuery(function validation(){
                swal("Login Fail", "Username or Password is Wrong!", "error", {
                button: "Continue",
                  });
                });
                  </script>';
        }
      ?>



<!-- PHAN TU THEM -->
    


          </form>
        </div>
        <div class="col-sm-12 col-lg-6">
          <h3 class="heading">TẠO MỘT TÀI KHOẢN</h3>
          <p class="text-login">Thật dễ dàng tạo một tài khoản. Hãy nhập địa chỉ email của bạn và điền vào mẫu trên
            trang tiếp theo và tận hưởng những lợi ích của việc sở hữu một tài khoản :</p>
          <ul>
            <li class="text-login-item"><i class="fas fa-check"></i>
              <p class="text-login">Tổng quan đơn giản về thông tin cá nhân của bạn</p>
            </li>
            <li class="text-login-item"><i class="fas fa-check"></i>
              <p class="text-login">Thanh toán nhanh hơn</p>
            </li>
            <li class="text-login-item"><i class="fas fa-check"></i>
              <p class="text-login">Ưu đãi và khuyến mãi độc quyền</p>
            </li>
            <li class="text-login-item"><i class="fas fa-check"></i>
              <p class="text-login">Các sản phẩm mới nhất</p>
            </li>
            <li class="text-login-item"><i class="fas fa-check"></i>
              <p class="text-login">Các bộ sưu tập giới hạn và bộ sưu tập theo mùa mới</p>
            </li>
            <li class="text-login-item"><i class="fas fa-check"></i>
              <p class="text-login">Các sự kiện sắp tới</p>
            </li>
          </ul>
          <a href="./registration.php"><button class="form-submit btn-blocker custom-btn" style="border-radius: unset;margin:unset">ĐĂNG KÍ <i
                class="fas fa-arrow-right" style="font-size: 16px;margin-left: 10px;"></i></button></a>
        </div>
      </div>
    </div>
  </div>
  <!-- end login form -->
  <!-- footer -->
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-3">
          <img src="./assets/img/logo/logomain.png" alt="" width="100px" height="100px"
            style="border-radius: 50%;border: 3px solid #000;margin-bottom: 20px; margin-left: 480px;">
            <div class="Inter">
              <!-- BÊN TRÁI  -->
                <div class="bentrai">
                <i class="ti-wallet hh" style="color: blueviolet; margin-top: -2px;">
                  <div class="tieude">Về vận chuyển hàng hóa</div>
                </i>
                <p class="viet">Phí vận chuyển trong nước là 80K VNĐ</p>
  
                <i class="ti-truck hh" style="color: blueviolet;">
                  <div class="caythe">Về giao hàng</div>
                </i>
                <p class="viet">Chúng tôi sẽ vận chuyển bằng xe máy hoặc xe tải.
                  Nếu nó còn trong kho, nó sẽ được xuất xưởng trong vòng 3 ngày làm việc kể từ ngày sau khi bạn đặt hàng.
                </p>
                <p class="luuy">* Nếu bạn kiểm tra các mặt hàng đã đặt trước và các mặt hàng tồn kho thường xuyên cùng một lúc, các mặt hàng sẽ được chuyển cùng lúc vào ngày giao hàng của các mặt hàng đã đặt trước.</p>
                
                <p class="loi">* Chúng tôi không gửi hàng ra nước ngoài.</p>
                <p class="luuy">* Chúng tôi không giao hàng vào cuối tuần và ngày lễ.</p>
                
                <i class="ti-money hh" style="color: blueviolet; margin-top: 20px;">
                  <div class="tieude">Về hoa hồng</div>
                </i>
                <p class="viet">Nếu bạn sử dụng hình thức thanh toán tại cửa hàng tiện lợi, bạn sẽ phải trả một khoản phí thanh toán riêng là 35k VND. Đối với các đơn hàng không phải là thanh toán tại cửa hàng tiện lợi, không có khoản phí nào khác ngoài giá sản phẩm và phí vận chuyển.</p>
                  
                
              </div>
              <!-- BÊN PHẢI -->
              <div class="benphai">
                <i class="ti-credit-card hh" style="color: blueviolet; margin-left: 35px; margin-top: 0px;">
                  <div class="tieude">Về thanh toán</div>
                </i>
                <p class="write">Bạn có thể thanh toán bằng thẻ tín dụng(VISA, MasterCard, AMEX), Amazon Pay, Apple Pay, PayPal, thanh toán qua cửa hàng tiện lợi.</p>
                <div class="picture">
                    <div class="anh"> 
                      <img src="https://cdn.shopify.com/s/files/1/0027/0093/5233/files/payment-icons_2008.png";
                    </div> 
                </div>
                <i class="ti-comments-smiley hh" style="color: blueviolet; margin-left: 35px; margin-top: 95px;">
                  <div class="tieude">Giới thiệu về việc trả lại và thay thế</div>
                </i>
                <p class="write">Theo nguyên tắc chung, chúng tôi không thể chấp nhận trả lại hoặc trao đổi vì sự thuận tiện của khách hàng.
                  Khách hàng có yêu cầu đổi trả hàng phải liên hệ trước với chúng tôi qua biểu mẫu.</p>
              </div>
            </div>
          
  </footer>
  <div id="go-to-top">
    <a class="btn-gototop"><i class="fas fa-arrow-up"></i></a>
  </div>
  <!-- end footer -->








</body>
<script src="./assets/js/validator.js"></script>
<script src="./assets/js/main.js"></script>
<script>
  Validator({
    form: '#form-2',
    formGroupSelector: '.form-group',
    errorSelector: '.form-message',
    rules: [
      // Validator.isRequired('#fullname','Vui lòng nhập tên đầy đủ'),
      Validator.isRequired('#email'),
      Validator.isEmail('#email'),
      Validator.isRequired('#password'),
      Validator.minLength('#password', 6),
      Validator.isRequired('#password_confirmation'),
      // Validator.isRequired('input[name="gender"]'),
      // Validator.isConfirmed('#password_confirmation', function(){
      //   return document.querySelector('#form-1 #password').value;
      // }, 'Mật khẩu nhập lại không chính xác')
    ],
    onSubmit: function (data) {
      // call api
      console.log(data);
    }
  });
</script>
<script>
  const pass_field = document.querySelector('#password');
  const show_btn = document.querySelector('.fa-eye')
  function myFunction() {
    if (pass_field.type === "password") {
      pass_field.type = "text";
      show_btn.classList.add("hide");
    } else {
      pass_field.type = "password";
      show_btn.classList.remove("hide");
    }
  }
      // show_btn.addEventListener("click",function(){

      // });
</script>

</html>