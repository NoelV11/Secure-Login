<?php
 
require('Connection.php');
require('session.php');
if (isset($_POST['btnlogin'])) {
 
 
  $email = trim($_POST['username']);
  $upass = trim($_POST['password']);
  $h_upass = sha1($upass);
if ($upass == ''){
     ?>    <script type="text/javascript">
                alert("Password is missing!");
                window.location = "loginform.php";
                </script>
        <?php
}else{
//create some sql statement            
        $sql = "SELECT * FROM  `LoginTable` WHERE  `username` =  '" . $username . "' AND  `password` =  '" . $h_upass . "'";
        $result = mysqli_query($conn, $sql);
 
        if ($result){
             //get the number of results based n the sql statement
        $numrows = mysqli_num_rows($result);
    
        //check the number of result, if equal to one  
        //IF theres a result
            if ($numrows == 1) {
                //store the result to a array and passed to variable found_user
                $found_user  = mysqli_fetch_array($result);
 
                //fill the result to session variable
                $_SESSION['SESSION_ID']  = $found_user['id'];
                $_SESSION['FIRST_NAME'] = $found_user['fName'];
                $_SESSION['LAST_NAME']  =  $found_user['lName'];
          
             ?>    <script type="text/javascript">
                      //then it will be redirected to index.php
                      window.location = "index.php";
                  </script>
             <?php        
          
        
            } else {
            //IF theres no result
              ?>    <script type="text/javascript">
                alert("Username or Password Not Registered! Contact Your administrator.");
                window.location = "index.php";
function message()
{
alert("You have logged in succesfully!");
}
</script>
</head>
<body onload="message()">
    <center><p><b1>Your Credentials are secure in the Secure Login Website</b1></p></center>
    <center><img src = "Lock.jfif"></center>    
                </script>
        <?php
 
            }
 
         } else {
                 # code...
         die("No records found! " );
        }
        
    }      
}
?>
