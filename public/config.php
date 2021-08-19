<?php
// File ini berfungsi untuk menghubungkan program dengan database
// Nama database yang diguanakn adalah TaskManagementDB.php

class MyDB extends SQLite3
{
    function __construct()
    {
        $this->open('../database/TaskManagementDB.db');
    }
}

$db = new MyDB();
?>