<?
include('dbconnect.php');
session_start();
echo $_SESSION['admin'];


if ($_SESSION['admin'] != '1') {
	header("Location: myTeams.php");
	
}

else {
	header("Location: admin.php");
exit; 	// ensure script terminates immediately
}

	
/*
if(isset($_SESSION["user"])) {
	header("Location: myTeams.php");
	exit; 	// ensure script terminates immediately
}
else{
	header("Location: login.php");
	exit;
}*/

require_once "header.php";


?>


<head>
  <title>IMSS</title>
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
          <li class="selected"><a href="index.php">Home</a></li>
          <li><a href="registerTeam.php">Create Team</a></li>
          <li><a href="viewRoster.php">View Rosters</a></li>
          <li><a href="getschedule.php">Leagues</a></li>
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
        <h1>Index</h1>
        <p>This standards compliant, simple, fixed width website template is released as an 'open source' design (under the <a href="http://creativecommons.org/licenses/by/3.0">Creative Commons Attribution 3.0 Licence</a>), which means that you are free to download and use it for anything you want (including modifying and amending it). All I ask is that you leave the 'design by dcarter' link in the footer of the template, but other than that...</p>
        <p>This template is written entirely in XHTML 1.1 and CSS, and can be validated using the links in the footer.</p>
        <p>You can view my other 'open source' template designs <a href="http://www.dcarter.co.uk/templates.html">here</a>.</p>
        <p>This template is a fully functional 5 page website, with a <a href="styles.html">styles</a> page that gives examples of all the styles available with this design.</p>
        <h1>Browser Compatibility</h1>
        <p>This template has been tested in the following browsers:</p>
        <ul>
          <li>Internet Explorer 8</li>
          <li>Internet Explorer 7</li>
          <li>FireFox 3</li>
          <li>Google Chrome 2</li>
          <li>Safari 4</li>
        </ul>
      </div>
    <div id="site_content_bottom"></div>
    </div>
    <div id="footer">Copyright &copy; HTCuva. All Rights Reserved. | <a href="http://validator.w3.org/check?uri=referer">XHTML</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> | <a href="http://www.dcarter.co.uk">design by dcarter</a></div>
  </div>
</body>
</html>

