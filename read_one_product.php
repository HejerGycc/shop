<?php

// get ID of the product to be read
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
 
// include database and object files
include_once 'config/database.class.php';
include_once 'classes/product.class.php';
include_once 'classes/category.class.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare objects
$product = new Product($db);
$category = new Category($db);
 
// set ID property of product to be read
$product->id = $id;
 
// read the details of product to be read
$product->readOne();

// set page headers
$page_title = "Read One Product";
include_once "layout_header.php";
 
// read products button
echo "<div class='right-button-margin'>";
    echo "<a href='products.php' class='btn btn-primary pull-right'>";
        echo "<span class='glyphicon glyphicon-list'></span> All Products";
    echo "</a>";
echo "</div>";

// HTML table for displaying a product details
echo "<table class='table table-hover table-responsive table-bordered'>";
 
    echo "<tr>";
        echo "<td>Name</td>";
        echo "<td>{$product->name}</td>";
    echo "</tr>";
 
    echo "<tr>";
        echo "<td>Price</td>";
        echo "<td>&#36;{$product->price}</td>";
    echo "</tr>";
 
    echo "<tr>";
        echo "<td>Description</td>";
        echo "<td>{$product->description}</td>";
    echo "</tr>";
 
    echo "<tr>";
        echo "<td>Category</td>";
        echo "<td>";
            // display category name
            $category->id=$product->category_id;
            $category->readName();
            echo $category->name;
        echo "</td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td>Image</td>";
        echo "<td>";
            echo $product->image ? "<img src='uploads/{$product->image}' style='width:300px;' />" : "No image found.";
        echo "</td>";
    echo "</tr>";
   
    echo "<tr>";
    echo "<td colspan='2'>";
    echo "<div align='center'><a href='add_to_cart.php?id={$id}' class='btn btn-primary w-100-pct'><i class='fas fa-shopping-cart'></i>  Add to Cart</a></div>";
    echo "</td>";
    echo "</tr>";


 
echo "</table>";
 
// set footer
include_once "layout_footer.php";
?>