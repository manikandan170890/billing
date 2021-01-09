<?php

	
	if(isset($_POST['invoiceFormSubmit']) && isset($_POST['invoiceFormSubmit']) !="" )
	{
		//print_r($_POST['itemName']);
		//echo count($_POST['itemName']);
		include "pdf.php";
	}

?>