<?php

class HTMLPage
{
    protected $title,
        $link,
        $query,
        $result,
        $row,
        $id,
        $models,
        $description,
        $images,

        $header,
        $logo,
        $menu,
        $content,
        $footer,
        $page;

    function __construct($titleNC)
    {
        $this->title = $titleNC;
        $this->link = mysqli_connect("localhost", "mysql", "mysql", "phppr1");

    }

    function header()
    {
        $this->header = "<!DOCTYPE html>
                       <html lang='ru'>
                        <head>
                            <title>$this->title</title>
                            <meta charset='utf-8'>
                        </head>
                        <body>";
    }

    function logo()
    {
        if($this->title != "index") {
            $this->query = "SELECT models FROM tents WHERE id='$this->title'";
            $this->result = mysqli_query($this->link, $this->query);
            $this->row = mysqli_fetch_assoc($this->result);
            $this->models = $this->row['models'];
        } else {
            $this->models = "Основная страница";
        }

        $this->logo = "<p>$this->models</p><img width='100px' src='images/Logo.jpg'>";
    }

    function menu()
    {
        $this->query = "SELECT id,models FROM tents";
        $this->result = mysqli_query($this->link, $this->query);

        $this->menu = "<div><ul>";

        while ($this->row = mysqli_fetch_assoc($this->result)) {

//            print_r($this->row);
//            die;

            $this->id = $this->row["id"];
            $this->models = $this->row["models"];

            $this->menu = $this->menu . "<li><a href='item.php?id=$this->id'>$this->models</a></li>";
        }
        $this->menu = $this->menu . "</ul>";
    }

    function content()
    {
        if($this->title != "index"){
            $this->query = "SELECT description,images FROM tents WHERE id='$this->title'";
            $this->result = mysqli_query($this->link, $this->query);
            $this->row = mysqli_fetch_assoc($this->result);

            $this->description = $this->row["description"];
            $this->images = $this->row["images"];

            $this->content = "<div><p style='max-width: 400px'>$this->description</p><img  width='400px' src='images/$this->images'></div></div>";
        }
    }

    function footer()
    {
        $this->footer = "</body>
                         </html>";
    }

    function write()
    {

        $this->header();
        $this->logo();
        $this->menu();
        $this->content();
        $this->footer();

        $this->page = $this->header .
                        $this->logo .
                        $this->menu .
                        $this->content .
                        $this->footer;

        return $this->page;
    }
}

?>