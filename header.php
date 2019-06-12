<!doctype html>



<html <?php language_attributes(); ?> class="no-js">

	

	<head>

		<meta charset="<?php bloginfo('charset'); ?>">

		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">

        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<meta name="description" content="<?php bloginfo('description'); ?>">

		<meta name = "format-detection" content = "telephone=no">

		<?php wp_head(); ?>

		<script type="text/javascript">
		    var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
		</script>

		<script src='https://www.google.com/recaptcha/api.js'></script>

		

	</head>

	<div id="preLoader" class="preLoader">
		<div class="logo spin"></div>
	</div>

	<div id="top-anch"></div>

	<body <?php body_class(); ?>>

		<div id="fb-root"></div>

		<script>(function(d, s, id) {

		  var js, fjs = d.getElementsByTagName(s)[0];

		  if (d.getElementById(id)) return;

		  js = d.createElement(s); js.id = id;

		  js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.2&appId=1801382823476378&autoLogAppEvents=1';

		  fjs.parentNode.insertBefore(js, fjs);

		}(document, 'script', 'facebook-jssdk'));</script>

		<!-- wrapper -->

		<div class="site-wrap">
			<?php outputHeader(); ?>
		
