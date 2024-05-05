<?php
    try {
        $db = new PDO('mysql:host=localhost;dbname=mehmet', 'root', '');
    } catch (PDOException $th) {
        echo $th->getMessage();
    }
?>