<div class="post_related">
    <h3 class="related_title title">Cùng danh mục:</h3>
    <div class="row">
        <?php
            $relatedPostQuery = new WP_Query([
                'cat' => get_the_category()[0]->id,
                'posts_per_page' => 10,
                'post_status' => array('publish'),
                'post__not_in' => array(get_the_id())
            ]);
        ?>

        <?php while($relatedPostQuery->have_posts()) : $relatedPostQuery->the_post(); ?>
            <div id="post-<?php the_ID() ?>" <?php post_class('blog_post_container col-md-4'); ?>>
                <div class="blog_post clearfix">
                    <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
                        <div class="blog_post_banner blog_post_image">
                            <!-- <img width="455" height="310" src="https://awcdn1.ahmad.works/writing/wp-content/uploads/2015/05/Tea-and-Flowers-455x310.jpg" class="attachment-masonry_blog size-masonry_blog wp-post-image" alt="Tea-and-Flowers"> -->
                            <?php the_post_thumbnail( array(455, 310) ); ?>
                        </div>
                        <!-- .post-thumbnail -->
                    </a>
                    <div class="blog_post_title">
                        <h4 class="entry-title title post_title">
                            <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h4>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>

        <?php wp_reset_postdata(); ?>
    </div>
</div>