<?php

use Elementor\Controls_Manager;
use Elementor\Plugin;
use Elementor\Group_Control_Text_Stroke;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

class DsTabify_Widget extends \Elementor\Widget_Base
{
	public function get_name()
	{
		return 'dstabify';
	}

	public function get_title()
	{
		return esc_html__('DsTabify', 'dstabify');
	}

	public function get_icon()
	{
		return 'eicon-tabs';
	}

	public function get_categories()
	{
		return ['general'];
	}

	public function get_keywords()
	{
		return ['tabs', 'accordion', 'toggle'];
	}



	protected function register_controls()
	{
		$start = is_rtl() ? 'end' : 'start';
		$end = is_rtl() ? 'start' : 'end';

		$this->start_controls_section(
			'section_tabs',
			[
				'label' => esc_html__('Tabs', 'dstabify'),
			]
		);

		$repeater = new Elementor\Repeater();

		// ======================
		// TAB: TITLE
		// ======================
		$repeater->start_controls_tabs('tab_repeater_tabs');

		// Title Tab
		$repeater->start_controls_tab(
			'tab_title',
			[
				'label' => esc_html__('Title', 'dstabify'),
			]
		);

		$repeater->add_control(
			'dstabify_tab_title',
			[
				'label' => esc_html__('Title', 'dstabify'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Tab Title', 'dstabify'),
				'placeholder' => esc_html__('Tab Title', 'dstabify'),
				'label_block' => true,
				'dynamic' => ['active' => true],
			]
		);

		$repeater->add_control(
			'tab_icon',
			[
				'label' => esc_html__('Icon', 'dstabify'),
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
				'label' => esc_html__('Tab ID/Slug', 'dstabify'),
				'type' => Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => esc_html__('tab-1', 'dstabify'),
			]
		);

		$repeater->end_controls_tab();

		// ======================
		// TAB: CONTENT
		// ======================
		$repeater->start_controls_tab(
			'tab_content',
			[
				'label' => esc_html__('Content', 'dstabify'),
			]
		);


		$repeater->add_control(
			'dstabify_tab_heading',
			[
				'label' => esc_html__('Heading', 'dstabify'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('This is a Card Heading', 'dstabify'),
			]
		);
		$repeater->add_control(
			'dstabify_tab_description',
			[
				'label' => esc_html__('Description', 'dstabify'),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ultricies leo in dui ultricies porttitor. Fusce placerat massa vitae diam aliquam, ac tincidunt tortor venenatis.', 'dstabify'),
			]
		);

		$this->add_control(
			'hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$repeater->add_control(
			'dstabify_tab_button_text',
			[
				'label' => esc_html__('Button Text', 'dstabify'),
				'type' => Controls_Manager::TEXT,
			]
		);

		$repeater->add_control(
			'dstabify_tab_button_link',
			[
				'label' => esc_html__('Button Link', 'dstabify'),
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
				'label' => esc_html__('Image', 'dstabify'),
			]
		);

		$repeater->add_control(
			'dstabify_tab_image',
			[
				'label' => esc_html__('Choose Image', 'dstabify'),
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

		// ======================
		// TAB: BUTTON
		// ======================
		// $repeater->start_controls_tab(
		// 	'tab_button',
		// 	[
		// 		'label' => esc_html__('Button', 'dstabify'),
		// 	]
		// );



		// $repeater->end_controls_tab();

		// ======================
		// TAB: STYLE
		// ======================
		// $repeater->start_controls_tab(
		// 	'tab_style',
		// 	[
		// 		'label' => esc_html__('Style', 'dstabify'),
		// 	]
		// );

		// $repeater->add_control(
		// 	'content_gap',
		// 	[
		// 		'label' => esc_html__('Content Gap', 'dstabify'),
		// 		'type' => Controls_Manager::SLIDER,
		// 		'size_units' => ['px'],
		// 		'range' => ['px' => ['min' => 0, 'max' => 100]],
		// 		'default' => ['size' => 20],
		// 		'selectors' => [
		// 			'{{WRAPPER}} {{CURRENT_ITEM}} .dstabify-card-content-wrapper' => 'gap: {{SIZE}}{{UNIT}};',
		// 		],
		// 	]
		// );

		// $repeater->add_responsive_control(
		// 	'content_align',
		// 	[
		// 		'label' => esc_html__('Content Alignment', 'dstabify'),
		// 		'type' => Controls_Manager::CHOOSE,
		// 		'options' => [
		// 			'flex-start' => ['title' => esc_html__('Left', 'dstabify'), 'icon' => 'eicon-text-align-left'],
		// 			'center' => ['title' => esc_html__('Center', 'dstabify'), 'icon' => 'eicon-text-align-center'],
		// 			'flex-end' => ['title' => esc_html__('Right', 'dstabify'), 'icon' => 'eicon-text-align-right'],
		// 		],
		// 		'default' => 'flex-start',
		// 		'selectors' => [
		// 			'{{WRAPPER}} {{CURRENT_ITEM}} .dstabify-card-left-section' => 'align-items: {{VALUE}};',
		// 		],
		// 	]
		// );

		// $repeater->add_responsive_control(
		// 	'text_align',
		// 	[
		// 		'label' => esc_html__('Text Alignment', 'dstabify'),
		// 		'type' => Controls_Manager::CHOOSE,
		// 		'options' => [
		// 			'left' => ['title' => esc_html__('Left', 'dstabify'), 'icon' => 'eicon-text-align-left'],
		// 			'center' => ['title' => esc_html__('Center', 'dstabify'), 'icon' => 'eicon-text-align-center'],
		// 			'right' => ['title' => esc_html__('Right', 'dstabify'), 'icon' => 'eicon-text-align-right'],
		// 		],
		// 		'default' => 'left',
		// 		'selectors' => [
		// 			'{{WRAPPER}} {{CURRENT_ITEM}} .dstabify-card-left-section' => 'text-align: {{VALUE}};',
		// 		],
		// 	]
		// );

		// $repeater->add_control(
		// 	'content_color',
		// 	[
		// 		'label' => esc_html__('Text Color', 'dstabify'),
		// 		'type' => Controls_Manager::COLOR,
		// 		'selectors' => ['{{WRAPPER}} {{CURRENT_ITEM}} .dstabify-card-content-wrapper' => 'color: {{VALUE}};'],
		// 	]
		// );

		// $repeater->add_control(
		// 	'content_bg_color',
		// 	[
		// 		'label' => esc_html__('Background Color', 'dstabify'),
		// 		'type' => Controls_Manager::COLOR,
		// 		'selectors' => ['{{WRAPPER}} {{CURRENT_ITEM}} .dstabify-card-content-wrapper' => 'background-color: {{VALUE}};'],
		// 	]
		// );

		// $repeater->add_control(
		// 	'content_section_padding',
		// 	[
		// 		'label' => esc_html__('Content Padding', 'dstabify'),
		// 		'type' => Controls_Manager::DIMENSIONS,
		// 		'size_units' => ['px', '%'],
		// 		'selectors' => [
		// 			'{{WRAPPER}} {{CURRENT_ITEM}} .dstabify-card-left-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		// 		],
		// 	]
		// );
		// $repeater->add_control(
		// 	'tab_section_padding',
		// 	[
		// 		'label' => esc_html__('Section Padding', 'dstabify'),
		// 		'type' => Controls_Manager::DIMENSIONS,
		// 		'size_units' => ['px', '%'],
		// 		'selectors' => [
		// 			'{{WRAPPER}} {{CURRENT_ITEM}} .dstabify-card-content-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		// 		],
		// 	]
		// );

		// $repeater->add_group_control(
		// 	\Elementor\Group_Control_Border::get_type(),
		// 	[
		// 		'name' => 'content_border',
		// 		'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .dstabify-card-content-wrapper',
		// 	]
		// );

		// $repeater->add_control(
		// 	'content_border_radius',
		// 	[
		// 		'label' => esc_html__('Border Radius', 'dstabify'),
		// 		'type' => Controls_Manager::DIMENSIONS,
		// 		'size_units' => ['px', '%'],
		// 		'selectors' => [
		// 			'{{WRAPPER}} {{CURRENT_ITEM}} .dstabify-card-content-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		// 		],
		// 	]
		// );

		// $repeater->add_group_control(
		// 	\Elementor\Group_Control_Box_Shadow::get_type(),
		// 	[
		// 		'name' => 'content_box_shadow',
		// 		'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .dstabify-card-content-wrapper',
		// 	]
		// );

		// $repeater->end_controls_tab();
		// $repeater->end_controls_tabs();

		$this->add_control(
			'tabs',
			[
				'label' => esc_html__('Tabs Items', 'dstabify'),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'dstabify_tab_title' => esc_html__('Tab #1', 'dstabify'),
						'dstabify_tab_heading' => esc_html__('This is a heading', 'dstabify'),
						'dstabify_tab_description' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ultricies leo in dui ultricies porttitor. Fusce placerat massa vitae diam aliquam, ac tincidunt tortor venenatis.', 'dstabify'),
					],
					[
						'dstabify_tab_title' => esc_html__('Tab #2', 'dstabify'),
						'dstabify_tab_heading' => esc_html__('This is a heading', 'dstabify'),
						'dstabify_tab_description' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ultricies leo in dui ultricies porttitor. Fusce placerat massa vitae diam aliquam, ac tincidunt tortor venenatis.', 'dstabify'),
					],
				],
				'title_field' => '{{{ dstabify_tab_title }}}',
			]
		);

		$this->add_responsive_control(
			'position',
			[
				'label' => esc_html__('Direction', 'dstabify'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'horizontal' => ['title' => esc_html__('Top', 'dstabify'), 'icon' => 'eicon-v-align-top'],
					'horizontal-bottom' => ['title' => esc_html__('Bottom', 'dstabify'), 'icon' => 'eicon-v-align-bottom'],
					'vertical-left' => ['title' => esc_html__('Left', 'dstabify'), 'icon' => 'eicon-h-align-left'],
					'vertical-right' => ['title' => esc_html__('Right', 'dstabify'), 'icon' => 'eicon-h-align-right'],
				],
				'default' => 'horizontal',
				'prefix_class' => 'dstabify-tabs-view-',
				'render_type' => 'template',
			]
		);

		$this->add_responsive_control(
			'dstabify_tabs_justify',
			[
				'label' => esc_html__('Justify', 'dstabify'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'start' => ['title' => esc_html__('Start', 'dstabify'), 'icon' => 'eicon-text-align-left'],
					'center' => ['title' => esc_html__('Center', 'dstabify'), 'icon' => 'eicon-text-align-center'],
					'end' => ['title' => esc_html__('End', 'dstabify'), 'icon' => 'eicon-text-align-right'],
					'stretch' => ['title' => esc_html__('Stretch', 'dstabify'), 'icon' => 'eicon-text-align-justify'],
				],
				'default' => 'center',
				'prefix_class' => 'dstabify-tabs-align-',
			]
		);

		$this->add_responsive_control(
			'dstabify_width',
			[
				'label' => esc_html__('Width', 'dstabify'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%', 'em', 'rem', 'custom'],
				'default' => ['size' => 10, 'unit' => '%'],
				'range' => [
					'px' => ['min' => 10, 'max' => 500],
					'%' => ['min' => 10, 'max' => 50],
					'em' => ['min' => 1, 'max' => 50],
					'rem' => ['min' => 1, 'max' => 50],
				],
				'selectors' => [
					'{{WRAPPER}}.dstabify-tabs-view-vertical-left .dstabify-tabs-wrapper, 
					{{WRAPPER}}.dstabify-tabs-view-vertical-right .dstabify-tabs-wrapper' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.dstabify-tabs-view-horizontal .dstabify-tabs-wrapper,
					{{WRAPPER}}.dstabify-tabs-view-horizontal-bottom .dstabify-tabs-wrapper' => 'height: {{SIZE}}{{UNIT}}; ',
				],
				'condition' => ['position' => ['vertical-left', 'vertical-right']],
			]
		);

		$this->add_control(
			'dstabify_tab_heading_tag',
			[
				'label' => esc_html__('HTML Tag', 'elementor-addon'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
				],
				'default' => 'h2',
			]
		);



		$this->add_control(
			'image_position',
			[
				'label' => esc_html__('Image Position', 'dstabify'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'right' => ['title' => esc_html__('Left', 'dstabify'), 'icon' => 'eicon-h-align-left'],
					'left' => ['title' => esc_html__('Right', 'dstabify'), 'icon' => 'eicon-h-align-right'],
					'bottom' => ['title' => esc_html__('Top', 'dstabify'), 'icon' => 'eicon-v-align-top'],
					'top' => ['title' => esc_html__('Bottom', 'dstabify'), 'icon' => 'eicon-v-align-bottom'],
				],
				'default' => 'left',
				'toggle' => true,
				// 'selectors' => [
				// 	'{{WRAPPER}} .dstabify-card-content-wrapper' => 'flex-direction: {{VALUE}};',
				// ],
				'prefix_class' => 'image-position-'
			]
		);

		$this->add_control(
			'image_width',
			[
				'label' => esc_html__('Image Width', 'dstabify'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range' => [
					'px' => ['min' => 100, 'max' => 1000, 'step' => 5],
					'%' => ['min' => 10, 'max' => 100],
				],
				'default' => ['unit' => '%', 'size' => 40],
				'selectors' => [
					'{{WRAPPER}} .dstabify-card-image' => 'width: {{SIZE}}{{UNIT}};'

					// '{{WRAPPER}} {{CURRENT_ITEM}}.image-position-top .dstabify-card-image' => 'width: 100%;',
					// '{{WRAPPER}} {{CURRENT_ITEM}}.image-position-bottom .dstabify-card-image' => 'width: 100%;',
				],
			]
		);

		$this->add_control(
			'image_border_radius',
			[
				'label' => esc_html__('Border Radius', 'dstabify'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} .dstabify-card-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);




		$this->add_control(
			'active_tab',
			[
				'label' => esc_html__('Active Tab', 'dstabify'),
				'type' => Controls_Manager::NUMBER,
				'default' => 1,
				'frontend_available' => true,
				'description' => esc_html__('Set the default active tab (1-based index).', 'dstabify'),
			]
		);

		$this->end_controls_section();

		// ===========================================
		// STYLE TAB: TABS CONTAINER
		// ===========================================
		$this->start_controls_section(
			'section_tab_container_style',
			[
				'label' => esc_html__('Tabs Container', 'dstabify'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'tab_gap',
			[
				'label' => esc_html__('Gap Between Tabs', 'dstabify'),
				'type' => Controls_Manager::SLIDER,

				'size_units' => ['px', '%', 'em', 'rem', 'custom'],
				'default' => ['size' => 15, 'unit' => 'px'],
				'range' => [
					'px' => ['min' => 0, 'max' => 500],
					'em' => ['min' => 0, 'max' => 50],
					'rem' => ['min' => 0, 'max' => 50],
				],

				'selectors' => [
					'{{WRAPPER}}.dstabify-tabs-view-horizontal .dstabify-tabs-wrapper' => 'gap: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.dstabify-tabs-view-horizontal-bottom .dstabify-tabs-wrapper' => 'gap: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.dstabify-tabs-view-vertical-left .dstabify-tabs-wrapper' => 'gap: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.dstabify-tabs-view-vertical-right .dstabify-tabs-wrapper' => 'gap: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'content_spacing',
			[
				'label' => esc_html__('Distance from content', 'dstabify'),
				'type' => Controls_Manager::SLIDER,
				'range' => ['px' => ['min' => 0, 'max' => 100]],
				'default' => ['size' => 0, 'unit' => 'px'],
				'selectors' => [
					'{{WRAPPER}}.dstabify-tabs-view-horizontal .dstabify-tabs-content-wrapper' => 'margin-top: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.dstabify-tabs-view-horizontal-bottom .dstabify-tabs-content-wrapper' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.dstabify-tabs-view-vertical-left .dstabify-tabs-content-wrapper' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.dstabify-tabs-view-vertical-right .dstabify-tabs-content-wrapper' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// ===========================================
		// STYLE TAB: TAB TITLE
		// ===========================================
		$this->start_controls_section(
			'section_tab_title_style',
			[
				'label' => esc_html__('Tab Title', 'dstabify'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs('tabs_title_style');

		// Normal Tab
		$this->start_controls_tab(
			'tab_title_normal',
			[
				'label' => esc_html__('Normal', 'dstabify'),
			]
		);

		$this->add_control(
			'tab_bg_color',
			[
				'label' => esc_html__('Background Color', 'dstabify'),
				'type' => Controls_Manager::COLOR,
				'selectors' => ['{{WRAPPER}} .dstabify-tab-title' => 'background-color: {{VALUE}};'],
			]
		);

		$this->add_control(
			'tab_text_color',
			[
				'label' => esc_html__('Text Color', 'dstabify'),
				'type' => Controls_Manager::COLOR,
				'selectors' => ['{{WRAPPER}} .dstabify-tab-title' => 'color: {{VALUE}};'],
			]
		);

		$this->end_controls_tab();

		// Hover Tab
		$this->start_controls_tab(
			'tab_title_hover',
			[
				'label' => esc_html__('Hover', 'dstabify'),
			]
		);

		$this->add_control(
			'tab_hover_bg_color',
			[
				'label' => esc_html__('Background Color', 'dstabify'),
				'type' => Controls_Manager::COLOR,
				'selectors' => ['{{WRAPPER}} .dstabify-tab-title:hover' => 'background-color: {{VALUE}};'],
			]
		);

		$this->add_control(
			'tab_hover_text_color',
			[
				'label' => esc_html__('Text Color', 'dstabify'),
				'type' => Controls_Manager::COLOR,
				'selectors' => ['{{WRAPPER}} .dstabify-tab-title:hover' => 'color: {{VALUE}};'],
			]
		);

		$this->end_controls_tab();

		// Active Tab
		$this->start_controls_tab(
			'tab_title_active',
			[
				'label' => esc_html__('Active', 'dstabify'),
			]
		);

		$this->add_control(
			'tab_active_bg_color',
			[
				'label' => esc_html__('Background Color', 'dstabify'),
				'type' => Controls_Manager::COLOR,
				'selectors' => ['{{WRAPPER}} .dstabify-tab-title.dstabify-active' => 'background-color: {{VALUE}};'],
			]
		);

		$this->add_control(
			'tab_active_text_color',
			[
				'label' => esc_html__('Text Color', 'dstabify'),
				'type' => Controls_Manager::COLOR,
				'selectors' => ['{{WRAPPER}} .dstabify-tab-title.dstabify-active' => 'color: {{VALUE}};'],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'tab_border',
				'selector' => '{{WRAPPER}} .dstabify-tab-title',
			]
		);

		$this->add_control(
			'tab_border_radius',
			[
				'label' => esc_html__('Border Radius', 'dstabify'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .dstabify-tab-title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'tab_padding',
			[
				'label' => esc_html__('Padding', 'dstabify'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .dstabify-tab-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'tab_typography',
				'selector' => '{{WRAPPER}} .dstabify-tab-title',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_shadow',
				'selector' => '{{WRAPPER}} .dstabify-tab-title',
			]
		);

		$this->end_controls_section();

		// ===========================================
		// STYLE TAB: TAB ICON
		// ===========================================
		$this->start_controls_section(
			'section_tab_icon_style',
			[
				'label' => esc_html__('Tab Icon', 'dstabify'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'tab_icon_size',
			[
				'label' => esc_html__('Icon Size', 'dstabify'),
				'type' => Controls_Manager::SLIDER,
				'range' => ['px' => ['min' => 10, 'max' => 100]],
				'default' => ['size' => 20, 'unit' => 'px'],
				'selectors' => [
					'{{WRAPPER}} .dstabify-tab-icon svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'tab_icon_spacing',
			[
				'label' => esc_html__('Icon Spacing', 'dstabify'),
				'type' => Controls_Manager::SLIDER,
				'range' => ['px' => ['min' => 0, 'max' => 50]],
				'default' => ['size' => 8, 'unit' => 'px'],
				'selectors' => [
					'{{WRAPPER}} .dstabify-icon-position-left' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .dstabify-icon-position-right' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .dstabify-icon-position-top' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .dstabify-icon-position-bottom' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs('tab_icon_colors');

		$this->start_controls_tab(
			'tab_icon_normal',
			[
				'label' => esc_html__('Normal', 'dstabify'),
			]
		);

		$this->add_control(
			'tab_icon_color',
			[
				'label' => esc_html__('Color', 'dstabify'),
				'type' => Controls_Manager::COLOR,
				'selectors' => ['{{WRAPPER}} .dstabify-tab-icon svg' => 'fill: {{VALUE}};'],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_icon_hover',
			[
				'label' => esc_html__('Hover', 'dstabify'),
			]
		);

		$this->add_control(
			'tab_icon_hover_color',
			[
				'label' => esc_html__('Color', 'dstabify'),
				'type' => Controls_Manager::COLOR,
				'selectors' => ['{{WRAPPER}} .dstabify-tab-title:hover .dstabify-tab-icon svg' => 'fill: {{VALUE}};'],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_icon_active',
			[
				'label' => esc_html__('Active', 'dstabify'),
			]
		);

		$this->add_control(
			'tab_icon_active_color',
			[
				'label' => esc_html__('Color', 'dstabify'),
				'type' => Controls_Manager::COLOR,
				'selectors' => ['{{WRAPPER}} .dstabify-tab-title.dstabify-active .dstabify-tab-icon svg' => 'fill: {{VALUE}};'],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->end_controls_section();

		// ===========================================
		// STYLE TAB: TAB CONTENT
		// ===========================================
		$this->start_controls_section(
			'section_tab_content_style',
			[
				'label' => esc_html__('Tab Content', 'dstabify'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// $this->add_responsive_control(
		// 	'content_align',
		// 	[
		// 		'label' => esc_html__('Content Alignment', 'dstabify'),
		// 		'type' => Controls_Manager::CHOOSE,
		// 		'options' => [
		// 			'flex-start' => ['title' => esc_html__('Left', 'dstabify'), 'icon' => 'eicon-text-align-left'],
		// 			'center' => ['title' => esc_html__('Center', 'dstabify'), 'icon' => 'eicon-text-align-center'],
		// 			'flex-end' => ['title' => esc_html__('Right', 'dstabify'), 'icon' => 'eicon-text-align-right'],
		// 		],
		// 		'default' => 'flex-start',
		// 		'selectors' => [
		// 			'{{WRAPPER}} .dstabify-card-left-section' => 'align-items: {{VALUE}};',
		// 		],
		// 	]
		// );

		// $this->add_responsive_control(
		// 	'text_align',
		// 	[
		// 		'label' => esc_html__('Text Alignment', 'dstabify'),
		// 		'type' => Controls_Manager::CHOOSE,
		// 		'options' => [
		// 			'left' => [
		// 				'title' => esc_html__('Left', 'dstabify'),
		// 				'icon' => 'eicon-text-align-left',
		// 			],
		// 			'center' => [
		// 				'title' => esc_html__('Center', 'dstabify'),
		// 				'icon' => 'eicon-text-align-center',
		// 			],
		// 			'right' => [
		// 				'title' => esc_html__('Right', 'dstabify'),
		// 				'icon' => 'eicon-text-align-right',
		// 			],
		// 		],
		// 		'default' => 'left',
		// 		'selectors' => [
		// 			'{{WRAPPER}} .dstabify-card-left-section' => 'text-align: {{VALUE}};',
		// 		],
		// 	]
		// );


		// $this->add_responsive_control(
		// 	'vertical_align',
		// 	[
		// 		'label' => esc_html__('Horizontal Alignment', 'elementor-addon'),
		// 		'type' => Controls_Manager::CHOOSE,
		// 		'options' => [
		// 			'start' => [
		// 				'title' => esc_html__('Left', 'elementor-addon'),
		// 				'icon' => 'eicon-text-align-left',
		// 			],
		// 			'center' => [
		// 				'title' => esc_html__('Center', 'elementor-addon'),
		// 				'icon' => 'eicon-text-align-center',
		// 			],
		// 			'end' => [
		// 				'title' => esc_html__('Right', 'elementor-addon'),
		// 				'icon' => 'eicon-text-align-right',
		// 			],
		// 		],
		// 		'default' => 'center',
		// 		'selectors' => [
		// 			'{{WRAPPER}} .dstabify-card-left-section' => 'align-items: {{VALUE}};',
		// 		],
		// 		'prefix_class' => 'align-', // 
		// 		'separator' => 'after',
		// 	]
		// );


		// $this->add_responsive_control(
		// 	'content_align',
		// 	[
		// 		'label' => esc_html__('Alignment', 'elementor-addon'),
		// 		'type' => Controls_Manager::CHOOSE,
		// 		'options' => [
		// 			'left' => [
		// 				'title' => esc_html__('Left', 'elementor-addon'),
		// 				'icon' => 'eicon-text-align-left',
		// 			],
		// 			'center' => [
		// 				'title' => esc_html__('Center', 'elementor-addon'),
		// 				'icon' => 'eicon-text-align-center',
		// 			],
		// 			'right' => [
		// 				'title' => esc_html__('Right', 'elementor-addon'),
		// 				'icon' => 'eicon-text-align-right',
		// 			],
		// 		],
		// 		'default' => 'center',
		// 		'selectors' => [
		// 			'{{WRAPPER}} .dstabify-card-content-wrapper' => 'text-align: {{VALUE}};',
		// 			'{{WRAPPER}} .dstabify-card-left-section' => 'align-items: {{VALUE}};',
		// 			'{{WRAPPER}} .image-position-bottom .dstabify-card-content-wrapper' => 'align-items: {{VALUE}};',
		// 			'{{WRAPPER}} .image-position-top .dstabify-card-content-wrapper' => 'align-items: {{VALUE}};',
		// 			'{{WRAPPER}} .image-position-left .dstabify-card-content-wrapper' => 'justify-content: {{VALUE}};',
		// 			'{{WRAPPER}} .image-position-right .dstabify-card-content-wrapper' => 'justify-content: {{VALUE}};',
		// 		],
		// 	]
		// );

		$this->add_responsive_control(
			'content_align',
			[
				'label' => esc_html__('Alignment', 'elementor-addon'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__('Left', 'elementor-addon'),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__('Center', 'elementor-addon'),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__('Right', 'elementor-addon'),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .dstabify-card-content-wrapper' => 'text-align: {{VALUE}};',
					'{{WRAPPER}} .dstabify-card-left-section' => 'align-items: {{VALUE}};',

					// Conditional mapping for flex values
					'{{WRAPPER}}.elementor-align-left .image-position-bottom .dstabify-card-content-wrapper' => 'align-items: flex-start;',
					'{{WRAPPER}}.elementor-align-center .image-position-bottom .dstabify-card-content-wrapper' => 'align-items: center;',
					'{{WRAPPER}}.elementor-align-right .image-position-bottom .dstabify-card-content-wrapper' => 'align-items: flex-end;',

					'{{WRAPPER}}.elementor-align-left .image-position-top .dstabify-card-content-wrapper' => 'align-items: flex-start;',
					'{{WRAPPER}}.elementor-align-center .image-position-top .dstabify-card-content-wrapper' => 'align-items: center;',
					'{{WRAPPER}}.elementor-align-right .image-position-top .dstabify-card-content-wrapper' => 'align-items: flex-end;',

					// For left/right positions
					'{{WRAPPER}}.elementor-align-left .image-position-left .dstabify-card-content-wrapper' => 'justify-content: flex-start;',
					'{{WRAPPER}}.elementor-align-center .image-position-left .dstabify-card-content-wrapper' => 'justify-content: center;',
					'{{WRAPPER}}.elementor-align-right .image-position-left .dstabify-card-content-wrapper' => 'justify-content: flex-end;',

					'{{WRAPPER}}.elementor-align-left .image-position-right .dstabify-card-content-wrapper' => 'justify-content: flex-start;',
					'{{WRAPPER}}.elementor-align-center .image-position-right .dstabify-card-content-wrapper' => 'justify-content: center;',
					'{{WRAPPER}}.elementor-align-right .image-position-right .dstabify-card-content-wrapper' => 'justify-content: flex-end;',
				],
				'prefix_class' => 'elementor-align-',
			]
		);

		// $this->add_responsive_control(
		// 	'vertical_align',
		// 	[
		// 		'label' => esc_html__('Vertical Alignment', 'dstabify'),
		// 		'type' => \Elementor\Controls_Manager::CHOOSE,
		// 		'options' => [
		// 			'flex-start' => [
		// 				'title' => esc_html__('Top', 'dstabify'),
		// 				'icon' => 'eicon-v-align-top',
		// 			],
		// 			'center' => [
		// 				'title' => esc_html__('Middle', 'dstabify'),
		// 				'icon' => 'eicon-v-align-middle',
		// 			],
		// 			'flex-end' => [
		// 				'title' => esc_html__('Bottom', 'dstabify'),
		// 				'icon' => 'eicon-v-align-bottom',
		// 			],
		// 		],
		// 		'default' => 'flex-start',
		// 		'selectors' => [
		// 			'{{WRAPPER}} .dstabify-card-left-section' => 'justify-content: {{VALUE}};',
		// 		],
		// 	]
		// );


		// $this->add_control(
		// 	'content_color',
		// 	[
		// 		'label' => esc_html__('Text Color', 'dstabify'),
		// 		'type' => Controls_Manager::COLOR,
		// 		'selectors' => ['{{WRAPPER}} .dstabify-tab-content' => 'color: {{VALUE}};'],
		// 	]
		// );

		$this->add_control(
			'content_bg_color',
			[
				'label' => esc_html__('Background Color', 'dstabify'),
				'type' => Controls_Manager::COLOR,
				'selectors' => ['{{WRAPPER}} .dstabify-tab-content' => 'background-color: {{VALUE}};'],
			]
		);

		// $this->add_group_control(
		// 	Group_Control_Typography::get_type(),
		// 	[
		// 		'name' => 'content_typography',
		// 		'selector' => '{{WRAPPER}} .dstabify-tab-content',
		// 	]
		// );

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'content_shadow',
				'selector' => '{{WRAPPER}} .dstabify-tab-content',
			]
		);

		// $this->add_group_control(
		// 	Group_Control_Border::get_type(),
		// 	[
		// 		'name' => 'content_border',
		// 		'selector' => '{{WRAPPER}} .dstabify-tab-content',
		// 	]
		// );

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'content_border',
				'label' => __('Content Border', 'dstabify'),
				'selector' => '{{WRAPPER}} .dstabify-tab-content',
				'fields_options' => [
					'border' => [
						'default' => 'solid',
					],
					'width' => [
						'default' => [
							'top' => 1,
							'right' => 1,
							'bottom' => 1,
							'left' => 1,
							'isLinked' => true,
						],
					],
					'color' => [
						'default' => '#000000',
					],
				],
			]
		);

	




		$this->add_control(
			'content_border_radius',
			[
				'label' => esc_html__('Border Radius', 'dstabify'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .dstabify-tab-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'content_padding',
			[
				'label' => esc_html__('Padding', 'dstabify'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .dstabify-tab-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'content_box_shadow',
				'selector' => '{{WRAPPER}} .dstabify-tab-content',
			]
		);

		$this->end_controls_section();

		// ===========================================
		// STYLE TAB: HEADING
		// ===========================================
		$this->start_controls_section(
			'section_heading_style',
			[
				'label' => esc_html__('Heading', 'dstabify'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'heading_color',
			[
				'label' => esc_html__('Color', 'dstabify'),
				'type' => Controls_Manager::COLOR,
				'selectors' => ['{{WRAPPER}} .dstabify-card-heading' => 'color: {{VALUE}};'],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'heading_typography',
				'selector' => '{{WRAPPER}} .dstabify-card-heading',
			]
		);

		$this->add_responsive_control(
			'heading_spacing',
			[
				'label' => esc_html__('Spacing', 'dstabify'),
				'type' => Controls_Manager::SLIDER,
				'range' => ['px' => ['min' => 0, 'max' => 500]],
				'selectors' => [
					'{{WRAPPER}} .uptab-header' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// ===========================================
		// STYLE TAB: DESCRIPTION
		// ===========================================
		$this->start_controls_section(
			'section_description_style',
			[
				'label' => esc_html__('Description', 'dstabify'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'description_color',
			[
				'label' => esc_html__('Color', 'dstabify'),
				'type' => Controls_Manager::COLOR,
				'selectors' => ['{{WRAPPER}} .dstabify-card-description' => 'color: {{VALUE}};'],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'description_typography',
				'selector' => '{{WRAPPER}} .dstabify-card-description',
			]
		);

		$this->add_responsive_control(
			'description_spacing',
			[
				'label' => esc_html__('Spacing', 'dstabify'),
				'type' => Controls_Manager::SLIDER,
				'range' => ['px' => ['min' => 0, 'max' => 50]],
				'selectors' => [
					'{{WRAPPER}} .dstabify-card-description' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// ===========================================
		// STYLE TAB: BUTTON
		// ===========================================
		$this->start_controls_section(
			'section_button_style',
			[
				'label' => esc_html__('Button', 'dstabify'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs('tabs_button_style');

		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => esc_html__('Normal', 'dstabify'),
			]
		);

		$this->add_control(
			'button_text_color',
			[
				'label' => esc_html__('Text Color', 'dstabify'),
				'type' => Controls_Manager::COLOR,
				'selectors' => ['{{WRAPPER}} .dstabify-card-button' => 'color: {{VALUE}};'],
			]
		);

		$this->add_control(
			'button_bg_color',
			[
				'label' => esc_html__('Background Color', 'dstabify'),
				'type' => Controls_Manager::COLOR,
				'selectors' => ['{{WRAPPER}} .dstabify-card-button' => 'background-color: {{VALUE}};'],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label' => esc_html__('Hover', 'dstabify'),
			]
		);

		$this->add_control(
			'button_hover_text_color',
			[
				'label' => esc_html__('Text Color', 'dstabify'),
				'type' => Controls_Manager::COLOR,
				'selectors' => ['{{WRAPPER}} .dstabify-card-button:hover' => 'color: {{VALUE}};'],
			]
		);

		$this->add_control(
			'button_hover_bg_color',
			[
				'label' => esc_html__('Background Color', 'dstabify'),
				'type' => Controls_Manager::COLOR,
				'selectors' => ['{{WRAPPER}} .dstabify-card-button:hover' => 'background-color: {{VALUE}};'],
			]
		);

		$this->add_control(
			'button_hover_border_color',
			[
				'label' => esc_html__('Border Color', 'dstabify'),
				'type' => Controls_Manager::COLOR,
				'selectors' => ['{{WRAPPER}} .dstabify-card-button:hover' => 'border-color: {{VALUE}};'],
				'condition' => ['button_border_border!' => ''],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'selector' => '{{WRAPPER}} .dstabify-card-button',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'button_border',
				'selector' => '{{WRAPPER}} .dstabify-card-button',
			]
		);

		$this->add_control(
			'button_border_radius',
			[
				'label' => esc_html__('Border Radius', 'dstabify'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .dstabify-card-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'button_padding',
			[
				'label' => esc_html__('Padding', 'dstabify'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors' => [
					'{{WRAPPER}} .dstabify-card-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'button_margin',
			[
				'label' => esc_html__('Margin', 'dstabify'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors' => [
					'{{WRAPPER}} .dstabify-card-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// ===========================================
		// STYLE TAB: IMAGE
		// ===========================================
		$this->start_controls_section(
			'section_image_style',
			[
				'label' => esc_html__('Image', 'dstabify'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'image_border_radius',
			[
				'label' => esc_html__('Border Radius', 'dstabify'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .dstabify-card-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'image_box_shadow',
				'selector' => '{{WRAPPER}} .dstabify-card-image img',
			]
		);

		$this->add_responsive_control(
			'image_spacing',
			[
				'label' => esc_html__('Spacing', 'dstabify'),
				'type' => Controls_Manager::SLIDER,
				'range' => ['px' => ['min' => 0, 'max' => 100]],
				'selectors' => [
					'{{WRAPPER}} .image-position-left .dstabify-card-image' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .image-position-right .dstabify-card-image' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .image-position-top .dstabify-card-image' => 'margin-top: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .image-position-bottom .dstabify-card-image' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render tabs widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render()
	{
		$settings = $this->get_settings_for_display();
		$tabs = $settings['tabs'];


		// Get active tab - handle both frontend and editor
		$active_tab = 1;
		if (\Elementor\Plugin::$instance->editor->is_edit_mode()) {
			$widget_id = $this->get_id();
			$active_tab = isset($_SESSION['dstabify_active_tab'][$widget_id]) ?
				$_SESSION['dstabify_active_tab'][$widget_id] : (!empty($settings['active_tab']) ? intval($settings['active_tab']) : 1);
		} else {
			$active_tab = !empty($settings['active_tab']) ? intval($settings['active_tab']) : 1;
		}

		$position = !empty($settings['position']) ? $settings['position'] : 'horizontal';
		$id_int = substr($this->get_id_int(), 0, 3);

		// Determine the class for tab position
		$position_class = 'dstabify-tabs-view-horizontal';
		if ($position === 'top') {
			$position_class = 'dstabify-tabs-view-horizontal';
		} elseif ($position === 'bottom') {
			$position_class = 'dstabify-tabs-view-horizontal-bottom';
		} elseif ($position === 'left') {
			$position_class = 'dstabify-tabs-view-vertical-left';
		} elseif ($position === 'right') {
			$position_class = 'dstabify-tabs-view-vertical-right';
		}

		$this->add_render_attribute('dstabify-tabs', [
			'class' => 'dstabify-tabs ' . $position_class,
			'data-active-tab' => $active_tab,
		]);
?>
		<div <?php $this->print_render_attribute_string('dstabify-tabs'); ?>>
			<div class="dstabify-tabs-inner">


				<div class="dstabify-tabs-wrapper" role="tablist">
					<?php foreach ($tabs as $index => $item) :
						$tab_count = $index + 1;
						$tab_id = 'dstabify-tab-title-' . $id_int . $tab_count;
						$active_class = $tab_count === $active_tab ? 'dstabify-active' : '';
						$icon_html = '';
						$icon_position = $item['tab_icon_position'] ?? 'left';

						if (!empty($item['tab_icon']['value'])) {
							ob_start();
							\Elementor\Icons_Manager::render_icon($item['tab_icon'], ['aria-hidden' => 'true']);
							$icon_html = ob_get_clean();
						}

						$this->add_render_attribute($tab_id, [
							'id' => $tab_id,
							'class' => ['dstabify-tab-title', 'dstabify-icon-' . $icon_position, $active_class],
							'aria-selected' => $tab_count === $active_tab ? 'true' : 'false',
							'data-tab' => $tab_count,
							'role' => 'tab',
							'aria-controls' => 'dstabify-tab-content-' . $id_int . $tab_count,
							'tabindex' => $tab_count === $active_tab ? '0' : '-1',
						]);
					?>
						<div <?php $this->print_render_attribute_string($tab_id); ?>>
							<?php if ($icon_html) : ?>
								<?php if ($icon_position === 'top' || $icon_position === 'bottom') : ?>
									<div class="dstabify-icon-wrapper dstabify-icon-wrapper-<?php echo esc_attr($icon_position); ?>">
										<span class="dstabify-tab-icon"><?php echo $icon_html; ?></span>
										<span class="dstabify-tab-title-text"><?php echo esc_html($item['dstabify_tab_title']); ?></span>
									</div>
								<?php else : ?>
									<div class="dstabify-tab-title-inner">
										<?php if ($icon_position === 'left') : ?>
											<span class="dstabify-tab-icon"><?php echo $icon_html; ?></span>
										<?php endif; ?>
										<span class="dstabify-tab-title-text"><?php echo esc_html($item['dstabify_tab_title']); ?></span>
										<?php if ($icon_position === 'right') : ?>
											<span class="dstabify-tab-icon"><?php echo $icon_html; ?></span>
										<?php endif; ?>
									</div>
								<?php endif; ?>
							<?php else : ?>
								<span class="dstabify-tab-title-text"><?php echo esc_html($item['dstabify_tab_title']); ?></span>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>




				<div class="dstabify-tabs-content-wrapper">
					<?php
					$this->render_tab_contents($tabs, $id_int, $active_tab, $settings); ?>
				</div>

			</div>
		</div>
		<?php
	}

	protected function render_tab_contents($tabs, $id_int, $active_tab, $settings)
	{

		$heading_tag = 	!empty($settings['dstabify_tab_heading_tag']) ? $settings['dstabify_tab_heading_tag'] : 'h2';
		$image_position = $settings['image_position'] ?? 'left';
		foreach ($tabs as $index => $item) :
			$tab_count = $index + 1;
			$tab_content_id = 'dstabify-tab-content-' . $id_int . $tab_count;
			$active_class = $tab_count === $active_tab ? 'dstabify-active' : '';
			$image_url = $item['dstabify_tab_image']['url'] ?? '';
			$has_image = !empty($image_url);
			$btn_text = $item['dstabify_tab_button_text'] ?? '';
			$btn_link = $item['dstabify_tab_button_link'] ?? [];



			$this->add_render_attribute($tab_content_id, [
				'id' => $tab_content_id,
				'class' => [
					'dstabify-tab-content',
					'elementor-repeater-item-' . $item['_id'],
					$active_class,
					'image-position-' . esc_attr($image_position),
					$has_image ? 'has-image' : 'no-image'
				],
				'data-tab' => $tab_count,
				'role' => 'tabpanel',
				'aria-labelledby' => 'dstabify-tab-title-' . $id_int . $tab_count,
			]);

			if ($tab_count !== $active_tab) {
				$this->add_render_attribute($tab_content_id, 'hidden', 'hidden');
			}
		?>
			<div <?php $this->print_render_attribute_string($tab_content_id); ?>>
				<div class="dstabify-card-content-wrapper">
					<div class="dstabify-card-left-section">

						<?php
						if (!empty($item['dstabify_tab_heading'])) {

							$heading_tag = !empty($heading_tag) ? $heading_tag : 'h3'; // Default fallback
							printf(
								'<%1$s class="uptab-header">%2$s</%1$s>',
								tag_escape($heading_tag),
								esc_html($item['dstabify_tab_heading'])
							);
						}
						?>


						<div class="uptab-description">


							<p class="dstabify-card-description"><?php echo esc_html($item['dstabify_tab_description']); ?></p>
						</div>
						<?php if (!empty($btn_text)) : ?>
							<div class="uptab-card-button-wrapper">
								<a class="dstabify-card-button" href="<?php echo esc_url($btn_link['url']); ?>" <?php echo $btn_link['is_external'] ? 'target="_blank"' : ''; ?> <?php echo $btn_link['nofollow'] ? 'rel="nofollow"' : ''; ?>>
									<?php echo esc_html($btn_text); ?>
								</a>
							</div>
						<?php endif; ?>
					</div>

					<?php if ($has_image) : ?>
						<div class="dstabify-card-image">
							<?php echo \Elementor\Group_Control_Image_Size::print_attachment_image_html($item, 'thumbnail', 'dstabify_tab_image'); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
<?php endforeach;
	}
}
