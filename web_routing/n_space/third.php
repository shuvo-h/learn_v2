<?php

require "first.php";
require "second.php";

$cat = new firstLibrary\Animal();
echo($cat->speak());

$cat2 = new secondLibrary\Animal();   // secondLibrary is the namespace name
echo($cat2->speak());
 

?>

<div>Third file</div>