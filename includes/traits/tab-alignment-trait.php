<?php

// Elementor Classes
use \Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;

trait TabAlignmentTrait

{

	function uptabs_tab_alignment(){

		// $this->add_responsive_control(
		// 	'uptabs_tabs_position',
		// 	[
		// 		'label'       => esc_html__('Tab Position', 'uptabs'),
		// 		'type'        => Controls_Manager::CHOOSE,
		// 		'options'     => [
		// 			'column'        => ['title' => esc_html__('Top', 'uptabs'),    'icon' => 'eicon-v-align-top'],
		// 			'column-reverse' => ['title' => esc_html__('Bottom', 'uptabs'), 'icon' => 'eicon-v-align-bottom'],
		// 			'row'     => ['title' => esc_html__('Left', 'uptabs'),   'icon' => 'eicon-h-align-left'],
		// 			'row-reverse'    => ['title' => esc_html__('Right', 'uptabs'),  'icon' => 'eicon-h-align-right'],
		// 		],
		// 		'default'     => 'column',
		// 		// 'prefix_class' => 'uptabs-tabs-view-',
		// 		'render_type' => 'template',
		// 		'selectors'   => [
		// 			// 1. Main flex-direction control
		// 			'{{WRAPPER}} .uptabs-tabs-inner' => 'flex-direction: {{VALUE}};',
		// 		],

		// 	]
		// );

		
		$this->add_responsive_control(
			'uptabs_tabs_position',
			[
				'label'   => esc_html__('Tab Position', 'uptabs'),
				'type'    => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'column'         => ['title' => esc_html__('Top', 'uptabs'),    'icon' => 'eicon-v-align-top'],
					'column-reverse' => ['title' => esc_html__('Bottom', 'uptabs'), 'icon' => 'eicon-v-align-bottom'],
					'row'            => ['title' => esc_html__('Left', 'uptabs'),   'icon' => 'eicon-h-align-left'],
					'row-reverse'    => ['title' => esc_html__('Right', 'uptabs'),  'icon' => 'eicon-h-align-right'],
				],
				'default'     => 'column',
				'render_type' => 'template',

				// Map each choice to variables:
				//  --tabs-inner   → flex-direction for .uptabs-tabs-inner
				//  --tabs-wrapper → flex-direction for .uptabs-tabs-wrapper (row for top/bottom, column for left/right)
				//  --tabs-aside   → width/flex-basis of the header column (only used for left/right)
				// 'selectors_dictionary' => [
				// 	'column'         => '--tabs-inner:column; --tabs-wrapper:row; --tabs-aside:auto; --cw-top:none; --cw-right:initial; --cw-bottom:initial; --cw-left:initial;',
				// 	'column-reverse' => '--tabs-inner:column-reverse; --tabs-wrapper:row; --tabs-aside:auto; --cw-top:initial; --cw-right:initial; --cw-bottom:none; --cw-left:initial;',
				// 	'row'            => '--tabs-inner:row; --tabs-wrapper:column; --tabs-aside:var(--tabs-aside-user, 20%); --cw-top:initial; --cw-right:initial; --cw-bottom:initial; --cw-left:none;',
				// 	'row-reverse'    => '--tabs-inner:row-reverse; --tabs-wrapper:column; --tabs-aside:var(--tabs-aside-user, 20%); --cw-top:initial; --cw-right:none; --cw-bottom:initial; --cw-left:initial;',
				// ],

				// keep your existing control, just extend selectors_dictionary:
				// 'selectors_dictionary' => [
				// 	'column'         => '--tabs-inner:column; --tabs-wrapper:row; --tabs-aside:auto; --is-vertical:0; --cw-top:none; --cw-right:initial; --cw-bottom:initial; --cw-left:initial; --tabs-x:auto; --tabs-y:hidden; --tabs-white-space:nowrap; --tabs-wrap:nowrap;',
				// 	'column-reverse' => '--tabs-inner:column-reverse; --tabs-wrapper:row; --tabs-aside:auto; --is-vertical:0; --cw-top:initial; --cw-right:initial; --cw-bottom:none; --cw-left:initial; --tabs-x:auto; --tabs-y:hidden; --tabs-white-space:nowrap; --tabs-wrap:nowrap;',
				// 	'row'            => '--tabs-inner:row; --tabs-wrapper:column; --tabs-aside:var(--tabs-aside-user,20%); --is-vertical:1; --cw-top:initial; --cw-right:initial; --cw-bottom:initial; --cw-left:none; --tabs-x:hidden; --tabs-y:auto; --tabs-white-space:normal; --tabs-wrap:wrap;',
				// 	'row-reverse'    => '--tabs-inner:row-reverse; --tabs-wrapper:column; --tabs-aside:var(--tabs-aside-user,20%); --is-vertical:1; --cw-top:initial; --cw-right:none; --cw-bottom:initial; --cw-left:initial; --tabs-x:hidden; --tabs-y:auto; --tabs-white-space:normal; --tabs-wrap:wrap;',
				// ],

				'selectors_dictionary' => [
					'column'         => '--tabs-inner:column; --tabs-wrapper:row; --tabs-aside:auto; --is-vertical:0; --cw-top:none; --cw-right:initial; --cw-bottom:initial; --cw-left:initial; --tabs-x:auto; --tabs-y:hidden; --tabs-white-space:nowrap; --tabs-wrap:nowrap; --tab-title-ws:nowrap;',
					'column-reverse' => '--tabs-inner:column-reverse; --tabs-wrapper:row; --tabs-aside:auto; --is-vertical:0; --cw-top:initial; --cw-right:initial; --cw-bottom:none; --cw-left:initial; --tabs-x:auto; --tabs-y:hidden; --tabs-white-space:nowrap; --tabs-wrap:nowrap; --tab-title-ws:nowrap;',
					'row'            => '--tabs-inner:row; --tabs-wrapper:column; --tabs-aside:var(--tabs-aside-user,20%); --is-vertical:1; --cw-top:initial; --cw-right:initial; --cw-bottom:initial; --cw-left:none; --tabs-x:hidden; --tabs-y:auto; --tabs-white-space:normal; --tabs-wrap:wrap; --tab-title-ws:normal;',
					'row-reverse'    => '--tabs-inner:row-reverse; --tabs-wrapper:column; --tabs-aside:var(--tabs-aside-user,20%); --is-vertical:1; --cw-top:initial; --cw-right:none; --cw-bottom:initial; --cw-left:initial; --tabs-x:hidden; --tabs-y:auto; --tabs-white-space:normal; --tabs-wrap:wrap; --tab-title-ws:normal;',
				],



				'selectors' => [
					// apply per breakpoint to the widget root
					'{{WRAPPER}} .uptabs-tabs' => '{{VALUE}}',	
				],
			]
		);






