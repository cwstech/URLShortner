<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Welcome To URL Shortar</title>
</head>

<body>
    Home Page
    <form method="post" action="url.php">
        <label>Inpute URL</label><br>
        <input type="url" name="web" placeholder="Enter Website to make short" />
        <br>
        <input type="submit" value="go" />
    </form><br>
    <?php
    session_start();
    if (isset($_SESSION['url'])) {
        echo "Your Shorted URL is :- <div class='copy-box' id='copyBox'><code>".$_SERVER['SERVER_NAME']."/" . $_SESSION['url'] . "</code><button onclick='copyText()'>Copy</button></div>";
    } elseif (isset($_SESSION['err'])) {
        echo "<script> alert('".$_SESSION['err']."')</script>";
    }
    session_destroy();
    ?>
    <script src="js.js"></script>
</body>

</html>