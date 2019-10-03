<?php
	get_header( 'sub' ); ?>
    <main >
        <!-- style="background-image :url(<?php // echo get_template_directory_uri() . '/assets/img/Header/Background_Header_05.jpg' ?>);background-repeat: no-repeat;background-size: cover;" -->
        <section class="section-wills" >
            <div class="page-title wrap__big-sub" >
                <h1 ><?php the_title(); ?></h1 >
            </div >
			
			<?php $sectionOne = get_field( 'section_one' ); ?>
            <div class="why-i-need-will wrap__big-sub" >
                <div class="about__overlay overlay-sub" >
                    <div class="section-content-sub" >
                        <h2 ><?php echo $sectionOne[ 'title' ]; ?></h2 >
                        <p ><?php echo $sectionOne[ 'content' ]; ?></p >
                    </div >
                </div >
            </div >
        </section >
        <section >
			<?php $sectionTwo = get_field( 'section_two' ); ?>
            <div class="what-are-rules" >
                <div class="wrap__big-sub posRel" >
                    <div class="rules-header" >
                        <div class="asdf" ></div >
                        <header >
                            <h2 ><?php echo $sectionTwo[ 'title' ] ?></h2 >
                        </header >
                    </div >
                    <div class="rules-content" >
                        <div class="asdf1" ></div >
                        <div class="r_contnet" >
							<?php echo $sectionTwo[ 'content' ] ?>
                        </div >
                    </div >
                </div >
            </div >
        </section >
        <section class="date-rules" >
			<?php $sectionThree = get_field( 'section_three1' ); ?>
            <div class="wrap__big-sub" >
				<?Php echo $sectionThree; ?>
            </div >
        </section >
        <section >
			<?php $sectionFour = get_field( 'section_four' ); ?>
            <div class="i-have-will" >
                <div class="wrap__big-sub posRel" >
                    <div class="rules-header" >
                        <div class="asdf" ></div >
                        <header ><h2 ><?php echo $sectionFour[ 'title' ]; ?></h2 ></header >
                    </div >
                    <div class="rules-content" >
                        <div class="asdf1" ></div >
                        <div class="r_contnet" >
							<?php echo $sectionFour[ 'content' ]; ?>
                        </div >
                    </div >
                </div >
            </div >
        </section >
        <section class="geographic-areas" >
			<?php $sectionFive = get_field( 'section_five' ); ?>
            <div class="wrap__big-sub ovrflow" >
                <header >
                    <h3 ><?php echo $sectionFive[ 'contact_info' ] ?></h3 >
                </header >
                <div class="geographic-content" >
					<?php $count = 0;
						foreach ( $sectionFive[ 'image_repeater' ] as $item ) : ?>
                            <figure class="geographic-figure" >
                                <img src="<?php echo $item[ 'image' ][ 'url' ]; ?>" alt="<?php echo empty( $item[ 'image' ][ 'alt' ] ) ? 'image' . $count : $item[ 'image' ][ 'alt' ]; ?>" style="width:100%" >
                            </figure >
							<?php $count ++;
						endforeach; ?>
                </div >
                <div class="geo-text-box" >
					<?php echo $sectionFive[ 'content_box' ]; ?>
                </div >
            </div >
            <div class="clear-fix" ></div >
        </section >
    </main >
<?php get_footer( 'sub' );
