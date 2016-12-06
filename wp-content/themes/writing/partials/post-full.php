<div id="<?php the_ID() ?>" <?php post_class('blog_post_container'); ?>>
    <div class="blog_post clearfix">
        <div class="blog_post_banner blog_post_image">
            <?php the_post_thumbnail(); ?>
        </div>
        <div class="blog_post_title">
            <h1 class="entry-title title post_title"><?php the_title(); ?></h1>
        </div>
        <div class="blog_post_meta clearfix">
            <span class="blog_meta_item blog_meta_format entry_format">
                <a href="javascript:;"><i class="fa fa-camera-retro"></i></a>
            </span>
            <span class="blog_meta_item blog_meta_category">
                In <a href="<?php echo get_category_link( get_the_category() ); ?>" rel="category tag"><?php echo get_the_category()[0]->name; ?></a>
            </span>
            <span class="blog_meta_item blog_meta_tags">
                <?php the_tags( 'Tags: ', ','); ?>
            </span>
            <span class="blog_meta_item blog_meta_date">
                <span class="screen-reader-text"></span>
                <time class="entry-date published" datetime="<?php echo date('Y-m-d H:i:s', get_the_time('U')); ?>"><?php echo date('d/m/Y', get_the_time('U')); ?></time>
            </span>
            <span class="blog_meta_item blog_meta_author">
                <span class="author vcard">
                    <a class="meta_author_avatar_url" href="<?php echo get_author_posts_url( get_the_author_meta('ID') ) ?>">
                        <?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
                    </a>
                    <a class="url fn n" href="<?php echo get_author_posts_url( get_the_author_meta('ID') ) ?>"><?php the_author(); ?></a>
                </span>
            </span>
        </div>
        <div class="entry-content blog_post_text blog_post_description">
            <?php the_content(); ?>
        </div>
        <div class="blog_post_control clearfix">
            <div class="blog_post_control_item blog_post_share">
                <span class="share_item share_sign"><i class="fa fa-share "></i></span>
            </div>
            <div class="addthis_native_toolbox"></div>
        </div>
    </div>
</div>
