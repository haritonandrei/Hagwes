<?php

require("../../configuration.php");
require("../../classes/Article.php");
require("../../functions.php");

function objectToArray ($object) {
    if(!is_object($object) && !is_array($object))
        return $object;

    return array_map('objectToArray', (array) $object);
}

$articles_object	= get_articles($server_name, $username, $password, $database_name, $tables_prefix);
$articles_array		= objectToArray($articles_object);
$articles_json		= str_replace('\\u0000Article\\u0000', '', json_encode($articles_array));

header('Content-Type: application/json');

print($articles_json);

?>
