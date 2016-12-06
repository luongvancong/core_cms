<article id="post-<?php the_ID(); ?>" <?php post_class('blog_post_container'); ?>>
    <div class="blog_post clearfix">
        <div class="posts_list_wrapper clearfix">
            <div class="post_thumbnail_wrapper">
                <div class="blog_post_banner blog_post_image">
                    <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
                        <!-- <img width="267" height="205" src="https://awcdn1.ahmad.works/writing/wp-content/uploads/2015/05/Resturant-Employer-267x205.jpg" class="attachment-list_blog size-list_blog wp-post-image" alt="Restaurant Employer Read Clients Orders On His iPad" />      -->
                        <?php the_post_thumbnail('medium'); ?>
                    </a>
                </div>
            </div>
            <div class="post_info_wrapper">
                <!-- use this wrapper in list style only to group all info far from thumbnail wrapper -->
                <div class="blog_post_title">
                    <h2 class="entry-title title post_title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                </div>
                <div class="blog_post_meta clearfix">
                    <span class="blog_meta_item blog_meta_format entry_format"><a href="https://ahmad.works/writing/type/image/"><i class="fa fa-camera-retro"></i></a></span><span class="blog_meta_item blog_meta_category">In <a href="https://ahmad.works/writing/category/images-posts/" rel="category tag">Images Posts</a>, <a href="https://ahmad.works/writing/category/life-style/" rel="category tag">Life Style</a></span><span class="blog_meta_item blog_meta_tags">Tags <a href="https://ahmad.works/writing/tag/people/" rel="tag">people</a></span><span class="blog_meta_item blog_meta_date"><span class="screen-reader-text"></span><time class="entry-date published" datetime="2015-05-17T23:42:46+00:00">May 17, 2015</time></span><span class="blog_meta_item blog_meta_comments"><a href="https://ahmad.works/writing/restaurant-employer-read-clients-orders-on-his-ipad/#comments">5 Comments</a></span><span class="blog_meta_item blog_meta_author"><span class="author vcard"><a class="meta_author_avatar_url" href="https://ahmad.works/writing/author/ahmad/"><img src="https://awcdn1.ahmad.works/writing/wp-content/uploads/2015/05/Author-150x150.jpg" width="25" height="25" alt="John Doe" class="avatar avatar-25 wp-user-avatar wp-user-avatar-25 alignnone photo" /></a> <a class="url fn n" href="https://ahmad.works/writing/author/ahmad/">John Doe</a></span></span>
                </div>
                <div class="entry-content blog_post_text blog_post_description">
                    <?php the_excerpt(); ?>
                </div>
                <div class="blog_post_control clearfix">
                    <div class="blog_post_control_item blog_post_readmore">
                        <a href="<?php the_permalink(); ?>" class="read_more_link">Continue Reading</a>
                    </div>
                    <div class="blog_post_control_item blog_post_share">
                        <span class="share_item share_sign"><i class="fa fa-share "></i></span>
                        <span class="social_share_item_wrapper"><a rel="nofollow" href="https://www.facebook.com/sharer/sharer.php?u=https://ahmad.works/writing/restaurant-employer-read-clients-orders-on-his-ipad/" class="share_item share_item_social share_facebook" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=https://ahmad.works/writing/restaurant-employer-read-clients-orders-on-his-ipad/', 'facebook-share-dialog', 'width=626,height=436');
                            return false;"><i class="fa fa-facebook"></i></a></span>
                        <span class="social_share_item_wrapper"><a rel="nofollow" href="https://twitter.com/share?url=https://ahmad.works/writing/restaurant-employer-read-clients-orders-on-his-ipad/" target="_blank" class="share_item share_item_social share_twitter"><i class="fa fa-twitter"></i></a></span>
                        <span class="social_share_item_wrapper"><a rel="nofollow" href="https://plus.google.com/share?url=https://ahmad.works/writing/restaurant-employer-read-clients-orders-on-his-ipad/" onclick="javascript:window.open(this.href,
                            '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');
                            return false;" class="share_item share_item_social share_googleplus"><i class="fa fa-google-plus"></i></a></span>
                        <span class="social_share_item_wrapper"><a rel="nofollow" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=https://ahmad.works/writing/restaurant-employer-read-clients-orders-on-his-ipad/" target="_blank" class="share_item share_item_social share_linkedin"><i class="fa fa-linkedin"></i></a></span>
                        <span class="social_share_item_wrapper"><a rel="nofollow" href="https://www.pinterest.com/pin/create/button/?url=https://ahmad.works/writing/restaurant-employer-read-clients-orders-on-his-ipad/&amp;media=https://ahmad.works/writing/wp-content/uploads/2015/05/Resturant-Employer.jpg&amp;description=Restaurant%20Employer%20Read%20Clients%20Orders%20On%20His%20iPad" class="share_item share_item_social share_pinterest" target="_blank"><i class="fa fa-pinterest"></i></a></span>
                    </div>
                </div>
            </div>
            <!-- .post_info_wrapper close post_info_wrapper in cas of list style-->
        </div>
        <!-- .posts_list_wrapper -->
    </div>
</article>