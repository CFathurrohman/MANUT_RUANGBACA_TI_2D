<?php
    define('BASEURL', 'http://localhost/manut_ruangbaca_ti_2d/public');

    //DB
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'sistem_ruang_baca');

    class koneksi {
		public $hostname = "localhost";
		public $username = "root";
		public $password = "";
		public $database = "sistem_ruang_baca";

		public $con;

		public function __construct()
        {
            $this->con = mysqli_connect($this->hostname, $this->username, $this->password, $this->database) or die("Connection corrupt");
        }	
	}
?>