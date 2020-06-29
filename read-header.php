<?php
$file = fopen("downloads/tempq/P20020720.327","r");

while(! feof($file))
  {
  $LineInFile=fgets($file);

/**
*  TEST FOR HEADER
*/

	$RecordType= substr($LineInFile, 0,1); 


 				if($RecordType=="H"){
					processHeader($LineInFile);	
				}
					 else {
					 processData($LineInFile);
					}
  }

fclose($file);




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
   
   
insert into (fileID,RecordType, FileVersion, CustomerID, CreateDate, ShipmentNumber, TotalAcsRecordCount, TotalCoaCount, TotalNixieCount, TrdRecordCount, TrdAcsFeeAmount, TrdCoaCount, TrdCoaAcsFeeAmount, TrdNixieCount, TrdNixieAcsFeeAmount, OcdRecordCount, OcdAcsFeeAmount, OcdCoaCount, OcdCoaAcsFeeAmount, OcdNixieCount, OcdNixieAcsFeeAmount, FsRecordCount, FsAcsFeeAmount, FsCoaCount, FsCoaAcsFeeAmount, FsNixieCount, FsNixieAcsFeeAmount, ImpbRecordCount, ImpbAcsFeeAmount, ImpbCoaCount, ImpbCoaAcsFeeAmount, ImpbNixieCount, ImpbNixieAcsFeeAmount, Filler, EndMarker) values ('.$FileID.','.$Header_RecordType.', '.$Header_FileVersion.', '.$Header_CustomerID.', '.$Header_CreateDate.', '.$Header_ShipmentNumber.', '.$Header_TotalAcsRecordCount.', '.$Header_TotalCoaCount.', '.$Header_TotalNixieCount.', '.$Header_TrdRecordCount.', '.$Header_TrdAcsFeeAmount.', '.$Header_TrdCoaCount.', '.$Header_TrdCoaAcsFeeAmount.', '.$Header_TrdNixieCount.', '.$Header_TrdNixieAcsFeeAmount.', '.$Header_OcdRecordCount.', '.$Header_OcdAcsFeeAmount.', '.$Header_OcdCoaCount.', '.$Header_OcdCoaAcsFeeAmount.', '.$Header_OcdNixieCount.', '.$Header_OcdNixieAcsFeeAmount.', '.$Header_FsRecordCount.', '.$Header_FsAcsFeeAmount.', '.$Header_FsCoaCount.', '.$Header_FsCoaAcsFeeAmount.', '.$Header_FsNixieCount.', '.$Header_FsNixieAcsFeeAmount.', '.$Header_ImpbRecordCount.', '.$Header_ImpbAcsFeeAmount.', '.$Header_ImpbCoaCount.', '.$Header_ImpbCoaAcsFeeAmount.', '.$Header_ImpbNixieCount.', '.$Header_ImpbNixieAcsFeeAmount.', '.$Header_Filler.', '.$Header_EndMarker.');   

