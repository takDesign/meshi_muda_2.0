<?php

class Db
{
	public static function con()
	{
		$conDets = parse_ini_file("db_config_meshi_muda.ini");
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
