
	<body>
	
		<a href="#" class="scrollicon" title="zum Seitenanfang"><div>&uarr;</div></a>
	
		<!-- top-wrapper -->
		<div id="top-wrapper">
			<a href='<?php echo SITE_ROOT."/".$links[1]; ?>' title='<?php echo $links_namen[1]; ?>'><?php echo $projekt_name; ?></a>
			
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
			
			<p class="p1">
			<h2><?php echo $inhalt_headline; ?></h2>
			</p>
			<p class="p1">
			<?php echo $inhalt; ?>
			</p>
			
			<form action="login" method="post">
			<label for="user">Benutzername:</label>
			<input type="text" name="user">

			<br>
			<label for="psw">Passwort:</label>
			<input type="password" name="psw">

			<br /><br />

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
