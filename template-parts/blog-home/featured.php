<?php
$philosophy_fp = new WP_Query(
    array(
        'meta_key' => 'featured',
        'meta_value' => '1',
        'posts_per_page' => 3
    )
);
$posts_data = array();

while ($philosophy_fp->have_posts()) {
    $philosophy_fp->the_post();

    $posts_data[] = array(
        'title' => get_the_title(),
        'date' => get_the_date(),
        'category' => get_the_category()[0]->name,
        'thumbnail' => get_the_post_thumbnail_url(get_the_ID(), 'large'),
        'author' => get_the_author_meta('display_name'),
        'author_avater' => get_avatar_url(get_the_author_meta('ID'))
    );
}

if ($philosophy_fp->post_count > 1) :
?>

    <div class="pageheader-content row">
        <div class="col-full">

            <div class="featured">

                <div class="featured__column featured__column--big">
                    <div class="entry" style="background-image:url('<?php echo esc_url($posts_data[0]['thumbnail']); ?>');">

                        <div class="entry__content">
                            <span class="entry__category"><a href="#0">
                                    <?php echo esc_html($posts_data[0]['category']) ?>
                                </a></span>

                            <h1><a href="#0" title="">
                                    <?php echo esc_html($posts_data[0]['title']) ?>
                                </a></h1>

                            <div class="entry__info">
                                <a href="#0" class="entry__profile-pic">
                                    <img class="avatar" src="<?php echo esc_url($posts_data[0]['author_avater']); ?>" alt="">
                                </a>

                                <ul class="entry__meta">
                                    <li><a href="#0">
                                            <?php echo esc_html($posts_data[0]['author']); ?>
                                        </a></li>
                                    <li>
                                        <?php echo esc_html($posts_data[0]['date']); ?>
                                    </li>
                                </ul>
                            </div>
                        </div> <!-- end entry__content -->

                    </div> <!-- end entry -->
                </div> <!-- end featured__big -->

                <div class="featured__column featured__column--small">

                    <?php for ($i = 1; $i < 3; $i++) : ?>

                        <div class="entry" style="background-image:url('<?php echo esc_url($posts_data[$i]['thumbnail']); ?>">

                            <div class="entry__content">
                                <span class="entry__category"><a href="#0">
                                        <?php echo esc_html($posts_data[$i]['category']) ?>
                                    </a></span>

                                <h1><a href="#0" title="">
                                        <?php echo esc_html($posts_data[$i]['title']) ?>
                                    </a></h1>

                                <div class="entry__info">
                                    <a href="#0" class="entry__profile-pic">
                                        <img class="avatar" src="<?php echo esc_url($posts_data[$i]['author_avater']); ?>" alt="">
                                    </a>

                                    <ul class="entry__meta">
                                        <li><a href="#0">
                                                <?php echo esc_html($posts_data[$i]['author']); ?>
                                            </a></li>
                                        <li>
                                            <?php echo esc_html($posts_data[$i]['date']); ?>
                                        </li>
                                    </ul>
                                </div>
                            </div> <!-- end entry__content -->

                        </div> <!-- end entry -->

                    <?php endfor; ?>
                </div> <!-- end featured__small -->
            </div> <!-- end featured -->

        </div> <!-- end col-full -->
    </div> <!-- end pageheader-content row -->
<?php endif; ?>