<?php
class  billDetail{
    private $idBillDetail;
    private $quanty;
    private $totalPrice;
    private $idProduct;
    private $nameProduct;
    private $idCategory;
    private $idBill;
    private $image;

    // Constructor
    public function __construct($idBillDetail, $quanty, $totalPrice, $idProduct, $nameProduct, $idCategory, $idBill, $image) {
        $this->idBillDetail = $idBillDetail;
        $this->quanty = $quanty;
        $this->totalPrice = $totalPrice;
        $this->idProduct = $idProduct;
        $this->nameProduct = $nameProduct;
        $this->idCategory = $idCategory;
        $this->idBill = $idBill;
        $this->image = $image;
    }

    public function getIdBillDetail() {
        return $this->idBillDetail;
    }

    public function setIdBillDetail($idBillDetail) {
        $this->idBillDetail = $idBillDetail;
    }

    public function getQuanty() {
        return $this->quanty;
    }

    public function setQuanty($quanty) {
        $this->quanty = $quanty;
    }

    public function getTotalPrice() {
        return $this->totalPrice;
    }

    public function setTotalPrice($totalPrice) {
        $this->totalPrice = $totalPrice;
    }

    public function getIdProduct() {
        return $this->idProduct;
    }

    public function setIdProduct($idProduct) {
        $this->idProduct = $idProduct;
    }

    public function getNameProduct() {
        return $this->nameProduct;
    }

    public function setNameProduct($nameProduct) {
        $this->nameProduct = $nameProduct;
    }

    public function getIdCategory() {
        return $this->idCategory;
    }

    public function setIdCategory($idCategory) {
        $this->idCategory = $idCategory;
    }

    public function getIdBill() {
        return $this->idBill;
    }

    public function setIdBill($idBill) {
        $this->idBill = $idBill;
    }

    public function getImage() {
        return $this->image;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public static function getBillDetail($idBill) {
        $db = DB::getInstance();
        // Chuẩn bị truy vấn SQL
        $sql = "SELECT * FROM BillDetail WHERE idBill = ?";
        $stmt = $db->prepare($sql);
        // Bind tham số và thực thi truy vấn
        $stmt->execute([$idBill]);
        // Lấy kết quả
        $result = $stmt->fetchAll();

        // Khởi tạo mảng chứa các đối tượng BillDetail
        $billDetails = [];
        // Duyệt qua kết quả và ánh xạ vào các đối tượng BillDetail
        foreach ($result as $row) {
            $billDetail = new billDetail(
                $row['idBillDetail'],
                $row['quanty'],
                $row['totalPrice'],
                $row['idProduct'],
                $row['nameProduct'],
                $row['idCategory'],
                $row['idBill'],
                $row['image']
            );
            // Thêm BillDetail vào mảng
            $billDetails[] = $billDetail;
        }
        // Trả về danh sách BillDetail
        return $billDetails;
    }

    public static function addBillDetail($billDetail) {
        $db = DB::getInstance();
        $sql = "INSERT INTO SingedShop.BillDetail (idProduct, quanty, totalPrice, idCategory, nameProduct, idBill, image) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(1, $billDetail->getIdProduct());
        $stmt->bindParam(2, $billDetail->getQuanty(), PDO::PARAM_INT);
        $stmt->bindParam(3, $billDetail->getTotalPrice(), PDO::PARAM_INT);
        $stmt->bindParam(4, $billDetail->getIdCategory());
        $stmt->bindParam(5, $billDetail->getNameProduct());
        $stmt->bindParam(6, $billDetail->getIdBill());
        $stmt->bindParam(7, $billDetail->getImage());
        $stmt->execute();
        $rowCount = $stmt->rowCount();
        $stmt->closeCursor();
        return $rowCount;
    }
    
}
?>
