<?php

class Db
{
	public static function con()
	{
		//hasn't been moved to the proper place but...?
		$conDets = parse_ini_file("config.ini");
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
