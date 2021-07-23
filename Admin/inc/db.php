<?php

/**
 * @return PDO
 */
function pdo(){
    return new PDO('mysql:host=mysql;dbname=blogarticles;host=127.0.0.1', 'root', "", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
}
?>