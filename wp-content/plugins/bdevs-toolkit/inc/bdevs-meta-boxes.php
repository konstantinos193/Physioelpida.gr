<?php 
/** 
 * [custom_post_metabox description]
 * @return [type] [description]
 */
function custom_post_metabox() {
  
  $page = new_cmb2_box(array(
    'id'  => 'bdevs-toolkit',
    'title' =>  esc_html__( 'Page Info', 'bdevs-toolkit' ),
    'object_types'  => array('page'),
    'fields'       => array (

        array(
          'name' => esc_html__( 'Is it invisible breadcrumb?', 'bdevs-toolkit'),
          'id'   => 'medidove_invisible_breadcrumb',
          'type' => 'checkbox',
        ),
        array(
          'name' => esc_html__( 'Enable Secondary Logo', 'bdevs-toolkit'),
          'id'   => 'medidove_enable_sec_logo',
          'type' => 'checkbox',
        ),
        array(
          'name' => esc_html__( 'Header Top Color', 'bdevs-toolkit'),
          'id'   => 'medidove_header_top_bg_color',
          'type' => 'colorpicker',
        ),        
        array(
            'name' => esc_html__( 'Header Top Background', 'bdevs-toolkit'),
            'id'   => 'medidove_header_top_bg_img',
            'type' => 'file',
            'desc'    => 'Upload an image or enter an URL.',
        ),
        array (
            'name' => esc_html__( 'Header Style', 'bdevs-toolkit' ),
            'id' => 'medidove_choice_header_style',
            'type' => 'select',
            'show_option_none' => false,
            'options' => array(
                'default' => esc_html__( 'Default', 'bdevs-toolkit' ),
                'header-style-1' => esc_html__( 'Header Style 1', 'bdevs-toolkit' ),
                'header-style-2' => esc_html__( 'Header Style 2', 'bdevs-toolkit' ),
                'header-style-3' => esc_html__( 'Header Style 3', 'bdevs-toolkit' ),
                'header-style-4' => esc_html__( 'Header Style 4', 'bdevs-toolkit' ),
                'header-style-5' => esc_html__( 'Header Style 5', 'bdevs-toolkit' ),
                'header-style-6' => esc_html__( 'Header Style 6', 'bdevs-toolkit' ),
            ),
        ),
        array (
            'name' => esc_html__( 'Footer Style', 'bdevs-toolkit' ),
            'id' => 'medidove_choice_footer_style',
            'type' => 'select',
            'show_option_none' => false,
            'options' => array(
                'default' => esc_html__( 'Default', 'bdevs-toolkit' ),
                'footer-style-1' => esc_html__( 'Footer Style 1', 'bdevs-toolkit' ),
                'footer-style-2' => esc_html__( 'Footer Style 2', 'bdevs-toolkit' ),
                'footer-style-3' => esc_html__( 'Footer Style 3', 'bdevs-toolkit' ),
                'footer-style-4' => esc_html__( 'Footer Style 4', 'bdevs-toolkit' ),
                'footer-style-5' => esc_html__( 'Footer Style 5', 'bdevs-toolkit' ),
            ),
        ),
        array(
            'name' => esc_html__( 'Footer Background', 'bdevs-toolkit'),
            'id'   => 'medidove_footer_bg',
            'type' => 'file',
            'desc'    => 'Upload an image or enter an URL.',
        ),
    ) 
  ));

}

add_action('cmb2_admin_init', 'custom_post_metabox');


/**
 * [medidove_profile_metabox description]
 * @param  array  $review [description]
 * @return [type]         [description]
 */
function medidove_profile_metabox(array $profile) {

  $profile[] = array(
    'id'           => 'profile-edit',
    'title'        => esc_html__( 'Profile Media links', 'bdevs-toolkit' ),
    'object_types' => array( 'user'),
    'fields'       => array (
      array(
        'name' => esc_html__( 'Facebook Url', 'bdevs-toolkit'),
        'id'   => 'profile_fb_url',
        'type' => 'text_url',
      ),
      array(
        'name' => esc_html__( 'Twitter Url', 'bdevs-toolkit'),
        'id'   => 'profile_twitter_url',
        'type' => 'text_url',
      ),
      array(
        'name' => esc_html__( 'Google Plus Url', 'bdevs-toolkit'),
        'id'   => 'profile_google_url',
        'type' => 'text_url',
      ),
      array(
        'name' => esc_html__( 'Instagram Url', 'bdevs-toolkit'),
        'id'   => 'profile_instagram_url',
        'type' => 'text_url',
      )

    )
  );

  return $profile;
}

add_filter('cmb2_meta_boxes','medidove_profile_metabox');




function medidove_metabox_for_blog(){


  $section = new_cmb2_box(array(
    'title'     => 'Fields According to Post Format',
    'object_types'  => array('post'),
    'id'      => 'fields-for-posts'
  ));


  $section->add_field(array(
    'name'  => 'Video URL',
    'id'  => '_video-url',
    'type'  => 'oembed'
  ));

  $section->add_field(array(
    'name'  => 'Audio URL',
    'id'  => '_audio-url',
    'type'  => 'oembed'
  ));

  $section->add_field(array(
    'name'  => 'Gallery Images',
    'id'  => '_gallery-images',
    'type'  => 'file_list'
  ));

}
add_action('cmb2_admin_init', 'medidove_metabox_for_blog');
