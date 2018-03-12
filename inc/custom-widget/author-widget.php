<?php

class Newie_Author_Widget extends WP_Widget
{
     public function __construct()
     {
          parent::__construct(
               'author-widget',
               __( 'PT Author', 'newie' ),
               array( 'description' => __( 'Best displayed in Home page.', 'newie' ) )
          );
      }
    
     public function widget( $args, $instance )
     {
          extract( $args );
        if(!empty($instance))
       { 

         $facebook=$instance['facebook'];
         $twitter=$instance['twitter'];
         $googleplus=$instance['googleplus'];
         $instagram=$instance['instagram'];
         $linkedin=$instance['linkedin'];
         $youtube=$instance['youtube'];
          ?>
              <section  class="widget author-widget">
                  <h2 class="widget-title"><span><?php echo esc_html( $instance['title'] );?></span></h2>
                  <figure class="author">
                      <img src="<?php echo esc_url( $instance['image_uri'] );?>">
                  </figure>
                  <p><?php echo wp_kses_post( $instance['description'] );?></p>
             <ul class="socials">
            <?php
            // condition to check empty value of social link
            if ( !empty( $user_url ) ) { ?>
                <li class="facebook">
                    <a href="<?php echo esc_url( $user_url ); ?>" data-title="Facebook" target="_blank"><i class="fa fa-external-link"></i></a>
                </li>
            <?php }
            if ( !empty( $facebook ) ) { ?>
                <li class="facebook">
                    <a href="<?php echo esc_url( $facebook ); ?>" data-title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                </li>
            <?php }
            if ( !empty( $twitter ) ) { ?>
                <li class="twitter">
                    <a href="<?php echo esc_url( $twitter ); ?>" data-title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                </li>
            <?php }
            if ( !empty( $linkedin ) ) {
                ?>
                <li class="linkedin">
                    <a href="<?php echo esc_url( $linkedin ); ?>" data-title="Linkedin" target="_blank"><i class="fa fa-linkedin"></i></a>
                </li>
                <?php
            }
            if ( !empty( $instagram) ) {
                ?>
                <li class="instagram">
                    <a href="<?php echo esc_url( $instagram); ?>" data-title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a>
                </li>
                <?php
            }
            if ( !empty( $youtube ) ) { ?>
                <li class="youtube">
                    <a href="<?php echo esc_url( $youtube ); ?>" data-title="Youtube" target="_blank"><i class="fa fa-youtube"></i></a>
                </li>
                <?php
            }
            if ( !empty( $googleplus ) ) {
                ?>
                <li class="google-plus">
                    <a href="<?php echo esc_url( $googleplus ); ?>" data-title="Google Plus" target="_blank"><i class="fa fa-google-plus"></i></a>
                </li>
                <?php
            }
           
            ?>
        </ul>
              </section>
          <?php
        }   
     }

     public function update( $new_instance, $old_instance ){
        $instance = $old_instance;
        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['description'] = wp_kses_post( $new_instance['description'] );
        $instance['image_uri'] = esc_url_raw( $new_instance['image_uri'] );
        $instance['facebook'] = esc_url_raw( $new_instance['facebook'] );
        $instance['twitter'] = esc_url_raw( $new_instance['twitter'] );
        $instance['googleplus'] = esc_url_raw( $new_instance['googleplus'] );
        $instance['instagram'] = esc_url_raw( $new_instance['instagram'] );
        $instance['linkedin'] = esc_url_raw( $new_instance['linkedin'] );
        $instance['youtube'] = esc_url_raw( $new_instance['youtube'] );
        return $instance;
     }