/*
 
print("Header_RecordType						   = ".$Header_RecordType						  ."\n");
print("Header_FileVersion						 = ".$Header_FileVersion						."\n");
print("Header_CustomerID              = ".$Header_CustomerID             ."\n");
print("Header_CreateDate              = ".$Header_CreateDate             ."\n");
print("Header_ShipmentNumber          = ".$Header_ShipmentNumber         ."\n");
print("Header_TotalAcsRecordCount     = ".$Header_TotalAcsRecordCount    ."\n");
print("Header_TotalCoaCount           = ".$Header_TotalCoaCount          ."\n");
print("Header_TotalNixieCount         = ".$Header_TotalNixieCount        ."\n");
print("Header_TrdRecordCount          = ".$Header_TrdRecordCount         ."\n");
print("Header_TrdAcsFeeAmount         = ".$Header_TrdAcsFeeAmount        ."\n");
print("Header_TrdCoaCount             = ".$Header_TrdCoaCount            ."\n");
print("Header_TrdCoaAcsFeeAmount      = ".$Header_TrdCoaAcsFeeAmount     ."\n");
print("Header_TrdNixieCount           = ".$Header_TrdNixieCount          ."\n");
print("Header_TrdNixieAcsFeeAmount    = ".$Header_TrdNixieAcsFeeAmount   ."\n");
print("Header_OcdRecordCount          = ".$Header_OcdRecordCount         ."\n");
print("Header_OcdAcsFeeAmount         = ".$Header_OcdAcsFeeAmount        ."\n");
print("Header_OcdCoaCount             = ".$Header_OcdCoaCount            ."\n");
print("Header_OcdCoaAcsFeeAmount      = ".$Header_OcdCoaAcsFeeAmount     ."\n");
print("Header_OcdNixieCount           = ".$Header_OcdNixieCount          ."\n");
print("Header_OcdNixieAcsFeeAmount    = ".$Header_OcdNixieAcsFeeAmount   ."\n");
print("Header_FsRecordCount           = ".$Header_FsRecordCount          ."\n");
print("Header_FsAcsFeeAmount          = ".$Header_FsAcsFeeAmount         ."\n");
print("Header_FsCoaCount              = ".$Header_FsCoaCount             ."\n");
print("Header_FsCoaAcsFeeAmount       = ".$Header_FsCoaAcsFeeAmount      ."\n");
print("Header_FsNixieCount            = ".$Header_FsNixieCount           ."\n");
print("Header_FsNixieAcsFeeAmount     = ".$Header_FsNixieAcsFeeAmount    ."\n");
print("Header_ImpbRecordCount         = ".$Header_ImpbRecordCount        ."\n");
print("Header_ImpbAcsFeeAmount        = ".$Header_ImpbAcsFeeAmount       ."\n");
print("Header_ImpbCoaCount            = ".$Header_ImpbCoaCount           ."\n");
print("Header_ImpbCoaAcsFeeAmount     = ".$Header_ImpbCoaAcsFeeAmount    ."\n");
print("Header_ImpbNixieCount          = ".$Header_ImpbNixieCount         ."\n");
print("Header_ImpbNixieAcsFeeAmount   = ".$Header_ImpbNixieAcsFeeAmount  ."\n");
print("Header_Filler                  = ".$Header_Filler                 ."\n");
print("Header_EndMarker               = ".$Header_EndMarker              ."\n");

 		*/	
	 
}


function processData($LineInFile){
	
		$DeliverabilityCode          =  substr($LineInFile, 45 ,1   );

	$IsNixie="";
	$IsCOA="";
			
			#		print("code :".$DeliverabilityCode." - ");
				switch($DeliverabilityCode){
					
					
		// COA Notices

				case " ": $IsCOA="Y"; 
						//	print("Plain Jane Change of Address\n"); 
						break;		
				
				case "G": $IsCOA="Y"; 
						//	print("P.O. Box Closed\n"); 
						break;		
				
				case "K": $IsCOA="Y"; 
						//	print("Moved Left No Address\n"); 
						break;
				
				case "W": $IsCOA="Y"; 
						//	print("Temporary COA - no new address present\n"); 
						break;
				
		
		// NIXIE Codes							
				case "A": $IsNixie="Y"; 
						//	print("Attempted, not known\n"); 	
							break;
							
				case "E": $IsNixie="Y"; 
						//	print("In dispute\n"); 						
							break;
							
				case "I": $IsNixie="Y"; 
						//	print("Insufficient address\n"); 	
							break;
							
				case "L": $IsNixie="Y"; 
						//	print("Illegible\n"); 
							break;
							
				case "M": $IsNixie="Y"; 
						//	print("No mail receptacle\n"); 
							break;
							
				case "N": $IsNixie="Y"; 
						//	print("No such number\n"); 
							break;
							
				case "P": $IsNixie="Y"; 
						//	print("Deceased\n"); 
							break;
							
				case "Q": $IsNixie="Y"; 
						//	print("Not deliverable as addressed/unable to forward/forwarding order expired\n"); 
							break;
							
				case "R": $IsNixie="Y"; 
						//	print("Refused\n"); 
							break;
							
				case "S": $IsNixie="Y"; 
						//	print("No such street\n"); 
							break;
							
				case "U": $IsNixie="Y"; 
						//	print("Unclaimed\n"); 
							break;
							
				case "V": $IsNixie="Y"; 
						//	print("Vacant\n"); 
							break;
							
	
					}
		
		
				if($IsNixie){processNixie($LineInFile);}
					else {processCOA($LineInFile);}
					
	 
	
	
			}
			
			
