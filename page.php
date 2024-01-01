<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ankr_agency
 */

get_header();
?>
<h3>sgdfgsdfgsfsdfasd</h3>
	<main id="primary" class="site-main">

		<?php
			while ( have_posts() ) :
				the_post();
		?>

		<!-- Include and echo the hero module template part -->
		<?php echo get_template_part('page-module/hero-module/hero' , 'page') ?>

		<!-- Include and echo the about note module template part -->
		<?php echo get_template_part('page-module/about-note-module/about-note' , 'page') ?>

		<!-- Include and echo the about banner module template part -->
		<?php echo get_template_part('page-module/about-banner-module/about-banner' , 'page') ?>

		<!-- Include and echo the Service module template part -->
		<?php echo get_template_part('page-module/service-module/service' , 'page') ?>

		<!-- Include and echo the Video gallery module template part -->
		<?php echo get_template_part('page-module/video-gallery-module/video-gallery' , 'page') ?>

		<!-- Include and echo the testimonial module template part -->
		<?php echo get_template_part('page-module/testimonial-module/testimonial' , 'page') ?>

		<!-- Include and echo the team module template part -->
		<?php echo get_template_part('page-module/team-module/team' , 'page') ?>

		<!-- Include and echo the contact us module template part -->
		<?php echo get_template_part('page-module/contact-us-module/contact-us' , 'page') ?>

		<?php
			endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
//get_sidebar();
get_footer();
