<?php

class Db
{
	public static function con()
	{
        // $conDets = parse_ini_file("$_SERVER[DOCUMENT_ROOT]/../db_config_meshi_muda.ini");
		$conDets = parse_ini_file("db_config_meshi_muda.ini"); // REMOVE FOR FTP AND REPLACE W/LINE 7
		$con = mysqli_connect($conDets['host'], $conDets['username'], $conDets['password'], $conDets['database']);
		return $con;
	}

	public static function query($con, $sql)
	{
		Util::log($sql);
		$results = mysqli_query($con, $sql);
		return $results;
	}
}
