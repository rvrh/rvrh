<?php

// MLog Home Settings
function mlogfree_home_panels($wp_customize){
    $wp_customize->add_panel(
        'mlogfree_home_panel',
        array(
            'title'         => esc_html__('MLog Home Settings', 'mlog-free'),
            'priority'      => 25,
        )
    );
    
    /* --------------------------
     + Cover Settings
    ---------------------------*/
    
    // Add session cover setting
    $wp_customize->add_section(
        'mlogfree_home_cover',
        array(
            'title'         => esc_html__('Cover Settings', 'mlog-free'),
            'priority'      => 10,
            'panel'         => 'mlogfree_home_panel',
        )
    );
    
    // Cover title
    $wp_customize->add_setting (
        'mlogfree_home_cover_title',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field'
        )
    ); 
    $wp_customize->add_control (
        'mlogfree_home_cover_title',
        array(
            'label'             => esc_html__('Cover Title', 'mlog-free'),
            'description'       => esc_html__('Only apply when using Cover Image', 'mlog-free'),
            'section'           => 'mlogfree_home_cover',
            'type'              => 'text',
            'settings'          => 'mlogfree_home_cover_title'
        )
    );
    
    // Cover Description
    $wp_customize->add_setting (
        'mlogfree_home_cover_desc',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        )
    ); 
    $wp_customize->add_control (
        'mlogfree_home_cover_desc',
        array(
            'label'             => esc_html__('Cover Description', 'mlog-free'),
            'description'       => esc_html__('Only apply when using Cover Image', 'mlog-free'),
            'section'           => 'mlogfree_home_cover',
            'type'              => 'text',
            'settings'          => 'mlogfree_home_cover_desc'
        )
    );
    
    // Cover icon
    $wp_customize->add_setting (
        'mlogfree_home_cover_icon',
        array(
            'default'           => '<i class="fas fa-angle-double-down"></i>',
            'sanitize_callback' => 'wp_kses_post'
        )
    ); 
    $wp_customize->add_control (
        'mlogfree_home_cover_icon',
        array(
            'label'             => esc_html__('Cover Icon', 'mlog-free'),
            'description'       => __('Only apply when using Cover Image.<br/><b>Default</b>: &lt;i class=&quot;fas fa-angle-double-down&quot;&gt;&lt;/i&gt;', 'mlog-free'),
            'section'           => 'mlogfree_home_cover',
            'type'              => 'text',
            'settings'          => 'mlogfree_home_cover_icon'
        )
    );
    
    
    
    /* --------------------------
     + Featured Post Settings
    ---------------------------*/
    
    // Add session cover setting
    $wp_customize->add_section(
        'mlogfree_home_feature',
        array(
            'title'             => esc_html__('Feature Post Settings', 'mlog-free'),
            'priority'          => 10,
            'panel'             => 'mlogfree_home_panel',
        )
    );
    
    // Display Feature Post
    $wp_customize->add_setting (
        'mlogfree_home_feature_post',
        array(
            'default'           => 'no',
            'sanitize_callback' => 'sanitize_text_field'
        )
    ); 
    $wp_customize->add_control (
        'mlogfree_home_feature_post',
        array(
            'type'              => 'radio',
            'label'             => esc_html__('Display Feature Post', 'mlog-free'),
            'section'           => 'mlogfree_home_feature',
            'settings'          => 'mlogfree_home_feature_post',
            'choices' => array(
                'yes'           => 'Yes',
                'no'            => 'No'
            ),
        )
    );
    
    // Select Category 
    $categories = get_categories();
	$cats = array();
	$i = 0;
	foreach($categories as $category){
		if($i==0){
			$default = $category->term_id;
			$i++;
		}
		$cats[$category->term_id] = $category->name;
	}
    $wp_customize->add_setting(
        'mlogfree_home_feature_post_ID',
        array(
            'default'           => '',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control(
        'mlogfree_home_feature_post_ID',
        array(
            'label'             => esc_html__('Select Category', 'mlog-free'),
            'description'       => esc_html__('Only apply when using Feature Post', 'mlog-free'),
            'section'           => 'mlogfree_home_feature',
            'settings'          => 'mlogfree_home_feature_post_ID',
            'type'              => 'select',
            'choices'           => $cats,
        )
    );
    
    
    // Feature Post Sort
    $wp_customize->add_setting (
        'mlogfree_home_feature_post_sort',
        array(
            'default'           => 'ID',
            'sanitize_callback' => 'sanitize_text_field'
        )
    ); 
    $wp_customize->add_control (
        'mlogfree_home_feature_post_sort',
        array(
            'type'              => 'radio',
            'label'             => esc_html__('Feature Post Sort By', 'mlog-free'),
            'section'           => 'mlogfree_home_feature',
            'settings'          => 'mlogfree_home_feature_post_sort',
            'choices' => array(
                'ID'            => 'News',
                'rand'          => 'Random'
            ),
        )
    );
}
add_action('customize_register','mlogfree_home_panels');