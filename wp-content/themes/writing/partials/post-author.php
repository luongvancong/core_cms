<div class="author_box author-info">
    <div class="author-avatar">
        <a class="author-link" href="<?php echo get_author_posts_url( get_the_author_meta('ID') ) ?>" rel="author">
        <?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
    </div>
    <!-- .author-avatar -->
    <div class="author-description author_text">
        <h3 class="author-title">
            <a class="author-link" href="<?php echo get_author_posts_url( get_the_author_meta('ID') ) ?>" rel="author"><?php the_author(); ?></a>
        </h3>
        <p class="author-bio">
            <?php the_author_meta('description');; ?>
        </p>
        <!-- .author-bio -->
        <div class="social_icons_list">
        </div>
    </div>
    <!-- .author-description -->
</div>