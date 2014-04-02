<?
include('dbconnect.php');

$headerOptions = array(
  "title" => "Leagues"
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
			<li><a href="sports.php">Sports</a></li>
  		  <li class="selected"><a href="leagues.php">Leagues</a></li>
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
        <h1>Leagues</h1>
	
		<?php
		// EDIT League _______________________________________
		
		if (isset($_GET['lt'], $_GET['sport'], $_GET['lid'])) {
				echo "<h2>Edit League</h2>";
				  echo "<table border='1'>
					<tr>
					<th>League ID</th>
					<th>Type</th>
					<th>Sport</th>
					<th>Start Date</th>
					<th>End Date</th>
					<th>Registration Deadline</th>
					</tr>";
				  
				  echo "<form method='get' action='editleague.php' id='editForm'>";
				  echo "<tr>";
				  echo "<td>";
				  echo "<input name='lid' type='text' id='lid' value='".$_GET['lid']."' size='2' readonly>";
				  echo "</td>";
				  echo "<td>";
				  echo "<input name='lt' type='text' id='lt' value='".$_GET['lt']."' size='6'>";
				  echo "</td>";
				  echo "<td>";
				  echo "<input name='sport' type='text' id='sport' value='".$_GET['sport']."' size='5'>";
				  echo "</td>";
				  echo "<td>";
				  echo "<input name='start' type='text' id='end' value='".$_GET['start']."' size='6'>";
				  echo "</td>";
				  echo "<td>";
				  echo "<input name='end' type='text' id='end' value='".$_GET['end']."' size='6'>";
				  echo "</td>";
				  echo "<td>";
				  echo "<input name='reg' type='text' id='reg' value='".$_GET['reg']."' size='6'>";
				  echo "</td>";
				  echo "</tr>";
	
				echo "</table>";

				 echo "<input type='submit' name='submit' value='Edit League'>";
				 echo "</form>";		
					
			}
		
		
		
		else {
		
		
		//ADD League _____________________________________________
				
				echo "<h2>Add League</h2>";
			
				echo "<table border='1'>
				<tr>
				<th>League ID</th>
				<th>Type</th>
				<th>Sport</th>
				<th>Start Date</th>
				<th>End Date</th>
				<th>Registration deadline</th>
				</tr>";
			
				echo "<form method='get' action='addleague.php' id='leagueForm'>";
				echo "<tr>";
				  echo "<td>";
				  echo "<input name='leagueid' type='text' id='leagueid' value='' size='6'>";
				  echo "</td>";
				  echo "<td>";
				  echo "<input name='leaguetype' type='text' id='leaguetype' value='' size='6'>";
				  echo "</td>";				
				  echo "<td>";
				  echo "<input name='sport' type='text' id='sport' value='' size='6'>";
				  echo "</td>";
				  echo "<td>";
				  echo "<input name='start' type='text' id='start' value='' size='6'>";
				  echo "</td>";
				  echo "<td>";
				  echo "<input name='end' type='text' id='end' value='' size='6'>";
				  echo "</td>";
				  echo "<td>";
				  echo "<input name='reg' type='text' id='reg' value='' size='8'>";
				  echo "</td>";
				echo "</tr>";
				echo "</table>";
				echo "<input type='submit' name='submit' value='Add League'>";
				 echo "</form>";		
			}
				 echo "<br><br><br><hr><br><br>";
				echo "<h2>Current Leagues</h2>";
		 $sql="SELECT * FROM League NATURAL JOIN Schedule;";
		 $result = mysql_query($sql) or die("<b>A fatal MySQL error occured</b>.\n<br />Query: " . $sql . "<br />\nError: (" . mysql_errno() . ") " . mysql_error());
				 
		 echo "<table border='1'>
			<tr>
			<th>League ID</th>
			<th>League Name</th>
			<th>Start Date</th>
			<th>End Date</th>
			<th>Registration Deadline</th>
			<th>Action</th>
			</tr>";

			while($row = mysql_fetch_array($result))
			  {
			  
			  $lid= $row['league_id'];
			  $lt = $row['league_type'];
			  $sport = $row['sport_name'];
			  $start = $row['start_date'];
			  $end = $row['end_date'];
			  $reg = $row['reg_deadline'];
			  
			 
			  
			  echo "<tr>";
			  echo "<td>" . $lid. "</td>";
			  echo "<td>" . "<a href='getschedule.php?leaguetype=".$lt."&sport=".$sport."'>" . $lt . " " . $sport . "</a>" . "</td>";
			  echo "<td>" . $start. "</td>";
			  echo "<td>" . $end. "</td>";
			  echo "<td>" . $reg. "</td>";
			  echo "<td>" . "<a href='leagues.php?lid=".$lid."&lt=".$lt."&sport=".$sport."&start=".$start."&end=".$end."&reg=".$reg."'>Edit</a> / 
			  <a href='deleteleague.php?lid=".$lid."&lt=".$lt."&sport=".$sport."'>Delete</a>" . "</td>";
			  echo "</tr>";
			  }
				echo "</table>";
				
				echo "<br><br><hr><br><br>";
				

				
			
		?>
      </div>
    <div id="site_content_bottom"></div>
    </div>
    <div id="footer">Copyright &copy; HTCuva. All Rights Reserved. | <a href="http://validator.w3.org/check?uri=referer">XHTML</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> | <a href="http://www.dcarter.co.uk">design by dcarter</a></div>
  </div>
</body>
</html>

