<?php
if (isset($_POST['web'])) {
    session_start();
    require 'inc/config.php';
    $obj = new DB();
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-_';
    $length = rand(1, 7); // Random length between 1 and 8 characters
    $randomString = '';
    function gen($length, $randomString, $characters)
    {
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }
    $url = $_POST['web'];
    $parsed = parse_url($url);
    $domain = $parsed['host'];
    // echo $domain . "-domain.";
    if ($domain == 'bit.ly' || $domain == 'ow.ly' || $domain == 'goo.gl' || $domain == 'adF.ly' || $domain == 'buff.ly' || $domain == 'short.io' || $domain == 'bl.ink' || $domain == 't.ly') {
        $_SESSION['err'] = "Web is alrady shortain";
        header("Location: /");
    } else {
        $res = $obj->ser_url($_POST['web']);
        if (mysqli_num_rows($res) > 0) {
            while ($b = mysqli_fetch_row($res)){
                $_SESSION['err'] = "URL ".$_SERVER['SERVER_NAME']."/".$b[2];
                header("Location: /");
            }
        } else {
            do {
                $value = gen($length, $randomString, $characters);
                $sres = $obj->ser_sort($value);
            } while (mysqli_num_rows($sres) > 0);
            $ins = $obj->create_short($value, $_POST['web']);
            if ($ins) {
                //////baki----------------------------
                $_SESSION['url'] = $value;
                header("Location: /");
            } else {
                $_SESSION['err'] = "Url Create Fail Try Again";
            }
        }


        echo "<br>Your Shorted URL is :- <div class='copy-box' id='copyBox'><code>" . $_POST['web'] . "</code><button onclick='copyText()'>Copy</button></div>";



?>
        <script src="js.js"></script>
<?php
    }
} else {
    header("Location: /");
}

?>