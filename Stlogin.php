<html>
  <head>
  <title> registration form</title>
    <style>
	    body{
		      background-image:url("1.jpg");
		      
            }
			h1{
			   background-color:rgb(123,165,210);
		                height:70;
		         text-align:center;
					font-size:38px;
					transform:skewy(80);
			}

	</style>
	
   
  </head>
  <body >

	<?php
			
			include'connect.inc.php'; 
			$nameerr=$passerr="";
			
		    if ($_SERVER["REQUEST_METHOD"] == "POST")
		   {
			 $name=$_POST["input1"];
			if(empty($name))
			{
			$nameErr="<font color='red'>name is required</font>";
            }
			else
			{
			 
			 if(!preg_match("/^[a-zA-Z ]*$/",$name))
			 {
				$nameErr="<font color='red'>please use only alphabets</font>";
				die("<h2> 404 Error please provide proper name</h2>");
			 }
		    }
            if(empty($_POST["input2"]))
			  { 
		        $passErr="<font color='red'>password required</font>";
			  }
			 else
			  {
				  $pass=$_POST['input2'];
				$len=strlen($pass);
					if(!($len>=8 && preg_match("/^[a-zA-Z1-9 ]*$/",$pass)))
					 {
						 $passErr="<font color='red'>password should contain 8characters</font>";
						 die("<h2> 404 Error please enter properly</h2>");
						 //echo'<p><font color="red">*password should conatin 8 alphanumeric characters</</p>';
					 }
			  }
			  
			  $query="select * from signup where name='$name' and password='$pass'";
			  $result=mysql_query($query);
			  $count=mysql_num_rows($result);
			  if($count<=0){
                   die("<h2>404 Error invalid</h2>");
              }else{
				  echo "<script>window.location.assign('upload.php')</script>";
			  }
			  }
			  
			  if(isset($_POST['forgot'])){
				  
				  $name  = $_POST['name'];
                  
                      $query = "SELECT email,password FROM signup where name='".$name."'";
                       $result = mysqli_query($query);
                         $Results = mysqli_fetch_array($result);
                       $email=$Results['email'];
                       if(count($Results)>=1)
                     {
                       
                       die("<h2>password link send to mail</h2>");
                        $to=$email;
                         $subject="Forget Password";
                          $from = "gnreddy@programmer.net";
                          $body="Hi, <br/> <br/>Your Membership ID is ".$Results['password']."hope";
                          $headers = "From: " . strip_tags($from) . "\r\n";
                          $headers .= "Reply-To: ". strip_tags($from) . "\r\n";
                            $headers .= "MIME-Version: 1.0\r\n";
                            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
 
                     mail($to,$subject,$body,$headers);
                      }
                 else
                {
             die("<h2>404 Accoutn not found</h2>");
             }
             }     

			  
			
			?>
			
      <center>
	  
	 <h1> Login</h1></center>
	  <div>
	    <form action="Stlogin.php" method="POST">
         
<fieldset><legend><font color="blue">Login</font></legend>
		 
			name <input type='text'name="input1"><br/><br/>
password <input type='password'name="input2"><br/><br/>
         <input type='submit'value ='login' name='sub'>
		 <input type='submit'value ='forgot password' name='forgot'>
		 <input type="button" value="home" onCLick="window.location.href='index.html'"></fieldset>
                 <br>
   <fieldset><marquee direction='left'  onmouseover="this.stop()" onmouseout='this.start()'><font color='red'>please read instructions</font>
   <font color='red'>enter details in proper</marquee>
	</fieldset>
	</form>
	</body>
	</html>