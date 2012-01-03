<?php
/**
 * Template Name: One column, no sidebar
 *
 * A custom page template without sidebar.
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

		<div id="container" class="one-column">
			<div id="content" role="main">

			<?php
			/* Run the loop to output the page.
			 * If you want to overload this in a child theme then include a file
			 * called loop-page.php and that will be used instead.
			 */
			 get_template_part( 'loop', 'page' );
			?>
      
      <div id="archive">
        <h1>Recent Posts from the Blog <?php bloginfo('name');  ?></h1>
        
        <?php
        $archive_args = array( 'numberposts' => 5 );
        $archive_posts = get_posts( $archive_args );
        foreach( $archive_posts as $post ) :	setup_postdata($post); ?>
        	<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
        <?php endforeach; ?>
        
        ?>
        
      </div>
      
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>