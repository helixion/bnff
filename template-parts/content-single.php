<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bizlight
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		if( has_post_thumbnail()){
			echo "<div class='mv-picture col-xs-12 col-md-4'>";
			the_post_thumbnail('full');
			echo "</div>";/*div end*/
		}
		?>
		<div class="mv-body col-xs-12 col-md-8">
			<ul class="mv-buttons">
			  <li><a class="fasc-button fasc-size-medium fasc-type-popout fasc-rounded-medium fasc-ico-before dashicons-location-alt mv-venue-btn" href="http://thebnff.com/bnff-venues/">Venues</a></li>
              <li><a class="fasc-button fasc-size-medium fasc-type-popout fasc-rounded-medium ico-fa fasc-ico-before fa-ticket mv-ticket-btn" href="<?php the_field('ticket_link'); ?>">Buy Tickets</a></li>	
			</ul>
            <div class="mv-content">
			  <?php the_content(); ?>
			  <?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bizlight' ),
					'after'  => '</div>',
				) );
			   ?>
            </div>		
		</div>
                
	</div><!-- .entry-content -->
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <img src="<?php the_field('image_left'); ?>" />
        </div>
        <div class="col-xs-12 col-md-6">
            <img src="<?php the_field('image_right'); ?>" />
    </div>
	<footer class="entry-footer">
		<?php bizlight_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