function processNixie($LineInFile){

 
$Nixie_RecordType                  =  substr($LineInFile, 0  ,1   );
$Nixie_FileVersion                 =  substr($LineInFile, 1  ,2   );
$Nixie_SequenceNumber              =  substr($LineInFile, 3  ,8   );
$Nixie_AcsMailerId                 =  substr($LineInFile, 11 ,9   );
$Nixie_KeylineSequenceSerialNumber =  substr($LineInFile, 20 ,16  );
$Nixie_Filler1                     =  substr($LineInFile, 36 ,9   );
$Nixie_DeliverabilityCode          =  substr($LineInFile, 45 ,1   );
$Nixie_UspsSiteID                  =  substr($LineInFile, 46 ,3   );
$Nixie_Filler2                     =  substr($LineInFile, 49 ,166 );
$Nixie_OldZIPCode                  =  substr($LineInFile, 215,5   );
$Nixie_Filler3                     =  substr($LineInFile, 220,218 );
$Nixie_FeeNotification             =  substr($LineInFile, 438,1   );
$Nixie_NotificationType            =  substr($LineInFile, 439,1   );
$Nixie_IntelligentMailbarcode      =  substr($LineInFile, 440,31  );  
$Nixie_IntelligentPackagebarcode   =  substr($LineInFile, 471,35  );  
$Nixie_IdTag                       =  substr($LineInFile, 506,16  );  
$Nixie_HardcopyToElectronicFlag    =  substr($LineInFile, 522,1   );  
$Nixie_TypeOfAcs                   =  substr($LineInFile, 523,1   );  
$Nixie_FulfillmentDate             =  substr($LineInFile, 523,8   );  
$Nixie_ProcessingType              =  substr($LineInFile, 532,1   );  
$Nixie_CaptureType                 =  substr($LineInFile, 533,1   );  
$Nixie_Filler4                     =  substr($LineInFile, 534,8   );  
$Nixie_ShapeOfMail                 =  substr($LineInFile, 542,1   );  
$Nixie_MailActionCode              =  substr($LineInFile, 543,1   );  
$Nixie_NixieFlag                   =  substr($LineInFile, 544,1   );  
$Nixie_ProductCode1                =  substr($LineInFile, 545,6   );  
$Nixie_ProductCodeFee1             =  substr($LineInFile, 551,6   );  
$Nixie_ProductCode2                =  substr($LineInFile, 557,6   );  
$Nixie_ProductCodeFee2             =  substr($LineInFile, 563,6   );  
$Nixie_ProductCode3                =  substr($LineInFile, 569,6   );  
$Nixie_ProductCodeFee3             =  substr($LineInFile, 575,6   );  
$Nixie_ProductCode4                =  substr($LineInFile, 581,6   );  
$Nixie_ProductCodeFee4             =  substr($LineInFile, 587,6   );  
$Nixie_ProductCode5                =  substr($LineInFile, 593,6   );  
$Nixie_ProductCodeFee5             =  substr($LineInFile, 599,6   );  
$Nixie_ProductCode6                =  substr($LineInFile, 605,6   );  
$Nixie_ProductCodeFee6             =  substr($LineInFile, 611,6   );
$Nixie_Filler5                     =  substr($LineInFile, 617,81  );
$Nixie_EndMarker                   =  substr($LineInFile, 699,6   );
 
	print("Nixie\n");
	
	
}




