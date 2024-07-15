<?php

require_once('config/constants.php');
function redirect($url) {
    header("Location: {$url}");
    die();
}