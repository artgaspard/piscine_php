<?php
Class Tyrion extends Lannister {

	public function sleep($character)
	{
		if (get_parent_class($character) === "Lannister") 
		{
			return ("Not even if I'm drunk !");
		}
		else
			return ("Let's do this.");
	}
}
?>
