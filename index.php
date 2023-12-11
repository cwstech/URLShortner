<?php
if (isset($_GET['url'])) {
    // Retrieve the value
    $stringValue = $_GET['url'];
    include 'inc/config.php';
    $obj = new DB();
    $res = $obj->ser_sort($stringValue);
    while($a = mysqli_fetch_row($res)){
        if($a[0] != null && $a[1] != null){
            header("Location: $a[0]");
        }else{
            header("Location: 404.html");
        }
    }
    // echo "The value is: $stringValue";
} else {
    include 'home.php';
}

?>
