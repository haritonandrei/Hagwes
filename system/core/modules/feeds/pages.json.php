<?php

require("../../configuration.php");
require("../../classes/Page.php");
require("../../functions.php");

function objectToArray ($object) {
    if(!is_object($object) && !is_array($object))
        return $object;

    return array_map('objectToArray', (array) $object);
}

$pages_object	= get_pages($server_name, $username, $password, $database_name, $tables_prefix);
$pages_array	= objectToArray($pages_object);
$pages_json		= str_replace('\\u0000Page\\u0000', '', json_encode($pages_array));

header('Content-Type: application/json');

print($pages_json);

?>
