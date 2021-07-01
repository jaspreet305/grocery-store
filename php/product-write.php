<?php

//Open file
$products = fopen("database/products.csv", "a+");

//If file is not found, return error
if ($products == false) {
    echo "error opening the file!";
    exit();
}

//Get all necessary variables from post
$old_id = filter_input(INPUT_POST, 'id');
$productName = filter_input(INPUT_POST, 'name');
$price = filter_input(INPUT_POST, 'price');
$discount = filter_input(INPUT_POST, 'discount');
$quantityType = filter_input(INPUT_POST, 'quantityType');
$image = filter_input(INPUT_POST, 'image');
$target_dir = dirname(__FILE__)."/../../assets/images/articles/";

//Upload the image to the server if any
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$image = basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if (file_exists($target_file)) {
    $uploadOk = 0;
}
if ($uploadOk != 0) {
    if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $uploadOk = 0;
    }
}
$proDes = filter_input(INPUT_POST, 'proDes');
$aisle = filter_input(INPUT_POST, 'aisle');


$found = FALSE;
$line = 0;
//Find the line to update by the product id
while (($row = fgetcsv($products, 1000, ",")) !== FALSE) {
    if ($row[0] === $old_id) {
        $id = $row[0];
        $old_image = $row[5];
        if($uploadOk == 1)
            $old_image = $image;
        $string = file_get_contents('database/products.csv');
        $data = explode("\n", $string);
        $updatedValue = $id . "," .$productName . "," . $discount . "," . $price. "," . $quantityType. "," . $old_image. "," . $aisle . "," . $proDes;
        $data[$line] = $updatedValue;
        file_put_contents('database/products.csv', implode("\n", $data));
        $found = TRUE;
        break;
    }
    $line++;
}
//If the line is not found, update the file by adding a new product
if ($found == FALSE) {
    $no_of_lines = count(file("database/products.csv"));
    $data = file("database/products.csv");
    $line = $data[count($data)-1];
    $realData = explode(",", $line);
    $id = $realData[0] + 1;

    fwrite($products, $id . "," .$productName . "," . $discount . "," . $price. "," . $quantityType. "," . $image. "," .$aisle . "," . $proDes . "\n");

}

//Close the file
fclose($products);

include ('product-list.php');
