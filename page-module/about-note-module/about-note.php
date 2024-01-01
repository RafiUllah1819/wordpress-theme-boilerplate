<?php if (have_rows('anchor_agency_module')) { // Check if there are rows in the 'anchor_agency_module' field.
    while (have_rows('anchor_agency_module')) { // Loop through each row in the 'anchor_agency_module'.
        the_row(); // Set up the current row as the active row.

        $layout_name = get_row_layout(); // Get the layout name for the current row.

        if ($layout_name === 'about_note_module') { // Check if the layout is 'about_note_module'.
            $about_note_title = get_sub_field('about_note_title'); // Get the 'about_note_title' subfield value.
            $about_note_headline = get_sub_field('about_note_headline'); // Get the 'about_note_headline' subfield value.
            ?>
            <section class="about__note"> <!-- Start a new section with a CSS class 'about__note' -->
                <div class="container"> <!-- Create a container div -->
                    <div class="inner"> <!-- Create an inner div -->
                        <div class="sec__head"> <!-- Create a section header div -->
                            <div class="sec__head--title"> <!-- Create a div for the section title -->
                                <h2><?php echo $about_note_title ?></h2> <!-- Output the 'about_note_title' within an h2 element -->
                                <span class="sec__head--title-arc"></span> <!-- Create a decorative span element -->
                            </div>
                            <div class="sec__head--headline"> <!-- Create a div for the section headline -->
                                <?php echo $about_note_headline ?> <!-- Output the 'about_note_headline' -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php
        }
    }
}
?>
