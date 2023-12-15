<?php

// require_once '../../module/pdo.php';

function getAllProduct()
{
     $query = "SELECT * FROM sanpham";
     pdo_query($query);
     return  pdo_query($query);
}

function getProductCategory ($idDanhMuc)
{
     $query = "SELECT * FROM sanpham WHERE iddm = '$idDanhMuc'" ;
     pdo_query($query);
     return  pdo_query($query);
}

function getOneProduct($id)
{
     $query = "SELECT name AS tenSanPham , price AS giaSanPham ,id as id , mota as mota, img as img  FROM sanpham WHERE `id` = $id";
     pdo_query($query);
     return  pdo_query_one($query);
}





// /**
//  * Lấy sản phẩm bằng danh 
//  * @return array
//  */
function getAllProductCategories()
{

}




// /**
//  * lấy sản phẩm bằng danh mục
//  * @param mixed $category_id
//  * @return array
//  */
function getProductByCategory($category_id)
{

}





function createProduct(
     $name,
     $price,
     $img,
     $mota,
     $luotxem,
     $iddm

) {
     global $connection;

     $query = "INSERT INTO sanpham (   
                        name,                         
                        price,
                        img,
                        mota,
                        luotxem,
                        iddm
                        ) 
            VALUES (
                        'name',                         
                        'price',
                        'img',
                        'mota',
                        'luotxem',
                        'iddm'
                    )";

    
}


function updateProduct(
     $name,
     $price,
     $img,
     $mota,
     $luotxem,
     $iddm
) {
     global $connection;
     $query = "UPDATE sanpham SET 
                    `name`='$name',            
                    `price`='$price',
                    `img`='$img',
                    `mota`='$mota',
                    `luotxem` = '$luotxem'
                    WHERE `iddm` =$iddm 
                    ";


     $query = "INSERT INTO sanpham  
                        name,                         
                        price,
                        img,
                        mota,
                        luotxem,
                        iddm
                        ) 
            VALUES (
               'name',                         
                        'price',
                        'img',
                        'mota',
                        'luotxem',
                        'iddm'
                    )";

}