     public function form($instance ){
          ?>
              <p>
                 <label for="<?php echo $this->get_field_id('image_uri'); ?>">
                     <?php _e( 'Image', 'newie' ); ?>
                 </label>
                  <br />
                 <?php
                     if (isset($instance['image_uri']) && $instance['image_uri'] != '' ) :
                         echo '<img class="custom_media_image" src="' . esc_url( $instance['image_uri'] ) . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" /><br />';
                     endif;
                 ?>

                 <input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('image_uri'); ?>" id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php 
                   if (isset($instance['image_uri']) && $instance['image_uri'] != '' ) :
                     echo esc_url( $instance['image_uri'] );
                    endif;
                  ?>" style="margin-top:5px;">
                 <input type="button" class="button button-primary custom_media_button" id="custom_media_button" name="<?php echo $this->get_field_name('image_uri'); ?>" value="<?php esc_attr_e('Upload Image','newie')?>" style="margin-top:5px;" />
             </p>
             <p>
                 <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title', 'newie' ); ?></label><br />
                 <input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php
                  if (isset($instance['title']) && $instance['title'] != '' ) :
                    echo esc_attr($instance['title']);
                   endif;

                   ?>" class="widefat" />
             </p>

             <p>
                 <label for="<?php echo $this->get_field_id('description'); ?>"><?php _e( 'Description', 'newie' ); ?></label><br />
                  <textarea  rows="8" name="<?php echo $this->get_field_name('description'); ?>" id="<?php echo $this->get_field_id('description'); ?>"  class="widefat" ><?php
                  
                    if (isset($instance['description']) && $instance['description'] != '' ) :
                       echo esc_textarea( $instance['description'] ); 
                     endif;
                   ?></textarea>
              </p>

              <p>
                <label for="<?php echo esc_attr( $this->get_field_id('facebook') ); ?>"><?php _e( 'Facebook', 'newie' ); ?></label><br />
                <input type="text" name="<?php echo esc_attr( $this->get_field_name('facebook') ); ?>" id="<?php echo esc_attr( $this->get_field_id('facebook')); ?>" value="<?php
                 if (isset($instance['facebook']) && $instance['facebook'] != '' ) :
                   echo esc_attr($instance['facebook']);
                  endif;

                  ?>" class="widefat" />
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('twitter') ); ?>"><?php _e( 'Twitter', 'newie' ); ?></label><br />
                <input type="text" name="<?php echo esc_attr( $this->get_field_name('twitter') ); ?>" id="<?php echo esc_attr( $this->get_field_id('twitter')); ?>" value="<?php
                 if (isset($instance['twitter']) && $instance['twitter'] != '' ) :
                   echo esc_attr($instance['twitter']);
                  endif;

                  ?>" class="widefat" />
            </p>
         <p>
                <label for="<?php echo esc_attr( $this->get_field_id('googleplus') ); ?>"><?php _e( 'Google Plus', 'newie' ); ?></label><br />
                <input type="text" name="<?php echo esc_attr( $this->get_field_name('googleplus') ); ?>" id="<?php echo esc_attr( $this->get_field_id('googleplus')); ?>" value="<?php
                 if (isset($instance['googleplus']) && $instance['googleplus'] != '' ) :
                   echo esc_attr($instance['googleplus']);
                  endif;

                  ?>" class="widefat" />
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('instagram') ); ?>"><?php _e( 'Instagram', 'newie' ); ?></label><br />
                <input type="text" name="<?php echo esc_attr( $this->get_field_name('instagram') ); ?>" id="<?php echo esc_attr( $this->get_field_id('instagram')); ?>" value="<?php
                 if (isset($instance['instagram']) && $instance['instagram'] != '' ) :
                   echo esc_attr($instance['instagram']);
                  endif;

                  ?>" class="widefat" />
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('linkedin') ); ?>"><?php _e( 'Linkedin', 'newie' ); ?></label><br />
                <input type="text" name="<?php echo esc_attr( $this->get_field_name('linkedin') ); ?>" id="<?php echo esc_attr( $this->get_field_id('linkedin')); ?>" value="<?php
                 if (isset($instance['linkedin']) && $instance['linkedin'] != '' ) :
                   echo esc_attr($instance['linkedin']);
                  endif;

                  ?>" class="widefat" />
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('youtube') ); ?>"><?php _e( 'Youtube', 'newie' ); ?></label><br />
                <input type="text" name="<?php echo esc_attr( $this->get_field_name('youtube') ); ?>" id="<?php echo esc_attr( $this->get_field_id('youtube')); ?>" value="<?php
                 if (isset($instance['youtube']) && $instance['youtube'] != '' ) :
                   echo esc_attr($instance['youtube']);
                  endif;

                  ?>" class="widefat" />
            </p>
          <?php
     }
}


add_action( 'widgets_init', 'newie_author_widget' ); 
function newie_author_widget(){     
    register_widget( 'Newie_Author_Widget' );

}






