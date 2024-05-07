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