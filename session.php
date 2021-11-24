<?php
session_start();
//Function to check if the session variable SESSION_ID,owned by current user is active or not

function logged_in()
{
return isset($_SESSION['SESSION_ID']); 
}

function confirm_logged_in() 
{
if (!logged_in()) {?>
<script type="text/javascript">
window.location = "loginform.php";  //Redirect user to login.php page
</script>
<?php
}
}
?>