<section class="services">
    <div class="container">
        <div class="inner">
            <?php if (have_rows('anchor_agency_module')) { // Check if there are rows in the 'anchor_agency_module' field.
                while (have_rows('anchor_agency_module')) { // Loop through each row in the 'anchor_agency_module'.
                    the_row();
                    $layout_name = get_row_layout(); // Get the layout name for the current row.
                    if ($layout_name === 'services_module') { // Check if the layout is 'services_module'.
                        $service_sec_head_title = get_sub_field('service_sec_head_title'); // Get the 'service_sec_head_title' subfield value.
                        $service_sec_head_description = get_sub_field('service_sec_head_description'); // Get the 'service_sec_head_description' subfield value.
                        ?>
                        <div class="sec__head">
                            <div class="sec__head--title">
                                <h2>
                                    <?php echo $service_sec_head_title ?>
                                </h2>
                                <span class="sec__head--title-arc"></span>
                            </div>
                            <div class="sec__head--headline">
                                <?php echo $service_sec_head_description ?>
                            </div>
                        </div>
                        <?php
                    }
                }
            }
            ?>
        </div>
    </div>
    <div class="services__list">
        <?php if (have_rows('anchor_agency_module')) {
            while (have_rows('anchor_agency_module')) {
                the_row();
                $layout_name = get_row_layout();
                if ($layout_name === 'services_module') {
                    $args = array(
                        'post_type' => 'service',
                    );
                    $custom_query = new WP_Query($args); // Create a custom WordPress query to fetch posts of 'service' type.
                    if ($custom_query->have_posts()) { // Check if there are posts in the custom query.
                        while ($custom_query->have_posts()) {
                            $custom_query->the_post();
                            $custom_post_title = get_the_title(); // Get the title of the current post.
                            $custom_post_featured_image = get_the_post_thumbnail(get_the_ID(), 'thumbnail'); // Get the featured image of the current post.
                            ?>
                            <div class="service">
                                <div class="service__image">
                                    <?php echo $custom_post_featured_image ?>
                                </div>
                                <div class="service__title">
                                    <h3>
                                        <?php echo $custom_post_title ?>
                                    </h3>
                                </div>
                            </div>
                            <?php
                        }
                    }
                }
            }
        }
        ?>
    </div>
</section>
<?php wp_reset_postdata(); ?> 
