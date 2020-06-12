<?php

// ----------------------------------------------------------------------------
//
//  File: /web/USPSACSNIXIES/DownloadNewFiles.php
//  Creation Date: 06/12/2020 02:13:22 PM
//  Purpose: pull list of files from USPS epf
//
// ----------------------------------------------------------------------------

#error_reporting(0);
 
		include("includes.php");
		
			$DBlink=connect_to_database();
			
			$sql="select fileid,filename from fileList where downloaded='N' order by fulfilled desc limit 3";
		
			$result= mysqli_query($DBlink,$sql)  or die("\n\n*** CANNOT execute sql\n------------------------\n".$sql."\n-----------------\n\n");
		
		
							while($row = mysqli_fetch_assoc($result)) {
								sleep(2);
								$fileID=$row['fileid'];
								$fileName=$row['filename'];
								print("Download:".$fileID." - ".$fileName."\n");
							
								

		$LoginCreds=CreateLoginToken($UserCreds);
		$credsArray=array("logonkey" => $LoginCreds['logonkey'],
											"tokenkey" => $LoginCreds['tokenkey'],
											"fileid"	=> $fileID);

		$UserToken=json_encode($credsArray);
		
	#	print_r($UserToken);print("\n");
		$data=http_build_query(array('obj' => $UserToken));
		
		$downloadResult=json_decode(CurlIt("download/epf","POST",$data,$fileName),true);

 
 		}

	