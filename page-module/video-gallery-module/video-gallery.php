<?php
if (have_rows('anchor_agency_module')) { // Check if there are rows in the 'anchor_agency_module' custom field.
    while (have_rows('anchor_agency_module')) { // Loop through each row in the 'anchor_agency_module'.
        the_row(); // Set up the current row.

        $layout_name = get_row_layout(); // Get the layout name of the current row.

        if ($layout_name === 'video_gallery_module') { // Check if the layout name is 'video_gallery_module'.
            $video_gallery_title = get_sub_field('video_gallery_title'); // Get the value of 'video_gallery_title' within the current row.
            $video_gallery_description = get_sub_field('video_gallery_description'); // Get the value of 'video_gallery_description' within the current row.
            $video_gallery_repeater = get_sub_field('video_gallery_repeater'); // Get the repeater field 'video_gallery_repeater' within the current row.

            // Start displaying the video gallery section.
            ?>
            <section class="video__gallery">
                <div class="container">
                    <div class="inner">
                        <div class="sec__head">
                            <div class="sec__head--title">
                                <h2>
                                    <?php echo $video_gallery_title; ?> <!-- Display the video gallery title -->
                                </h2>
                                <span class="sec__head--title-arc"></span>
                            </div>
                            <div class="sec__head--headline">
                                <?php echo $video_gallery_description; ?> <!-- Display the video gallery description -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper video__gallery--slider">
                    <div class="swiper-wrapper">
                        <?php
                        if ($video_gallery_repeater && have_rows('video_gallery_repeater')) { // Check if there are rows in the 'video_gallery_repeater' repeater field.
                            while (have_rows('video_gallery_repeater')) { // Loop through each row in the repeater field.
                                the_row(); // Set up the current row.
                                $video_gallery_slide_thumbnail = get_sub_field('video_gallery_slide_thumbnail'); // Get the value of 'video_gallery_slide_thumbnail' within the current row.
                                ?>
                                <div class="swiper-slide slide">
                                    <div class="slide__thumbnail">
                                        <a href="">
                                            <?php echo $video_gallery_slide_thumbnail; ?> <!-- Display the video gallery slide thumbnail -->
                                        </a>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="swiper__nav">
                        <div class="nav__btn swiper-button-prev"></div>
                        <div class="nav__btn swiper-button-next"></div>
                    </div>
                </div>
            </section> <!-- End of the video gallery section -->
            <?php
        }
    }
}
?>
<?php wp_reset_postdata(); // Reset the post data to its original state. ?>
