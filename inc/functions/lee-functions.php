<?php
// lee functions file 

function outputHeader() { ?>
<header>
	<div class="container-fluid">
		<div id="top-header">

		</div>
		<div class="header-nav">
			<div class="logo">

			</div>
			<div class="header-nav-menu" role="navigation">
				    <?php /* Primary navigation */
						wp_nav_menu( array(
						  'theme_location' => 'header-menu',
						  'depth' => 2,
						  'container' => false,
						  'menu_class' => 'nav',
						  //Process nav menu using our custom nav walker
						  'walker' => new wp_bootstrap_navwalker())
						);
					?>
			</div>
		</div>
	</div>
</header>
<?php }

?>