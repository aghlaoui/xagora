<!-- Social Media Shares -->
<?php
$permalink = esc_url(get_the_permalink(get_the_ID()));
$title = sanitize_text_field(get_the_title(get_the_ID()));
?>
<div class="row item widget-share">
    <div class="col-12 align-self-center">
        <h4 class="title"><?php echo __('Share', 'xagora') ?></h4>
        <ul class="navbar-nav social share-list">
            <li class="nav-item">
                <a href="https://www.facebook.com/sharer.php?u=<?php echo $permalink ?>" class="nav-link" target="_blank" onclick="window.open(this.href, 'smallWindow', 'width=500,height=800'); return false;">
                    <i class="fab fa-facebook-f ml-0"></i>
                </a>
            </li>
            <li class="nav-item">
                <a href="https://twitter.com/intent/tweet?url=<?php echo $permalink . '&text=' . $title ?>" class="nav-link" target="_blank" onclick="window.open(this.href, 'smallWindow', 'width=500,height=800'); return false;">
                    <i class="fab fa-twitter"></i></a>
            </li>
            <li class="nav-item">
                <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $permalink ?>" class="nav-link" target="_blank" onclick="window.open(this.href, 'smallWindow', 'width=500,height=800'); return false;">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </li>
            <li class="nav-item">
                <a href="https://www.pinterest.com/pin/create/button/?url=<?php echo $permalink . '&media=' . esc_url(get_the_post_thumbnail_url(get_the_ID())) . '&description=' . $title ?>" class="nav-link" target="_blank" onclick="window.open(this.href, 'smallWindow', 'width=500,height=800'); return false;">
                    <i class="fab fa-pinterest"></i>
                </a>
            </li>
            <li class="nav-item">
                <a href="mailto:?subject=<?php echo $title . '&body=' . $permalink ?>" class="nav-link" target="_blank" onclick="window.open(this.href, 'smallWindow', 'width=500,height=800'); return false;">
                    <i class="fas fa-envelope mr-2"></i>
                </a>
            </li>
            <li class="nav-item">
                <a href="javascript:window.print()" class="nav-link">
                    <i class="fas fa-print"></i>
                </a>
            </li>
        </ul>
    </div>
</div>