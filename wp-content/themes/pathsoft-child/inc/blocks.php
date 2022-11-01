<?php

// Check value exists.
if( have_rows('page') ) {

    // Loop through rows.
    while ( have_rows('page') ) { the_row();

        // Case: Intro.
        if( get_row_layout() == 'intro' ) {
            
            get_template_part( 'inc/blocks/intro' );
            
        // Case: Services.
        } else if( get_row_layout() == 'services' ) {

            get_template_part( 'inc/blocks/services' );
        
        // Case: Advantages.
        } else if( get_row_layout() == 'advantages' ) {
            
            get_template_part( 'inc/blocks/advantages' );

        // Case: Numbers.
        } else if( get_row_layout() == 'numbers' ) {

            get_template_part( 'inc/blocks/numbers' );
        
        // Case: Projects.
        } else if( get_row_layout() == 'projects' ) {

            get_template_part( 'inc/blocks/projects' );

        // Case: Team.
        } else if( get_row_layout() == 'team' ) {

            get_template_part( 'inc/blocks/team' );

        // Case: Testimonials.
        } else if( get_row_layout() == 'testimonials' ) {

            get_template_part( 'inc/blocks/testimonials' );

        // Case: Blog.
        } else if( get_row_layout() == 'blog' ) {

            get_template_part( 'inc/blocks/blog' );

        // Case: Content.
        } else if( get_row_layout() == 'content' ) {

            get_template_part( 'inc/blocks/content' );

        // Case: Brands.
        } else if( get_row_layout() == 'brands' ) {

            get_template_part( 'inc/blocks/brands' );

        // Case: Gallery.
        } else if( get_row_layout() == 'gallery' ) {

            get_template_part( 'inc/blocks/gallery' );

        // Case: Contacts.
        } else if( get_row_layout() == 'contacts' ) {

            get_template_part( 'inc/blocks/contacts' );
        
        // Case: Pricing.
        } else if( get_row_layout() == 'pricing' ) {

            get_template_part( 'inc/blocks/pricing' );

        // Case: FAQ.
        } else if( get_row_layout() == 'faq' ) {

            get_template_part( 'inc/blocks/faq' );

        // Case: Coming soon.
        } else if( get_row_layout() == 'coming_soon' ) {
        
            get_template_part( 'inc/blocks/coming_soon' );
        
        // Case: Form.
        } else if( get_row_layout() == 'form' ) {
            
            get_template_part( 'inc/blocks/form' );
        
        }

    // End loop.
    }

// No value.
} else {
    // Do something...
};
