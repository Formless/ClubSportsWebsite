<?php

//session_start(); //start the session, so we can read and write data to and from it.
//Okay up here, we will connect to the database:
include('dbconnect.php');


session_start();
$md5c = "sdfawe23q45gsfd533fgad"; 

?>


<head>
  <title>IMSS :: Login</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <link rel="stylesheet" type="text/css" href="style/style.css" />
  
 </head>

<body>
  <div id="main">
    <div id="links"></div>
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="green", allows you to change the colour of the text - other classes are: "blue", "orange", "red", "purple" and "yellow" -->
          <h1>Intramural<span class="green">Sports System</span></h1>
          <h2>your gateway to IM Sports</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li class="selected"><a href="#">Home</a></li>
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div class="sidebar">
        <!-- insert your sidebar items here -->
        <p>Today is <?php echo(gmdate("l dS \of F Y h:i:s A") . "<br />"); ?></p> 
		<h1>Latest News</h1>
        <h2>IMSS Re-designed</h2>
        <h3>April 1st, 2012</h3>
        <p>April Fool's Day sees the redesign of our website. Take a look around and let us know what you think.<br /></p>
        <h1>Useful Links</h1>
        <ul>
          <li><a href="http://www.virginia.edu/ims/">IMRec Sports Homepage</a></li>
          <li><a href="http://www.virginia.edu/ims/facilities/index.php">Facilities</a></li>
          <li><a href="http://www.virginia.edu/ims/facilities/semester_schedule.php">Schedules</a></li>
          <li><a href="http://www.virginia.edu/emergency/">UVA Emergency Alerts</a></li>
        </ul>
        <h1>Contact Us</h1>
        <p>Please contact Eugene Moy at em2ae@virginia.edu for any questions or comments relating to this website.</p>
		</div>
      <div id="content">
        <!-- insert the page content here -->
        <h1>Login</h1>
        
		    <div align="center">
			<form action="" method="post">
            <p>User ID: <input type="text" name="userid"></p>
            <p>Password: <input type="password" name="password"></p>
            <p> <a href='forgot_password.php'>I forgot my password</a> <td width="8">:</td> <input type="submit" name="submit" value="Login"> </p>
            <p>Don't have an account? <a href='registerUser.php'>Register here</a>.</p>
        </form>
        <?php
        	$table_name = "User";
            //okay, lets log them in..
            if(isset($_POST['submit'])) { //run code if they clicked the Complete Login button
                $userid = mysql_real_escape_string($_POST['userid']);
                $password = mysql_real_escape_string($_POST['password']);

				// REPLACE WITH JAVASCRIPT LATER			
                if($userid == "" || $password == "") { //someone didn't fill out fields :O
                    die("<p><font color='red'>Error: One or more fields are empty!</font></p>");
                }
                $password = md5($password,$md5c); //again..check the register page code :D
				$q =  "SELECT * FROM ".$table_name." WHERE user_id='".$userid."' AND password='".$password."'";
                $result = mysql_query($q) or die(mysql_error().": $q"); //check for the account
                $n1 = mysql_num_rows($result); //see if it was found
                if($n1 == 0) { //if it wasn't found
                    die("<p><font color='red'>Error: Account not found. Please make sure you entered your username and password correctly.</font></p>");
                }
                $r1 = mysql_fetch_assoc($result); //Get the account data
				if($r1['admin']=='1')
					$_SESSION['admin'] = 1;
				else
					$_SESSION['admin'] = 0;
				
				
                //$t1 = mysql_result($result, $n1, 'email');
                //Now, lets set the session data:
                $_SESSION['user'] = $userid; //store the username
                $_SESSION['loggedin'] = 1; //yes, they are logged in
                session_commit();
				
                echo "<p><font color='green'>You have logged in successfully. <a href='index.php'>Click Here</a> to go to the member page</a></font></p>";
                header("Location: index.php");
				//tell them they logged in successfully, and provide a link to the member page. AUTO REDIRECT PLEASE
            }
        ?>
    </div>
		
      </div>
    <div id="site_content_bottom"></div>
    </div>
    <div id="footer">Copyright &copy; HTCuva. All Rights Reserved. | <a href="http://validator.w3.org/check?uri=referer">XHTML</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> | <a href="http://www.dcarter.co.uk">design by dcarter</a></div>
  </div>
</body>
</html>

