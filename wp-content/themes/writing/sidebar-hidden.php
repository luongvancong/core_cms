<div class="sliding_close_helper_overlay"></div>
    <div class="site_side_container ">
        <h3 class="screen-reader-text">Sliding Sidebar</h3>
        <div class="info_sidebar">
            <div id="search-2" class="widget_container widget_content widget widget_search clearfix">
                <form role="search" class="search-form" method="get" action="<?php echo get_search_link(); ?>">
                    <label>
                    <span class="screen-reader-text">Search for:</span>
                    <input type="search" class="search-field" placeholder="Search ..." value="" name="s" title="Search for:">
                    </label>
                    <i class="search_submit_icon fa fa-search"><input type="submit" class="search-submit" value=""></i>
                </form>
            </div>
            <div id="about-widget-4" class="widget_container widget_content widget about-widget clearfix">
                <h4 class="widget_title title"><span class="page_header_title">About Me</span></h4>
                <div class="asalah_about_me">
                    <div class="author_image_wrapper default rounded">
                        <img class="img-responsive" src="<?php echo get_avatar_url(1) ?>" alt="About Me" />
                    </div>
                    <div class="author_text_wrapper">
                        <p><?php echo get_user_by(  'id', 1 )->description; ?></p>
                    </div>
                </div>
            </div>
            <div id="social-widget-3" class="widget_container widget_content widget asalah-social-widget clearfix">
                <h4 class="widget_title title"><span class="page_header_title">Social Profiles</span></h4>
                <div class="social_icons_list widget_social_icons_list"><a rel="nofollow" target="_blank" href="#" title="Facebook" class="social_icon widget_social_icon social_facebook social_icon_facebook"><i class="fa fa-facebook"></i></a><a rel="nofollow" target="_blank" href="#" title="Twitter" class="social_icon widget_social_icon social_twitter social_icon_twitter"><i class="fa fa-twitter"></i></a><a rel="nofollow" target="_blank" href="#" title="Google Plus" class="social_icon widget_social_icon social_google-plus social_icon_google-plus"><i class="fa fa-google-plus"></i></a><a rel="nofollow" target="_blank" href="#" title="Behance" class="social_icon widget_social_icon social_behance social_icon_behance"><i class="fa fa-behance"></i></a><a rel="nofollow" target="_blank" href="#" title="Dribbble" class="social_icon widget_social_icon social_dribbble social_icon_dribbble"><i class="fa fa-dribbble"></i></a><a rel="nofollow" target="_blank" href="#" title="Linked In" class="social_icon widget_social_icon social_linkedin social_icon_linkedin"><i class="fa fa-linkedin"></i></a><a rel="nofollow" target="_blank" href="#" title="Youtube" class="social_icon widget_social_icon social_youtube social_icon_youtube"><i class="fa fa-youtube"></i></a><a rel="nofollow" target="_blank" href="#" title="Vimeo" class="social_icon widget_social_icon social_vimeo-square social_icon_vimeo-square"><i class="fa fa-vimeo-square"></i></a><a rel="nofollow" target="_blank" href="#" title="VK" class="social_icon widget_social_icon social_vk social_icon_vk"><i class="fa fa-vk"></i></a><a rel="nofollow" target="_blank" href="#" title="Vine" class="social_icon widget_social_icon social_vine social_icon_vine"><i class="fa fa-vine"></i></a><a rel="nofollow" target="_blank" href="#" title="Digg" class="social_icon widget_social_icon social_digg social_icon_digg"><i class="fa fa-digg"></i></a><a rel="nofollow" target="_blank" href="#" title="Skype" class="social_icon widget_social_icon social_skype social_icon_skype"><i class="fa fa-skype"></i></a><a rel="nofollow" target="_blank" href="#" title="Instagram" class="social_icon widget_social_icon social_instagram social_icon_instagram"><i class="fa fa-instagram"></i></a><a rel="nofollow" target="_blank" href="#" title="Pinterest" class="social_icon widget_social_icon social_pinterest social_icon_pinterest"><i class="fa fa-pinterest"></i></a><a rel="nofollow" target="_blank" href="#" title="Github" class="social_icon widget_social_icon social_github social_icon_github"><i class="fa fa-github"></i></a><a rel="nofollow" target="_blank" href="#" title="Bitbucket" class="social_icon widget_social_icon social_bitbucket social_icon_bitbucket"><i class="fa fa-bitbucket"></i></a><a rel="nofollow" target="_blank" href="#" title="Stack Overflow" class="social_icon widget_social_icon social_stack-overflow social_icon_stack-overflow"><i class="fa fa-stack-overflow"></i></a><a rel="nofollow" target="_blank" href="#" title="Ren Ren" class="social_icon widget_social_icon social_renren social_icon_renren"><i class="fa fa-renren"></i></a><a rel="nofollow" target="_blank" href="#" title="Flickr" class="social_icon widget_social_icon social_flickr social_icon_flickr"><i class="fa fa-flickr"></i></a><a rel="nofollow" target="_blank" href="#" title="Soundcloud" class="social_icon widget_social_icon social_soundcloud social_icon_soundcloud"><i class="fa fa-soundcloud"></i></a><a rel="nofollow" target="_blank" href="#" title="Steam" class="social_icon widget_social_icon social_steam social_icon_steam"><i class="fa fa-steam"></i></a><a rel="nofollow" target="_blank" href="#" title="QQ" class="social_icon widget_social_icon social_qq social_icon_qq"><i class="fa fa-qq"></i></a><a rel="nofollow" target="_blank" href="#" title="Slideshare" class="social_icon widget_social_icon social_slideshare social_icon_slideshare"><i class="fa fa-slideshare"></i></a><a rel="nofollow" target="_blank" href="#" title="RSS" class="social_icon widget_social_icon social_rss social_icon_rss"><i class="fa fa-rss"></i></a></div>
            </div>
            <div id="postlist-widget-3" class="widget_container widget_content widget asalah-postlist-widget clearfix">
                <h4 class="widget_title title"><span class="page_header_title">Recent Posts</span></h4>
                <div class="asalah_post_list_widget">
                    <ul class="post_list">
                        <?php
                            $recentPostQuery = new WP_Query([
                                'order' => 'DESC',
                                'orderby' => 'rand',
                                'author' => 1,
                                'post_status' => array('publish')
                            ]);
                        ?>

                        <?php if($recentPostQuery->have_posts()) : ?>
                            <?php while($recentPostQuery->have_posts()) : $recentPostQuery->the_post(); ?>
                                <li class="post_item clearfix">
                                    <div class="post_thumbnail_wrapper">
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                            <?php the_post_thumbnail( array(50, 50), ['class' => 'img-responsive'] ); ?>
                                        </a>
                                    </div>
                                    <div class="post_info_wrapper">
                                        <h5 class="title post_title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h5>
                                        <span class="post_meta_item post_meta_time post_time"><?php echo date('d/m/Y', get_the_time('U')) ?></span>
                                    </div>
                                </li>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        <?php endif; ?>

                    </ul>
                </div>
            </div>
            <div id="fbpage-widget-3" class="widget_container widget_content widget asalah-fbpage-widget clearfix">
                <h4 class="widget_title title"><span class="page_header_title">Facebook</span></h4>
                <div class="fb-page" data-href="https://www.facebook.com/aworks.fans" data-hide-cover="false" data-show-facepile="true" data-show-posts="true">
                    <div class="fb-xfbml-parse-ignore"></div>
                </div>
            </div>
        </div>
    </div>