<?php
	/**
	 * Template Name: Home
	 * @package WordPress
	 * @subpackage Name
	 * @since Twenty Fourteen 1.0
	 */
	get_header(); ?>

<?php $wills = get_field('wills'); ?>
<?php $lasting_power_of_attorney = get_field('lasting_power_of_attorney'); ?>
<?php $estate_planing = get_field('estate_planing'); ?>
<?php $speak_to_an_adviser = get_field('speak_to_an_adviser'); ?>
<main class="main" >
    <section class="about" >
        <div class="wrap wrap__big" >
            <div class="content about__content" >
                <?php echo $wills['content']; ?>
            </div >
        </div >
        <div class="wrap wrap__big about__wrap" >
            <div class="about__mid section__content" >
                <h2 class="section__title about__title bold" ><?php echo $wills['title']; ?></h2 >
                <a class="section__button about__button" target="<?php echo $wills['link']['target']; ?>" href="<?php echo $wills['link']['url']; ?>" >Click here</a >
            </div >
            <div class="overlay about__overlay" ></div >
        </div >
    </section >
    <section class="history" >
        <div class="wrap wrap__big" >
            <div class="content history__content" >
	            <?php echo $lasting_power_of_attorney['content']; ?>
            </div >
        </div >
        <div class="wrap wrap__big history__wrap" >
            <div class="history__mid section__content" >
                <h2 class="section__title history__title bold" ><?php echo $lasting_power_of_attorney['title']; ?></h2 >
                <a class="section__button history__button" target="<?php echo $lasting_power_of_attorney['link']['target']; ?>" href="<?php echo $lasting_power_of_attorney['link']['url']; ?>" >Click here</a >
            </div >
            <div class="overlay history__overlay" ></div >
        </div >
    </section >
    <section class="membership" >
        <div class="wrap wrap__big" >
            <div class="content membership__content" >
	            <?php echo $estate_planing['content']; ?>
            </div >
        </div >
        <div class="wrap wrap__big membership__wrap" >
            <div class="membership__mid section__content" >
                <h2 class="section__title membership__title bold" ><?php echo $estate_planing['title']; ?></h2 >
                <a class="section__button membership__button" target="<?php echo $estate_planing['link']['target']; ?>" href="<?php echo $estate_planing['link']['url']; ?>" >Click here</a >
            </div >
            <div class="overlay membership__overlay" ></div >
        </div >
    </section >
    <section class="venue" >
        <div class="wrap wrap__big" >
            <div class="content venue__content" >
	            <?php echo $speak_to_an_adviser['content']; ?>
            </div >
        </div >
        <div class="wrap wrap__big venue__wrap" >
            <div class="venue__mid section__content" >
                <h2 class="section__title venue__title bold" ><?php echo $speak_to_an_adviser['title']; ?></h2 >
                <a class="section__button venue__button" target="<?php echo $speak_to_an_adviser['link']['target']; ?>" href="<?php echo $speak_to_an_adviser['link']['url']; ?>" >Click here</a >
            </div >
            <div class="overlay venue__overlay" ></div >
        </div >
    </section >
    <div class="wrap" >
		<?php
			if ( have_posts() ):
				while ( have_posts() ) : the_post();
					 the_content();
				endwhile;
			else:
				echo '<p>Sorry, no posts matched your criteria.</p>';
			endif; ?>
    </div >
	<?php get_footer(); ?>
