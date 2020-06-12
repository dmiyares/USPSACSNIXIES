<?php

// ----------------------------------------------------------------------------
//
//  File: includes.php
//  Creation Date: 04/24/20 03:42:07 PM
//  Purpose: God file for USPS project
//
// ----------------------------------------------------------------------------
 
 
 include("config.php");
 
/**
 **  Random Notes 
 

Various URLs and methods
https://epfup.usps.gov/up/epfupld/epf/version		GET
https://epfup.usps.gov/up/epfupld/epf/login		POST
https://epfup.usps.gov/up/epfupld/epf/logout		POST
https://epfup.usps.gov/up/epfupld/download/status	POST
https://epfup.usps.gov/up/epfupld/download/acslist	POST
https://epfup.usps.gov/up/epfupld/download/dnldlist	POST
https://epfup.usps.gov/up/epfupld/download/list		POST	
https://epfup.usps.gov/up/epfupld/download/listplus  	POST
https://epfup.usps.gov/up/epfupld/download/epf 		POST	(download ALL files)


 Some background in to these fucking terms.
		NIXIE - https://en.wikipedia.org/wiki/Nixie_(postal)
		NCOA (COA) - https://en.wikipedia.org/wiki/National_Change_Of_Address
*/
			


########################################################################################

// File Formats

		$COA="";

	

########################################################################################

function CurlIt($function,$Method="GET",$json_params="",$fileName=""){
	
	      
	$url='https://epfup.usps.gov/up/epfupld/'.$function;
	
  $headers=array( 'Accept-Language: en-US',
									'Accept: */*',
    							'Content-Type: application/x-www-form-urlencoded',
    							);
	
	         $ch = curl_init();

#            curl_setopt($ch, CURLOPT_VERBOSE, true);
            curl_setopt($ch, CURLOPT_URL, $url);
	if($Method !='PUT'){            
          curl_setopt($ch, CURLOPT_HTTPGET, $Method);  }
          ELSE 
          {
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $Method);
          	
          }
            curl_setopt($ch, CURLOPT_USERAGENT, 'USPS ACS API Connect v0.1.5 (https://www.wtwhmedia.com)');
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);            
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
 						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
 						
	if($fileName){
					
						$tempFP = fopen('downloads/'.$fileName, 'w+');
						curl_setopt($ch, CURLOPT_FILE , $tempFP);
		} 						
 						
				if($json_params){
						curl_setopt($ch, CURLOPT_POSTFIELDS, $json_params);
				}  						
            $result = curl_exec($ch);
            curl_close($ch);

 
            return($result);

}


function CreateLoginToken($UserCreds){
 
		$data=http_build_query(array('obj' => json_encode($UserCreds)));
		$result=json_decode(CurlIt("epf/login","POST",$data),true);
		
		
		$LoginToken=array('tokenkey' => $result['tokenkey'],
											'logonkey' => $result['logonkey']);	
	 return($LoginToken);
	
	}




	
########################################################################################

			function CONNECT_TO_DATABASE()
			 {
			       
			$link = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD) 
			 or die("Unable to connect to MySQL");
			
			mysqli_select_db($link,DATABASE_NAME);
			mysqli_query($link,"SET CHARACTER SET utf8mb4");
			mysqli_query($link,"SET NAMES 'utf8mb4'");  
			
			 return($link); # NEW WITH mysqli
			
			}


########################################################################################

			function PUT_INTO_DB($SQL,$link="") {  # works with update/delete/insert
			
			if(!($link)){
			 $link = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD) 
			 or die("Unable to connect to MySQL");
			 
			 mysqli_select_db($link,DATABASE_NAME);
			 mysqli_query($link,"SET CHARACTER SET utf8mb4");
			 mysqli_query($link,"SET NAMES 'utf8mb4'");  
			
				}
			  $result= mysqli_query($link,$SQL) or die("\n\n".mysqli_error($link)."\n\n cannot execute sql:".$SQL."\n\n".mysqli_error($link));
			  
			 if (!$result)  {print("\n\nUnable to insert into database\n\n$SQL\n\n");}
				return(mysqli_insert_id($link));
				 mysqli_close($link);
			 }
 	
