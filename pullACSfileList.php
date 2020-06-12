<?php

// ----------------------------------------------------------------------------
//
//  File: /web/USPSACSNIXIES/pullNewFiles.php
//  Creation Date: 06/01/20 06:58:01 PM
//  Purpose: pull list of files from USPS epf
//
// ----------------------------------------------------------------------------

error_reporting(0);
 
		include("includes.php");

		$LoginCreds=CreateLoginToken($UserCreds);
		
		#print_r($LoginCreds);
		# https://epfup.usps.gov/up/epfupld/download/acslist
	
			$credsArray=array("logonkey" => $LoginCreds['logonkey'],
												"tokenkey" => $LoginCreds['tokenkey']);
												
														
		
		$UserToken=json_encode($credsArray);
		
		print_r($UserToken);print("\n");
		$data=http_build_query(array('obj' => $UserToken));
		#print_r($data);


#		 $result=json_decode(CurlIt("download/acslist","POST",$data),true);

// 06/12/2020 01:40:46 PM Changed to dnldlist since this gives us the ZIP file names. 
		 $result=json_decode(CurlIt("download/dnldlist","POST",$data),true);

#		print_r($result);
	 
#		processASCfilesResults($result['fileList']);

// 06/12/2020 01:46:08 PM new record set for dnld
		processASCfilesResults($result['dnldfileList']);

		


/**
		processASCfilesResults
		Extracts the file name from the json file from USPS and inserts info into database
**	
*/
				
function processASCfilesResults($files){
	
 foreach($files as $file){
 	
 	$account=$file['account'];
 	$status=$file['status'];
 	$fileid=$file['fileid'];
 	$filepath=$file['filepath'];
 	$filename=$file['filename'];
 	$filesize=$file['filesize'];
 	$fulfilled=$file['fulfilled'];
 	
 	// 06/12/2020 01:41:40 PM New fields from dnldlist end point 
 	
 	$filename=$file['filename'];
 	$productcode=$file['productcode'];
 	$productid=$file['productid'];
 	
 	
 	$sql="insert into fileList(fileid,account,status,filepath,filesize,fulfilled,filename,productcode,productid) 
 	values ('".$fileid."','".$account."','".$status."','".$filepath."','".$filesize."','".$fulfilled."','".$filename."','".$productcode."','".$productid."') 
 	on duplicate key update status='".$status."';";
 	
 	put_into_db($sql);
 	
 	print("ID:".$fileid." FileName:".$filename."\n");

 	
 	
}
	
}