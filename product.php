<?php
// include classes
include_once "config/database.class.php";
include_once "classes/product.class.php";
include_once "classes/product_image.php";
include_once "classes/cart_item.php";
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// initialize objects
$product = new Product($db);
$product_image = new ProductImage($db);
// get ID of the product to be edited and action
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
$action = isset($_GET['action']) ? $_GET['action'] : "";
 
// set the id as product id property
$product->id = $id;
 
// to read single record product
$product->readOne();
 
// set page title
$page_title = $product->name;

$cart_item = new CartItem($db);
 
// get ID of the product to be edited
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
$action = isset($_GET['action']) ? $_GET['action'] : "";
 
// set the id as product id property
$product->id = $id;
 
// to read single record product
$product->readOne();
 
// set page title
$page_title = $product->name;
 
// include page header HTML
include_once 'layout_header.php';
 
echo "<div class='col-md-12'>";
    if($action=='added'){
        echo "<div class='alert alert-info'>";
            echo "Product was added to your cart!";
        echo "</div>";
    }
 
    else if($action=='unable_to_add'){
        echo "<div class='alert alert-info'>";
            echo "Unable to add product to cart. Please contact Admin.";
        echo "</div>";
    }
echo "</div>";
 
// set product id
$product_image->product_id=$id;
 
// read all related product image
$stmt_product_image = $product_image->readByProductId();
 
// count all relatd product image
$num_product_image = $stmt_product_image->rowCount();
 
echo "<div class='col-md-1'>";
    // if count is more than zero
    if($num_product_image>0){
        // loop through all product images
        while ($row = $stmt_product_image->fetch(PDO::FETCH_ASSOC)){
            // image name and source url
            $product_image_name = $row['name'];
            $source="uploads/images/{$product_image_name}";
            echo "<img src='{$source}' class='product-img-thumb' data-img-id='{$row['id']}' />";
        }
    }else{ echo "No images."; }
echo "</div>";


function readAll($from_record_num, $records_per_page){
 
    $query = "SELECT
                id, name, description, price, category_id
            FROM
                " . $this->table_name . "
            ORDER BY
                name ASC
            LIMIT
                {$from_record_num}, {$records_per_page}";
 
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
 
    return $stmt;
}

// include page footer HTML
include_once 'layout_footer.php';
?>