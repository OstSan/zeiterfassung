
	<body>
	
		<a href="#" class="scrollicon" title="zum Seitenanfang"><div>&uarr;</div></a>
	
		<!-- top-wrapper -->
		<div id="top-wrapper">
			<h1><?php echo $projekt_name; ?></h1>
		</div>
		<!-- Ende top-wrapper -->
		
		<!-- site-wrapper -->
		<div id="site-wrapper">
		
		<!-- content-head -->
		<div id="content-head">
			
		</div>
		<!-- Ende content-head -->
		
		<!-- content-left -->
		<div id="content-center">
			
			<h2><?php echo $inhalt_headline; ?></h2>
					
			<?php echo $inhalt; ?>
			
			<form action="meine.php" method="post">

			Benutzername: <input type="text" name="user">

			<br>

			Passwort: <input type="text" name="psw">

			<br>

			<input type="submit" name="senden" value="LogIn">

			</form>
			
		</div>
		<!-- Ende content-left -->
		
		<!-- content-right -->
		<!--
		<div id="content-right">
		
			<h2><?php echo $aktuell_headline; ?></h2>
					
			<?php echo $aktuell; ?>
		
		</div>
		-->
		<!-- Ende content-right -->
		<!--
		<div style="clear:both"></div>
		-->
		</div>
		<!-- Ende site-wrapper -->
