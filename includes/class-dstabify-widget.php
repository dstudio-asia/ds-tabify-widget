<?php

use Elementor\Controls_Manager;
use Elementor\Plugin;
use Elementor\Group_Control_Text_Stroke;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Image_Size;

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

		$repeater->add_control(
			'dstabify_tab_title',
			[
				'label' => esc_html__('Title', 'dstabify'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Tab Title', 'dstabify'),
				'placeholder' => esc_html__('Tab Title', 'dstabify'),
				'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
			]
		);
		$repeater->add_control(
			'tab_icon',
			[
				'label' => esc_html__('Icon', 'plugin-name'),
				'type' => Controls_Manager::ICONS,
				'label_block' => true,
				'default' => [
					'value' => '',
					'library' => 'fa-solid',
				],
				'skin' => 'inline',
				'include' => [
					'fa-solid',
					'svg',
				],
			]
		);

		// $repeater->add_control(
		// 	'tab_icon_position',
		// 	[
		// 		'label' => esc_html__('Icon Position', 'plugin-name'),
		// 		'type' => Controls_Manager::SELECT,
		// 		'default' => 'left',
		// 		'options' => [
		// 			'left' => esc_html__('Left', 'plugin-name'),
		// 			'right' => esc_html__('Right', 'plugin-name'),
		// 			'top' => esc_html__('Top', 'plugin-name'),
		// 		],
		// 		'condition' => [
		// 			'tab_icon[value]!' => '',
		// 		],
		// 	]
		// );

		// $repeater->add_responsive_control(
		// 	'tab_icon_spacing',
		// 	[
		// 		'label' => esc_html__('Icon Spacing', 'plugin-name'),
		// 		'type' => \Elementor\Controls_Manager::SLIDER,
		// 		'range' => [
		// 			'px' => ['min' => 0, 'max' => 50],
		// 		],
		// 		'default' => ['size' => 8, 'unit' => 'px'],
		// 		'selectors' => [
		// 			'{{WRAPPER}} .dstabify-icon-position-left' => 'margin-right: {{SIZE}}{{UNIT}}!important;',
		// 		],
		// 		// 'condition' => [
		// 		// 	'tab_icon[value]!' => '',
		// 		// 	'tab_icon_position' => 'left',
		// 		// ],
		// 	]
		// );

		// $repeater->add_control(
		// 	'tab_content',
		// 	[
		// 		'label' => esc_html__('Content', 'dstabify'),
		// 		'type' => Controls_Manager::WYSIWYG,
		// 		'default' => esc_html__('Tab Content', 'dstabify'),
		// 		'placeholder' => esc_html__('Tab Content', 'dstabify'),
		// 	]
		// );
		$repeater->add_control(
			'dstabify_tab_heading',
			[
				'label' => esc_html__('Heading', 'dstabify'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Your Card Heading', 'dstabify'),
			]
		);

		$repeater->add_control(
			'dstabify_tab_description',
			[
				'label' => esc_html__('Description', 'dstabify'),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__('Your card description here.', 'dstabify'),
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

		$repeater->add_control(
			'dstabify_tab_image',
			[
				'label' => esc_html__('Choose Image', 'dstabify'),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		// $repeater->add_control(
		// 	'dstabify_tab_image_position',
		// 	[
		// 		'label' => esc_html__('Image Position', 'dstabify'),
		// 		'type' => \Elementor\Controls_Manager::SELECT,
		// 		'default' => 'left',
		// 		'options' => [
		// 			'left' => esc_html__('Left', 'dstabify'),
		// 			'right' => esc_html__('Right', 'dstabify'),
		// 		],
		// 	]
		// );
		$repeater->add_control(
			'image_position',
			[
				'label' => esc_html__('Image Position', 'dstabify'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__('Left', 'dstabify'),
						'icon' => 'eicon-h-align-left',
					],
					'right' => [
						'title' => esc_html__('Right', 'dstabify'),
						'icon' => 'eicon-h-align-right',
					],
					'top' => [
						'title' => esc_html__('Top', 'dstabify'),
						'icon' => 'eicon-v-align-top',
					],
					'bottom' => [
						'title' => esc_html__('Bottom', 'dstabify'),
						'icon' => 'eicon-v-align-bottom',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .dstabify-tabs .dstabify-tab-content[data-tab="{{CURRENT_ITEM}}"] .dstabify-card-content-wrapper' => 'flex-direction: {{VALUE}};',
				],
				'default' => 'left',
				// 'condition' => [
				// 	'card_style' => 'image',
				// ],
				'prefix_class' => 'image-position-',
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



		$repeater->add_control(
			'tab_id',
			[
				'label' => esc_html__('Tab ID/Slug', 'dstabify'),
				'type' => Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => esc_html__('tab-1', 'dstabify'),
			]
		);

		$is_nested_tabs_active = Plugin::$instance->widgets_manager->get_widget_types('nested-tabs');

		if ($is_nested_tabs_active) {
			$this->add_deprecation_message(
				'3.8.0',
				esc_html__(
					'You are currently editing a Tabs Widget in its old version. Any new tabs widget dragged into the canvas will be the new Tab widget, with the improved Nested capabilities.',
					'dstabify'
				),
				'nested-tabs'
			);
		}

		$this->add_control(
			'tabs',
			[
				'label' => esc_html__('Tabs Items', 'dstabify'),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'dstabify_tab_title' => esc_html__('Tab #1', 'dstabify'),
						'tab_content' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'dstabify'),
					],
					[
						'dstabify_tab_title' => esc_html__('Tab #2', 'dstabify'),
						'tab_content' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'dstabify'),
					],
				],
				'title_field' => '{{{ dstabify_tab_title }}}',
			]
		);



		$this->add_control(
			'position',
			[
				'label' => esc_html__('Direction', 'dstabify'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'horizontal' => [
						'title' => esc_html__('Top', 'dstabify'),
						'icon' => 'eicon-v-align-top',
					],
					'horizontal-bottom' => [
						'title' => esc_html__('Bottom', 'dstabify'),
						'icon' => 'eicon-v-align-bottom',
					],
					'vertical-left' => [
						'title' => esc_html__('Left', 'dstabify'),
						'icon' => 'eicon-h-align-left',
					],
					'vertical-right' => [
						'title' => esc_html__('Right', 'dstabify'),
						'icon' => 'eicon-h-align-right',
					],
				],
				'default' => 'horizontal',
				'prefix_class' => 'dstabify-tabs-view-',
				'render_type' => 'template',
			]
		);

		$this->add_control(
			'dstabify_tabs_justify',
			[
				'label' => esc_html__('Justify', 'dstabify'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'start' => [
						'title' => esc_html__('Start', 'dstabify'),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__('Center', 'dstabify'),
						'icon' => 'eicon-text-align-center',
					],
					'end' => [
						'title' => esc_html__('End', 'dstabify'),
						'icon' => 'eicon-text-align-right',
					],
					'stretch' => [
						'title' => esc_html__('Stretch', 'dstabify'),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'default' => 'start',
				'prefix_class' => 'dstabify-tabs-align-',

			]
		);

		$this->add_control(
			'dstabify_width',
			[
				'label' => esc_html__('Width', 'dstabify'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%', 'em', 'rem', 'custom'],
				'default' => [
					'unit' => '%',
				],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 500,
					],
					'%' => [
						'min' => 10,
						'max' => 50,
					],
					'em' => [
						'min' => 1,
						'max' => 50,
					],
					'rem' => [
						'min' => 1,
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}}.dstabify-tabs-view-vertical-left .dstabify-tabs-wrapper, 
					{{WRAPPER}}.dstabify-tabs-view-vertical-right .dstabify-tabs-wrapper' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.dstabify-tabs-view-horizontal .dstabify-tabs-wrapper,
					{{WRAPPER}}.dstabify-tabs-view-horizontal-bottom .dstabify-tabs-wrapper' => 'height: {{SIZE}}{{UNIT}}; ',
				],
				'condition' => [
					'position' => ['vertical-left', 'vertical-right'],
				],
			]
		);

		// $this->add_control(
		// 	'image_position',
		// 	[
		// 		'label' => esc_html__('Image Position', 'dstabify'),
		// 		'type' => \Elementor\Controls_Manager::CHOOSE,
		// 		'options' => [
		// 			'left' => [
		// 				'title' => esc_html__('Left', 'dstabify'),
		// 				'icon' => 'eicon-h-align-left',
		// 			],
		// 			'right' => [
		// 				'title' => esc_html__('Right', 'dstabify'),
		// 				'icon' => 'eicon-h-align-right',
		// 			],
		// 			'top' => [
		// 				'title' => esc_html__('Top', 'dstabify'),
		// 				'icon' => 'eicon-v-align-top',
		// 			],
		// 			'bottom' => [
		// 				'title' => esc_html__('Bottom', 'dstabify'),
		// 				'icon' => 'eicon-v-align-bottom',
		// 			],
		// 		],
		// 		'default' => 'left',
		// 		// 'condition' => [
		// 		// 	'card_style' => 'image',
		// 		// ],
		// 		'prefix_class' => 'image-position-',
		// 	]
		// );


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

		$this->start_controls_section(
			'section_tab_style',
			[
				'label' => esc_html__('Tabs', 'plugin-name'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'tab_gap',
			[
				'label' => esc_html__('Gap Between Tabs', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'size' => 4,
					'unit' => 'px',
				],
				'selectors' => [

					// Horizontal top
					'{{WRAPPER}}.dstabify-tabs-view-horizontal .dstabify-tab-title:not(:last-child)' => 'margin-right: {{SIZE}}{{UNIT}};',
					// Horizontal bottom
					'{{WRAPPER}}.dstabify-tabs-view-horizontal-bottom .dstabify-tab-title:not(:last-child)' => 'margin-right: {{SIZE}}{{UNIT}};',
					// Vertical left/right
					'{{WRAPPER}}.dstabify-tabs-view-vertical-left .dstabify-tab-title:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.dstabify-tabs-view-vertical-right .dstabify-tab-title:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				// 'condition' => [
				// 	'position!' => 'horizontal-bottom',
				// ]
			]
		);

		$this->add_responsive_control(
			'content_spacing',
			[
				'label' => esc_html__('Distance from content', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'size' => 0,
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}}.dstabify-tabs-view-horizontal .dstabify-tabs-content-wrapper' => 'margin-top: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.dstabify-tabs-view-horizontal-bottom .dstabify-tabs-content-wrapper' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.dstabify-tabs-view-vertical-left .dstabify-tabs-content-wrapper' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.dstabify-tabs-view-vertical-right .dstabify-tabs-content-wrapper' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
				// 'condition' => [
				// 	'position' =>  ['horizontal', 'horizontal-bottom'],
				// ],
			]
		);
		$this->start_controls_tabs('tabs_style_tabs');


		$this->start_controls_tab(
			'tab_style_normal',
			[
				'label' => esc_html__('Normal', 'plugin-name'),
			]
		);

		$this->add_control(
			'tab_bg_color',
			[
				'label' => esc_html__('Background Color', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dstabify-tab-title' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'tab_text_color',
			[
				'label' => esc_html__('Text Color', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dstabify-tab-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_style_hover',
			[
				'label' => esc_html__('Hover', 'plugin-name'),
			]
		);

		$this->add_control(
			'tab_hover_bg_color',
			[
				'label' => esc_html__('Background Color', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dstabify-tab-title:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'tab_hover_text_color',
			[
				'label' => esc_html__('Text Color', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dstabify-tab-title:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_style_active',
			[
				'label' => esc_html__('Active', 'plugin-name'),
			]
		);

		$this->add_control(
			'tab_active_bg_color',
			[
				'label' => esc_html__('Background Color', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dstabify-tab-title.dstabify-active' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'tab_active_text_color',
			[
				'label' => esc_html__('Text Color', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dstabify-tab-title.dstabify-active' => 'color: {{VALUE}};',
				],
			]
		);



		$this->end_controls_tab();

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'tab_border',
				'label' => esc_html__('Border', 'plugin-name'),
				'selector' => '{{WRAPPER}} .dstabify-tab-title',
			]
		);

		$this->add_control(
			'tab_border_radius',
			[
				'label' => esc_html__('Border Radius', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .dstabify-tab-title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'tab_padding',
			[
				'label' => esc_html__('Padding', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .dstabify-tab-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tabs();
		$this->end_controls_section();








		// $this->add_control(
		// 	'border_width',
		// 	[
		// 		'label' => esc_html__('Border Width', 'dstabify'),
		// 		'type' => Controls_Manager::SLIDER,
		// 		'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
		// 		'default' => [
		// 			'size' => 1,
		// 		],
		// 		'range' => [
		// 			'px' => [
		// 				'max' => 20,
		// 			],
		// 			'em' => [
		// 				'max' => 2,
		// 			],
		// 		],
		// 		'selectors' => [
		// 			'{{WRAPPER}} .dstab-tab-title, {{WRAPPER}} .dstab-tab-content, {{WRAPPER}} .dstab-tabs-content-wrapper' => 'border-width: {{SIZE}}{{UNIT}};',
		// 		],
		// 	]
		// );

		// $this->add_control(
		// 	'border_color',
		// 	[
		// 		'label' => esc_html__('Border Color', 'dstabify'),
		// 		'type' => Controls_Manager::COLOR,
		// 		'selectors' => [
		// 			'{{WRAPPER}} .dstab-tab-title, {{WRAPPER}} .dstab-tab-title.dstab-active, {{WRAPPER}} .dstab-tab-content, {{WRAPPER}} .dstab-tabs-content-wrapper' => 'border-color: {{VALUE}};',
		// 		],
		// 	]
		// );

		// $this->add_control(
		// 	'background_color',
		// 	[
		// 		'label' => esc_html__('Background Color', 'dstabify'),
		// 		'type' => Controls_Manager::COLOR,
		// 		'selectors' => [
		// 			'{{WRAPPER}} .dstab-tab-title.dstab-active' => 'background-color: {{VALUE}};',
		// 			'{{WRAPPER}} .dstab-tabs-content-wrapper' => 'background-color: {{VALUE}};',
		// 		],
		// 	]
		// );






		// $this->add_control(
		// 	'heading_title',
		// 	[
		// 		'label' => esc_html__('Title', 'dstabify'),
		// 		'type' => Controls_Manager::HEADING,
		// 		'separator' => 'before',
		// 	]
		// );

		// $this->add_control(
		// 	'tab_color',
		// 	[
		// 		'label' => esc_html__('Color', 'dstabify'),
		// 		'type' => Controls_Manager::COLOR,
		// 		'selectors' => [
		// 			'{{WRAPPER}} .dstab-tab-title' => 'color: {{VALUE}}',
		// 		],
		// 		'global' => [
		// 			'default' => Global_Colors::COLOR_PRIMARY,
		// 		],
		// 	]
		// );

		// $this->add_control(
		// 	'tab_active_color',
		// 	[
		// 		'label' => esc_html__('Active Color', 'dstabify'),
		// 		'type' => Controls_Manager::COLOR,
		// 		'selectors' => [
		// 			'{{WRAPPER}} .dstab-tab-title.dstab-active' => 'color: {{VALUE}}',
		// 		],
		// 		'global' => [
		// 			'default' => Global_Colors::COLOR_ACCENT,
		// 		],
		// 	]
		// );

		$this->start_controls_section(
			'section_tab_title_style',
			[
				'label' => esc_html__('Tab Title', 'dstabify'),
				'tab' => Controls_Manager::TAB_STYLE,
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

		$this->add_control(
			'tab_title_color',
			[
				'label' => esc_html__('Title Color', 'dstabify'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dstabify-tab-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'tab_title_active_color',
			[
				'label' => esc_html__('Active Title Color', 'dstabify'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dstabify-tab-title.dstabify-active' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_tab_icon_style',
			[
				'label' => esc_html__('Tab Icon', 'dstabify'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Icon Position (top, bottom, left, right)
		$this->add_control(
			'tab_icon_position',
			[
				'label' => esc_html__('Icon Position', 'dstabify'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__('Left', 'dstabify'),
						'icon' => 'eicon-h-align-left',
					],
					'right' => [
						'title' => esc_html__('Right', 'dstabify'),
						'icon' => 'eicon-h-align-right',
					],
					'top' => [
						'title' => esc_html__('Top', 'dstabify'),
						'icon' => 'eicon-v-align-top',
					],
					'bottom' => [
						'title' => esc_html__('Bottom', 'dstabify'),
						'icon' => 'eicon-v-align-bottom',
					],
				],
				'toggle' => false,
				'default' => 'left',
			]
		);



		// Icon Size
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

		// Icon Spacing
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

		// Tabs: Normal, Hover, Active
		$this->start_controls_tabs('tab_icon_color_tabs');

		// Normal
		$this->start_controls_tab(
			'tab_icon_normal',
			[
				'label' => esc_html__('Normal', 'dstabify'),
			]
		);
		$this->add_control(
			'tab_icon_color_normal',
			[
				'label' => esc_html__('Color', 'dstabify'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dstabify-tab-icon svg' => 'fill: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();

		// Hover
		$this->start_controls_tab(
			'tab_icon_hover',
			[
				'label' => esc_html__('Hover', 'dstabify'),
			]
		);
		$this->add_control(
			'tab_icon_color_hover',
			[
				'label' => esc_html__('Color', 'dstabify'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dstabify-tab-title:hover .dstabify-tab-icon svg' => 'fill: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();

		// Active
		$this->start_controls_tab(
			'tab_icon_active',
			[
				'label' => esc_html__('Active', 'dstabify'),
			]
		);
		$this->add_control(
			'tab_icon_color_active',
			[
				'label' => esc_html__('Color', 'dstabify'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dstabify-tab-title.dstabify-active .dstabify-tab-icon svg' => 'fill: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();




		$this->start_controls_section(
			'section_tab_content_style',
			[
				'label' => esc_html__('Tab Content', 'dstabify'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'content_color',
			[
				'label' => esc_html__('Content Color', 'dstabify'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dstabify-tab-content' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .dstabify-tab-content',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'content_shadow',
				'selector' => '{{WRAPPER}} .dstabify-tab-content',
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
		$active_tab = !empty($settings['active_tab']) ? intval($settings['active_tab']) : 1;
		$position = !empty($settings['position']) ? $settings['position'] : 'horizontal';
		$id_int = substr($this->get_id_int(), 0, 3);

		$this->add_render_attribute('dstabify-tabs', [
			'class' => 'dstabify-tabs dstabify-tabs-view-' . $position,
			'data-active-tab' => $active_tab,
		]);
?>
		<div <?php $this->print_render_attribute_string('dstabify-tabs'); ?>>
			<div class="dstabify-tabs-inner">
				<?php if ($position === 'horizontal-bottom') : ?>
					<div class="dstabify-tabs-content-wrapper">
						<?php $this->render_tab_contents($tabs, $id_int, $active_tab); ?>
					</div>
				<?php endif; ?>

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

				<?php if ($position !== 'horizontal-bottom') : ?>
					<div class="dstabify-tabs-content-wrapper">
						<?php $this->render_tab_contents($tabs, $id_int, $active_tab); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
		<?php
	}







	protected function render_tab_contents($tabs, $id_int, $active_tab)
	{
		foreach ($tabs as $index => $item) :
			$tab_count = $index + 1;
			$tab_content_id = 'dstabify-tab-content-' . $id_int . $tab_count;
			$active_class = $tab_count === $active_tab ? 'dstabify-active' : '';
			$image_url = $item['dstabify_tab_image']['url'] ?? '';
			$has_image = !empty($image_url);
			$btn_text = $item['dstabify_tab_button_text'] ?? '';
			$btn_link = $item['dstabify_tab_button_link'] ?? [];
			// $image_position = $item['dstabify_tab_image_position'] ?? 'left';
			$image_position = $item['image_position'] ?? 'left';


			$this->add_render_attribute($tab_content_id, [
				'id' => $tab_content_id,
				'class' => ['dstabify-tab-content', $active_class],
				'data-tab' => $tab_count,
				'role' => 'tabpanel',
				'aria-labelledby' => 'dstabify-tab-title-' . $id_int . $tab_count,
			]);

			if ($tab_count !== $active_tab) {
				$this->add_render_attribute($tab_content_id, 'hidden', 'hidden');
			}
		?>
			<div <?php $this->print_render_attribute_string($tab_content_id); ?>>
				<div class="dstabify-card-content-wrapper image-position-<?php echo esc_attr($image_position); ?> <?php echo $has_image ? 'has-image' : 'no-image'; ?>">
					<div class="dstabify-card-left-section">
						<h3 class="dstabify-card-heading"><?php echo esc_html($item['dstabify_tab_heading']); ?></h3>
						<p class="dstabify-card-description"><?php echo esc_html($item['dstabify_tab_description']); ?></p>
						<?php if (!empty($btn_text)) : ?>
							<a class="dstabify-card-button" href="<?php echo esc_url($btn_link['url']); ?>" <?php echo $btn_link['is_external'] ? 'target="_blank"' : ''; ?> <?php echo $btn_link['nofollow'] ? 'rel="nofollow"' : ''; ?>>
								<?php echo esc_html($btn_text); ?>
							</a>
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




	protected function content_template()
	{
		?>
		<div class="dstabify-tabs dstabify-tabs-view-{{ settings.position }} dstabify-icon-position-{{ settings.tab_icon_position }}" data-active-tab="{{ settings.active_tab }}">
			<div class="dstabify-tabs-inner">
				<# var idInt=view.getIDInt().toString().substr(0, 3); #>

					<!-- Tabs Title Rendering -->
					<div class="dstabify-tabs-wrapper" role="tablist">
						<# _.each(settings.tabs, function(item, index) {
							var tabCount=index + 1;
							var tabId='dstabify-tab-title-' + idInt + tabCount;
							var hasIcon=item.tab_icon && item.tab_icon.value;
							var iconHTML=elementor.helpers.renderIcon(view, item.tab_icon, { 'aria-hidden' : true }, 'i' , 'object' );
							var iconPosition=item.tab_icon_position || 'left' ;
							#>
							<div id="{{ tabId }}"
								class="dstabify-tab-title <# if (tabCount == settings.active_tab) { #>dstabify-active<# } #>"
								aria-selected="{{ tabCount == settings.active_tab ? 'true' : 'false' }}"
								data-tab="{{ tabCount }}"
								role="tab"
								aria-controls="dstabify-tab-content-{{ idInt + tabCount }}"
								tabindex="{{ tabCount == settings.active_tab ? '0' : '-1' }}">

								<# if (hasIcon) { #>
									<# if (iconPosition==='top' || iconPosition==='bottom' ) { #>
										<div class="dstabify-icon-wrapper dstabify-icon-wrapper-{{ iconPosition }}">
											<span class="dstabify-tab-icon dstabify-icon-position-{{ iconPosition }}">
												{{{ iconHTML.value }}}
											</span>
											<span class="dstabify-tab-title-text">{{{ item.dstabify_tab_title }}}</span>
										</div>
										<# } else { #>
											<div class="dstabify-tab-title-inner dstabify-icon-{{ iconPosition }}">
												<# if (iconPosition==='left' ) { #>
													<span class="dstabify-tab-icon dstabify-icon-position-left">{{{ iconHTML.value }}}</span>
													<# } #>
														<span class="dstabify-tab-title-text">{{{ item.dstabify_tab_title }}}</span>
														<# if (iconPosition==='right' ) { #>
															<span class="dstabify-tab-icon dstabify-icon-position-right">{{{ iconHTML.value }}}</span>
															<# } #>
											</div>
											<# } #>
												<# } else { #>
													<span class="dstabify-tab-title-text">{{{ item.dstabify_tab_title }}}</span>
													<# } #>
							</div>
							<# }); #>
					</div>

					<!-- Tab Content Rendering -->
					<div class="dstabify-tabs-content-wrapper">
						<# _.each(settings.tabs, function(item, index) {
							var tabCount=index + 1;
							var tabContentId='dstabify-tab-content-' + idInt + tabCount;
							var imageUrl=item.dstabify_tab_image && item.dstabify_tab_image.url || '' ;
							var hasImage=imageUrl.length> 0;
							var btn = item.dstabify_tab_button_link || {};
							var imgPos = item.image_position || 'left';
							#>
							<div id="{{ tabContentId }}"
								class="dstabify-tab-content <# if (tabCount == settings.active_tab) { #>dstabify-active<# } #>"
								data-tab="{{ tabCount }}"
								role="tabpanel"
								aria-labelledby="dstabify-tab-title-{{ idInt + tabCount }}"
								<# if (tabCount !=settings.active_tab) { #>hidden="hidden"<# } #>>

									<div class="dstabify-card-content-wrapper image-position-{{ imgPos }} <# if (hasImage) { #>has-image<# } else { #>no-image<# } #>">
										<div class="dstabify-card-left-section">
											<# if (item.dstabify_tab_heading) { #>
												<h3 class="dstabify-card-heading">{{{ item.dstabify_tab_heading }}}</h3>
												<# } #>
													<# if (item.dstabify_tab_description) { #>
														<p class="dstabify-card-description">{{{ item.dstabify_tab_description }}}</p>
														<# } #>
															<# if (item.dstabify_tab_button_text) { #>
																<a class="dstabify-card-button" href="{{ btn.url }}" <# if (btn.is_external) { #>target="_blank"<# } #>
																		<# if (btn.nofollow) { #>rel="nofollow"<# } #>>
																				{{{ item.dstabify_tab_button_text }}}
																</a>
																<# } #>
										</div>

										<# if (hasImage) { #>
											<div class="dstabify-card-image">
												<img src="{{ imageUrl }}" alt="">
											</div>
											<# } #>
									</div>
							</div>
							<# }); #>
					</div>
			</div>
		</div>
<?php
	}
}
