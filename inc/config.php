<?php
require_once 'config.php';
class DB
{
    private $host = "sql303.epizy.com";
    private $user = "epiz_33615904";
    private $pass = "PcuB0LQaCNCB";
    private $db = "epiz_33615904_short";
    public $c;

    public function __construct()
    {
        $this->c = mysqli_connect($this->host, $this->user, $this->pass, $this->db);

        if ($this->c) {
            // echo "Database connected";
        } else {
            // echo "db not connected".mysqli_error();
            // header("Location: 500.html");
        }
        // echo "<br><br>";
    }
    public function ser_url($url)
    {
        // $sel = "SELECT * FROM url where BINARY m_url = '$url'";
        $sel = "SELECT * FROM url where m_url = '$url'";
        $res = mysqli_query($this->c, $sel);
        return $res;
    }
    public function ser_sort($url)
    {
        $sel = "SELECT m_url,short FROM url where BINARY short = '$url'";
        $res = mysqli_query($this->c, $sel);
        return $res;
    }
    public function create_short($surl, $url)
    {
        $sel = "INSERT INTO url (m_url, short) VALUES ('$url', '$surl') ";
        echo $sel;
        $res = mysqli_query($this->c, $sel);
        return $res;
    }
}
