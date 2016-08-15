<?php
	session_start();
	$assistant=1;
	$file_handle=fopen('output_ex.csv','r');
	$count=0;
	$mean=array();
	$low_count=0;
	$normal_count=0;
	$high_count=0;
	$skip=1;
	while (! feof($file_handle) ) 
	{
		
		$line_of_text = fgetcsv($file_handle,1024,',');
		$num=count($line_of_text);
		$mean[$count]=(float)$line_of_text[$num-2];
		if($skip==1)
		{
			$skip++;
			continue;
			
		}
		if($mean[$count]<0.3)
		{
			$low_count++;
		}
		else
		{
			if($mean[$count]<0.7)
			{
				$normal_count++;
			}
			else
			{
				$high_count++;
			}
		}
		$count++;
	}
	fclose($file_handle);
	$_SESSION['low_count']=$low_count;
	$_SESSION['normal_count']=$normal_count;
	$_SESSION['high_count']=$high_count;
	
	
	include("assist".$assistant.".html");
	
?>