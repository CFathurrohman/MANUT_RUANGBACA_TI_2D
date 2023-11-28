<?php
function antiinjection($koneksi, $data)
{
    $filter_sql = mysqli_real_escape_string($koneksi, stripcslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES))));
    return $filter_sql;
}