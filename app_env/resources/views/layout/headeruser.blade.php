<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,700italic,400italic" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/app_env/public/AdminLTE/lib/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/app_env/public/AdminLTE/css/site.css" />
    <title>{{$title}} - HomeCooking</title>
</head>
<body>

    <script src="/app_env/public/AdminLTE/lib/jquery/dist/jquery.js"></script>
    <script src="/app_env/public/AdminLTE/lib/jquery/dist/jquery.leanModal.min.js"></script>
    <script src="/app_env/public/AdminLTE/lib/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <div id="shopify-section-header" class="shopify-section shopify-section__header">
        <section data-section-id="header" data-section-type="header">
            <header class="header header--inline " role="banner">
                <div class="container">
                    <div class="header__inner">
                        <h1 class="header__logo">
                            <a href="home" class="header__logo-link">
                                <img class="header__logo-image" style="max-width: 140px" width="941" height="295" src="/app_env/public/AdminLTE/img/logo.png" alt="VITAMIN HOUSE">
                            </a>
                        </h1>
                        <div class="header__search-bar-wrapper " id="outBoxSearch">
                            <form action="setyhhj" method="get" role="search" class="search-bar">
                                <div class="search-bar__top-wrapper">
                                    <div class="search-bar__top">
                                        <input type="hidden" name="type" value="product">
                                        <input type="hidden" name="options[prefix]" value="last">

                                        <div class="search-bar__input-wrapper">
                                            <input id="inputSearchForIdLoaiSP" class="search-bar__input" type="text" name="q" autocomplete="off" autocorrect="off" aria-label="Tìm nhanh sản phẩm..." placeholder="Tìm nhanh sản phẩm...">

                                        </div><div class="search-bar__filter">
                                            <label for="search-product-type" class="search-bar__filter-label">
                                                <span class="search-bar__filter-active" id="spanSelectedLTP">Tất cả loại thực phẩm</span><svg focusable="false" class="icon icon--arrow-bottom" viewBox="0 0 12 8" role="presentation">
                                                    <path stroke="currentColor" stroke-width="2" d="M10 2L6 6 2 2" fill="none" stroke-linecap="square"></path>
                                                </svg>
                                            </label>
                                            <select id="search-product-type">
                                                
                                            </select>

                                        </div><button type="submit" class="search-bar__submit" aria-label="Tìm kiếm">
                                            <svg focusable="false" class="icon icon--search" viewBox="0 0 21 21" role="presentation">
                                                <g stroke-width="2" stroke="currentColor" fill="none" fill-rule="evenodd">
                                                    <path d="M19 19l-5-5" stroke-linecap="square"></path>
                                                    <circle cx="8.5" cy="8.5" r="7.5"></circle>
                                                </g>
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <div id="resultBoxSearch">
                                </div>

                                <script>
                                    var selectedLTP = document.getElementById("search-product-type");
                                    var urlSearchLTP = "https://" + location.host + "/api/LoaiThucPhams";
                                    // url dung nap loai thuc pham
                                    fetch(urlSearchLTP)
                                        .then(response => response.json())
                                        .then(response => {
                                            // Do something with response.
                                            var htmlStringSS = "<option value='all' selected='selected'>Tất cả loại thục phẩm</option>";
                                            for (i = 0; i < response.length; i++) {
                                                htmlStringSS = htmlStringSS + "<option value='" + response[i].idLoai + "' >" + response[i].tenLoai + "</option>"
                                            }
                                            selectedLTP.innerHTML = htmlStringSS;
                                        })
                                        .catch(error => alert(error));
                                    selectedLTP.onchange = function () {
                                        var spanSelected = document.getElementById("spanSelectedLTP");
                                        spanSelected.innerHTML = selectedLTP.options[selectedLTP.selectedIndex].text;
                                    };

                                    var inputSearchTP = document.getElementById("inputSearchForIdLoaiSP");
                                    var outBoxSearch = document.getElementById("outBoxSearch");
                                    var result = document.getElementById("resultBoxSearch");
                                    // url dung tim kiem
                                    inputSearchTP.onkeyup = function timkiemSP() {
                                        var htmlStringS = "";
                                        if (inputSearchTP.value.toString().length > 0) {
                                            var urlSearch = "https://" + location.host + "/api/Search/" + selectedLTP.value + "/" + inputSearchTP.value;

                                            fetch(urlSearch)
                                                .then(response => response.json())
                                                .then(response => {
                                                    // Do something with response.

                                                    for (i = 0; i < response.length; i++) {
                                                        htmlStringS = htmlStringS + "<p><a href='Food/Index?id=" + response[i].idFood + "' >" + response[i].nameFood + "</a></p>"
                                                    }
                                                    result.innerHTML = htmlStringS;

                                                })
                                                .catch(error => alert(error));
                                        }
                                        else {
                                            result.innerHTML = htmlStringS;
                                        }

                                    }
                                    outBoxSearch.onblur = function () {

                                    };
                                </script>
                            </form>
                        </div>
                        <div class="header__action-list">
                            <div class="header__action-item hidden-tablet-and-up">
                                <a class="header__action-item-link" href="/search" data-action="toggle-search" aria-expanded="false" aria-label="Mở tìm kiếm">
                                    <svg focusable="false" class="icon icon--search" viewBox="0 0 21 21" role="presentation">
                                        <g stroke-width="2" stroke="currentColor" fill="none" fill-rule="evenodd">
                                            <path d="M19 19l-5-5" stroke-linecap="square"></path>
                                            <circle cx="8.5" cy="8.5" r="7.5"></circle>
                                        </g>
                                    </svg>
                                </a>
                            </div>
                            <div class="header__action-item header__action-item--account">
                                <script>
                                    window.fbAsyncInit = function () {
                                        // FB JavaScript SDK configuration and setup
                                        FB.init({
                                            appId: '379267967217408', // FB App ID
                                            cookie: true,  // enable cookies to allow the server to access the session
                                            xfbml: true,  // parse social plugins on this page
                                            version: 'v10.0' // use graph api version 2.8
                                        });
                                        // Check whether the user already logged in
                                        FB.getLoginStatus(function (response) {
                                            if (response.status === 'connected' && document.getElementById("IsCheckedFB").value == '1') {
                                                //display user data
                                                getFbUserData();
                                            }
                                        });
                                    };
                                    // Load the JavaScript SDK asynchronously
                                    (function (d, s, id) {
                                        var js, fjs = d.getElementsByTagName(s)[0];
                                        if (d.getElementById(id)) return;
                                        js = d.createElement(s); js.id = id;
                                        js.src = "//connect.facebook.net/en_US/sdk.js";
                                        fjs.parentNode.insertBefore(js, fjs);
                                    }(document, 'script', 'facebook-jssdk'));

                                    // Facebook login with JavaScript SDK
                                    function fbLogin() {
                                        FB.login(function (response) {
                                            if (response.authResponse) {
                                                // Get and display the user profile data
                                                getFbUserData();
                                            } else {
                                                //document.getElementById('status').innerHTML = 'User cancelled login or did not fully authorize.';
                                            }
                                        }, { scope: 'email' });
                                    }

                                    // Fetch the user profile data from facebook
                                    function getFbUserData() {
                                        FB.api('/me', { locale: 'en_US', fields: 'id,first_name,last_name,email' },
                                            function (response) {
                                                // goi mot controller action thuong luu thong xong roi dang nhap thuong
                                                location.href = "https://" + location.host + "/Home/DangNhapFB?fname=" + response.first_name + "&lname=" + response.last_name + "&email=" + response.email;
                                            }
                                        )
                                    }
                                </script>
                                <script src="https://apis.google.com/js/client:platform.js" async defer></script>
                                <meta name="google-signin-client_id" content="894896411587-jno6ffqi5hai0qdrhq93flr5hnqmc0vf.apps.googleusercontent.com">
                                <script>
                                    function onSignIn(googleUser) {
                                        var profile = googleUser.getBasicProfile();
                                        if (document.getElementById("IsCheckedFB").value == '1') {
                                            location.href = "https://" + location.host + "/Home/DangNhapGG?name=" + profile.getName() + "&email=" + profile.getEmail();
                                        }
                                    }
                                </script>
                                <script>
                                    function logOutTK() {
                                        // logout fb
                                        FB.getLoginStatus(function (response) {
                                            if (response.status === 'connected') {
                                                //display user data
                                                FB.logout();
                                            }
                                        });
                                        // log out gg
                                        var auth2 = gapi.auth2.getAuthInstance();
                                        auth2.signOut().then(function () {
                                            //alert('User signed out.');
                                        });
                                        location.href = "https://" + location.host + "/Home/LogOut";
                                    }
                                </script>


                                @using Microsoft.AspNetCore.Http
                                @inject Microsoft.AspNetCore.Http.IHttpContextAccessor HttpContextAccessor

                                @if (!String.IsNullOrEmpty(HttpContextAccessor.HttpContext.Session.GetString("KhachHangIdKH")))
                                {
                                    <input id="IsCheckedFB" value="0" type="hidden" />
                                    <div hidden class="g-signin2" data-onsuccess="onSignIn"></div>
                                    <a class="header__action-item-title hidden-pocket hidden-lap" href="@Url.Action("Index", "Account")">Chào, @HttpContextAccessor.HttpContext.Session.GetString("KhachHangName").ToString() </a>
                                }
                                else
                                {
                                    <input id="IsCheckedFB" value="1" type="hidden" />
                                    <a class="header__action-item-title hidden-pocket hidden-lap" id="modal_trigger" href="#modal" onclick="refreshNewError();">Đăng nhập/ Đăng ký</a>
                                    <div class="header__action-item-content">
                                        <div id="modal" class="popupContainer" style="display:none;">
                                            <header class="popupHeader">
                                                <span class="header_title">Login</span>
                                                <span class="modal_close"><i class="fa fa-times"></i></span>
                                            </header>

                                            <section class="popupBody">
                                                <!-- Social Login -->
                                                <div class="social_login">

                                                  <div class="">

                                                    <a onclick="fbLogin()" class="social_box fb">
                                                      <span class="icon"><i class="fa fa-facebook"></i></span>
                                                      <span class="icon_title">Connect with Facebook</span>
                                                    </a>
                                                    <!--g-signin2 social_box google -->
                                                    <a class="g-signin2" data-onsuccess="onSignIn"  data-width="360" data-height="54">
                                                      <span class="icon"><i class="fa fa-google-plus"></i></span>
                                                      <span class="icon_title">Connect with Google</span>
                                                    </a>

                                                  </div>

                                                    <div class="centeredText">
                                                        <span>Or use your Email address</span>
                                                    </div>

                                                    <div class="action_btns">
                                                        <div class="one_half"><a href="#" id="login_form" class="btn">Login</a></div>
                                                        <div class="one_half last"><a href="#" id="register_form" class="btn">Sign up</a></div>
                                                    </div>
                                                </div>

                                                <!-- Username & Password Login form -->
                                                <div class="user_login">
                                                    <form>
                                                        <label>Email</label>
                                                        <input type="email" id="emailDangNhap" />
                                                        <br />

                                                        <label>Password</label>
                                                        <input type="password" id="passDangNhap" />
                                                        <br />
                                                        <p id="showErrorDangNhap" style="color:red"></p>

                                                        <div class="checkbox">
                                                            <input id="rememberDangNhap" type="checkbox" />
                                                            <label for="remember">Remember me on this computer</label>
                                                        </div>

                                                        <div class="action_btns">
                                                            <div class="one_half"><a href="#" class="btn back_btn" onclick="refreshNewError();"><i class="fa fa-angle-double-left"></i> Back</a></div>
                                                            <div class="one_half last"><button type="button" onclick="Login();" class="btn btn_red" style="padding: 10px 60px; color: white ">Login</button></div>
                                                        </div>
                                                    </form>
                                                    <a href="#" class="forgot_password">Forgot password?</a>
                                                    <script type="text/javascript">

                                                        function refreshNewError() {
                                                            var loiDangNhap = document.getElementById("showErrorDangNhap");
                                                            loiDangNhap.innerHTML = "";
                                                            var loiDangKy = document.getElementById("showErrorDangKy");
                                                            loiDangKy.innerHTML = "";
                                                        }

                                                        function Login() {
                                                            var loiDangNhap = document.getElementById("showErrorDangNhap");
                                                            loiDangNhap.innerHTML = "";

                                                            var emailDangNhap = document.getElementById("emailDangNhap").value;
                                                            var passDangNhap = document.getElementById("passDangNhap").value;
                                                            if (emailDangNhap.length == 0 || passDangNhap.length == 0) {
                                                                loiDangNhap.innerHTML = "Bạn hãy nhập đầy đủ Email và Password";
                                                                return;
                                                            }

                                                            var rememberDangNhap = document.getElementById("rememberDangNhap").checked;

                                                            var urlDangNhap = "https://" + location.host + "/api/DangNhapKH";
                                                            var taiKhoan = {
                                                                "email": emailDangNhap,
                                                                "pass": passDangNhap,
                                                                "remember": rememberDangNhap
                                                            };
                                                            const options = {
                                                                method: 'POST',
                                                                headers: {
                                                                    'Accept': 'application/json',
                                                                    'Content-Type': 'application/json'
                                                                },
                                                                body: JSON.stringify(taiKhoan)
                                                            };

                                                            fetch(urlDangNhap, options)
                                                                .then(response => response.text())
                                                                .then(response => {
                                                                    // Do something with response.
                                                                    if (response.toString() == '"OK"') {
                                                                        location.href = "https://" + location.host + location.pathname;
                                                                    }
                                                                    else {
                                                                        loiDangNhap.innerHTML = response.toString().replace('"', '').replace('"', '');
                                                                    }

                                                                })
                                                                .catch(error => alert(error));
                                                        }
                                                    </script>
                                                </div>

                                                <!-- Register Form -->
                                                <div class="user_register">
                                                    <form>
                                                        <label>Full Name</label>
                                                        <input type="text" id="tenDangKy" />
                                                        <br />

                                                        <label>Email Address</label>
                                                        <input type="email" id="emailDangKy" />
                                                        <br />

                                                        <label>Password</label>
                                                        <input type="password" id="passDangKy" />
                                                        <br />
                                                        <p id="showErrorDangKy" style="color:red"></p>

                                                        @*<div class="checkbox">
                                                                <input id="send_updates" type="checkbox" />
                                                                <label for="send_updates">Send me occasional email updates</label>
                                                            </div>*@

                                                        <div class="action_btns">
                                                            <div class="one_half"><a href="#" class="btn back_btn" onclick="refreshNewError();"><i class="fa fa-angle-double-left"></i> Back</a></div>
                                                            <div class="one_half last"><button type="button" onclick="Register();" class="btn btn_red" style="padding: 10px 60px; color: white ">Register</button></div>
                                                        </div>
                                                    </form>
                                                    <script type="text/javascript">

                                                        function Register() {
                                                            var loiDangKy = document.getElementById("showErrorDangKy");
                                                            loiDangKy.innerHTML = "";

                                                            var tenDangKy = document.getElementById("tenDangKy");
                                                            var emailDangKy = document.getElementById("emailDangKy");
                                                            var passDangKy = document.getElementById("passDangKy");
                                                            if (tenDangKy.value.length == 0 || emailDangKy.value.length == 0 || passDangKy.value.length == 0) {
                                                                loiDangKy.innerHTML = "Bạn hãy nhập đầy đủ FullName, Email và Password";
                                                                return;
                                                            }

                                                            var urlDangKy = "https://" + location.host + "/api/DangKyKH";
                                                            var khachHang = {
                                                                "Email": emailDangKy.value,
                                                                "Password": passDangKy.value,
                                                                "Name": tenDangKy.value
                                                            };

                                                            const options = {
                                                                method: 'POST',
                                                                headers: {
                                                                    'Accept': 'application/json',
                                                                    'Content-Type': 'application/json'
                                                                },
                                                                body: JSON.stringify(khachHang)
                                                            };

                                                            fetch(urlDangKy, options)
                                                                .then(response => response.text())
                                                                .then(response => {
                                                                    // Do something with response.
                                                                    if (response.toString() == '"OK"') {
                                                                        alert("Đăng ký tài khoản thành công");
                                                                        tenDangKy.value = "";
                                                                        emailDangKy.value = "";
                                                                        passDangKy.value = "";
                                                                    }
                                                                    else {
                                                                        loiDangKy.innerHTML = response.toString().replace('"', '').replace('"', '');
                                                                    }

                                                                })
                                                                .catch(error => alert(error));
                                                        }
                                                    </script>
                                                </div>
                                            </section>
                                        </div>

                                    </div>

                                }






                            </div>
                            <!--Gio hang-->


                            <div class="header__action-item header__action-item--cart">
                                @*<a class="header__action-item-link header__cart-toggle" href="@Url.Action("Index","GioHang")" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown">*@
                                <a class="header__action-item-link header__cart-toggle" href="@Url.Action("Index","GioHang")" role="button">
                                    <div class="header__action-item-content">
                                        <div class="header__cart-icon icon-state">
                                            <span class="icon-state__primary">
                                                <svg focusable="false" class="icon icon--cart" viewBox="0 0 27 24" role="presentation">
                                                    <g transform="translate(0 1)" stroke-width="2" stroke="currentColor" fill="none" fill-rule="evenodd">
                                                        <circle stroke-linecap="square" cx="11" cy="20" r="2"></circle>
                                                        <circle stroke-linecap="square" cx="22" cy="20" r="2"></circle>
                                                        <path d="M7.31 5h18.27l-1.44 10H9.78L6.22 0H0"></path>
                                                    </g>
                                                </svg>
                                            </span>
                                        </div>
                                        @using Newtonsoft.Json;
                                        @if (!String.IsNullOrEmpty(HttpContextAccessor.HttpContext.Session.GetString("GioHang")))
                                        {
                                            List<GioHang> listGioHang = JsonConvert.DeserializeObject<List<GioHang>>(HttpContextAccessor.HttpContext.Session.GetString("GioHang"));
                                            <span class="hidden-pocket hidden-lap"> Giỏ hàng (@listGioHang.Sum(p => p.zSoLuong)) </span>
                                        }
                                        else
                                        {
                                            <span class="hidden-pocket hidden-lap"> Giỏ hàng</span>
                                        }
                                    </div>
                                </a>
                                <!-- menu giỏ hàng-->
                                @*<div class="dropdown-menu">
                                        <form method="post" id="mini-cart" class="mini-cart">

                                            <svg focusable="false" class="icon icon--nav-triangle-borderless" viewBox="0 0 20 9" role="presentation">
                                                <path d="M.47108938 9c.2694725-.26871321.57077721-.56867841.90388257-.89986354C3.12384116 6.36134886 5.74788116 3.76338565 9.2467995.30653888c.4145057-.4095171 1.0844277-.40860098 1.4977971.00205122L19.4935156 9H.47108938z" fill="#ffffff"></path>
                                            </svg><div class="mini-cart__inner">
                                                <div class="mini-cart__content">
                                                    <div class="mini-cart__line-item-list">
                                                        <div class="mini-cart__line-item">
                                                            <div class="mini-cart__image-wrapper">
                                                                <div class="aspect-ratio" style="padding-bottom: 100.0%">
                                                                    <img src="~/img/thit-bo-my.jpg">
                                                                </div>
                                                            </div>

                                                            <div class="mini-cart__item-wrapper">
                                                                <div class="mini-cart__product-info"><a class="mini-cart__product-vendor link" href="#">HARRYS</a><a href="#" class="mini-cart__product-title text--strong link">Thịt bò mỹ 500G</a><div class="mini-cart__price-list"><span class="price">129.000₫</span></div></div><div class="mini-cart__quantity">
                                                                    <div class="quantity-selector">
                                                                        <button class="quantity-selector__button" data-action="decrease-quantity" data-quantity="0" data-line-id="40249814745266:f1efa900baaf8884faba9679416f43cd" aria-label="Giảm số lượng xuống 1" title="Giảm số lượng xuống 1">
                                                                            <svg focusable="false" class="icon icon--minus" viewBox="0 0 10 2" role="presentation">
                                                                                <path d="M10 0v2H0V0z" fill="currentColor"></path>
                                                                            </svg>
                                                                        </button>
                                                                        <input aria-label="Số lượng" class="quantity-selector__value" inputmode="numeric" data-current-value="1" data-line-id="40249814745266" value="1" size="2">
                                                                        <button class="quantity-selector__button" data-action="increase-quantity" data-quantity="2" data-line-id="40249814745266:f1efa900baaf8884faba9679416f43cd" aria-label="Tăng số lượng lên 1" title="Tăng số lượng lên 1">
                                                                            <svg focusable="false" class="icon icon--plus" viewBox="0 0 10 10" role="presentation">
                                                                                <path d="M6 4h4v2H6v4H4V6H0V4h4V0h2v4z" fill="currentColor" fill-rule="evenodd"></path>
                                                                            </svg>
                                                                        </button>
                                                                    </div>

                                                                    <a href="/cart/change?quantity=0&amp;id=40249814745266:f1efa900baaf8884faba9679416f43cd" data-action="decrease-quantity" data-quantity="0" data-line-id="40249814745266:f1efa900baaf8884faba9679416f43cd" class="mini-cart__quantity-remove link">Loại bỏ</a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="mini-cart__recap">
                                                    <div class="mini-cart__recap-price-line">
                                                        <span>Tổng cộng</span>
                                                        <span style="display: block; text-align: right;" class="saw-extra-note"></span><span class="saw-cart-original-total"><span>129.000₫</span></span><br><span class="saw-cart-total"></span>
                                                    </div><div class="mini-cart__button-container">
                                                        <div class="button-group button-group--loose button-group--fit">
                                                            <a href="/cart" class="button button--secondary">Xem giỏ hàng</a><button type="submit" name="checkout" class="button button--primary">Thanh toán</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>*@



                            </div>

                        </div>
                    </div>
                </div>
            </header>
            <!-- end  Header-->
            <!-- nav bar-->
            <nav class="nav-bar">
                <div class="nav-bar__inner">
                    <div class="container">
                      <ul class="nav-bar__linklist list--unstyled" data-type="menu" role="list">
                        <li class="nav-bar__item"><a href="@Url.Action("Index","ListFood")" class="nav-bar__link link" data-type="menuitem">TẤT CẢ SẢN PHẨM</a></li>
                        @await Component.InvokeAsync("ViewLoaiThucPham")
                        <li class="nav-bar__item"><a href="@Url.Action("FoodDuocKM","ListFood")" class="nav-bar__link link" data-type="menuitem">KHUYẾN MÃI</a></li>
                        <li class="nav-bar__item"><a href="@Url.Action("Index","CongThucNauAn")" class="nav-bar__link link" data-type="menuitem">BLOG NẤU ĂN</a></li>
                      </ul>
                    </div>
                </div>
            </nav>
        </section>
    </div>
    <!-- end nav bar-->