<?php
    // PAGINATION: page given in URL parameter, default page is one
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    
    // set number of records per page
    $records_per_page = 6;
    
    // calculate for the query LIMIT clause
    $from_record_num = ($records_per_page * $page) - $records_per_page;
 
// include database and object files
include_once 'config/database.class.php';
include_once 'classes/product.class.php';
include_once 'classes/category.class.php';
 
// instantiate database and objects
$database = new Database();
$db = $database->getConnection();
 
$product = new Product($db);
$category = new Category($db);
 
    // query products
    $stmt = $product->readAll($from_record_num, $records_per_page);
    $num = $stmt->rowCount();

// set page header
$page_title = "Home";
include_once "layout_header.php";

// display the products if there are any
if($num>0){
 
    echo "<table class='table table-responsive' id='homeTable'> ";

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
 
            extract($row);
 
            echo "<tr>";
                echo "<td>";
                echo $image ? "<img src='uploads/{$image}' style='width:300px;' />" : "No image found.";echo "<br>{$name}<br>{$price}$";
                
                /*echo "<td>";
                    $category->id = $category_id;
                    $category->readName();
                    echo $category->name;
                echo "</td>";*/

                 echo "<br><a href='.php?id={$id}' class='btn btn-primary left-margin'>
                 <i class='fas fa-shopping-cart'></i> Add to cart
                </a>";
                echo "<br><br>";
                echo "<a href='read_one_product.php?id={$id}' class='btn btn-primary left-margin'>
                <span class='glyphicon glyphicon-list'></span> Details
                </a>";
                
                echo "</td>"; 
            echo "</tr>";
 
        }
 
    echo "</table>";
 
    // the page where this paging is used
    $page_url = "home.php?";
    
    // count all products in the database to calculate total pages
    $total_rows = $product->countAll();
    
    // paging buttons here
    include_once 'paging.php';
}
 
// tell the user there are no products
else{
    echo "<div class='alert alert-info'>No products found.</div>";
}

// set page footer
include_once "layout_footer.php";
?>