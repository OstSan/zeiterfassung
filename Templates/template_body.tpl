
	<body>
	
		<a href="#" class="scrollicon" title="zum Seitenanfang"><div>&uarr;</div></a>
	
		<!-- top-wrapper -->
		<div id="top-wrapper">
		
		</div>
		<!-- Ende top-wrapper -->
	
		<!-- navigation -->
		<div id="navigation">
			
			<ul>
				<li><a href='<?php echo SITE_ROOT."/".$links[1]; ?>' title='<?php echo $links_namen[1]; ?>'><?php echo $links_namen[1]; ?></a></li>
				
			</ul>
		
		</div>
		<!-- Ende navigation -->
		
		<input type="checkbox" id="nav-trigger" class="nav-trigger">
		<label for="nav-trigger" onklick></label>
		
		<!-- site-wrapper -->
		<div id="site-wrapper">
		
		<!-- content-head -->
		<div id="content-head">
			
		</div>
		<!-- Ende content-head -->
		
		<!-- content-left -->
		<div id="content-left">
			
			<h2><?php echo $inhalt_headline; ?></h2>
					
			<?php echo $inhalt; ?>
			
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
