<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>SINGED-SHOP</title>
    
        <?php foreach ($data['css_files'] as $css_file): ?>
            <link rel="stylesheet" href="<?= $css_file ?>">
        <?php endforeach; ?>
        
            <!-- <link rel="stylesheet" href="assets/css/header.css">
            <link rel="stylesheet" href="assets/css/sale.css">
            <link rel="stylesheet" href="assets/css/footer.css">
            <link rel="stylesheet" href="assets/icon/themify-icons/themify-icons.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
       -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- <script src="./assets/css/footer.css"></script> -->
<!-- <script>
    var href = location.href.split("PHP/");
        // var pages = href[1];
    //     var url_1=pages.split("&page=")
    //     var url_2=url_1[0];
$(document).ready(function(){
    
    // Xử lý khi người dùng click vào nút phân trang
    $('.pagination a').on('click', function(event){
        // alert("hh");
        event.preventDefault();
        
        var page = $(this).attr('id');
        
        loadSale(page);
        // var href = location.href.split("PHP/");
        // var pages = href[1];
        // var url_1=pages.split("page=")
        // var url_2=url_1[0];
        // console.log(url_2);

    });
    
//     // Hàm gửi yêu cầu AJAX và cập nhật dữ liệu
        // var href = location.href.split("page=");
        // var url_1 = href[0];
    function loadSale(page){
        // var href = location.href.split("page=");
        // var page = href[1];
        // var href = location.href.split("page=");
        // var url_1 = href[0];
        var href = location.href.split("PHP/");
        var pages = href[1];
        var url_1=pages.split("&page=")
        var url_2=url_1[0];
        $.ajax({
            // url: url_1 + page,
            url: url_2+"&page="+page,
            method: 'GET',
            data: {page: page
                
            }, 
            success: function(data){
                // console.log(data);
                
                $("#content_1").html(data);
                // console.log(url);
                
                history.pushState({page: page}, "Page " + page, url_2+"&page=" + page);
                
                // Nạp lại các tệp CSS và JavaScript sau khi yêu cầu AJAX hoàn tất
            // loadCSS('sale.css');
            // loadJS('header.js');
        },
        error: function() {
            alert('Đã xảy ra lỗi khi tải danh sách sản phẩm.');
        }
            
        });
    }
});

// Hàm để nạp các tệp CSS
function loadCSS(filename) {
    var link = document.createElement('link');
    link.rel = 'stylesheet';
    link.href = filename;
    document.head.appendChild(link);
}

// Hàm để nạp các tệp JavaScript
function loadJS(filename) {
    var script = document.createElement('script');
    script.src = filename;
    document.head.appendChild(script);
}
// $(document).ready(function(){
//     $("#login_form").submit(function(event){
//         event.preventDefault();
//         var username = $('#phone_number').val();
//         var password = $('#passwd').val();
//         $.ajax({
//     type: 'POST',
//     url: 'http://localhost:8008/PHP/index.php?controller=login&action=login', // Đường dẫn tới file xử lý đăng nhập
//     data: {username: username, password: password},
//     success: function(response) {
//         if (response === 'success') {
            
//             console.log(response);
//         $('#message').html('Login successful');
//         // Redirect or do something after successful login
//       } else {
//         console.log(response);
//         $('#message').html('Invalid username or password');
//       }
//     }
//   });
//     });
// });



</script> -->
<script>
    $(document).ready(function(){
    $(".tab_list_menu").click(function(event){
        // alert("hh");
        var category =$(this).attr('id');
        switch(category){
            case "category_1" :
                window.location.href = 'http://localhost:8008/PHP/index.php?controller=pages&action=search&category=1';
                break;
            case "title_trousers" :    
                window.location.href = 'http://localhost:8008/PHP/index.php?controller=pages&action=search&category=2';
                break;
            case "title_accessories" :    
                window.location.href = 'http://localhost:8008/PHP/index.php?controller=pages&action=search&category=3';
                break;
        }
        // if(category=="category_1"){ window.location.href = 'http://localhost:8008/PHP/index.php?controller=pages&action=search&category=1';}
        // performSearch();
        // event.preventDefault();
        // var category =$(this).attr('id');
        // console.log(category);
//         $.ajax({
//     type: 'GET',
//     url: 'http://localhost:8008/PHP/index.php?controller=pages&action=search&keysearch="+ searchInput.value+"&page=1', 
//     data: {category: category},
//     success: function(response) {
//        console.log(response);
       
//     //    window.location.href = 'http://localhost:8008/PHP/index.php?controller=pages&action=search';
//        $("#content_1").html(response); 
       
//     }
//   });
    });
});




