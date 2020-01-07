<?php

function autoloader($class) {
    $filename = $class.".php";
    //load all files
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