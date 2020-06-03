<?php
function truncateStringWords($str, $maxlen): string
{
    if (strlen($str) <= $maxlen) return $str;

    $newstr = substr($str, 0, $maxlen);
    if (substr($newstr, -1, 1) != ' ') $newstr = substr($newstr, 0, strrpos($newstr, " "));

    return $newstr;
}
?>