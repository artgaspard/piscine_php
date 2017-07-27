<?php

Class Jaime extends Lannister {

	public function sleep($character) 
	{
		if (get_parent_class($character) === "Lannister")
		{
			if (get_class($character) === "Cersei")
			{
				return ("With pleasure, but only in a tower in Winterfell, then");
			}
			else
				return ("Not even if I'm drunk !");
		}
		else
		{
			return ("Let's do this.");
		}
}
?>
