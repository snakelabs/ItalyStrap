<?php
/**
 * The Header for Italystrap
 *
 * Displays all of the <head> section and Main menu
 *
 * For improve performance replace $lang_attr with lang="xx-XX" when xx_XX is your language (en_EN - de_DE - fr_FR - ecc)
 * Otherwise you can use <?php language_attributes(); ?> instead 
 *
 * You can also replace <?php bloginfo( 'charset' ); ?> with "UTF-8" or your charset
 * @since ItalyStrap 1.0
 */

$lang_attr = get_bloginfo('language');
?>
<!DOCTYPE html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="<?php echo $lang_attr; ?>" prefix="og: http://ogp.me/ns#"> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" lang="<?php echo $lang_attr; ?>" prefix="og: http://ogp.me/ns#"> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" lang="<?php echo $lang_attr; ?>" prefix="og: http://ogp.me/ns#"> <![endif]-->
<!--[if gt IE 8]><!-->	<html class="no-js" lang="<?php echo $lang_attr; ?>" prefix="og: http://ogp.me/ns#"> <!--<![endif]-->
<head>
	<meta charset="UTF-8" >
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head();?>
</head>
<body>
<div class="wrapper">
    <header>
    	<?php
    	/**
    	 * This it's only a nav container
    	 * .navbar-wrapper style is in _menu.scss css/src/sass
    	 */
    	?>
		<nav  class="navbar-wrapper" role="navigation">
			<div class="container" itemscope itemtype="http://schema.org/SiteNavigationElement">
				<?php
				/**
				 * Modify style for menù with bootstrap style
				 * @link http://getbootstrap.com/components/#navbar
				 */
				?>
				<div class="navbar navbar-inverse navbar-relative-top">
					<div class="container">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<span itemprop="publisher" itemscope itemtype="http://schema.org/Organization">
								<a class="navbar-brand" href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home" itemprop="url"><span itemprop="name"><?php bloginfo('name'); ?></span></a>
								<meta  itemprop="image" content="<?php echo italystrap_logo();?>"/>
							</span>
						</div>
							<?php wp_nav_menu(
									array(
										'theme_location'	=> 'main-menu',
										'depth'				=>	2,
										'container'         => 'div',
										'container_class'	=> 'navbar-collapse collapse',
										'menu_class'		=> 'nav navbar-nav',
										'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
										'menu_id'			=> 'main-menu',
										'walker'			=> new wp_bootstrap_navwalker()
									)
								); ?>
					</div>
				</div>
			</div>
		</nav>
	</header>