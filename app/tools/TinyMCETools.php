<?php
namespace app\tools;

class TinyMCETools
{
	public function clean($dirtyString)
	{
		$cleanedString = utf8_encode(strip_tags(stripslashes($dirtyString)));
		
		return $cleanedString;
	}
}