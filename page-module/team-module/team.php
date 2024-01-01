<section class="team">
    <div class="container">
        <div class="inner">
            <?php 
            // Check if there are rows with the name 'anchor_agency_module' in Advanced Custom Fields (ACF)
            if (have_rows('anchor_agency_module')) {
                while (have_rows('anchor_agency_module')) {
                    the_row();
                    $layout_name = get_row_layout('');

                    // Check if the current row layout is 'team_module'
                    if ($layout_name === 'team_module') {
                        // Get the title and description for the team section
                        $team_sec_head_title = get_sub_field('team_sec_head_title');
                        $team_sec_head_description = get_sub_field('team_sec_head_description');
                        ?>
                        <div class="sec__head">
                            <div class="sec__head--title">
                                <h2>
                                    <?php echo $team_sec_head_title ?>
                                </h2>
                                <span class="sec__head--title-arc"></span>
                            </div>
                            <div class="sec__head--headline">
                                <?php echo $team_sec_head_description ?>
                            </div>
                        </div>
                        <?php
                    }
                }
            } ?>

            <div class="row team__cards">
                <?php 
                // Check if there are rows with the name 'anchor_agency_module' in ACF (again)
                if (have_rows('anchor_agency_module')) {
                    while (have_rows('anchor_agency_module')) {
                        the_row();
                        $layout_name = get_row_layout('');

                        // Check if the current row layout is 'team_module' (again)
                        if ($layout_name === 'team_module') {

                            // Define arguments for a custom WordPress query to retrieve 'team' post type
                            $args = array(
                                'post_type' => 'team',
                            );

                            // Create a custom query object with the defined arguments
                            $custom_query = new WP_Query($args);

                            // Check if there are posts in the custom query
                            if ($custom_query->have_posts()) {
                                while ($custom_query->have_posts()) {
                                    $custom_query->the_post();
                                    $about_team_title = get_the_title();

                                    // Define the taxonomy name as 'category'
                                    $taxonomy = 'category';

                                    // Get the terms (categories) associated with the current team member
                                    $about_terms = wp_get_post_terms(get_the_ID(), $taxonomy);

                                    // Initialize an array to store term names
                                    $term_names = array();

                                    // Loop through the terms and extract their names
                                    foreach ($about_terms as $term) {
                                        $term_names[] = $term->name;
                                    }

                                    // Get the featured image (thumbnail) for the current team member
                                    $custom_post_featured_image = get_the_post_thumbnail(get_the_ID(), 'thumbnail');
                                    ?>
                                    <div class="col-lg-6">
                                        <div class="member">
                                            <div class="member__image">
                                                <?php echo $custom_post_featured_image ?>
                                            </div>
                                            <h4 class="member__title">
                                                <?php echo $about_team_title ?>
                                            </h4>
                                            <h5 class="member__designation">
                                                <?php echo implode(', ', $term_names); ?>
                                            </h5>
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
        </div>
    </div>
</section>
<?php wp_reset_postdata() ?>
