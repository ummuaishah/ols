<?php  
if(!isset($_SESSION['BorrowerId'])){
  redirect(web_root."index.php");
}
  
 

  $borrower = new Borrower();
  $res = $borrower->single_borrower($_SESSION['BorrowerId']);
 ?>  
 <style type="text/css">
   .pricing-header img{
    width: 100%;
   }
 </style>  
           
 
                      <div class="col-md-4 strecth">         
                        
                       <div class="pricing">
                              <div class="pricing-header" style="padding: 0px">
                                   <img  data-target="#LoginModal" data-toggle="modal"  id="blah" style="cursor: pointer;min-height: 200px;" title="Change Image" class="img-hover"    src="<?php echo web_root.'asset/images/'.$res->BorrowerPhoto; ?>" width="300px" height="200px">  
                                    
                              </div> 
                                <ul  >
                                  <li><a href="index.php">Accounts</a></li>
                                  <li><a href="index.php?view=borrowedbooks">Borrowed Books</a></li>
                                  <li><a href="index.php?view=changepassword">Change Password</a></li> 
                                               
                                </ul> 
                        </div> 


                    </div>
                  <div class="col-md-6">
                   <?php  check_message(); ?>
                   <?php 

                      $view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
                       $title="Employees"; 
                       $header=$view; 
                      switch ($view) {
                       
                        case 'borrowedbooks' :
                          $bTitle = "Borrowed Books";
                          $bContent    = 'borrowedBooks.php';    
                          break;
  

                          case 'changepassword' :
                          $bTitle = "Change Password";
                          $bContent    = 'changepassword.php';   
                          break;


                          case 'view' :
                          $bTitle = "Book Status";
                          $bContent    = 'view.php';   
                          break;

                        default :
                          $bTitle = "Accounts";
                          $bContent    = 'personalInfo.php';    
                      } 

                      echo '<h2>'.$bTitle.'</h2>
                            <hr/>';
                      require_once  $bContent;
                    ?>
                        

                    


                
                  </div>
                 
 

<!-- Modal photo -->
          <div class="modal fade" id="LoginModal" tabindex="-1" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Choose Image</h4> 
                </div> 

                                  
               <form class="form-horizontal span6  wow fadeInDown" action="controller.php?action=photos" method="POST" enctype="multipart/form-data">
                  <div class="modal-body">
                    <div class="container">  
                         <input type="file" name="picture"  id="" />  
                   </div>
                 </div>
                  <div class="modal-footer">  
                        <button  class="btn btn-primary" data-dismiss="modal" type="button">Close</button> 
                         <button class="btn btn-primary" type="submit" name="btnupload" class="btnLoginModal button">Upload</button> 
                  </div>  
                 </form>  
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->