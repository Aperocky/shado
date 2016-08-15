<?php

	$file_handle=fopen('results.csv','r');
	$file=fopen("mod_type_data.txt","w");
	$count=array();
	$temp_count=0;
	$ind=0;
	while (! feof($file_handle) ) 
	{
		
		$line_of_text = fgetcsv($file_handle,1024,',');
		$num=count($line_of_text);
		
		if($num>1)
		{
			$ind=0;
			$count[$temp_count]=array();
			$count[$temp_count][$ind]=(int)$line_of_text[0];
			for($i=1;$i<$num;$i=$i+2)
			{
				$ind++;
				$count[$temp_count][$ind]=(float)$line_of_text[$i];
				
				
			}
			
			$temp_count++;
		}
		
	}
	
	fclose($file_handle);
	$count[1][0]='time';
	for($i=0;$i<$ind;$i++)
	{
		$count[1][$i+1]='type'.$i;
		
	}

	for($i=1;$i<$temp_count;$i++)
	{
		for($j=0;$j<$ind;$j++)
		{
			fwrite($file,$count[$i][$j].",");
		}
		fwrite($file,$count[$i][$ind]."\n");
	}
	
	fclose($file);
	
?>