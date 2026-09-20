<?php
/** 
 * medidove Customizer data
 */
function medidove_customizer( $data ) {
	return array(
		'panel' => array ( 
			'id' => 'medidove',
			'name' => esc_html__('Medidove Customizer','medidove'),
			'priority' => 10,
			'section' => array(
				'header_setting' => array(
					'name' => esc_html__( 'Header Topbar Setting', 'medidove' ),
					'priority' => 10,
					'fields' => array(
						array(
							'name'=>esc_html__('Header Topbar BG','medidove'),
							'id'=>'medidove_header_top_bg_color',
							'default'=> esc_html__('#F4F9FD','medidove'),
							'transport'	=> 'refresh'  
						),
						array(
							'name' => esc_html__( 'Header Topbar BG Image', 'medidove' ),
							'id' => 'medidove_header_top_bg_img',
							'default' => '',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Header 8 BG Image', 'medidove' ),
							'id' => 'medidove_header_eignt_bg_img',
							'default' => '',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Topbar Swicher', 'medidove' ),
							'id' => 'medidove_topbar_switch',
							'default' => true,
							'type' => 'switch',
							'transport'	=> 'refresh'
						),
						array(
							'name' => esc_html__( 'Header Top Address', 'medidove' ),
							'id' => 'medidove_header_address',
							'default' => 'New York, 22 Avenue, USA',
							'type' => 'text',
							'transport'	=> 'refresh'
						),
						array(
							'name' => esc_html__( 'Header CTA Message Icon', 'medidove' ),
							'id' => 'icon_message',
							'default' => get_template_directory_uri() . '/img/icon/message-icon.png',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Phone Title', 'medidove' ),
							'id' => 'medidove_header_phone_title',
							'default' => 'Phone Number',
							'type' => 'text',
							'transport'	=> 'refresh'
						),		
						array(
							'name' => esc_html__( 'Header CTA Phone Icon', 'medidove' ),
							'id' => 'icon_phone',
							'default' => get_template_directory_uri() . '/img/icon/phone-icon.png',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),					
						array(
							'name' => esc_html__( 'Phone Number', 'medidove' ),
							'id' => 'medidove_header_phone_number',
							'default' => '+8 012 3456 7899',
							'type' => 'text',
							'transport'	=> 'refresh'
						),					
						array(
							'name' => esc_html__( 'Email Label Title', 'medidove' ),
							'id' => 'medidove_header_email_title',
							'default' => 'Email Address',
							'type' => 'text',
							'transport'	=> 'refresh'
						),								
						array(
							'name' => esc_html__( 'Email Address', 'medidove' ),
							'id' => 'medidove_header_email_address',
							'default' => 'support@gmail.com',
							'type' => 'text',
							'transport'	=> 'refresh'
						),							
						array(
							'name' => esc_html__( 'Topbar Time Shedule', 'medidove' ),
							'id' => 'medidove_header_time',
							'default' => 'Mon - Fri: 9.00am - 11.00pm',
							'type' => 'text',
							'transport'	=> 'refresh'
						),						
						/** button **/							
						array(
							'name' => esc_html__( 'Show Button', 'medidove' ),
							'id' => 'medidove_show_button',
							'default' => 0,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Button Text', 'medidove' ),
							'id' => 'medidove_btn_text',
							'default' => esc_html__('Make Appointment','medidove'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Button Link', 'medidove' ),
							'id' => 'medidove_btn_link',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),	

						/** contact_us **/							
						array(
							'name' => esc_html__( 'Show Contact Button', 'medidove' ),
							'id' => 'medidove_contact_button',
							'default' => 0,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Contact Text', 'medidove' ),
							'id' => 'medidove_contact_text',
							'default' => esc_html__('Make Appointment','medidove'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Contact Link', 'medidove' ),
							'id' => 'medidove_contact_link',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),	
						/** make a call **/							
						array(
							'name' => esc_html__( 'Show Call Button', 'medidove' ),
							'id' => 'medidove_call_button',
							'default' => 0,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Call Text', 'medidove' ),
							'id' => 'medidove_call_text',
							'default' => esc_html__('Make A Call','medidove'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Call Link', 'medidove' ),
							'id' => 'medidove_call_link',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),



						array(
							'name' => esc_html__( 'COVID - 19 Update Text', 'medidove' ),
							'id' => 'medidove_covid_update_text',
							'default' => esc_html__('Covid - 19 Update','medidove'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),						
						array(
							'name' => esc_html__( 'Recent Effected Number', 'medidove' ),
							'id' => 'medidove_recent_effectee_number',
							'default' => esc_html__('45,485 Recent Effected','medidove'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),						
						array(
							'name' => esc_html__( 'Header Top Phone Number', 'medidove' ),
							'id' => 'medidove_herader_phone_number',
							'default' => esc_html__('+8 012 3456 7899','medidove'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),						
						array(
							'name' => esc_html__( 'Header Top Location', 'medidove' ),
							'id' => 'medidove_herader_top_location',
							'default' => esc_html__('Our Location','medidove'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),

						array(
							'name' => esc_html__( 'Header Account Text', 'medidove' ),
							'id' => 'medidove_header_account_text',
							'default' => esc_html__('User Account','medidove'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),						

						array(
							'name' => esc_html__( 'Header Login Text', 'medidove' ),
							'id' => 'medidove_header_login_text',
							'default' => esc_html__('Login / Register','medidove'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),

						array(
							'name' => esc_html__( 'Header Button Categories Text', 'medidove' ),
							'id' => 'medidove_header_btn_cat_text',
							'default' => esc_html__('More Categories','medidove'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),						
						array(
							'name' => esc_html__( 'Header More Categories Button Text', 'medidove' ),
							'id' => 'medidove_header_more_cat_btn_text',
							'default' => esc_html__('Browse categories','medidove'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Header More Categories Button Link', 'medidove' ),
							'id' => 'medidove_header_more_cat_btn_link',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),


						array(
							'name' => esc_html__( 'Header 7 wishlist On/Off', 'medidove' ),
							'id' => 'medidove_header_wishlist_switch',
							'default' => 0,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Header 7 cart On/Off', 'medidove' ),
							'id' => 'medidove_header_cart_switch',
							'default' => 0,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),						
						array(
							'name' => esc_html__( 'Header 7 User Account On/Off', 'medidove' ),
							'id' => 'medidove_header_user_account_switch',
							'default' => 0,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),
					) 
				),
				'header_mobile_info_setting'=> array(
					'name'=> esc_html__('Header Mobile Info','medidove'),
					'priority'=> 11,
					'description' => esc_html__('To hide the field please use blank in text field.', 'medidove'),
					'fields'=> array(
						array(
							'name' => esc_html__( 'Mobile Info On/Off', 'medidove' ),
							'id' => 'medidove_side_hide',
							'default' => true,
							'type' => 'switch',
							'transport'	=> 'refresh'
						),
						array(
							'name' => esc_html__( 'Mobile Logo On/Off', 'medidove' ),
							'id' => 'medidove_mobile_logo_hide',
							'default' => 0,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),	
						array(
							'name' => esc_html__( 'Header Top Address', 'medidove' ),
							'id' => 'medidove_mob_header_address',
							'default' => esc_html__( 'New York, 22 Avenue, USA', 'medidove' ),
							'type' => 'text',
							'transport'	=> 'refresh'
						),
						array(
							'name' => esc_html__( 'Info Title', 'medidove' ),
							'id' => 'medidove_mob_side_info_title',
							'default' => esc_html__( 'Contact Info', 'medidove' ),
							'type' => 'text',
							'transport'	=> 'refresh'
						),
						array(
							'name' => esc_html__( 'Phone Number', 'medidove' ),
							'id' => 'medidove_mob_header_phone_number',
							'default' => esc_html__( '+8 012 3456 7899', 'medidove' ),
							'type' => 'text',
							'transport'	=> 'refresh'
						),	
						array(
							'name' => esc_html__( 'Email Address', 'medidove' ),
							'id' => 'medidove_mob_header_email_address',
							'default' => esc_html__( 'support@gmail.com', 'medidove' ),
							'type' => 'text',
							'transport'	=> 'refresh'
						),	
						array(
							'name' => esc_html__( 'Time Shedule', 'medidove' ),
							'id' => 'medidove_mob_header_time',
							'default' => esc_html__( 'Mon - Fri: 9.00am - 11.00pm', 'medidove' ),
							'type' => 'text',
							'transport'	=> 'refresh'
						),

						array(
							'name' => esc_html__( 'Button Text', 'medidove' ),
							'id' => 'medidove_mob_button', 
							'default' => esc_html__( 'Contact Us', 'medidove' ),
							'type' => 'text',
							'transport'	=> 'refresh'
						),
						array(
							'name' => esc_html__( 'Button URL', 'medidove' ),
							'id' => 'medidove_mob_button_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh'
						),
					)
				),
				'header_social_setting'=> array(
					'name'=> esc_html__('Header Social Setting','medidove'),
					'priority'=> 11,
					'description' => esc_html__('To hide the field please use blank in text field.', 'medidove'),
					'fields'=> array(
						/** social profiles **/
						array(
							'name' => esc_html__( 'Facebook Url', 'medidove' ),
							'id' => 'medidove_topbar_fb_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Instagram Url', 'medidove' ),
							'id' => 'medidove_topbar_instagram_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Youtube Url', 'medidove' ),
							'id' => 'medidove_topbar_youtube_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Linkin Url', 'medidove' ),
							'id' => 'medidove_topbar_linkedin_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Twitter Url', 'medidove' ),
							'id' => 'medidove_topbar_twitter_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						
					)
				),
				'header_main_setting' => array(
					'name' => esc_html__( 'Header Setting', 'medidove' ),
					'priority' => 12,
					'fields' => array(
						array(
							'name' => esc_html__( 'Choose Header Style', 'medidove' ),
							'id' => 'choose_default_header',
							'type'     => 'select',
							'choices'  => array(
								'header-style-1' => 'Header Style 1',
								'header-style-2' => 'Header Style 2',
								'header-style-3' => 'Header Style 3',
								'header-style-4' => 'Header Style 4',
								'header-style-5' => 'Header Style 5',
							),
							'default' => 'header-style-1',
							'transport'	=> 'refresh'
						),
						array(
							'name' => esc_html__( 'Header Logo', 'medidove' ),
							'id' => 'logo',
							'default' => get_template_directory_uri() . '/img/logo/logo.png',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),

						array(
							'name' => esc_html__( 'Header White Logo', 'medidove' ),
							'id' => 'seconday_logo',
							'default' => get_template_directory_uri() . '/img/logo/logo-white.png',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),

						array(
							'name' => esc_html__( 'Show Language', 'medidove' ),
							'id' => 'medidove_header_lang',
							'default' => 0,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),													
						array(
							'name' => esc_html__( 'Show Header Search', 'medidove' ),
							'id' => 'medidove_header_default_search',
							'default' => 0,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),	
						array(
							'name' => esc_html__( 'Enable Sticky Menu', 'medidove' ),
							'id' => 'medidove_sticky_switch',
							'default' => 0,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),	
					) 
				),	
				'page_title_setting'=> array(
					'name'=> esc_html__('Breadcrumb Setting','medidove'),
					'priority'=> 13,
					'fields'=> array(
						array(
							'name' => esc_html__( 'Breadcrumb On/Off', 'medidove' ),
							'id' => 'medidove_breadcrumbs_switch',
							'default' => 1,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),
						array(
							'name'=>esc_html__('Breadcrumb BG Color','medidove'),
							'id'=>'medidove_breadcrumb_bg_color',
							'default'=> esc_html__('#F4F9FD','medidove'),
							'transport'	=> 'refresh'  
						),	
						array(
							'name'=>esc_html__('Page Title Font Size','medidove'),
							'id'=>'medidove_breadcrumb_font_size',
							'default'=> esc_html__('48px','medidove'),
							'transport'	=> 'refresh',  
							'type' => 'text',
						),					
						array(
							'name'=>esc_html__('Breadcrumb Padding Top','medidove'),
							'id'=>'medidove_breadcrumb_spacing',
							'default'=> esc_html__('160px','medidove'),
							'transport'	=> 'refresh',  
							'type' => 'text',
						),						
						array(
							'name'=>esc_html__('Breadcrumb Bottom Top','medidove'),
							'id'=>'medidove_breadcrumb_bottom_spacing',
							'default'=> esc_html__('160px','medidove'),
							'transport'	=> 'refresh',  
							'type' => 'text',
						),
						array(
							'name' => esc_html__( 'Breadcrumb Background Image', 'medidove' ),
							'id' => 'breadcrumb_bg_img',
							'default' => get_template_directory_uri() . '/img/bg/page-title.jpg',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Product Details Title', 'medidove' ),
							'id' => 'breadcrumb_product_details',
							'default' => esc_html__('Product Details','medidove'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),	
						array(
							'name' => esc_html__( 'Department Details Title', 'medidove' ),
							'id' => 'breadcrumb_department_details',
							'default' => esc_html__('Department Details','medidove'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),		
						array(
							'name' => esc_html__( 'Breadcrumb Archive', 'medidove' ),
							'id' => 'breadcrumb_archive',
							'default' => esc_html__('Archive for category','medidove'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),		
						array(
							'name' => esc_html__( 'Breadcrumb Search', 'medidove' ),
							'id' => 'breadcrumb_search',
							'default' => esc_html__('Search results for','medidove'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),	
						array(
							'name' => esc_html__( 'Breadcrumb tagged', 'medidove' ),
							'id' => 'breadcrumb_post_tags',
							'default' => esc_html__('Posts tagged','medidove'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),				
						array(
							'name' => esc_html__( 'Breadcrumb posted by', 'medidove' ),
							'id' => 'breadcrumb_artitle_post_by',
							'default' => esc_html__('Articles posted by','medidove'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),			
						array(
							'name' => esc_html__( 'Breadcrumb Page Not Found', 'medidove' ),
							'id' => 'breadcrumb_404',
							'default' => esc_html__('Page Not Found','medidove'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),				
						array(
							'name' => esc_html__( 'Breadcrumb Page', 'medidove' ),
							'id' => 'breadcrumb_page',
							'default' => esc_html__('Page','medidove'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),			
						array(
							'name' => esc_html__( 'Breadcrumb Shop', 'medidove' ),
							'id' => 'breadcrumb_shop',
							'default' => esc_html__('Shop','medidove'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),						
						array(
							'name' => esc_html__( 'Breadcrumb Home', 'medidove' ),
							'id' => 'breadcrumb_home',
							'default' => esc_html__('Home','medidove'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),								
					)
				),
				'blog_setting'=> array(
					'name'=> esc_html__('Blog Setting','medidove'),
					'priority'=> 14,
					'fields'=> array(
						array(
							'name' => esc_html__( 'Blog BTN On/Off', 'medidove' ),
							'id' => 'medidove_blog_btn_switch',
							'default' => 1,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),	
						array(
							'name' => esc_html__( 'Blog Btn Icon On/Off', 'medidove' ),
							'id' => 'medidove_blog_btn_icon_switch',
							'default' => 1,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Blog Date On/Off', 'medidove' ),
							'id' => 'medidove_blog_date_switch',
							'default' => 1,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Blog User On/Off', 'medidove' ),
							'id' => 'medidove_blog_user_switch',
							'default' => 1,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Blog Comments On/Off', 'medidove' ),
							'id' => 'medidove_blog_comments_switch',
							'default' => 1,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Blog Button text', 'medidove' ),
							'id' => 'medidove_blog_btn',
							'default' => esc_html__('Read More','medidove'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),						
						array(
							'name' => esc_html__( 'Blog Button Icon', 'medidove' ),
							'id' => 'medidove_blog_btn_icon',
							'default' => esc_html__('fas fa-angle-double-right','medidove'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),						
						array(
							'name' => esc_html__( 'Blog Title', 'medidove' ),
							'id' => 'breadcrumb_blog_title',
							'default' => esc_html__('Blog','medidove'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),											
						array(
							'name' => esc_html__( 'Blog Details Title', 'medidove' ),
							'id' => 'breadcrumb_blog_title_details',
							'default' => esc_html__('Blog Details','medidove'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),				
					)
				),
				'slider_setting'=> array(
					'name'=> esc_html__('Slider Setting','medidove'),
					'priority'=> 15,
					'fields'=> array(
						array(
							'name'=>esc_html__('Slider 1 Height','medidove'),
							'id'=>'medidove_slider_spacing',
							'default'=> esc_html__('900px','medidove'),
							'transport'	=> 'refresh',  
							'type' => 'text',
						),						
						array(
							'name'=>esc_html__('Slider Transparent Height','medidove'),
							'id'=>'medidove_slider2_spacing',
							'default'=> esc_html__('1000px','medidove'),
							'transport'	=> 'refresh',  
							'type' => 'text',
						),						
						array(
							'name'=>esc_html__('Slider Box Height','medidove'),
							'id'=>'medidove_slider3_spacing',
							'default'=> esc_html__('780px','medidove'),
							'transport'	=> 'refresh',  
							'type' => 'text',
						),
						
					)
				),
				'medidove_footer_setting'=> array(
					'name'=> esc_html__('Footer Setting','medidove'),
					'priority'=> 16,
					'fields'=> array(
						array(
							'name' => esc_html__( 'Choose Footer Style', 'medidove' ),
							'id' => 'choose_default_footer',
							'type'     => 'select',
							'choices'  => array(
								'footer-style-1' => 'Footer Style 1',
								'footer-style-2' => 'Footer Style 2',
								'footer-style-3' => 'Footer Style 3',
								'footer-style-4' => 'Footer Style 4',
								'footer-style-5' => 'Footer Style 5',
							),
							'default' => 'footer-style-3',
							'transport'	=> 'refresh'
						),
						array(
							'name' => esc_html__( 'Footer Top Logo', 'medidove' ),
							'id' => 'medidove_footer_top_logo',
							'default' => get_template_directory_uri() . '/img/logo/footer-logo-3.png',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),
						array(
							'name'=>esc_html__('Copy Right','medidove'),
							'id'=>'medidove_copyright',
							'default'=> esc_html__('Copyright &copy;2021 ThemePure. All Rights Reserved Copyright','medidove'),
							'type'=>'text',
							'transport'	=> 'refresh'  
						),	
						array(
							'name'=>esc_html__('Scrollup Hide','medidove'),
							'id'=>'medidove_scrollup_switch',
							'default'=> false,
							'type'=>'switch',
							'transport'	=> 'refresh'  
						),
						array(
							'name'=>esc_html__('Widget Emergency number text','medidove'),
							'id'=>'medidove_footer_emergency',
							'default'=> esc_html__('Emergency number','medidove'),
							'type'=>'text',
							'transport'	=> 'refresh'  
						),
						array(
							'name' => esc_html__( 'Footer BG Image', 'medidove' ),
							'id' => 'medidove_footer_bg_url',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),
						array(
							'name'=>esc_html__('Footer Card Show/Hide','medidove'),
							'id'=>'medidove_footer_card_switch',
							'default'=> false,
							'type'=>'switch',
							'transport'	=> 'refresh'  
						),
						array(
							'name'=>esc_html__('Footer Card Image Label','medidove'),
							'id'=>'medidove_footer_card_label',
							'default'=> esc_html__('We Support','medidove'),
							'type'=>'text',
							'transport'	=> 'refresh'  
						),
						array(
							'name' => esc_html__( 'Footer Card Image', 'medidove' ),
							'id' => 'medidove_footer_card_img',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Footer Card Image URL', 'medidove' ),
							'id' => 'medidove_footer_card_img_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name'=>esc_html__('Footer BG Color','medidove'),
							'id'=>'medidove_footer_bg_color',
							'default'=> esc_html__('#13232F','medidove'),
							'transport'	=> 'refresh'  
						),
						array(
							'name'=>esc_html__('Footer Top Phone Number Label','medidove'),
							'id'=>'medidove_footer_phone_number_label',
							'default'=> esc_html__('Phone Number','medidove'),
							'type'=>'text',
							'transport'	=> 'refresh'  
						),						
						array(
							'name'=>esc_html__('Footer Top Phone Number','medidove'),
							'id'=>'medidove_footer_phone_number',
							'default'=> esc_html__('+012 (345) 789','medidove'),
							'type'=>'text',
							'transport'	=> 'refresh'  
						),
					)
				),
				'footer_social_setting'=> array(
					'name'=> esc_html__('Footer Social Setting','medidove'),
					'priority'=> 11,
					'description' => esc_html__('To hide the field please use blank in text field.', 'medidove'),
					'fields'=> array(
						/** social profiles **/
						array(
							'name' => esc_html__( 'Facebook Url', 'medidove' ),
							'id' => 'medidove_topbar_fb_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Instagram Url', 'medidove' ),
							'id' => 'medidove_topbar_instagram_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Youtube Url', 'medidove' ),
							'id' => 'medidove_topbar_youtube_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Linkin Url', 'medidove' ),
							'id' => 'medidove_topbar_linkedin_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Twitter Url', 'medidove' ),
							'id' => 'medidove_topbar_twitter_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						
					)
				),
				'color_setting'=> array(
					'name'=> esc_html__('Color Setting','medidove'),
					'priority'=> 17,
					'fields'=> array(
						array(
							'name'=>esc_html__('Theme Color','medidove'),
							'id'=>'medidove_color_option',
							'default'=> esc_html__('#e12454','medidove'),
							'transport'	=> 'refresh'  
						),							
						array(
							'name'=>esc_html__('Theme Sec Color','medidove'),
							'id'=>'medidove_sec_color_option',
							'default'=> esc_html__('#8fb569','medidove'),
							'transport'	=> 'refresh'  
						),																		
					)
				),
				'error_page_setting'=> array(
					'name'=> esc_html__('404 Setting','medidove'),
					'priority'=> 18,
					'fields'=> array(
						array(
							'name'=>esc_html__('400 Text','medidove'),
							'id'=>'medidove_error_404_text',
							'default'=> esc_html__('404','medidove'),
							'type'=>'text',
							'transport'	=> 'refresh'  
						),
						array(
							'name'=>esc_html__('Not Found Title','medidove'),
							'id'=>'medidove_error_title',
							'default'=> esc_html__('Page not found','medidove'),
							'type'=>'text',
							'transport'	=> 'refresh'  
						),
						array(
							'name'=>esc_html__('404 Description Text','medidove'),
							'id'=>'medidove_error_desc',
							'default'=> esc_html__('Oops! The page you are looking for does not exist. It might have been moved or deleted','medidove'),
							'type'=>'textarea',
							'transport'	=> 'refresh'  
						),
						array(
							'name'=>esc_html__('404 Link Text','medidove'),
							'id'=>'medidove_error_link_text',
							'default'=> esc_html__('Back To Home','medidove'),
							'type'=>'text',
							'transport'	=> 'refresh'  
						)
						
					)
				),
				'slug_setting'=> array(
					'name'=> esc_html__('Post Type Slug','medidove'),
					'priority'=> 19,
					'fields'=> array(
						array(
							'name'=>esc_html__('Service Name','medidove'),
							'id'=>'medidove_sv_name',
							'default'=> esc_html__('Services','medidove'),
							'transport'	=> 'refresh',  
							'type' => 'text',
						),
						array(
							'name'=>esc_html__('Service Slug','medidove'),
							'id'=>'medidove_sv_slug',
							'default'=> esc_html__('service','medidove'),
							'transport'	=> 'refresh',  
							'type' => 'text',
						),
						array(
							'name'=>esc_html__('Member Name','medidove'),
							'id'=>'medidove_mem_name',
							'default'=> esc_html__('Member','medidove'),
							'transport'	=> 'refresh',  
							'type' => 'text',
						),
						array(
							'name'=>esc_html__('Member Slug','medidove'),
							'id'=>'medidove_mem_slug',
							'default'=> esc_html__('member','medidove'),
							'transport'	=> 'refresh',  
							'type' => 'text',
						),
						array(
							'name'=>esc_html__('Portfolio Name','medidove'),
							'id'=>'medidove_port_name',
							'default'=> esc_html__('Portfolio','medidove'),
							'transport'	=> 'refresh',  
							'type' => 'text',
						),
						array(
							'name'=>esc_html__('Portfolio Slug','medidove'),
							'id'=>'medidove_port_slug',
							'default'=> esc_html__('portfolio','medidove'),
							'transport'	=> 'refresh',  
							'type' => 'text',
						),
						
					)
				),			
				'preloader_setting'=> array(
					'name'=> esc_html__('Preloader Setting','medidove'),
					'priority'=> 21,
					'fields'=> array(
						array(
							'name' => esc_html__( 'Preloader On/Off', 'medidove' ),
							'id' => 'medidove_preloader',
							'default' => true,
							'type' => 'switch',
							'transport'	=> 'refresh'
						),
						array(
							'name' => esc_html__( 'Preloader Text On/Off', 'medidove' ),
							'id' => 'medidove_preloader_text_off',
							'default' => true,
							'type' => 'switch',
							'transport'	=> 'refresh'
						),
						array(
							'name' => esc_html__( 'Preloader Text', 'medidove' ),
							'id' => 'medidove_preloader_text',
							'default' => esc_html__( 'Medidove', 'medidove' ),
							'type' => 'textarea',
							'transport'	=> 'refresh'
						),	
					)
				),
			),
		)
	);

}

add_filter('medidove_customizer_data', 'medidove_customizer');


