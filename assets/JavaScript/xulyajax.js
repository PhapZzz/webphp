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
                
        
        },
        error: function() {
            alert('Đã xảy ra lỗi khi tải danh sách sản phẩm.');
        }
            
        });
    }
});


$(document).ready(function(){
    $("#login_form").submit(function(event){
        event.preventDefault();
        var username = $('#phone_number').val();
        var password = $('#passwd').val();
        $.ajax({
    type: 'POST',
    url: 'http://localhost:8008/PHP/index.php?controller=login&action=loginAuthentication', // Đường dẫn tới file xử lý đăng nhập
    data: {username: username, password: password},
    success: function(response) {
        if (response == 'succes') {
            console.log(response);
            $('#message').html('đăng nhập thành công, đến trang chủ sau 1s').show();
            window.location.href = 'http://localhost:8008/PHP/index.php?controller=pages&action=home';
            
      } else {
        if(response == 'err_sdt'){$('#message').html('lưu ý tên đăng nhập là số điện thoại').show();}
        // console.log(response);
        else{
        $('#message').html('tên đăng nhập hoặc mật khẩu không đúng').show();
        }
      }
    }
  });
    });
});
// ajax kiem tra dang ky
$(document).ready(function(){
    $("#register_form").submit(function(event){
        event.preventDefault();
        var phone = $('#phone_number').val();
        var name = $('#name').val();
        var password = $('#passwd').val();
        var confirm_password = $('#re_passwd').val();
        $.ajax({
    type: 'POST',
    url: 'http://localhost:8008/PHP/index.php?controller=register&action=registerAccountUser', // Đường dẫn tới file xử lý đăng nhập
    data: {phone: phone, name: name, password: password, confirm_password:confirm_password},
    success: function(response) {
        console.log(response);
        if (response == 'haveuser') {
            console.log(response);
            $('#message').html('user đã tồn tại').show();

      } 
      else{
        if(response=="err_sdt"){
            $('#message').html('lưu ý tên đăng nhập là số điện thoại').show();
        }
        if(response=="errcomfirm"){
            $('#message').html('xác nhận password không trùng khớp').show();
        }
        if(response=="succes"){
            console.log(response);
            $('#message').html('đăng ký tài khoản thành công').show();
            window.location.href = 'http://localhost:8008/PHP/index.php?controller=login&action=login';
            
        }
        else {
            window.location.href = 'Location: http://localhost:8008/PHP/index.php?controller=register&action=error"';
        }

      }
    }
  });
    });
});

// $(document).ready(function(){
//     $(".tab_list_menu").onClick(function(event){
//         event.preventDefault();
//         var category =$(".tab_list_menu");
        
//         $.ajax({
//     type: 'GET',
//     url: 'http://localhost:8008/PHP/index.php?controller=pages&action=search&keysearch="+ searchInput.value+"&page=1', // Đường dẫn tới file xử lý đăng nhập
//     data: {category: category},
//     success: function(response) {
       
//     }
//   });
//     });
// });

// var slider = document.getElementById('range');
// var output = document.getElementById('value_price1');

// output.innerHTML = slider.value;  
// slider.oninput = function() {
// 	output.innerHTML = "0 - " + this.value + ".000 đ"
// }