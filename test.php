<?php

$protocol = "http";

if( $_SERVER['SERVER_PORT'] === "443") {
    $protocol = $protocol."s";
}

$actual_link = $protocol."://".$_SERVER['HTTP_HOST'];

print($actual_link);

?>