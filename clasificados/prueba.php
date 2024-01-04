<?php
var_dump($_SERVER['SCRIPT_URI']);
echo "<br>";
var_dump(parse_url($_SERVER['SCRIPT_URI']));
echo "<br>";
var_dump(basename($_SERVER['PHP_SELF']));
 ?>