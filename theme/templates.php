 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>E-book Public - free css website template</title>
<meta name="keywords" content="E-book Public, free css website template, CSS, HTML" />
<meta name="description" content="E-book Public - free css website template by templatemo.com" /> 
 
        <link rel="stylesheet" href="<?php echo web_root;?>asset/font-awesome/css/font-awesome.min.css" type="text/css">
<link href="<?php echo web_root;?>style.css" rel="stylesheet" type="text/css" />

   <style type="text/css">
       li {
        list-style: none;
       }
   </style>
<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;

}
</script>
</head>
<body>
<div id="templatemo_container">
    <div id="templatemo_banner">
    <!--  Free CSS Templates @ www.TemplateMo.com  -->
        <div id="search_section">
            <form action="<?php echo web_root;?>index.php?q=find" method="POST">
                <input type="text" value="Enter keyword here..." name="search" size="10" id="searchfield" title="searchfield" onfocus="clearText(this)" onblur="clearText(this)" />
              <input type="submit" name="Search" value="" alt="Search" id="searchbutton" title="Search" />
            </form>
      </div>

    </div> <!-- end of banner -->
    
    <div id="templatemo_menu">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="<?php echo web_root;?>index.php?q=books">Books</a></li> 
            <li><a href="<?php echo web_root;?>index.php?q=about">About Us</a></li>
            <li><a href="<?php echo web_root;?>index.php?q=contact" class="last">Contact US</a></li>
        </ul>       
    </div> <!-- end of menu -->
    
    <div id="templatemo_content_top">

        <?php require_once($content);?>
        
      
        
        <div class="margin_bottom_40 b_bottom"></div>
        <div class="margin_bottom_30"></div>
        
        <div id="templatemo_footer">
        
            <ul class="footer_list">
            <li><a href="index.php">Home</a></li>
            <li><a href="<?php echo web_root;?>index.php?q=books">Books</a></li> 
            <li><a href="<?php echo web_root;?>index.php?q=about">About Us</a></li>
            <li><a href="<?php echo web_root;?>index.php?q=contact" class="last">Contact US</a></li>
            </ul> 
            
            <div class="margin_bottom_10"></div>
            <!--
            Copyright © 2048 <a href="https://www.youtube.com/channel/UCGIwFNo6JFK1Il36wrC0zzw">Janobe Source Code</a> | <a href="http://www.iwebsitetemplate.com" target="_parent">Website Templates</a> by <a href="http://www.templatemo.com" target="_parent">Free CSS Templates</a>
            --> 
            <div class="margin_bottom_20"></div>
            
        </div>
        
        <div class="cleaner"></div>    
    </div> <!-- end of content bottom -->
</div> <!-- end of container -->
<!--  Free Website Templates @ TemplateMo.com  -->
<!--
<div align=center>This template  downloaded form <a href='http://all-free-download.com/free-website-templates/'>free website templates</a></div></body>
-->
        <script src="<?php echo web_root;?>asset/js/jquery-2.1.3.min.js"></script>

        <script src="<?php echo web_root;?>asset/bootstrap/js/bootstrap.min.js"></script>
</html>

   