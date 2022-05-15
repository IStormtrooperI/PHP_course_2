<?php
require("html.php");

if(!isset($_GET['id'])) {
    header("Location: index.php");
}

$New_page = new HTMLPage($_GET['id']);

$page = $New_page->write();

echo $page;


?>