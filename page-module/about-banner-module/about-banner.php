<?php if (have_rows('anchor_agency_module')) { // Check if there are rows in the 'anchor_agency_module' field.
        while (have_rows('anchor_agency_module')) { // Loop through each row in the 'anchor_agency_module'.
            the_row(); // Set up the current row as the active row.
    
            $layout_name = get_row_layout(); // Get the layout name for the current row.
    
            if ($layout_name === 'about_banner_module') { // Check if the layout is 'about_banner_module'.
                $about_banner_background_image = get_sub_field('about_banner_background_image'); // Get the 'about_banner_background_image' subfield value.
                $about_banner_title = get_sub_field('about_banner_title'); // Get the 'about_banner_title' subfield value.
                ?>
            <section class="about__banner"> <!-- Start a new section with a CSS class 'about__banner' -->
                <div class="about__banner--bg" style="background-image: url('<?php echo $about_banner_background_image ?>')"> <!-- Create a div for the background image with inline CSS -->
                </div>
                <div class="container"> <!-- Create a container div -->
                    <div class="inner"> <!-- Create an inner div -->
                        <h2><?php echo $about_banner_title ?></h2> <!-- Output the 'about_banner_title' within an h2 element -->
                    </div>
                </div>
            </section>
            <?php
            }
        }
    }
    ?>
