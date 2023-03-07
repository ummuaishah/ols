
 
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Add New Book</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">


<form class="form-horizontal well span4" action="controller.php?action=add" method="POST" autocomplete="off">
 <div class="col-md-12"> 
    <div class="form-row">
        <div class="col-md-6">
            <div class="form-group"><label class="small mb-1" for="IBSN">IBSN</label><input class="form-control " id="IBSN" name="IBSN" type="text" placeholder="Enter IBSN" /></div>
        </div> 
    </div>
    <div class="form-row">
        <div class="col-md-6">
            <div class="form-group"><label class="small mb-1" for="BookTitle">Title</label><input class="form-control " id="BookTitle" name="BookTitle" type="text" placeholder="Enter Title" /></div>
        </div>
        <div class="col-md-6">
            <div class="form-group"><label class="small mb-1" for="BookDesc">Description</label><input class="form-control " id="BookDesc" name="BookDesc" type="text" placeholder="Enter Description" /></div>
        </div>
    </div>  
    <div class="form-row">
        <div class="col-md-6">
            <div class="form-group"><label class="small mb-1" for="Author">Author</label><input class="form-control " id="Author" name="Author" type="text" placeholder="Enter Author" /></div>
        </div>
        <div class="col-md-6">
            <div class="form-group"><label class="small mb-1" for="inputConfirmPassword">Published Date</label>
             <div class='input-group date'>
                    <input type='text' class="form-control" name="PublishDate" id="datepicker" placeholder="Select Date" readonly="false" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
          </div>
        </div>
    </div>  
    <div class="form-row">
        <div class="col-md-6">
            <div class="form-group"><label class="small mb-1" for="BookPublisher">Publisher</label><input class="form-control " id="BookPublisher" name="BookPublisher" type="text" placeholder="Enter Publisher" /></div>
        </div>
        <div class="col-md-6">
            <div class="form-group"><label class="small mb-1" for="Category">Genre of Book</label>
                 <select class="form-control " name="Category" id="Category">
                      <?php
                      $categ = new Category();
                      $cur = $categ->listofcategory(); 
                      foreach ($cur as $category) {
                        echo '<option>'.$category->Category.' </option>';
                      }

                   ?>
              
            </select> 
          </div>
        </div>
    </div> 
    <div class="form-row">
        <div class="col-md-6">
            <div class="form-group"><label class="small mb-1" for="DDecimal">Category</label><input class="form-control " id="DDecimal" name="DDecimal" type="text" placeholder="Enter Dewey Decimal" readonly="true" /></div>
        </div>
        <div class="col-md-6">
            <div class="form-group"><label class="small mb-1" for="inputConfirmPassword">Type</label> 
             <select class="form-control input-sm" name="BookType" id="BookType">
              <option>Fiction</option>
              <option>Non-Fiction</option>  
              <option>Unknown</option>  
          </select> </div>
        </div>
    </div>   
    <div class="form-row">
        <div class="col-md-6">
            <div class="form-group"><label class="small mb-1" for="BookPrice">Price</label><input class="form-control " id="BookPrice" name="BookPrice" type="text" placeholder="Enter Price" /></div>
        </div>
        <div class="col-md-6">
            <div class="form-group"><label class="small mb-1" for="Remarks">Remarks</label>
                <select class="form-control input-sm" id="Remarks" name="Remarks" placeholder="Enter Remarks">
                    <option>Purchased</option>
                    <option>Donated</option>
                </select>
            </div>
        </div>   
    </div>   


       
<div class="form-group">
        <div class="col-lg-6 col-md-6 col-12">
            <strong>Upload PDF</strong>
                      <form method="post" enctype="multipart/form-data">
                            <?php
                                //if submit button is cancelled
                                if(isset($_POST['submit']))
                                {
                                    //get name from the form when submitted
                                   $name = $_POST['name'];
                                   
                                   if (isset($_FILES['pdf_file']['name']))
                                   {
                                    //if the 'pdf_file' field has an attachment
                                    $file_name = $_FILES['pdf_file']['name'];
                                    $file_tmp = $_FILES['pdf_file']['tmp_name'];

                                    //move the uploaded pdf file into pdf_data folder
                                    move_uploaded_file($file_tmp,"pdf_data/".$file_name);
                                    // Insert the submitted data from the form into the table
                                    $insertquery =
                                    "INSERT INTO pdf_data(username,filename) VALUES('$name','$file_name')";
                                   
                                    // Execute insert query
                                    $iquery = mysqli_query($con, $insertquery); 

                                        if($iquery)
                                        {
                                    ?>
                                            <div class=
                                                 "alert alert-success alert-dismissible fade show text-center">
                                                <a class="close" data-dismiss="alert" aria-label="close">
                                                     ×
                                                 </a>
                                                 <strong>Success!</strong> Data submitted successfully.
                                             </div>
                                    <?php
                                        }
                                        else
                                        {
                                            
                                        }
                                        ?>
                                        <div class=
                                            "alert alert-danger alert-dismissible fade show text-center">
                                            <a class="close" data-dismiss="alert" aria-label="close">
                                            ×
                                            </a>
                                            <strong>Failed!</strong> Try Again!
                                        </div>
                                    <?php
                                   }
                                
                                else
                                {
                                    ?>
                                    <div class=
                                        "alert alert-danger alert-dismissible fade show text-center">
                                        <a class="close" data-dismiss="alert" aria-label="close">
                                            ×
                                        </a>
                                        <strong>Failed!</strong> File must be uploaded in PDF format!
                                     </div>
                                     <?php
                                } //end  if
                            }
                            ?>

                            <div class="form-input py-2">
                                <!--
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                        placeholder="Enter your name" name="name">
                                </div>    
                                -->                             
                                <div class="form-group">
                                    <input type="file" name="pdf_file"
                                        class="form-control" accept=".pdf" required/>
                                </div>
                                <!--
                                <div class="form-group">
                                    <input type="submit"
                                        class="btnRegister" name="submit" value="Submit">
                                </div>
                                -->
                            </div>
                      </form>
        </div>
        <!--
        <div class="col-lg-6 col-md-6 col-12">
              <div class="card">
                <div class="card-header text-center">
                  <h4>Records from Database</h4>
                </div>
                <div class="card-body">
                   <div class="table-responsive">
                      <table>
                        <thead>
                            <th>ID</th>
                            <th>UserName</th>
                            <th>FileName</th>
                        </thead>
                        <tbody>
                          <?php
                              $selectQuery = "select * from pdf_data";
                              $squery = mysqli_query($con, $selectQuery);
 
                              while (($result = mysqli_fetch_assoc($squery))) {
                          ?>
                          <tr>
                            <td><?php echo $result['id']; ?></td>
                            <td><?php echo $result['username']; ?></td>
                            <td><?php echo $result['filename']; ?></td>
                          </tr>
                          <?php
                               }
                          ?>
                        </tbody>
                      </table>               
                    </div>
                </div>
            </div>
        </div>
        -->
</div>
        <div class="form-group">
              <div class="col-md-8">
                <label class="col-md-4 control-label" for=
                "idno"></label>

                <div class="col-md-8">
                  <button class="btn btn-primary" name="savecourse" type="submit" ><span class="fa fa-save"></span> Save</button>
               <!--   <button class="btn btn-primary" name="saveandnewcourse" type="submit" ><span class="fa fa-save"></span> Save and Add new</button> -->
                </div>
              </div>
            </div> 
            
  </form> 
</div>
</div>
</div>
</div>