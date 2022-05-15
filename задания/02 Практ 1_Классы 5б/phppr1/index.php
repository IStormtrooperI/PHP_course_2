<?php
require("html.php");

$New_page = new HTMLPage("index");

$page = $New_page->write();

echo $page;


?>