</script>
    </head>

    <body>

            <div id="main-head">
                <div id="header">
                    <a href="http://localhost:8008/PHP/index.php?controller=pages&action=home"><img id ="img_web" src="./assets/img/singed.png"></a>
                    <ul id="navigation">
                        <li> <a href="http://localhost:8008/PHP/index.php?controller=pages&action=home" >TRANG CHỦ </a></li>
                        <li> <a>PHONG CÁCH</a> <a class="ti-angle-down" id="css_ti_angle_down"></a> 

                        <ul class="style">
                            <?php foreach ($dataStyle['style'] as $style): ?>
                                <li> <a href="http://localhost:8008/PHP/index.php?controller=style&action=style&idStyle=<?php echo $style->getIdStyle();?>"><?php echo $style->getNameStyle(); ?></a></li>
                            <?php endforeach; ?>
                        </ul>

                            
                        </li>
                        <li> <a href="http://localhost:8008/PHP/index.php?controller=sale&action=sale&page=1">KHUYẾN MÃI</a></li>
                        <li>    <a href="http://localhost:8008/PHP/index.php?controller=pages&action=search&keysearch=&page=1">SẢN PHẨM</a></li>
                        <!-- <li> <a>LIÊN HỆ</a></li> -->
                        </ul>   
                        <div class="search-container">
                            <input class="search-box" placeholder="Tìm kiếm ..">
                            <i class="fa-solid fa-magnifying-glass icon_function"></i>
                        </div>
                    <div id="div_function">
                        <div id="div_iconfunction">    
                            <i class="fa-solid fa-user icon_funtion profile">
                                <ul class="profile_container">
                               <?php
                                    // Kiểm tra xem đã tồn tại $_SESSION['user_id'] hay chưa
                                    if (isset($_SESSION['user_id'])) {
                                        // Nếu đã đăng nhập, hiển thị liên kết đến trang thông tin 
                                        if($_SESSION['role'] == 1 || $_SESSION['role'] == 3) {
                                            echo '<li><a href="http://localhost:8008/PHP/index.php?controller=admin&action=admin">Quản lý kho *</a></li>';
                                        }
                                        echo '<li><a href="http://localhost:8008/PHP/index.php?controller=profile&action=profile">Thông tin</a></li>';
                                        echo '<li><a href="http://localhost:8008/PHP/index.php?controller=login&action=logout">Đơn hàng của tôi</a></li>';
                                        echo '<li><a href="http://localhost:8008/PHP/index.php?controller=cart&action=cart">Giỏ hàng</a></li>';
                                        echo '<li><a href="http://localhost:8008/PHP/index.php?controller=login&action=logout">Đăng xuất</a></li>';
                                    } else {
                                        // Nếu chưa đăng nhập, hiển thị liên kết đến trang đăng nhập
                                        echo '<li><a href="http://localhost:8008/PHP/index.php?controller=login&action=login">Đăng nhập</a></li>';
                                    }
                                ?>
                                </ul>
                            </i>
                            <a href="http://localhost:8008/PHP/index.php?controller=cart&action=cart"><i class="fa-solid fa-cart-shopping icon_funtion" title="2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="hide">
                    <i class="fa-solid fa-circle-xmark closeSearch"></i>
                </div>
                <div id="div_menu"> 
                    <img id="icon_menu" src="./assets/img/menu.png">
                    <div class="tab_menu">
                        <i class="fa-solid fa-circle-xmark close"></i>
                        <h1 id="title_menu">Danh mục sản phẩm </h1>
                        <ul id="content_menu">
                            <li>
                            <!-- <div class="search-container-menu">
                            <input class="search-box" placeholder="Tìm kiếm ..">
                            <i class="fa-solid fa-magnifying-glass icon_function"></i>
                        </div> -->
                 
                            </li>
                            <li id="category_1" class="tab_list_menu"> <a>Áo</a> 
                                <!-- <i class="ti-angle-down"></i>
                                <ul class="list_clothes">
                                    <li ><a>Áo Thun</a></li>
                                    <li ><a>Áo Sơ mi</a></li>
                                    <li ><a>Áo Polo</a></li>
                                    <li ><a>Áo Khoác</a></li>
                                    <li ><a>Áo Blazer</a></li>
                                    <li ><a>Áo Hoodie</a></li>
                                </ul> -->
                            </li>
                            <li id="title_trousers" class="tab_list_menu"><a>Quần</a>
                                <!-- <i class="ti-angle-down"></i> -->
                                <!-- <ul class="list_clothes">
                                    <li ><a>Quần Jean</a></li>
                                    <li ><a>Quần Tây</a></li>
                                    <li ><a>Quần Jogger</a></li>
                                    <li ><a>Quần Kaki</a></li>
                                    <li ><a>Quần Baggy</a></li>
                                    <li ><a>Quần Thun</a></li>
                                    <li ><a>Quần Short</a></li>
                                </ul> -->
                            </li>
                            <li id="title_accessories" class="tab_list_menu"><a>Phụ kiện</a>
                                <!-- <i class="ti-angle-down"></i>
                                <ul class="list_clothes">
                                    <li ><a>Nón</a></li>
                                    <li ><a>Kính</a></li>
                                    <li ><a>Cà vạt</a></li>
                                    <li ><a>Thắt lưng</a></li>
                                </ul> -->
                            </li>
                        </ul>
                        <!-- <div class="range_slider_div">
                             <h3 id="title_price">Khoảng giá: <span id="value_price"></span></h3>
                             <input type="range" min="0" max="1000" value="0" class="slider_range" id="range">
                        </div> -->
                    </div>
                </div>
            </div>
            <!-- asdf -->
            <div id="content_1">
            <?= @$content ?>
            </div>                        
            <div id="footer">
                <h1 id="title_contact">Liên hệ</h1>
                <div id="div_iconcontact">
                    <div id="icon_fb"></div>
                    <div id="icon_email"></div>
                    <div id="icon_phone"></div>
                </div>

                <div id="content_footer">
                    <div id="div_singed">
                        <h3>Singed-Shop</h3>
                        <div id="img_singed"></div>
                    </div>
                    <div id="explore">
                        <ul id="explore_title">
                            <h4>Khám phá</h4>
                            <li><a>Trang chủ</a></li>
                            <li><a>Giới thiệu</a></li>
                            <li><a>Sản phẩm mới</a></li>
                            <li><a>Giảm giá</a></li>
                        </ul>
                    </div>
                    <div id="policy">
                        <ul id="policy_title">
                            <h4>Chính sách</h4>
                            <li><a>Mua hàng</a></li>
                            <li><a>Vận chuyển-giao hàng</a></li>
                            <li><a>Đổi trả</a></li>
                        </ul>
                    </div>
                    <div id="support">
                        <ul id="support_title">
                            <h4>Hỗ trợ</h4>
                            <li><a>Câu hỏi thường gặp</a></li>
                            <li><a>Thanh toán</a></li>
                        </ul>
                    </div>
                </div>

                <div id="end_footer">
                    <h3 class="title_endfooter">P/s : Website được lập cho vui bởi sinh viên  Đại học Sài Gòn</h3>
                    <h3 class="title_endfooter endfooter2">* Website được hoàn thiện ngày : xx/x/20xx</h3>
                    <h3 id="title_address">Địa chỉ : Trụ sở chính/ 273 An Dương Vương – Phường 3 – Quận 5</h3>
                </div>
            </div>

        <?php if (isset($js_files)): ?>
            <?php foreach ($data['js_files'] as $js_file): ?>
                <script src="<?= $js_file ?>"></script>
            <?php endforeach; ?>
        <?php endif; ?>
    
    <script type="text/javascript">
        var searchInput = document.getElementsByClassName('search-box')[0];
        var searchButton = document.getElementsByClassName('fa-magnifying-glass')[0];
        
        searchInput.addEventListener('keypress', function(event) {
                if (event.key === 'Enter') {
                performSearch();
                }
            });
        
        searchButton.addEventListener('click', function() {
                performSearch();
            });
            
        function performSearch() {
            window.location.assign("http://localhost:8008/PHP/index.php?controller=pages&action=search&keysearch="+ searchInput.value+"&page=1");
        }

        
	</script>
    

    </body>
</html>