		// $this->add_responsive_control(
		// 	'uptabs_tabs_justify',
		// 	[
		// 		'label' => esc_html__('Justify', 'uptabs'),
		// 		'type' => Controls_Manager::CHOOSE,
		// 		'options' => [
		// 			'start' => [
		// 				'title' => esc_html__('Start', 'uptabs'),
		// 				'icon' => 'eicon-align-start-h',
		// 			],
		// 			'center' => [
		// 				'title' => esc_html__('Center', 'uptabs'),
		// 				'icon' => 'eicon-align-center-h', // ✅ fixed icon
		// 			],
		// 			'end' => [
		// 				'title' => esc_html__('End', 'uptabs'),
		// 				'icon' => 'eicon-align-end-h',
		// 			],
		// 			'stretch' => [
		// 				'title' => esc_html__('Stretch', 'uptabs'),
		// 				'icon' => 'eicon-align-stretch-h',
		// 			],
		// 		],
		// 		'default' => 'center',
		// 		'prefix_class' => 'uptabs-tabs-align-', // ✅ applies alignment class
		// 	]
		// );

		$this->add_responsive_control(
			'uptabs_tabs_justify',
			[
				'label'   => esc_html__('Justify', 'uptabs'),
				'type'    => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'start'   => ['title' => esc_html__('Start',   'uptabs'), 'icon' => 'eicon-align-start-h'],
					'center'  => ['title' => esc_html__('Center',  'uptabs'), 'icon' => 'eicon-align-center-h'],
					'end'     => ['title' => esc_html__('End',     'uptabs'), 'icon' => 'eicon-align-end-h'],
					'stretch' => ['title' => esc_html__('Stretch', 'uptabs'), 'icon' => 'eicon-align-stretch-h'],
				],
				'default' => 'center',

				// Map the choice to TWO CSS variables in one go.
				// (Elementor applies this per breakpoint for the selector below.)
				'selectors_dictionary' => [
					// justify + grow
					'start'   => '--tabs-justify:flex-start; --tabs-grow:0;',
					'center'  => '--tabs-justify:center;     --tabs-grow:0;',
					'end'     => '--tabs-justify:flex-end;   --tabs-grow:0;',
					'stretch' => '--tabs-justify:flex-start; --tabs-grow:1; --tabs-wrap:wrap; --tabs-basis:0;',
				],
				'selectors' => [
					// IMPORTANT: we drop the property name and inject the whole declaration string
					'{{WRAPPER}} .uptabs-tabs-wrapper' => '{{VALUE}}',
				],
			]
		);


		$this->add_responsive_control(
			'uptabs_title_align',
			[
				'label' => esc_html__('Title Align', 'uptabs'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [

					'start' => ['title' => esc_html__('Start', 'uptabs'), 'icon' => 'eicon-text-align-left'],
					'center' => ['title' => esc_html__('Center', 'uptabs'), 'icon' => 'eicon-text-align-center'],
					'end' => ['title' => esc_html__('End', 'uptabs'), 'icon' => 'eicon-text-align-right'],

				],
				'default' => 'center',
				'selectors'   => [
					'{{WRAPPER}} .uptabs-tab-title'  => 'justify-content: {{VALUE}};',
				],


			]
		);

		$this->add_responsive_control(
			'uptabs_width',
			[
				'label' => esc_html__('Width', 'uptabs'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%', 'em', 'rem', 'custom'],
				'default' => ['size' => 10, 'unit' => '%'],
				'range' => [
					'px' => ['min' => 20, 'max' => 500],
					'%' => ['min' => 10, 'max' => 50],
					'em' => ['min' => 1, 'max' => 50],
					'rem' => ['min' => 1, 'max' => 50],
				],
				'selectors' => [
					// '{{WRAPPER}}.uptabs-position-row .uptabs-tabs-inner > .uptabs-tabs-wrapper' => 'width: {{SIZE}}{{UNIT}}; flex: 0 0 {{SIZE}}{{UNIT}};',
					// '{{WRAPPER}}.uptabs-position-row-reverse .uptabs-tabs-inner > .uptabs-tabs-wrapper' => 'width: {{SIZE}}{{UNIT}}; flex: 0 0 {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .uptabs-position-row .uptabs-tabs-wrapper, .uptabs-position-row-reverse .uptabs-tabs-wrapper' => 'flex-basis: {{SIZE}}{{UNIT}}'
				],
				'condition' => ['uptabs_tabs_position' => ['row', 'row-reverse']],
			]
		);

		
	}
}