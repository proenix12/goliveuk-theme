<?php
/**
 * Created by PhpStorm.
 * Date: 10/31/2018
 * Time: 4:09 PM
 * Template Name: Home
 *
 * @package WordPress
 * @subpackage Name
 * @since Twenty Fourteen 1.0
 */
get_header(); ?>
<div class="wrap">
<?php
if (have_posts()):
  while (have_posts()) : the_post();
    echo the_content();
  endwhile;
else:
  echo '<p>Sorry, no posts matched your criteria.</p>';
endif; ?>
</div>

<?php get_footer(); ?>
