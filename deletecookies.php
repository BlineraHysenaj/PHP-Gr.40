<!DOCTYPE html> 
<?php 
  
// Set the expiration date to one hour ago 
setcookie("username", "Blinera", time() - 3600); 

?> 
  
<html> 
  
<body> 
  
    <?php 
    echo "Cookie 'Blinera' is deleted."; 
    ?> 
  
</body> 
  
</html> 