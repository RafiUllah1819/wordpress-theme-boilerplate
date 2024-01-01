<?php
if (have_rows('anchor_agency_module')) { // Check if there are rows in the 'anchor_agency_module' field.
    while (have_rows('anchor_agency_module')) { // Loop through each row in the 'anchor_agency_module'.
        the_row(); // Set up the current row as the active row.
        $layout_name = get_row_layout(); // Get the layout name for the current row.
        if ($layout_name === 'contact_us_module') { // Check if the layout is 'contact_us_module'.
            // Get ACF fields, assuming these fields contain image URLs.
            $contact_us_background_image = get_sub_field('contact_us_background_image');
            $contact_us_section_heading = get_sub_field('contact_us_section_heading');
            $contact_us_form_section_image = get_sub_field('contact_us_form_section_image');
            $contact_us_form_section_description = get_sub_field('contact_us_form_section_description');
            $contact_us_form_title = get_sub_field('contact_us_form_title');
            $contact_us_form_shortcode = get_sub_field('contact_us_form_shortcode');
            ?>
            <!-- Start of HTML section for 'contact_us_module' -->
            <section class="contact__us" style="background-image: url('<?php echo $contact_us_background_image; ?>');">
                <div class="container">
                    <div class="inner">
                        <h2 class="section__heading">
                            <?php echo $contact_us_section_heading; ?>
                        </h2>
                        <div class="row contact__us--form--content m-0">
                            <div class="col-lg-4 single">
                                <div class="contact__us--text">
                                    <div class="mail__image">
                                        <img src="<?php echo $contact_us_form_section_image; ?>" alt="Form Image">
                                    </div>
                                    <div class="description">
                                        <?php echo $contact_us_form_section_description; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 single">
                                <div class="contact__us--form">
                                    <h3>
                                        <?php echo $contact_us_form_title; ?>
                                    </h3>
                                    <form action="">
                                    <?php echo do_shortcode($contact_us_form_shortcode); ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End of HTML section for 'contact_us_module' -->
            <?php
        }
    }
}
?>
