<?php
$id = $_GET['id'];

if (!isset($_SESSION['BorrowerId'])) {
  # code...
  redirect("index.php?q=borrow&id=" );
}


$book = new Book();
$object = $book->single_books($id);

?>
        <style type="text/css">
          .small {
            /*font-weight: bold; */  

          }
          p{
            font-weight: bolder; 
          }
          .book-details{
            padding: 5px;
            /*font-size: 15px;*/
            font-weight: bold;
            border-bottom: 1px solid #ddd;
          }
        </style>
        <!-- Start Service Section -->  
                	            <div class="col-md-4">  
					                  <div class="book-details">Book Details</div> 
					                <div class="form-row">
					                    <div class="col-md-4"> 
					                          <label class="small mb-1" for="IBSN">IBSN</label>  
					                     </div> 
					                    <div class="col-md-8"> 
					                          <p><?php echo  $object->IBSN ?></p> 
					                    </div>
					                    <div class="col-md-4"> 
					                          <label class="small mb-1" for="BookTitle">Title</label>  
					                     </div> 
					                    <div class="col-md-8"> 
					                          <p><?php echo  $object->BookTitle ?></p> 
					                    </div>
					                    <div class="col-md-4"> 
					                          <label class="small mb-1" for="BookDesc">Description</label>  
					                     </div> 
					                    <div class="col-md-8"> 
					                          <p><?php echo  $object->BookDesc ?></p> 
					                    </div>
					                    <div class="col-md-4"> 
					                          <label class="small mb-1" for="Category">Genre</label>  
					                     </div> 
					                    <div class="col-md-8"> 
					                          <p><?php echo  $object->Category ?></p> 
					                    </div>
					                    <div class="col-md-4"> 
					                          <label class="small mb-1" for="DeweyDecimal">Dewey Decimal</label>  
					                     </div> 
					                    <div class="col-md-8"> 
					                          <p><?php echo  $object->DeweyDecimal ?></p> 
					                    </div>
					                    <div class="col-md-4"> 
					                          <label class="small mb-1" for="BookType">Type</label>  
					                     </div> 
					                    <div class="col-md-8"> 
					                          <p><?php echo  $object->BookType ?></p> 
					                    </div>
					                    <div class="col-md-4"> 
					                          <label class="small mb-1" for="BookPrice">Price</label>  
					                     </div> 
					                    <div class="col-md-8"> 
					                          <p><?php echo  $object->BookPrice ?></p> 
					                    </div>
					                    <div class="col-md-4"> 
					                          <label class="small mb-1" for="Author">Author</label>  
					                     </div> 
					                    <div class="col-md-8"> 
					                          <p><?php echo  $object->Author ?></p> 
					                    </div>
					                    <div class="col-md-4"> 
					                          <label class="small mb-1" for="BookPublisher">Publisher</label>  
					                     </div> 
					                    <div class="col-md-8"> 
					                          <p><?php echo  $object->BookPublisher ?></p> 
					                    </div>
					                    <div class="col-md-4"> 
					                          <label class="small mb-1" for="PublishDate">Date Published</label>  
					                     </div> 
					                    <div class="col-md-8"> 
					                          <p><?php echo  $object->PublishDate ?></p> 
					                    </div>
					                </div> 
					            </div> 
					            <div class="col-md-6">
					            	 <?php
							              // SELECT `IDNO`, `BorrowerId`, `Firstname`, `Lastname`, `MiddleName`, `Address`, `Sex`, `ContactNo`, `CourseYear`, `BorrowerPhoto`, `BorrowerType`, `Stats`, `BUsername`, `BPassword` FROM `tblborrower` WHERE 1 
							           
							                  @$borrower = new Borrower();
							                  @$res = $borrower->single_borrower($_SESSION['BorrowerId']) ;
							          
							              ?>
							              <div class="book-details">Borrower Information</div> 
							                <div class="form-row">
							                    <div class="col-md-3"> 
							                          <label class="small mb-1" for="BorrowerId">Borrower ID</label>  
							                     </div> 
							                    <div class="col-md-9"> 
							                          <p><?php echo  isset($res->BorrowerId) ? $res->BorrowerId: 'None'; ?></p> 
							                          <input type="hidden" name="BorrowerId" value="<?php echo isset($res->BorrowerId) ? $res->BorrowerId: 'None'; ?>">
							                          <input type="hidden" name="IBSN" value="<?php echo $id;?>">
							                    </div>
							                    <div class="col-md-3"> 
							                          <label class="small mb-1" for="Firstname">First Name</label>  
							                     </div> 
							                    <div class="col-md-9"> 
							                          <p><?php echo  isset($res->Firstname) ? $res->Firstname: 'None'; ?></p> 
							                    </div>
							                    <div class="col-md-3"> 
							                          <label class="small mb-1" for="MiddleName">Middle Name</label>  
							                     </div> 
							                    <div class="col-md-9"> 
							                          <p><?php echo  isset($res->MiddleName) ? $res->MiddleName : 'None'; ?></p> 
							                    </div>
							                    <div class="col-md-3"> 
							                          <label class="small mb-1" for="Lastname">Last Name</label>  
							                     </div> 
							                    <div class="col-md-9"> 
							                          <p><?php echo  isset($res->Lastname) ? $res->Lastname: 'None'; ?></p> 
							                    </div>
							                    <div class="col-md-3"> 
							                          <label class="small mb-1" for="Address">Address</label>  
							                     </div> 
							                    <div class="col-md-9"> 
							                          <p><?php echo  isset($res->Address) ? $res->Address: 'None'; ?></p> 
							                    </div>
							                    <div class="col-md-3"> 
							                          <label class="small mb-1" for="Sex">Sex</label>  
							                     </div> 
							                    <div class="col-md-9"> 
							                          <p><?php echo  isset($res->Sex) ? $res->Sex : 'None'; ?></p> 
							                    </div>
							                    <div class="col-md-3"> 
							                          <label class="small mb-1" for="ContactNo">Contact Number</label>  
							                     </div> 
							                    <div class="col-md-9"> 
							                          <p><?php echo  isset($res->ContactNo) ? $res->ContactNo : 'None'; ?></p> 
							                    </div>
							                    <div class="col-md-3"> 
							                          <label class="small mb-1" for="CourseYear">Average Age</label>  
							                     </div> 
							                    <div class="col-md-9"> 
							                          <p><?php echo  isset($res->CourseYear) ?$res->CourseYear : 'None'; ?></p> 
							                    </div> 
					            	
					            			</div>
                        
                					</div> 

					            <div class="pull-right">
					            	<a href="proccess.php?action=checkout&id=<?php echo $id;?>" class="btn btn-primary">Check Out <i class="fa fa-arrow-right"> </i></a>
					            </div> 













        