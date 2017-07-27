<?php

Class Color {
	public static $verbose = FALSE;
	public $_red = 0;
	public $_green = 0;
	public $_blue = 0;
	private $_rgb = 0;


}

static function doc()
{
	return (file_get_contents('Color.doc.txt'));
}

public function __construct( array $kwargs)
{

	return ;
}

public function __destruct()
{
	return ;
}

public function __toString()
{
}

?>
