<?php
/**
 * Template Name: Movie List
 *
 * @package WordPress
 * @subpackage Bizlight
 */
get_header();

//set the parameters for the query
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'category_name' => $pagename,
    'posts_per_page' =>  get_option('posts_per_page'),
	'paged' => $paged
);
//create an instance of the query grab the posts
$postList = new WP_Query($args);
?>
<div class="wrapper page-inner-title">
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
</div>
<div id="content" class="site-content">
	<div id="primary" class="content-area mv">
		<main id="main" class="site-main" role="main">
		  <?php if ($postList->have_posts() ) :  ?>
		      <?php if ($postList->max_num_pages > 1) : ?>
		        <?php $tempQuery = $wp_query;//save the previous wp_query object
		              $wp_query = $postList;//replace it with our own.
		        ?>
		        <?php $pagination = get_the_posts_pagination(array(
		            'mid_size'=> 2,
		            'prev_text'=> __('<<', 'textdomain'), 
		            'next_text'=> __('>>', 'textdomain')
		            ));
		            echo $pagination; ?>
		        <?php $wp_query = $tempQuery;//replace our query object with the original ?>
		      <?php endif?>
                <?php
                //if data is returned, iterate through it
                while ($postList->have_posts() ) : $postList->the_post(); ?>
                  <article id="post-<?php the_ID(); ?>" class="mv-article">
                    <?php if (has_post_thumbnail()) : ?>
                      <img class="mv-picture" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ) ?>" />
                    <?php endif; ?>+
                      <div class="mv-body">
                        <ul class="mv-buttons">
                            <li><a class="fasc-button fasc-size-medium fasc-type-popout fasc-rounded-medium fasc-ico-before dashicons-location-alt mv-venue-btn" href="http://thebnff.com/bnff-venues/">Venues</a></li>
                            <li><a class="fasc-button fasc-size-medium fasc-type-popout fasc-rounded-medium ico-fa fasc-ico-before fa-film mv-more-btn" href="<?php the_permalink(); ?>">More Information</a></li>
                            <li><a class="fasc-button fasc-size-medium fasc-type-popout fasc-rounded-medium ico-fa fasc-ico-before fa-ticket mv-ticket-btn" href="<?php the_field('ticket_link'); ?>">Buy Tickets</a></li>
                        </ul>
                        <div class="mv-content">
                            <strong class="mv-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong>
                            <?php the_excerpt(); ?>
                        </div>
                      </div>
                  </article>
                <?php endwhile;
                wp_reset_postdata(); ?>
          <?php endif; ?>
    </main>
  </div>
</div>
<?php get_footer(); ?>