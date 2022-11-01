<?php


if(!class_exists('footerInfoWidget')) {

    class footerInfoWidget extends WP_Widget {
    
        /**
        * Sets up the widgets name etc
        */
        public function __construct() {
          $widget_ops = array(
            'classname' => 'footer_info_widget',
            'description' => __('Footer info widget', 'pathsoft'),
          );
          parent::__construct( 'footer_info_widget', 'Footer Info Widget', $widget_ops );
        }
    
        /**
        * Outputs the content of the widget
        *
        * @param array $args
        * @param array $instance
        */
        public function widget( $args, $instance ) {
            // outputs the content of the widget
            if ( ! isset( $args['widget_id'] ) ) {
              $args['widget_id'] = $this->id;
            }
      
            // widget ID with prefix for use in ACF API functions
            $widget_id = 'widget_' . $args['widget_id'];
            
            $logo = get_field( 'logo', $widget_id );
            $description = get_field( 'description', $widget_id );
      
            echo $args['before_widget'];
    
            echo '<div class="footer-company-info">';
            echo '<div class="footer-company-top">';
            if($logo) {
                echo '<a href="/" class="logo" title="'. esc_attr( get_bloginfo( 'name', 'display' ) ) .'">';
                echo '<img class="lazy" data-src="' . esc_url( $logo['url'] ) . '" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="' . esc_url( $logo['alt'] ) . '">';
                echo '</a>';
            } if($description) {
            echo '<div class="footer-company-desc">';
            echo '<p>' . esc_html( $description ) . '</p>';
            echo '</div>';
            }
            echo '</div>';
            if( have_rows('social', $widget_id) ) {
            echo '<ul class="footer-social-links">';
                while( have_rows('social', $widget_id) ) { the_row();
                    $select = get_sub_field('select');
                    $link = get_sub_field('link');
    
                    echo '<li><a href="' . esc_url( $link ) . '" title="' . esc_attr( $select['label'] ) . '">';
                    echo '<svg viewBox="' . esc_attr( pathsoft_svg_viewBox ($select['value'] ) ) . '"><use xlink:href="' . esc_attr( get_template_directory_uri() . '/assets/img/sprite.svg#' . $select['value'] ) .'"></use></svg>';
                    echo '</a></li>';
    
                }
            echo '</ul>';
            }
            echo '</div>';
            
            echo $args['after_widget'];
            
        }
    
        /**
         * Outputs the options form on admin
         *
         * @param array $instance The widget options
         */
        public function form( $instance ) {
            // outputs the options form on admin
        }
    
        /**
         * Processing widget options on save
         *
         * @param array $new_instance The new options
         * @param array $old_instance The previous options
         *
         * @return array
         */
        public function update( $new_instance, $old_instance ) {
            // processes widget options to be saved
        }
    
      }
    
}
    
/**
    * Register our Footer Info Widget
*/
function register_footer_info_widget() {
    register_widget( 'footerInfoWidget' );
}
add_action( 'widgets_init', 'register_footer_info_widget' );




if(!class_exists('footerContactsWidget')) {

    class footerContactsWidget extends WP_Widget {
    
        /**
        * Sets up the widgets name etc
        */
        public function __construct() {
          $widget_ops = array(
            'classname' => 'footer_contacts_widget',
            'description' => __('Footer Contacts widget', 'pathsoft'),
          );
          parent::__construct( 'footer_contacts_widget', 'Footer Contacts Widget', $widget_ops );
        }
    
        /**
        * Outputs the content of the widget
        *
        * @param array $args
        * @param array $instance
        */
        public function widget( $args, $instance ) {
            // outputs the content of the widget
            if ( ! isset( $args['widget_id'] ) ) {
              $args['widget_id'] = $this->id;
            }
      
            // widget ID with prefix for use in ACF API functions
            $widget_id = 'widget_' . $args['widget_id'];

            $title = get_field( 'title', $widget_id ) ? get_field( 'title', $widget_id ) : '';
      
            echo $args['before_widget'];

            if ( $title ) {
                echo $args['before_title'] . esc_html($title) . $args['after_title'];
            }

            if( have_rows('list', $widget_id) ) {
                echo '<ul class="footer-contacts">';
                while( have_rows('list', $widget_id) ) { the_row();
                    $icon = get_sub_field('icon');
                    $item = get_sub_field('item');
                    $style = get_sub_field('style');

                    echo '<li>';
                    echo '<i class="material-icons md-22">' . esc_html( $icon ) . '</i>';
                    echo '<div class="footer-contact-info">';

                    if($style == 'text') {
                        echo esc_html( $item );
                    } else if($style == 'email') {
                        echo '<a href="' . esc_attr( 'mailto:' . $item ) . '">' . esc_html( $item ) . '</a>';
                    } else if($style == 'phone') {
                        echo '<a href="#!" class="formingHrefTel">' . esc_html( $item ) . '</a>';
                    }

                    echo '</div>';
                    echo '</li>';

                }
                echo '</ul>';
            }
            
            echo $args['after_widget'];
            
        }
    
        /**
         * Outputs the options form on admin
         *
         * @param array $instance The widget options
         */
        public function form( $instance ) {
            // outputs the options form on admin
        }
    
        /**
         * Processing widget options on save
         *
         * @param array $new_instance The new options
         * @param array $old_instance The previous options
         *
         * @return array
         */
        public function update( $new_instance, $old_instance ) {
            // processes widget options to be saved
        }
    
      }
    
}
    
/**
    * Register our Footer Contacts Widget
*/
function register_footer_contacts_widget() {
    register_widget( 'footerContactsWidget' );
}
add_action( 'widgets_init', 'register_footer_contacts_widget' );