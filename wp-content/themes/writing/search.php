<?php
get_header(); ?>

	<main class="main_content search_page_content <?php echo asalah_default_content_class(); ?>">

		<header class="page-header page_main_title clearfix">
			<h1 class="page-title title"><?php printf( __( 'Search Results for: %s', 'asalah' ), get_search_query() ); ?></h1>
		</header><!-- .page-header -->

		<?php if ( have_posts() ) : ?>

			<div class="blog_posts_wrapper blog_posts_list clearfix <?php echo asalah_blog_class(); ?>">
				<?php if ( is_home() && ! is_front_page() ) : ?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</header>
				<?php endif; ?>

				<?php

				get_template_part( 'content', get_post_format() );
				?>
			</div> <!-- .blog_posts_wrapper -->

			<?php

			asalah_pagination();

		else :
			get_template_part( 'content', 'none' );

		endif;

		?>
	</main><!-- .main_content -->

	<?php if ((asalah_option('asalah_sidebar_position') != 'none') ): ?>
		<?php if (!((asalah_cross_option('asalah_site_width') < 701) && (asalah_cross_option('asalah_site_width') > 499) )) { ?>
		<aside class="side_content widget_area <?php echo asalah_default_sidebar_class(); ?>">
			<?php get_sidebar(); ?>
		</aside>
		<?php } ?>
	<?php endif; ?>

<?php get_footer(); ?>