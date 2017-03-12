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
			 $nameErr = $emailErr =  $passErr = $submitErr = "";
           if ($_SERVER["REQUEST_METHOD"] == "POST")
		   {
			 $name=$_POST["name"];
			if(empty($name))
			{
			$nameErr="<font color='red'>rollnumber is required</font>";
            }
			else
			{
			 
			 if(preg_match("/^[a-zA-Z ]*$/",$name))
			 {
				$nameErr="<font color='red'>please use only numbers</font>";
				die("<h2>404 error please provide proper rollnumber</h2>");
			 }
		    }
            if(empty($_POST["pass"]))
			  { 
		        $passErr="<font color='red'>password required</font>";
			  }
			 else
			  {
				  $pass=$_POST['pass'];
				$len=strlen($pass);
					if(!($len>=8 && preg_match("/^[a-zA-Z1-9 ]*$/",$pass)))
					 {
						 $passErr="<font color='red'>password should contain 8characters</font>";
						 die("<h2>404 error please enter properly</h2>");
						 //echo'<p><font color="red">*password should conatin 8 alphanumeric characters</</p>';
					 }
			  }
			  $email=$_POST['email'];
				 if(empty($email)){
				 $emailErr="<font color='red'>email required</font>";}else{
			      if(!filter_var($email,FILTER_VALIDATE_EMAIL))
			      {
				  $emailErr="<font color='red'>email is incorrect</font>";
				  die("<h2>404 error please enter properly</h2>");
				 }}
				
				
				 $query=" insert into stsignup values('$name','$pass','$email')";
				    if(!mysql_query($query))
				  {
					  $submitErr="<font color='red'>unsuccess record exist</font>";
				  }

			 
		    }
		  ?>
		
		 <center>
	  
	 <h1> SIGNUP</h1></center>
	<form action="Susignup.php" method="POST">
	<fieldset>
    <legend><font color="blue">Signup</font></legend>

<p><span class="error">* required field.</span></p>
<form method="post" action="g1.php">

  Rollno: <input type="text" name="name">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br> 
  Password: <input type="password" name="pass">
  <span class="error">* <?php echo $passErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
 <!-- Gender:
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <span class="error">* </span>-->
  
  <input type="submit" name="submit" value="Submit">
  <span class="error">* <?php echo $submitErr;?></span>
   <input type="button" value="home" onCLick="window.location.href='index.html'">  

</fieldset></center></form>
  
			  
			 
  </body>
  </html>