
	<body>
	
		<a href="#" class="scrollicon" title="zum Seitenanfang"><div>&uarr;</div></a>
	
		<!-- top-wrapper -->
		<div id="top-wrapper">
			<h1><?php echo $projekt_name; ?></h1>
		</div>
		<!-- Ende top-wrapper -->

		
		<!-- site-wrapper -->
		<div id="site-wrapper">

		
		<!-- content-center -->
		<div id="content-center">
			
			<h2><?php echo $inhalt_headline; ?></h2>
					
			<?php echo $inhalt; ?>
			
			<a class='button_green' href='<?php echo SITE_ROOT."/".$links[2]; ?>' title='<?php echo $links_namen[2]; ?>'><?php echo $links_namen[2]; ?></a>

			<a class='button_red' href='<?php echo SITE_ROOT."/".$links[3]; ?>' title='<?php echo $links_namen[3]; ?>'><?php echo $links_namen[3]; ?></a>
			
			<br /><br />
			
			<a class='a2' href='<?php echo SITE_ROOT."/".$links[4]; ?>' title='<?php echo $links_namen[4]; ?>'><?php echo $links_namen[4]; ?></a>
			
		</div>
		<!-- Ende content-center -->

			
		<!--
		<div style="clear:both"></div>
		-->
		</div>
		<!-- Ende site-wrapper -->
