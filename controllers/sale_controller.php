<?php
session_start();
require_once('controllers/base_controller.php');
require_once('models/sale.php');
require_once('models/style.php');
// http://localhost:8008/PHP/index.php?controller=sale&action=sale&page=
//http://localhost:8008/PHP/index.php?controller=sale&action=sale
class SaleController extends BaseController
{
    function __construct()
    {
      $this->folder = 'pages';
    }

    public function sale() // Thay đổi tên hàm
    { 
      if (!isset($_SESSION['user_id'])) {
        header("Location: http://localhost:8008/PHP/index.php?controller=login&action=login");
        exit; // Kết thúc chương trình sau khi chuyển hướng
    }
  
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 8; // Số bài viết hiển thị trên mỗi trang
        $offset = ($page - 1) * $limit;

        // Lấy danh sách bài viết từ model
        $sale = sale::getPaginatedSale($limit, $offset); // Thay đổi tên phương thức
        $dataSale = array('sale' => $sale);

        $style = style::getStyleProduct(); // Lấy danh sách các style  
        $dataStyle = array('style' => $style);

        // Tính toán số trang
        $totalPage = sale::countAllSale(); // Thay đổi tên phương thức
        $totalPage = ceil($totalPage / $limit);


        // Truyền dữ liệu cho view
        $data = array(
              'css_files' => array(
                './assets/css/header.css',
                './assets/css/sale.css',
                './assets/css/footer.css',
                './assets/icon/themify-icons/themify-icons.css',
                'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css',
                
            ),
            'js_files' => array(
                './assets/JavaScript/header.js',
                'assets/JavaScript/xulyajax.js',
                // Thêm các đường dẫn đến các file JS cần import cho trang home
            ),
            'dataSale' => $dataSale,
            'totalPage' => $totalPage,
            'currentPage' => $page,
            'dataStyle' => $dataStyle 
        );
        
        // Render view
        $this->render('sale', $data, null); // Thay đổi tên view
        // echo $this;
        // echo $data;
        // if($page == 1 ){$this->render('sale', $data, null);}
        // else{echo $a =$this->render_pani('sale', $data, null);}
        // $this->render_pani('sale', $data, null);
    }

  // public function ajaxSale()
  //   {
  //       // Xử lý yêu cầu AJAX ở đây
  //       $page = isset($_GET['page']) ? $_GET['page'] : 1;
  //       $limit = 8;
  //       $offset = ($page - 1) * $limit;
        
  //       // Lấy dữ liệu cần thiết từ model (ví dụ: danh sách sản phẩm)
  //       $sale = Sale::getPaginatedSale($limit, $offset);
  //       $dataSale = array('sale' => $sale);
        
  //       // Tính toán tổng số trang
  //       $totalPage = Sale::countAllSale();
  //       $totalPage = ceil($totalPage / $limit);
        
  //       // Truyền dữ liệu cần thiết cho view partial
  //       $data = array(
  //           'dataSale' => $dataSale,
  //           'totalPage' => $totalPage,
  //           'currentPage' => $page
  //       );

  //       // Render view partial và trả về dữ liệu dưới dạng HTML
  //       $this->renderPartial('sale', $data, null);
  //   }

  //   public function error()
  //   {
  //     $this->render('error', null , null);
  //   }
}

?>