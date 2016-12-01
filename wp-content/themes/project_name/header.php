<!DOCTYPE html>
<html>
	<head>
		<title><?php wp_title(''); ?></title>
		<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	  <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico">
    <link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/apple-touch-icon-180x180.png">

		<link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/assets/dist/css/style.css" />

		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>