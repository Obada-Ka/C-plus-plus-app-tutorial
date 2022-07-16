<?php
    function compiler ($co,$in){
	putenv("PATH=C:\Program Files (x86)\CodeBlocks\MinGW\bin");
	$CC="g++";
	$out="a.exe";
	$code=$co;
	$input=$in;
	$filename_code="main.cpp";
	$filename_in="input.txt";
	$filename_error="error.txt";
	$executable="a.exe";
	$command=$CC." -lm ".$filename_code;	
	$command_error=$command." 2>".$filename_error;
    $file_code=fopen($filename_code,"w+");
	fwrite($file_code,$code);
	fclose($file_code);
	$file_in=fopen($filename_in,"w+");
	fwrite($file_in,$input);
	fclose($file_in);
	exec("cacls  $executable /g everyone:f"); 
	exec("cacls  $filename_error /g everyone:f");
	shell_exec($command_error);
	$error=file_get_contents($filename_error);
	
	if(trim($error)=="")
	{
		if(trim($input)=="")
		{
			$output=shell_exec($out);
		}
		else
		{
			$out=$out." < ".$filename_in;
			$output=shell_exec($out);
		}
		
	}
	else if(!strpos($error,"error"))
	{
		
		if(trim($input)=="")
		{
			$output=shell_exec($out);
		}
		else
		{
			$out=$out." < ".$filename_in;
			$output=shell_exec($out);
		}
		
		
		         
	}
	if($error!=""){
		return $error;
	}
	else{
		return $output;
	}

	}
	
?>