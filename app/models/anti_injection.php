<?php
class anti_injection {
    protected $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function antiInjection($data) {
        $filter_sql = mysqli_real_escape_string(
            $this->connection,
            stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES)))
        );
        return $filter_sql;
    }
}

