#!/usr/bin/php -q

<?php
	
	include "simple_html_dom.php";

	if(!defined ("STDIN"))
	{
		define ("STDIN", fopen('php://stdin', 'r'));
	}	

	//Get the URL:
	echo "Enter the manga url: ";
	$url = fread(STDIN, 80); //Read from cmd line

	//Get the number of episodes
	echo "Enter the number of episodes: ";
	$episodeNumber = fread(STDIN, 80);
	
	//Get the folder name
	echo "Enter the folder name: ";
	$dir = fread(STDIN, 80);
	
	//Create a directory which ultimately 
	//manga pages will be stored locally.
	mkdir($dir);
	
	for($i = 0; $i < $episodeNumber; $i++)
	{
		if($i > 0)
		{
			$new_url = $url;
			$new_url .= "/page_";
			$new_url .=  $i+1;
			echo "old url: " . $url . "\n";
			echo "new url: " . $new_url . "\n";
			$html = file_get_html($new_url);
			$img = $html->find('#imgPage');
			//echo $img[0]->src . "\n";
			
	
			$file_name = $dir. "/" . "episode" . $i . ".jpg";
			$fh = fopen($file_name, 'w');
			fwrite($fh, file_get_contents($img[0]->src));
			fclose($fh);
			
		}
		else  // first loop
		{
			$html = file_get_html($url);
			$img = $html->find('#imgPage');
			//echo $img[0]->src . "\n";	
			
			$file_name = "episode" . $i . ".jpg";
			$fh = fopen($file_name, 'w');
			fwrite($fh, file_get_contents($img[0]->src));
			fclose($fh);
		}
	}
?>
