<?php
/*=============================================
                BREADCRUMBS
=============================================*/
//  to include in functions.php
function the_breadcrumb()
{
    $showOnHome = 1; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $delimiter = '&raquo;'; // delimiter between crumbs
    $home = 'Home'; // text for the 'Home' link
    $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
    $before = ' <li class="breadcrumb-item active" aria-current="page">'; // tag before the current crumb
    $after = '</li>'; // tag after the current crumb

    global $post;
    $homeLink = get_bloginfo('url');
    if (is_home() || is_front_page()) {
        if ($showOnHome == 1) {
            echo '<ol class="breadcrumb"><li class="breadcrumb-item"><a href="' . $homeLink . '">' . $home . '</a></li>';
            echo '<li class="breadcrumb-item active" aria-current="page">Blog</li>';
        }
    } else {
        echo '<ol class="breadcrumb"><li class="breadcrumb-item"><a href="' . $homeLink . '">' . $home . '</a></li>';

        if (is_category()) {
            $thisCat = get_category(get_query_var('cat'), false);

            if (get_post_type() == 'post') {
                echo '<li class="breadcrumb-item"><a href="' . get_post_type_archive_link('post') . '">Blog</a></li>';
            } else {
                $post_type = get_post_type_object(get_post_type());
                echo '<li class="breadcrumb-item"><a href="' . get_post_type_archive_link($post_type->name) . '">' . $post_type->label . '</a></li>';
            }

            if ($thisCat->parent != 0) {
                echo '<li class="breadcrumb-item">' . get_category_parents($thisCat->parent, true, '') . '</li>';
            }
            echo $before . single_cat_title('', false) . $after;
        } elseif (is_search()) {
            echo $before . 'Search results for "' . get_search_query() . '"' . $after;
        } elseif (is_day()) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('d') . $after;
        } elseif (is_month()) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('F') . $after;
        } elseif (is_year()) {
            echo $before . get_the_time('Y') . $after;
        } elseif (is_single() && !is_attachment()) {
            if (get_post_type() != 'post') {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                echo '<li class="breadcrumb-item">' . '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->label . '</a>' . $after;
                if ($showCurrent == 1) {
                    echo $before . get_the_title() . $after;
                }
            } else {
                echo '<li class="breadcrumb-item"><a href="' . site_url('blog') . '">Blog</a>' . $after;
                $cat = get_the_category();
                $cat = $cat[0];
                $cats = get_category_parents($cat, true, '');
                if ($showCurrent == 0) {
                    $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
                }
                echo '<li class="breadcrumb-item">' . $cats . $after;
                if ($showCurrent == 1) {
                    echo $before . get_the_title() . $after;
                }
            }
        } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->label . $after;
        } elseif (is_attachment()) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID);
            $cat = $cat[0];
            echo get_category_parents($cat, true, '');
            echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
            if ($showCurrent == 1) {
                echo $before . get_the_title() . $after;
            }
        } elseif (is_page() && !$post->post_parent) {
            if ($showCurrent == 1) {
                echo $before . get_the_title() . $after;
            }
        } elseif (is_page() && $post->post_parent) {
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = $before . '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>' . $after;
                $parent_id  = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
                echo $breadcrumbs[$i];
            }
            if ($showCurrent == 1) {
                echo $before . get_the_title() . $after;
            }
        } elseif (is_tag()) {
            echo '<li class="breadcrumb-item"><a href="' . get_post_type_archive_link('post') . '">Blog</a></li>' . $before . single_tag_title('', false) . $after;
        } elseif (is_author()) {
            global $author;
            $userdata = get_userdata($author);
            echo $before . 'Articles posted by ' . $userdata->display_name . $after;
        } elseif (is_404()) {
            echo $before . 'Error 404' . $after;
        }
        if (get_query_var('paged')) {
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
                echo ' (';
            }
            echo __('Page') . ' ' . get_query_var('paged');
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
                echo ')';
            }
        }
        echo '</ol>';
    }
} // end the_breadcrumb()

function pageBanner()
{

    global $default_img;
    $image = $default_img;
    $post_type = get_post_type();
    if ($post_type == 'post' || $post_type == 'service' || $post_type == 'project') {
        $field = $post_type . '_banner_image';
        $title = get_post_type_object($post_type)->label;
        $image = (get_field($field, 'option')) ?  fly_get_attachment_image_src(get_field($field, 'option'), 'pageBanner')['src'] : $default_img;
    } elseif (is_page('team') || is_page('pricing')) {
        $field = strtolower(get_the_title()) . '_banner_image';
        $title = get_the_title();
        $image = (get_field($field, 'option')) ?  fly_get_attachment_image_src(get_field($field, 'option'), 'pageBanner')['src'] : $default_img;
    } elseif (is_page()) {
        $title = get_the_title();
        $image = (get_field('pages_banner_image', get_the_ID())) ?  fly_get_attachment_image_src(get_field('pages_banner_image', get_the_ID()), 'pageBanner')['src'] : $default_img;
    } elseif (is_search()) {
        $title = 'Search';
        $image = (get_field('search_banner_image', 'option')) ?  fly_get_attachment_image_src(get_field('search_banner_image', 'option'), 'pageBanner')['src'] : $default_img;
    }
    ob_start();
?>
    <div class="swiper-wrapper">

        <!-- Item 1 -->
        <div class="swiper-slide slide-center">
            <!-- Media -->
            <img src="<?php echo $image ?>" alt="Full Image" class="full-image" data-mask="80">

            <div class="slide-content row text-center">
                <div class="col-12 mx-auto inner">

                    <!-- Content -->
                    <nav data-aos="zoom-out-up" data-aos-delay="800" aria-label="breadcrumb">
                        <?php the_breadcrumb() ?>
                    </nav>

                    <h1 class="mb-0 title effect-static-text"><?php echo $title; ?></h1>
                </div>
            </div>
        </div>

    </div>
<?php
    echo ob_get_clean();
}
