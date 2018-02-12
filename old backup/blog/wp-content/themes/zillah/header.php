<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package zillah
 */

?><!DOCTYPE html>
<?php zillah_hook_html_before(); ?>
<html <?php language_attributes(); ?>>
<head>
	<?php zillah_hook_head_top(); ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php zillah_hook_head_bottom(); ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php zillah_hook_body_top(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'zillah' ); ?></a>
	<?php zillah_hook_header_before(); ?>
	<header id="mainHead">
  <div class="logo">
    <a href="/">J Rutland Design</a>
  </div>

  <nav>
    <ul>
      <li><a href="/#aboutMe">about me</a></li>
      <li><a href="/#portfolioWrap">UI design work</a></li>
      <li><a href="/blog" target="_blank">my thoughts</a></li>
      <li class="btn hire"><a href="/#contactMe">hire me</a></li>
    </ul>
  </nav>
</header>
	<?php zillah_hook_header_after(); ?>

	<?php zillah_slider(); ?>

	<?php zillah_hook_content_before(); ?>
	<div id="content" class="site-content">
		<div class="container">
			<?php zillah_hook_content_top(); ?>
