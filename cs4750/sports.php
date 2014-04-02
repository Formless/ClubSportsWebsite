<?
include('dbconnect.php');

$headerOptions = array(
  "title" => "Sports"
);

require_once "header.php";


?>


<head>
  
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
			<li><a href="index.php">Admin Home</a></li>
  		    <li class="selected"><a href="sports.php">Sports</a></li>
		  <li><a href="leagues.php">Leagues</a></li>
  		  <li><a href="game.php">Game Control</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div class="sidebar">
        <!-- insert your sidebar items here -->
       <p>Welcome back <b><?php echo $_SESSION['user']; ?></b>!</p>
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
        <h1>Sports</h1>
	
		<?php
		// EDIT Sport _______________________________________
		
		if (isset($_GET['sport'], $_GET['mr'])) {
				echo "<h2>Edit Sport</h2>";
				  echo "<table border='1'>
					<tr>
					<th>Sport</th>
					<th>Min Roster</th>
					</tr>";
				  
				  echo "<form method='get' action='editsport.php' id='editForm'>";
				  echo "<tr>";
				  echo "<td>";
				  echo "<input name='sport' type='text' id='sport' value='".$_GET['sport']."' size='2' readonly>";
				  echo "</td>";
				  echo "<td>";
				  echo "<input name='mr' type='text' id='mr' value='".$_GET['mr']."' size='6'>";
				  echo "</td>";
				echo "</tr>";
	
				echo "</table>";

				 echo "<input type='submit' name='submit' value='Edit Sport'>";
				 echo "</form>";		
					
			}
		
		
		
		else {
		
		
		//ADD Sport _____________________________________________
				
				echo "<h2>Add Sport</h2>";
			
				echo "<table border='1'>
				<tr>
				<th>Sport</th>
				<th>Min Roster</th>
				</tr>";
			
				echo "<form method='get' action='addsport.php' id='sportForm'>";
				echo "<tr>";
				  echo "<td>";
				  echo "<input name='sport' type='text' id='sport' value='' size='6'>";
				  echo "</td>";
				  echo "<td>";
				  echo "<input name='mr' type='text' id='mr' value='' size='3'>";
				  echo "</td>";				
				  			  
				echo "</tr>";
				echo "</table>";
				echo "<input type='submit' name='submit' value='Add Sport'>";
				 echo "</form>";		
			}
				 echo "<br><br><br><hr><br><br>";
				echo "<h2>Current Sports</h2>";
		 $sql="SELECT * FROM Sport;";
		 $result = mysql_query($sql) or die("<b>A fatal MySQL error occured</b>.\n<br />Query: " . $sql . "<br />\nError: (" . mysql_errno() . ") " . mysql_error());
				 
		 echo "<table border='1'>
			<tr>
			<th>Sport</th>
			<th>Min Roster</th>
			<th>Action</th>
			</tr>";

			while($row = mysql_fetch_array($result))
			  {
			  
			  $sport= $row['sport_name'];
			  $mr = $row['min_roster'];
					 
			  
			  echo "<tr>";
			  echo "<td>" . $sport. "</td>";
			  echo "<td>" . $mr . "</td>";
			  echo "<td>" . "<a href='sports.php?sport=".$sport."&mr=".$mr."'>Edit</a> / 
			  <a href='deletesport.php?sport=".$sport."&mr=".$mr."'>Delete</a>" . "</td>";
			  echo "</tr>";
			  }
				echo "</table>";
			
		?>
      </div>
    <div id="site_content_bottom"></div>
    </div>
    <div id="footer">Copyright &copy; HTCuva. All Rights Reserved. | <a href="http://validator.w3.org/check?uri=referer">XHTML</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> | <a href="http://www.dcarter.co.uk">design by dcarter</a></div>
  </div>
</body>
</html>

