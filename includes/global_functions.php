<?php

function site_url() {
    return $_SERVER['SERVER_NAME'];
}

function pre($arr) {
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
}