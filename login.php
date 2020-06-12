<?php

// ----------------------------------------------------------------------------
//
//  File: Edit10
//  Creation Date: 06/01/20 06:23:15 PM
//  Purpose: 
//
// ----------------------------------------------------------------------------
 
		include("includes.php");


		$GetToken=CreateLoginToken($UserCreds);

print_r($GetToken);

		$LoginToken=array('tokenkey' => $GetToken['tokenkey'],
											'logonkey' => $GetToken['logonkey']);
											
											
													