function processCOA($LineInFile){
	
	
	
	print("Change of address\n");
	
	
$COA_RecordType                        = substr($LineInFile, 0   ,1  );
$COA_FileVersion                       = substr($LineInFile, 1   ,2  );
$COA_SequenceNumber                    = substr($LineInFile, 3   ,8  );
$COA_AcsMailerId                       = substr($LineInFile, 11  ,9  );
$COA_KeylineSequenceSerialNumber       = substr($LineInFile, 20  ,16 );
$COA_MoveEffectiveDate                 = substr($LineInFile, 36  ,8  );
$COA_MoveType                          = substr($LineInFile, 44  ,1  );
$COA_DeliverabilityCode                = substr($LineInFile, 45  ,1  );
$COA_UspsSiteID                        = substr($LineInFile, 46  ,3  );
$COA_LastName                          = substr($LineInFile, 49  ,20 );
$COA_FirstName                         = substr($LineInFile, 69  ,15 );
$COA_Prefix                            = substr($LineInFile, 84  ,6  );
$COA_Suffix                            = substr($LineInFile, 90  ,6  );
$COA_OldAddressType                    = substr($LineInFile, 96  ,1  );
$COA_OldUrb                            = substr($LineInFile, 97  ,28 );
$COA_OldPrimaryNumber                  = substr($LineInFile, 125 ,10 );
$COA_OldPreDirectional                 = substr($LineInFile, 135 ,2  );
$COA_OldStreetName                     = substr($LineInFile, 137 ,28 );
$COA_OldSuffix                         = substr($LineInFile, 165 ,4  );
$COA_OldPostDirectional                = substr($LineInFile, 169 ,2  );
$COA_OldUnitDesignator                 = substr($LineInFile, 171 ,4  );
$COA_OldSecondaryNumber                = substr($LineInFile, 175 ,10 );
$COA_OldCity                           = substr($LineInFile, 185 ,28 );
$COA_OldStateAbbreviation              = substr($LineInFile, 213 ,2  );
$COA_OldZipCode                        = substr($LineInFile, 215 ,5  );
$COA_NewAddressType                    = substr($LineInFile, 220 ,1  );
$COA_NewPmb                            = substr($LineInFile, 221 ,8  );
$COA_NewUrb                            = substr($LineInFile, 229 ,28 );
$COA_NewPrimaryNumber                  = substr($LineInFile, 257 ,10 );
$COA_NewPreDirectional                 = substr($LineInFile, 267 ,2  );
$COA_NewStreetName                     = substr($LineInFile, 269 ,28 );
$COA_NewSuffix                         = substr($LineInFile, 297 ,4  );
$COA_NewPostDirectional                = substr($LineInFile, 301 ,2  );
$COA_NewUnitDesignator                 = substr($LineInFile, 303 ,4  );
$COA_NewSecondaryNumber                = substr($LineInFile, 307 ,10 );
$COA_NewCity                           = substr($LineInFile, 317 ,28 );
$COA_NewStateAbbreviation              = substr($LineInFile, 345 ,2  );
$COA_NewZipCode                        = substr($LineInFile, 347 ,5  );
$COA_Hyphen                            = substr($LineInFile, 352 ,1  );
$COA_NewPlus4Code                      = substr($LineInFile, 353 ,4  );
$COA_NewDeliveryPoint                  = substr($LineInFile, 357 ,2  );
$COA_NewAbbreviatedCityName            = substr($LineInFile, 359 ,13 );
$COA_NewAddressLabel                   = substr($LineInFile, 372 ,66 );
$COA_FeeNotification                   = substr($LineInFile, 438 ,1  );
$COA_NotificationType                  = substr($LineInFile, 439 ,1  );
$COA_IntelligentMailBarcode            = substr($LineInFile, 440 ,31 );
$COA_IntelligentMailPackageBarcode     = substr($LineInFile, 471 ,35 );
$COA_IdTag                             = substr($LineInFile, 506 ,16 );
$COA_HardcopyToElectronicFlag          = substr($LineInFile, 522 ,1  );
$COA_TypeOfAcs                         = substr($LineInFile, 523 ,1  );
$COA_FulfillmentDate                   = substr($LineInFile, 524 ,8  );
$COA_ProcessingType                    = substr($LineInFile, 532 ,1  );
$COA_CaptureType                       = substr($LineInFile, 533 ,1  );
$COA_MadeAvailableDate                 = substr($LineInFile, 534 ,8  );
$COA_ShapeOfMail                       = substr($LineInFile, 542 ,1  );
$COA_MailActionCode                    = substr($LineInFile, 543 ,1  );
$COA_NixieFlag                         = substr($LineInFile, 544 ,6  );
$COA_ProductCode1                      = substr($LineInFile, 545 ,6  );
$COA_ProductCodeFee1                   = substr($LineInFile, 551 ,6  );
$COA_ProductCode2                      = substr($LineInFile, 557 ,6  );
$COA_ProductCodeFee2                   = substr($LineInFile, 563 ,6  );
$COA_ProductCode3                      = substr($LineInFile, 569 ,6  );
$COA_ProductCodeFee3                   = substr($LineInFile, 575 ,6  );
$COA_ProductCode4                      = substr($LineInFile, 581 ,6  );
$COA_ProductCodeFee4                   = substr($LineInFile, 587 ,6  );
$COA_ProductCode5                      = substr($LineInFile, 593 ,6  );
$COA_ProductCodeFee5                   = substr($LineInFile, 599 ,6  );
$COA_ProductCode6                      = substr($LineInFile, 605 ,6  );
$COA_ProductCodeFee6                   = substr($LineInFile, 611 ,6  );
$COA_DeliveryPointValidation					 = substr($LineInFile, 617 ,1  );
$COA_Filler                            = substr($LineInFile, 618 ,81 );
$COA_EndMarker                         = substr($LineInFile, 699 ,1  );
                                                             
	
}