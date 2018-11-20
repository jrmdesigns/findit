<?php
$file = file_get_contents('text.txt');
$file = explode("\n", $file);
$taxonomy = array();
foreach ($file as $index => $line) {
    $fields = explode(" > ", $line);
    $cursor = &$taxonomy;
    foreach ($fields as $field) {
        if (!isset($cursor[$field])) {
            $cursor[$field] = array();
        }
        $cursor = &$cursor[$field];
    }
}

echo $taxonomy[0][0][0][1];
//echo $taxonomy;
var_dump($taxonomy);


?>