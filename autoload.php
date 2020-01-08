<?php

function autoloader($class) {
    // automatically adding the php extension to $class files
    $filename = $class.".php";
    // load all files
    $arrPlaces = array("Libs", "Models", "Views", "Controllers");

    foreach($arrPlaces as $place)
    {
        if (file_exists($place."/$filename"))
        {
            include_once($place."/".$filename);
        }
    }
}

spl_autoload_register('autoloader');

?>