<!doctype html>
<html <?php language_attributes(); ?>>
<head >
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name = "viewport"
          content = "width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" >
    <meta http-equiv = "X-UA-Compatible" content = "ie=edge" >
    <title ><?php bloginfo('name'); ?></title >
    <?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) : ?>
        <?php if ( get_theme_mod('site_favicon') ) : ?>
            <link rel="shortcut icon" href="<?php echo esc_url(get_theme_mod('site_favicon')); ?>" />
        <?php endif; ?>
    <?php endif; ?>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head >
<body <?php echo body_class(); ?>>
<?php
//Display menu
//$leftMenu = array(
//    'theme_location' => '',
//    'menu' => '',
//    'container' => '',
//    'container_class' => '',
//    'container_id' => '',
//    'menu_class' => 'leftMenu',
//    'menu_id' => 'test',
//    'echo' => true,
//    'fallback_cb' => 'wp_page_menu',
//    'before' => '',
//    'after' => '',
//    'link_before' => '',
//    'link_after' => '',
//    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
//    'depth' => 0,
//);
?>
<?php// wp_nav_menu($leftMenu);?>