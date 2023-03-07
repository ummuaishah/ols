			<table id="dataTable" class="table table-bordered table-hover" cellspacing="0"  > 
				  <thead>
				  	<tr> 
						<th>IBSN</th>
						<th>Title</th> 
						<th>Category</th>  
						<!-- <th>Borrower</th>  -->
						<th>DateBorrowed</th>
						<th>DueDate</th>
						<th>Status</th> 
						<th>Action</th> 
				  	</tr>	
				  </thead>
				  <tbody>
				  	<?php 
				  	$mydb->setQuery("SELECT * FROM `tblbooks` b, `tbltransaction` t ,`tblborrower` s
				  					WHERE b.IBSN=t.IBSN AND t.BorrowerId=s.BorrowerId AND s.BorrowerId=".$_SESSION['BorrowerId']);
						  	loadresult();
					
				  		function loadresult(){
					  		global $mydb;
					  		$cur = $mydb->loadResultlist();
							foreach ($cur as $result) {
						  		echo '<tr>';  
								echo '<td><a title="View Book Details" href="index.php?view=view&id='.$result->TransactionID.'" >' . $result->IBSN.'</a></td>';
								echo '<td >'. $result->BookTitle.'</td>';
								// echo '<td>'.  $result->BookDesc.'</td>'; 
								echo '<td>'. $result->Category.'</td>'; 
								// echo '<td>'. $result->Firstname.' '. $result->MiddleName.' '. $result->Lastname.'</td>';
								echo '<td>'. $result->DateBorrowed.'</td>';
								echo '<td>'. $result->DueDate.'</td>';
								echo '<td>'. $result->Status.'</td>';  
							  	  if ($result->Status=='Pending') {
							  	  	# code...
							  	  		echo '<td align="center" >     
					  					 <a title="Cancel" href="controller.php?action=cancel&id='.$result->TransactionID.'" class="btn btn-danger btn-sm" 
					  					 ><i class="fa fa-times "></i> Cancel</a>
					  					 </td>';
							  	  }else{
							  	  		echo '<td align="center" > NONE</td>';
							  	  }
							  	
						  		echo '</tr>';
					  		}
					  	} 
				  	?>
				  </tbody>
				
				</table>