<?php
require_once ("../include/initialize.php");
if(!isset($_SESSION['BorrowerId'])){
	redirect(web_root."index.php");
}

$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
	doInsert();
	break;
	
	case 'edit' :
	doEdit();
	break; 
	
	case 'delete' :
	doDelete();
	break;


	case 'cancel' :
	doCancelled();
	break;

	case 'photos' :
	doChangeImage();
	break;
   
	case 'changepassword' :
	doChangePassword();
	break;
  
	}
   
   // SELECT `IDNO`, `BorrowerId`, `Firstname`, `Lastname`, `MiddleName`, `Address`, `Sex`, `ContactNo`, `CourseYear`, `BorrowerPhoto`, `BorrowerType`, `Stats`, `IMGBLOB` FROM `tblborrower` WHERE 1
	function doInsert(){
		if(isset($_POST['save'])){


		if ( $_POST['BorrowerId'] == "" OR $_POST['Firstname'] == ""
			OR $_POST['Lastname'] == "" OR $_POST['MiddleName'] == ""  OR $_POST['Address'] == "" 
			OR $_POST['ContactNo'] == "") {
			$messageStats = false;
			message("All fields are required!","error");
			redirect('index.php?view=add');
		}else{	

			$picture = UploadImage();
			$location = "borrower/". $picture ;

	  

					$borrower = New Borrower(); 
					$borrower->BorrowerId 		= $_POST['BorrowerId'];
					$borrower->Firstname		= $_POST['Firstname']; 
					$borrower->Lastname			= $_POST['Lastname'];
					$borrower->MiddleName 	   	= $_POST['MiddleName'];
					$borrower->Address			= $_POST['Address'];   
					$borrower->ContactNo		= $_POST['ContactNo'];   
					$borrower->Sex 				= $_POST['optionsRadios']; 
					$borrower->CourseYear		= $_POST['CourseYear']; 
					$borrower->BorrowerPhoto	= $location; 
					$borrower->Stats			= 'Active';
					$borrower->BorrowerType		= 'Students'; 
					$borrower->BUsername		= $_POST['BUsername']; 
					$borrower->BPassword		= sha1($_POST['BPassword']); 
					$borrower->create(); 
 
						
					$autonum = New Autonumber(); 
					$autonum->auto_update('BorrowerId');

					message("New borrower created successfully!", "success");
					redirect("index.php");
 
			} 
		}

	}

	function doEdit(){
	if(isset($_POST['save'])){

		if ( $_POST['BorrowerId'] == "" OR $_POST['Firstname'] == ""
			OR $_POST['Lastname'] == "" OR $_POST['MiddleName'] == ""  OR $_POST['Address'] == "" 
			OR $_POST['ContactNo'] == "") {
			$messageStats = false;
			message("All fields are required!","error");
			redirect('index.php?view=add');
		}else{	

				// $picture = UploadImage();
			 //    $location = "photos/". $picture ;


					$borrower = New Borrower();  
					$borrower->Firstname			= $_POST['Firstname']; 
					$borrower->Lastname				= $_POST['Lastname'];
					$borrower->MiddleName 	   		= $_POST['MiddleName'];
					$borrower->Address				= $_POST['Address'];   
					$borrower->ContactNo			= $_POST['ContactNo'];   
					$borrower->Sex 					= $_POST['optionsRadios']; 
					$borrower->CourseYear			= $_POST['CourseYear'];
					$borrower->BUsername			= $_POST['BUsername']; 
					
					// if ($location!='photos/') {
					// 	$borrower->BorrowerPhoto	= $location;  
					// }
					// $borrower->Stats				= 'Active';
					// $borrower->BorrowerType			= 'Students';  

					$borrower->update($_SESSION['BorrowerId']);
		 

				message("Account has been updated!", "success"); 
		       redirect("index.php");
	    	} 
	 
	}

} 
 function doChangeImage(){ 
			$picture = UploadImage();
			$location = "borrower/". $picture ;


				$borrower = New Borrower();  


			if ($location!='borrower/') {
				$borrower->BorrowerPhoto	= $location;   
				$borrower->update($_SESSION['BorrowerId']);
		  
			   message("Picture has been changed!", "success"); 
		       redirect("index.php");
	    	}  
} 

function doChangePassword(){
global $mydb;
if(isset($_POST['save'])){

		$borrower = New Borrower();  
		$borrower->BPassword			=sha1($_POST['user_pass']); 
		$borrower->update($_SESSION['BorrowerId']); 

		  message("Password has been changed!", "success");
		  redirect("index.php");
	}
}

   
 
function UploadImage(){
			$target_dir = "../asset/images/borrower/";
			$target_file = $target_dir . date("dmYhis") . basename($_FILES["picture"]["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			
			
			if($imageFileType != "jpg" || $imageFileType != "png" || $imageFileType != "jpeg"
		|| $imageFileType != "gif" ) {
				 if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
					return  date("dmYhis") . basename($_FILES["picture"]["name"]);
				}else{
					echo "Error Uploading File";
					// exit;
				}
			}else{
					echo "File Not Supported";
					// exit;
				}
} 

	function doCancelled(){
	$id = $_GET['id'];

		$transaction = new Transaction(); 
		$trans = $transaction->single_transaction($id);
	 
  

		$now = time(); // or your date as well 
		$your_date = strtotime($trans->DueDate);
		$datediff = $your_date -  $now ;

		$duedate =  round($datediff / (60 * 60 * 24));

		if($duedate>=0){
			$Status= 'Ontime';
			$due = 0;
		}else{
			$Status= 'Over Due';
			$due = 1;	
		}


        $transaction = new Transaction();  
		$transaction->Borrowed =0;
		$transaction->Returned=0;
		$transaction->Due=0;
		$transaction->Status = 'Cancelled';
		$transaction->Remarks = 'Cancelled';
		$transaction->update($id);

		$book = new Book(); 
		$Status 		= 'Available';  
		$book->Status = $Status; 
		$book->update($trans->IBSN);
 
 
		message("Transaction cancelled successfully!", "info");
		redirect('index.php?view=borrowedbooks');
}
 
?>