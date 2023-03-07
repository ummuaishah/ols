  <style type="text/css">
    .layer{
        border-top: 1px solid #ddd;
        padding: 10px;
    }
    .layer:hover{
        background-color: #F5F8FA;
    }

    .title{
        font-weight: bold; 
    }
    .desc {

    } 
    .searchagain{
        font-size: 20px; 
        font-weight: bold;
        margin-bottom: 5px;
        color: #FF432E;

    }
</style>

 
  <div class="searchagain">Result ....</div>



<?php 
 

$title = $_POST['Search'];

   
                $mydb->setQuery("SELECT * FROM `tblbooks` 
                        WHERE Status = 'Available' AND ( BookTitle LIKE '%{$title}%' AND  Category LIKE '%{$title}%' AND  Author LIKE '%{$title}%' AND  BookPublisher LIKE '%{$title}%' AND  PublishDate LIKE '%{$title}%')"); 
            $e = $mydb->executeQuery();
                $maxrow = $mydb->num_rows($e); 

                if ($maxrow  > 0) { 
                $cur = $mydb->loadResultlist();
               foreach ($cur as $result) {
                    //echo '<tr>';  
                    // echo '<td >' . $result->IBSN.'</td>';
                     //echo '<td >'. $result->BookTitle.'</td>';
                     //echo '<td>'.  $result->BookDesc.'</td>'; 
                    // echo '<td>'. $result->Category.'</td>'; 
                    // echo '<td>'. $result->Author.'</td>';
                    // echo '<td>'. $result->BookPrice.'</td>';
                    // echo '<td>'. $result->Status.'</td>'; 
                    // echo '</tr>';  

                echo '<div class="layer">
                        <a href="">
                            <div class="title"  ><a href="index.php?q=bookdetails&id='.$result->IBSN.'">'. $result->BookTitle.'</a></div> 
                            <div class="desc">IBSN : ' . $result->IBSN.' .. '.  $result->BookDesc.' .. '.  $result->Category.'<br/>Author : '. $result->Author.'</div>
                        </a>
                   </div>'; 
 
                } 
              }else{
                echo '<div class="layer">
                <a href="">
                   <div class="title">No Record Found!</div>
                </a>
               </div>'; 
                      

              }
        ?>
  