<?php
function input_sanitizer($data)
{
    $data = str_replace("'", '', $data);
    $data = str_replace('"', '', $data);
    $data = str_replace('*', '', $data);
    $data = str_replace(',', '', $data);
    $data = str_replace('`', '', $data);
    $data = str_replace('(', '', $data);
    $data = str_replace(')', '', $data);
    $data = str_replace('{', '', $data);
    $data = str_replace('}', '', $data);
    $data = str_replace('[', '', $data);
    $data = str_replace(']', '', $data);
    $data = str_replace('=', '', $data);
    $data = str_replace('&', '', $data);
    $data = str_replace('@', '', $data);
    $data = str_replace('$', '', $data);
    $data = str_replace('+', 'Plus', $data);
    $data = trim($data); //Remove whitespaces from both sides of a strings
    $data = stripslashes($data); //Remove the backslash
    $data = htmlspecialchars($data);
    //$data = str_replace('-', '&#45;', $data); this line brack product.php
    return $data;
}
?>