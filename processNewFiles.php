<?php

// ----------------------------------------------------------------------------
//
//  File: /web/USPSACSNIXIES/processNewFiles.php
//  Creation Date: 06/29/20 06:44:50 PM
//  Purpose: Unzip and import data download from USPS
//
// ----------------------------------------------------------------------------
 
		include("includes.php");

		$DBlink = connect_to_database();
		
		$sql="	SELECT * FROM fileList where processed='N' and filename like 'P%' ORDER BY fulfilled ASC";
		
			$result= mysqli_query($DBlink,$sql)  or die("\n\n*** CANNOT execute sql\n------------------------\n".$sql."\n-----------------\n\n");
			
			while($row = mysqli_fetch_assoc($result)) {
			
			$FileID=$row['fileid'];
			$FileName=$row['filename'];
			$FileProductID=$row['productid'];
			
 
			
				preg_match('/P[0-9][0-9][0-9][0-9][0-9][0-9]_(.*)_[0-9][0-9][0-9][0-9][0-9]/', $FileName, $matches);
				$FilePass=$matches[1];

#			P200207_200207_20625.ZIP
#			P20020720.625

				preg_match('/P[0-9][0-9][0-9][0-9][0-9][0-9]_(.*)_([0-9][0-9])(.*).ZIP/', $FileName, $matches);

				PRINT_R($matches);
				
				$ACSfileName="P".$matches[1].$matches[2].".".$matches[3];
				PRINT($FileID." - ".$FileName." - ".$ZipPasswords[$FilePass]." - ".$ACSfileName."\n");
				
			## unzip file	
				
				$unzipCMD= "unzip  -P ".$FilePass." -d temp ".$FileName;
			
			## process ACS file in zip 
			
			
			## delete files from ZIP
				
			}
			
			
			
			



function processHeader($LineInFile){
		print("header");
		$Header_RecordType						 = substr($LineInFile, 0  ,1); 
    $Header_FileVersion						 = substr($LineInFile, 1  ,2); 
		$Header_CustomerID             = substr($LineInFile, 3  ,6);
		$Header_CreateDate             = substr($LineInFile, 9  ,8);
    $Header_ShipmentNumber         = substr($LineInFile, 17 ,10);
    $Header_TotalAcsRecordCount    = substr($LineInFile, 27 ,9);
    $Header_TotalCoaCount          = substr($LineInFile, 36 ,9);
    $Header_TotalNixieCount        = substr($LineInFile, 45 ,9);
    $Header_TrdRecordCount         = substr($LineInFile, 54 ,9);
    $Header_TrdAcsFeeAmount        = substr($LineInFile, 63 ,11);
    $Header_TrdCoaCount            = substr($LineInFile, 74 ,9);
    $Header_TrdCoaAcsFeeAmount     = substr($LineInFile, 83 ,11);
    $Header_TrdNixieCount          = substr($LineInFile, 94 ,9);
    $Header_TrdNixieAcsFeeAmount   = substr($LineInFile, 103,11);
    $Header_OcdRecordCount         = substr($LineInFile, 114,9); 
    $Header_OcdAcsFeeAmount        = substr($LineInFile, 123,11);
    $Header_OcdCoaCount            = substr($LineInFile, 134,9); 
    $Header_OcdCoaAcsFeeAmount     = substr($LineInFile, 143,11);
    $Header_OcdNixieCount          = substr($LineInFile, 154,9); 
    $Header_OcdNixieAcsFeeAmount   = substr($LineInFile, 163,11);
    $Header_FsRecordCount          = substr($LineInFile, 174,9); 
    $Header_FsAcsFeeAmount         = substr($LineInFile, 183,11);
    $Header_FsCoaCount             = substr($LineInFile, 194,9); 
    $Header_FsCoaAcsFeeAmount      = substr($LineInFile, 203,11);
    $Header_FsNixieCount           = substr($LineInFile, 214,9); 
    $Header_FsNixieAcsFeeAmount    = substr($LineInFile, 223,11);
    $Header_ImpbRecordCount        = substr($LineInFile, 234,9); 
    $Header_ImpbAcsFeeAmount       = substr($LineInFile, 243,11);
    $Header_ImpbCoaCount           = substr($LineInFile, 254,9); 
    $Header_ImpbCoaAcsFeeAmount    = substr($LineInFile, 263,11);
    $Header_ImpbNixieCount         = substr($LineInFile, 274,9); 
    $Header_ImpbNixieAcsFeeAmount  = substr($LineInFile, 283,11);
    $Header_Filler                 = substr($LineInFile, 294,405); 
    $Header_EndMarker              = substr($LineInFile, 699,1);
   
   
$sql="insert into (fileID,RecordType, FileVersion, CustomerID, CreateDate, ShipmentNumber, TotalAcsRecordCount, TotalCoaCount, TotalNixieCount, TrdRecordCount, TrdAcsFeeAmount, TrdCoaCount, TrdCoaAcsFeeAmount, TrdNixieCount, TrdNixieAcsFeeAmount, OcdRecordCount, OcdAcsFeeAmount, OcdCoaCount, OcdCoaAcsFeeAmount, OcdNixieCount, OcdNixieAcsFeeAmount, FsRecordCount, FsAcsFeeAmount, FsCoaCount, FsCoaAcsFeeAmount, FsNixieCount, FsNixieAcsFeeAmount, ImpbRecordCount, ImpbAcsFeeAmount, ImpbCoaCount, ImpbCoaAcsFeeAmount, ImpbNixieCount, ImpbNixieAcsFeeAmount, Filler, EndMarker) values ('.$FileID.','.$Header_RecordType.', '.$Header_FileVersion.', '.$Header_CustomerID.', '.$Header_CreateDate.', '.$Header_ShipmentNumber.', '.$Header_TotalAcsRecordCount.', '.$Header_TotalCoaCount.', '.$Header_TotalNixieCount.', '.$Header_TrdRecordCount.', '.$Header_TrdAcsFeeAmount.', '.$Header_TrdCoaCount.', '.$Header_TrdCoaAcsFeeAmount.', '.$Header_TrdNixieCount.', '.$Header_TrdNixieAcsFeeAmount.', '.$Header_OcdRecordCount.', '.$Header_OcdAcsFeeAmount.', '.$Header_OcdCoaCount.', '.$Header_OcdCoaAcsFeeAmount.', '.$Header_OcdNixieCount.', '.$Header_OcdNixieAcsFeeAmount.', '.$Header_FsRecordCount.', '.$Header_FsAcsFeeAmount.', '.$Header_FsCoaCount.', '.$Header_FsCoaAcsFeeAmount.', '.$Header_FsNixieCount.', '.$Header_FsNixieAcsFeeAmount.', '.$Header_ImpbRecordCount.', '.$Header_ImpbAcsFeeAmount.', '.$Header_ImpbCoaCount.', '.$Header_ImpbCoaAcsFeeAmount.', '.$Header_ImpbNixieCount.', '.$Header_ImpbNixieAcsFeeAmount.', '.$Header_Filler.', '.$Header_EndMarker.') on duplicate key fileID=fileID;";

put_into_db($sql);


}
			