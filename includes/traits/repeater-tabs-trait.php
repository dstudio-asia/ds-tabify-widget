<?php

// Elementor Classes
use \Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;

trait RepeaterTabsTrait

{
	function uptabs_repeater_tabs($repeater){
	
	

		// ======================
		// TAB: TITLE
		// ======================
		$repeater->start_controls_tabs('tab_repeater_tabs');

		// Title Tab
		$repeater->start_controls_tab(
			'tab_title',
			[
				'label' => esc_html__('Title', 'uptabs'),
			]
		);

		$repeater->add_control(
			'uptabs_tab_title',
			[
				'label' => esc_html__('Title', 'uptabs'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Tab Title', 'uptabs'),
				'placeholder' => esc_html__('Tab Title', 'uptabs'),
				'label_block' => true,
				'dynamic' => ['active' => true],
			]
		);

		$repeater->add_control(
			'tab_icon',
			[
				'label' => esc_html__('Icon', 'uptabs'),
				'type' => Controls_Manager::ICONS,
				'label_block' => true,
				'default' => ['value' => '', 'library' => 'fa-solid'],
				'skin' => 'inline',
				'include' => ['fa-solid', 'svg'],
			]
		);

		$repeater->add_control(
			'tab_id',
			[
				'label' => esc_html__('Tab ID/Slug', 'uptabs'),
				'type' => Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => esc_html__('tab-1', 'uptabs'),
			]
		);

		$repeater->end_controls_tab();

		// ======================
		// TAB: CONTENT
		// ======================
		$repeater->start_controls_tab(
			'tab_content',
			[
				'label' => esc_html__('Content', 'uptabs'),
			]
		);


		$repeater->add_control(
			'uptabs_tab_heading',
			[
				'label' => esc_html__('Heading', 'uptabs'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('This is a Card Heading', 'uptabs'),
			]
		);
		$repeater->add_control(
			'uptabs_tab_description',
			[
				'label' => esc_html__('Description', 'uptabs'),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ultricies leo in dui ultricies porttitor. Fusce placerat massa vitae diam aliquam, ac tincidunt tortor venenatis.', 'uptabs'),
			]
		);

		$this->add_control(
			'hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$repeater->add_control(
			'uptabs_tab_button_text',
			[
				'label' => esc_html__('Button Text', 'uptabs'),
				'type' => Controls_Manager::TEXT,
			]
		);

		$repeater->add_control(
			'uptabs_tab_button_link',
			[
				'label' => esc_html__('Button Link', 'uptabs'),
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'show_external' => true,
			]
		);

		$repeater->end_controls_tab();

		// ======================
		// TAB: IMAGE
		// ======================
		$repeater->start_controls_tab(
			'tab_image',
			[
				'label' => esc_html__('Image', 'uptabs'),
			]
		);

		$repeater->add_control(
			'uptabs_tab_image',
			[
				'label' => esc_html__('Choose Image', 'uptabs'),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => \Elementor\Utils::get_placeholder_image_src()],
			]
		);

		$repeater->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'thumbnail',
				'default' => 'medium_large',
				'separator' => 'none',
			]
		);


		$repeater->end_controls_tab();

	}
}