<section class="testimonials">
    <?php
    // Check if there are any rows in the 'anchor_agency_module' repeater field
    if (have_rows('anchor_agency_module')) {
        // Start a loop to iterate through each row in the repeater field
        while (have_rows('anchor_agency_module')) {
            the_row();
            // Get the layout name for the current row
            $layout_name = get_row_layout();
            // Check if the layout name is 'testimonial_slider_module'
            if ($layout_name === 'testimonial_slider_module') {
                // Get the 'testimonial_title' field value for this row
                $testimonial_title = get_sub_field('testimonial_title');
                ?>
                <!-- Start displaying HTML markup for a container -->
                <div class="container">
                    <div class="inner">
                        <div class="sec__head">
                            <div class="sec__head--title">
                                <!-- Display the 'testimonial_title' value within an <h2> element -->
                                <h2>
                                    <?php echo $testimonial_title ?>
                                </h2>
                                <!-- Create a decorative arc element -->
                                <span class="sec__head--title-arc"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End HTML markup for a container -->
                <?php
            }
        }
    }
    ?>
    <!-- Start HTML markup for a testimonial slider using Swiper library -->
    <div class="swiper testimonials__slider">
        <div class="swiper-wrapper">
            <?php
            // Check if there are any rows in the 'anchor_agency_module' repeater field (again)
            if (have_rows('anchor_agency_module')) {
                // Start a loop to iterate through each row in the repeater field (again)
                while (have_rows('anchor_agency_module')) {
                    the_row();
                    // Get the layout name for the current row (again)
                    $layout_name = get_row_layout();
                    // Check if the layout name is 'testimonial_slider_module' (again)
                    if ($layout_name === 'testimonial_slider_module') {
                        // Define arguments for a custom WordPress query to retrieve 'testimonial' post type
                        $args = array(
                            'post_type' => 'testimonial', // Replace with your custom post type name
                            'posts_per_page' => -1, // Retrieve all posts
                            'public' => true, // Specify public posts
                        );
                        // Create a custom query using the defined arguments
                        $custom_query = new WP_Query($args);
                        // Loop through the custom posts retrieved by the query
                        if ($custom_query->have_posts()) {
                            while ($custom_query->have_posts()) {
                                $custom_query->the_post();
                                // Get various fields and data from the custom post
                                $custom_post_title = get_the_title();
                                $testimonial_rating = get_field('testimonial_rating', get_the_ID());
                                $testimonial_text_description = get_field('testimonial_text_description', get_the_ID());
                                $custom_post_featured_image = get_the_post_thumbnail(get_the_ID(), 'thumbnail'); // You can change 'thumbnail' to your desired image size
                                ?>
                                <!-- Start displaying HTML markup for a single testimonial slide -->
                                <div class="swiper-slide slide">
                                    <div class="testimonial__card">
                                        <div class="testimonial__card--image">
                                            <?php
                                            // Display the featured image of the custom post type
                                            if ($custom_post_featured_image) {
                                                echo $custom_post_featured_image;
                                            }
                                            ?>
                                        </div>
                                        <div class="testimonial__card--rating">
                                            <?php
                                            // Calculate and display star ratings based on the 'testimonial_rating' field
                                            $user_rating = $testimonial_rating;
                                            $user_rating = floatval($user_rating);
                                            $filled_stars = floor($user_rating);
                                            $partial_star = ($user_rating - $filled_stars) * 100;
                                            for ($i = 1; $i <= $filled_stars; $i++) {
                                                echo '<i class="fa-solid fa-star"></i>';
                                            }
                                            if ($partial_star > 0) {
                                                echo '<i class="fa-solid fa-star-half-stroke"></i>';
                                            }
                                            for ($i = $filled_stars + ($partial_star > 0 ? 1 : 0); $i < 5; $i++) {
                                                echo '<i class="fa-regular fa-star"></i>';
                                            }
                                            ?>
                                        </div>
                                        <div class="testimonial__card--text">
                                            <p>
                                                <?php echo $testimonial_text_description; ?>
                                            </p>
                                        </div>
                                        <h5 class="testimonial__card--title">
                                            <?php echo $custom_post_title; ?>
                                        </h5>
                                    </div>
                                </div>
                                <!-- End HTML markup for a single testimonial slide -->
                                <?php
                            }
                        }
                    }
                }
            }
            ?>
        </div>
        <!-- HTML markup for navigation buttons within the Swiper slider -->
        <div class="swiper__nav">
            <div class="nav__btn swiper-button-prev"></div>
            <div class="nav__btn swiper-button-next"></div>
        </div>
    </div>
    <!-- End HTML markup for the testimonial slider -->
</section>
<?php wp_reset_postdata(); ?>
