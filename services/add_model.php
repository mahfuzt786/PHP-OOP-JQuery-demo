<?php
require '../classes/Model.php';
require '../includes/util.php';

$model = new Model();

if($image1) {
    $image1 = explode('.', $_FILES['image_file1']['name']);
    $image1 = $image1[0] . "_" . time() . "." . end($image1);

    $allowedExts = array("gif", "jpeg", "jpg", "png", "bmp");
    $extension = end($image1);
    $extension=strtolower($extension);

    if ((($_FILES["image_file1"]["type"] == "image/gif")
        || ($_FILES["image_file1"]["type"] == "image/jpeg")
        || ($_FILES["image_file1"]["type"] == "image/jpg")
        || ($_FILES["image_file1"]["type"] == "image/pjpeg")
        || ($_FILES["image_file1"]["type"] == "image/x-png")
        || ($_FILES["image_file1"]["type"] == "image/png")
        || ($_FILES["image_file1"]["type"] == "image/bmp"))
        && ($_FILES["image_file1"]["size"] < 1500000)
        && in_array($extension, $allowedExts))
    {
        if ( $_FILES['image_file1']['error'] > 0 ){
            echo 'Error: ' . $_FILES['image_file1']['error'] . '<br>';
        }
        else {
            move_uploaded_file($_FILES['image_file1']['tmp_name'], '../images/' . $image1);
        }
    }
    else
    {
        echo 'Invalid upload file.. Should be JPG,PNG,GIF,BMP and max 1500KB';
    }
}

$manufacturer_id = cleanValue(getPost("manufacturer_id"));
$name = cleanValue(getPost("model-name"));
$color = cleanValue(getPost("model-color"));
$year = cleanValue(getPost("model-year"));
$registration_number = cleanValue(getPost("model-reg-no"));
$note = cleanValue(getPost("model-note"));
$count = cleanValue(getPost("model-count"));

if( $manufacturer_id === 'null' )
{
    echo "Please enter Manufacturer Name";
}
elseif( $name== 'null' )
{
    echo "Please enter model Name";
}
elseif( $color== 'null' )
{
    echo "Please enter model color";
}
elseif( $year== 'null' )
{
    echo "Please enter model year";
}
elseif( $registration_number == 'null' )
{
    echo "Please enter model registration number";
}
elseif( $note == 'null' )
{
    echo "Please enter model note";
}
elseif( $count == 'null' )
{
    echo "Please enter model count";
}
else {
    $data = [
            "manufacturer_id" => cleanValue(getPost("manufacturer_id")),
            "name" => cleanValue(getPost("model-name")),
            "color" => cleanValue(getPost("model-color")),
            "year" => cleanValue(getPost("model-year")),
            "registration_number" => cleanValue(getPost("model-reg-no")),
            "note" => cleanValue(getPost("model-note")),
            "count" => cleanValue(getPost("model-count")),
            "image_url" => $image1
        ];

    echo $model->insert($data);
}