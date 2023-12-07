<?php

function getAllProduct(){
    global $connection;
    $data = [];
    $query = "SELECT * FROM products";

    $result = mysqli_query($connection, $query);

   if(mysqli_num_rows($result)>0){
        $data = $result ->fetch_all(MYSQLI_ASSOC);
   }
     return $data;
}



function getOneProduct($id){
     global $connection;
     $data = [];
//      // lab 7
     $query = "SELECT * FROM products WHERE `id` = $id";
//      // LAB 8
//      // $query = "SELECT * FROM table WHERE `id` = ?";
//      // $stmt = mysqli_prepare($connection, $query);
//      // mysqli_stmt_bind_param($stmt,"i",$id);
//      // mysqli_stmt_execute($stmt);
//      // mysqli_stmt_bind_result($stmt,$result);
     
     $result = mysqli_query($connection, $query);
 
    if(mysqli_num_rows($result)>0){
         $data = $result ->fetch_assoc();
    }
      return $data;
 }





// /**
//  * Lấy sản phẩm bằng danh 
//  * @return array
//  */
function getAllProductCategories(){
    global $connection;
    $data = [];
    $query = "SELECT * FROM product_categories";

    $result = mysqli_query($connection, $query);

   if(mysqli_num_rows($result)>0){
        $data = $result ->fetch_all(MYSQLI_ASSOC);
   }
     return $data;
}




// /**
//  * lấy sản phẩm bằng danh mục
//  * @param mixed $category_id
//  * @return array
//  */
function getProductByCategory($category_id){
    global $connection;
    $data = [];
    $query = "SELECT * FROM products WHERE product_category_id = $category_id";

    $result = mysqli_query($connection, $query);
    
   if(mysqli_num_rows($result)>0){
     $data = $result ->fetch_all(MYSQLI_ASSOC);
   }
   return $data;
}





function createProduct( $name,
                        $slug ='',
                        $thumbnail,
                        $price,
                        $sale_price,
                        $product_category_id,
                        $content
                    ){
                    global $connection;
    
    $query = "INSERT INTO products (   
                        name,  
                        slug ,
                        thumbnail,
                        price,
                        sale_price,
                        content,
                        product_category_id
                        ) 
            VALUES (
                        '$name',
                        '$slug',
                        '$thumbnail',
                        '$price',
                        '$sale_price',
                        '$content',
                        '$product_category_id'
                    )";

            mysqli_query($connection,$query);
           
}


function updateProduct( $name,
                        $slug ='',
                        $thumbnail,
                        $price,
                        $sale_price,
                        $product_category_id,
                        $content,
                        $id
                    ){
                    global $connection;
                    $query = "UPDATE products SET 
                    `name`='$name',
                    `thumbnail`='$thumbnail',
                    `price`='$price',
                    `sale_price`='$sale_price',
                    `content`='$content',
                    `product_category_id`='$product_category_id',
                    `content` = '$content'
                    WHERE `id` =$id 
                    ";
                    // echo $query;
                    mysqli_query($connection, $query);

    $query = "INSERT INTO products   
                        name,  
                        slug ,
                        thumnail,
                        price,
                        sale_price,
                        content,
                        product_category_id
                        ) 
            VALUES (
                        'name',
                        'slug'',
                        'thumnail',
                        'price',
                        'sale_price',
                        'content',
                        '$product_category_id'
                    )";

            mysqli_query($connection,$query);
}







// Lab 8
// function getOneProduct($id){
//      global $connection;
//      $data = [];
//      // $query = "SELECT * FROM products WHERE `id` = $id";
//      $query = "SELECT * FROM table WHERE `id` = ?";
//      $stmt = mysqli_prepare($connection, $query);
//      mysqli_stmt_bind_param($stmt,"i",$id);
//      mysqli_stmt_execute($stmt);
//      mysqli_stmt_bind_result($stmt,$result);
     
//      $result = mysqli_query($connection, $query);
//      $data = mysqli_fetch_assoc($result);
//     if(mysqli_num_rows($result)>0){
//          $data = $result ->fetch_assoc();
//     }
//       return $data;
//  }

// function createProduct( 
//                $name,
//                $slug ='',
//                $thumbnail,
//                $price,
//                $sale_price,
//                $product_category_id,
//                $content
// ){
//                global $connection;

// $query = "INSERT INTO products (   
//                     name,  
//                     slug ,
//                     thumbnail,
//                     price,
//                     sale_price,
//                     content,
//                     product_category_id
//                     ) 
//                     VALUES (
//                     '?',
//                     '?',
//                     '?',
//                     '?',
//                     '?',
//                     '?',
//                     '?'
//                     )";
//           $stmt = mysqli_prepare($connection, $query);
//           mysqli_stmt_bind_param($stmt, "sssiisi", $name, $slug, $thumbnail, $price, $sale_price,
//           $product_category_id, $content);

//      return mysqli_stmt_execute($stmt);


// function updateProduct( $name,
//                         $slug ='',
//                         $thumbnail,
//                         $price,
//                         $sale_price,
//                         $product_category_id,
//                         $content,
//                         $id
//                     ){
//                     global $connection;
//                     $query = "UPDATE products SET 
//                     `name`='$name',
//                     `thumbnail`='$thumbnail',
//                     `price`='$price',
//                     `sale_price`='$sale_price',
//                     `content`='$content',
//                     `product_category_id`='$product_category_id',
//                     `content` = '$content'
//                     WHERE `id` =$id 
//                     ";
//                     // echo $query;
//                     mysqli_query($connection, $query);

//     $query = "INSERT INTO products   
//                         name,  
//                         slug ,
//                         thumnail,
//                         price,
//                         sale_price,
//                         content,
//                         product_category_id
//                         ) 
//             VALUES (
//                         'name',
//                         'slug'',
//                         'thumnail',
//                         'price',
//                         'sale_price',
//                         'content',
//                         '$product_category_id'
//                     )";

//             mysqli_query($connection,$query);
// }
// }
?>