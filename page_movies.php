<?php
/**
 * Template Name: Movie List
 *
 * @package WordPress
 * @subpackage Bizlight
 */
get_header();

//set the parameters for the query
$args = array(
	'category_name' => $pagename
);
//grab the posts
$post_array = get_posts($args);
?>
<div class="wrapper page-inner-title">
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
</div>
<div id="content" class="site-content">
	<div id="primary" class="content-area mv">
		<main id="main" class="site-main" role="main">
      <ul class="mv-list">
        <?php
        //iterate through the post_array using the designated parameters
        foreach ($post_array as $post) : setup_postdata($post); ?>
          <li>
            <?php if (has_post_thumbnail($post->ID)) : ?>
              <img class="mv-picture" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ) ?>" />
            <?php endif; ?>
              <div class="mv-body">
                <ul class="mv-buttons">
                    <li><a class="fasc-button fasc-size-medium fasc-type-popout fasc-rounded-medium fasc-ico-before dashicons-location-alt mv-venue-btn" href="http://thebnff.com/bnff-venues/">Venues</a></li>
                    <li><a class="fasc-button fasc-size-medium fasc-type-popout fasc-rounded-medium ico-fa fasc-ico-before fa-film mv-more-btn" href="<?php the_permalink(); ?>">More Information</a></li>
                    <li><a class="fasc-button fasc-size-medium fasc-type-popout fasc-rounded-medium ico-fa fasc-ico-before fa-ticket mv-ticket-btn" href="<?php echo get_post_meta($post->ID, 'Ticket Link', true); ?>">Buy Tickets</a></li>
                </ul>
                <div class="mv-content">
                    <strong class="mv-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong>
                    <?php the_excerpt(); ?>
                </div>
              </div>
          </li>
        <?php endforeach;
        wp_reset_postdata(); ?>
     </ul>
    </main>
  </div>
</div>
<?php get_footer(); ?>
