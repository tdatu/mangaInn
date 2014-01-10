#!/usr/bin/php -q

<?php
	
	include "simple_html_dom.php";

	if(!defined ("STDIN"))
	{
		define ("STDIN", fopen('php://stdin', 'r'));
	}	

	//Get the URL:
	echo "Enter the manga url: ";
	$url = trim(fread(STDIN, 80)); //Read from cmd line

	//Get the number of episodes
	echo "Enter the number of episodes: ";
	$episodeNumber = trim(fread(STDIN, 80));
	
	//Get the folder name
	echo "Enter the folder name: ";
	$folderName = trim(fread(STDIN, 80));
	mkdir($folderName);

	for($i = 0; $i < $episodeNumber; $i++)
	{
		if($i > 0)
		{
			//Assemble url
			$new_url = $url;
			$new_url .= "/page_";
			$new_url .=  $i+1;
			
			//Get online resource
			$html = file_get_html($new_url);
			$img = $html->find('#imgPage');
			
			
			//Write on file
			$file_name = $folderName . "/" . "episode" . $i . ".jpg";
			$fh = fopen($file_name, 'w');
			fwrite($fh, file_get_contents($img[0]->src));
			fclose($fh);
			
		}
		else  // first loop
		{
			//Get online resource
			$html = file_get_html($url);
			$img = $html->find('#imgPage');
			
			//Write on file	
			$file_name = $folderName . "/" . "episode" . $i . ".jpg";
			$fh = fopen($file_name, 'w');
			fwrite($fh, file_get_contents($img[0]->src));
			fclose($fh);
		}
	}
?>