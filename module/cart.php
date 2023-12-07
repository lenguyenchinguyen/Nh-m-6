<?php
class ServiceCart
{
    function insertBill($idUser, $name, $address, $tel, $email, $payment, $total)
    {
        $time = date('d/m/Y');
        $sql = "INSERT INTO cthoadon VALUES(NULL, '$name', '$address', '$tel', '$email', $payment, '$time', $total, 0, $idUser)";
        return pdo_execute_last_result($sql);
    }
    function insertCart($idUser, $img, $name, $price, $soluong, $idBill)
    {
        $sql = "INSERT hoadon VALUES(NULL, $idUser, '$img', '$name', $price, $soluong, $idBill)";
        pdo_execute($sql);
    }

    function queryBill($id = null, $type = 'object')
    {
        if ($id && $type === 'object') {
            $sql = "SELECT * FROM cthoadon WHERE ID = $id";
            return pdo_query_one($sql);
        } else if ($id && $type === 'array') {
            $sql = "SELECT * FROM cthoadon WHERE ID = $id";
            return pdo_query($sql);
        } else {
            $sql = "SELECT * FROM cthoadon";
            return pdo_query($sql);
        }
    }

    function queryCart($id)
    {
        $sql = "SELECT * FROM hoadon WHERE idbill = $id";
        return pdo_query($sql);
    }

    function queryBills($idUser)
    {
        $sql = "SELECT * FROM cthoadon WHERE IDUSER = $idUser";
        return pdo_query($sql);
    }

    function getStatusBill($status)
    {
        switch ($status) {
            case 0:
                return "Đơn hàng mới";
            case 1:
                return "Đang xử lý";
            case 2:
                return "Đang giao hàng";
            case 3:
                return "Hoàn tất";
        }
    }
    function getAmountCart($idBill)
    {
        return sizeof($this->queryCart($idBill));
    }

    function deleteBill($id)
    {
        $sql = "DELETE FROM cthoadon WHERE ID = $id";
        pdo_execute($sql);
    }

    function updateBill($id, $status)
    {
        $sql = "UPDATE cthoadon SET STATUS=$status WHERE ID = $id";
        pdo_execute($sql);
    }

    function analytics()
    {
        $sql = "SELECT DANHMUC.NAME AS NAMEDM, COUNT(SANPHAM.ID) AS COUNTSP, MIN(SANPHAM.PRICE) AS MINPRICE, MAX(SANPHAM.PRICE) AS MAXPRICE, AVG(SANPHAM.PRICE) AS AVGPRICE FROM SANPHAM LEFT JOIN DANHMUC ON SANPHAM.IDDM = DANHMUC.ID GROUP BY DANHMUC.ID ORDER BY DANHMUC.ID DESC";
        return pdo_query($sql);
    }

    function analyticsPrice($type = 'min')
    {
    }
}

$serviceCart = new ServiceCart();
