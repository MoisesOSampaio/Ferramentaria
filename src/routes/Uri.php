<?php

namespace SOURCE\routes;


class Uri{


    public static function getPath(){
        return parse_url($_SERVER['REQUEST_URI'])['path'];
    }

    public static function getQuery(){
        return parse_url($_SERVER['REQUEST_URI'])['query'];
    }
}