<?php

use Elementor\Controls_Manager;
use Elementor\Plugin;
use Elementor\Group_Control_Text_Stroke;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Typography;

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
				'label' => esc_html__('Tabs', 'elementor'),
			]
		);

		$repeater = new Elementor\Repeater();

		$repeater->add_control(
			'tab_title',
			[
				'label' => esc_html__('Title', 'elementor'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Tab Title', 'elementor'),
				'placeholder' => esc_html__('Tab Title', 'elementor'),
				'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$repeater->add_control(
			'tab_content',
			[
				'label' => esc_html__('Content', 'elementor'),
				'type' => Controls_Manager::WYSIWYG,
				'default' => esc_html__('Tab Content', 'elementor'),
				'placeholder' => esc_html__('Tab Content', 'elementor'),
			]
		);

		$repeater->add_control(
			'tab_icon',
			[
				'label' => esc_html__('Icon', 'elementor'),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'default' => [
					'value' => '',
					'library' => 'solid',
				],
			]
		);
		$repeater->add_control(
			'tab_id',
			[
				'label' => esc_html__('Tab ID/Slug', 'elementor'),
				'type' => Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => esc_html__('tab-1', 'elementor'),
			]
		);

		$is_nested_tabs_active = Plugin::$instance->widgets_manager->get_widget_types('nested-tabs');

		if ($is_nested_tabs_active) {
			$this->add_deprecation_message(
				'3.8.0',
				esc_html__(
					'You are currently editing a Tabs Widget in its old version. Any new tabs widget dragged into the canvas will be the new Tab widget, with the improved Nested capabilities.',
					'elementor'
				),
				'nested-tabs'
			);
		}

		$this->add_control(
			'tabs',
			[
				'label' => esc_html__('Tabs Items', 'elementor'),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'tab_title' => esc_html__('Tab #1', 'elementor'),
						'tab_content' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'elementor'),
					],
					[
						'tab_title' => esc_html__('Tab #2', 'elementor'),
						'tab_content' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'elementor'),
					],
				],
				'title_field' => '{{{ tab_title }}}',
			]
		);

		

		$this->add_control(
			'position',
			[
				'label' => esc_html__('Tab Position', 'elementor'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'horizontal' => [
						'title' => esc_html__('Top', 'elementor'),
						'icon' => 'eicon-v-align-top',
					],
					'horizontal-bottom' => [
						'title' => esc_html__('Bottom', 'elementor'),
						'icon' => 'eicon-v-align-bottom',
					],
					'vertical-left' => [
						'title' => esc_html__('Left', 'elementor'),
						'icon' => 'eicon-h-align-left',
					],
					'vertical-right' => [
						'title' => esc_html__('Right', 'elementor'),
						'icon' => 'eicon-h-align-right',
					],
				],
				'default' => 'horizontal',
				'prefix_class' => 'dstab-tabs-view-',
				'render_type' => 'template',
			]
		);

		$this->add_control(
			'tabs_align',
			[
				'label' => esc_html__('Tabs Alignment', 'elementor'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'start' => [
						'title' => esc_html__('Start', 'elementor'),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__('Center', 'elementor'),
						'icon' => 'eicon-text-align-center',
					],
					'end' => [
						'title' => esc_html__('End', 'elementor'),
						'icon' => 'eicon-text-align-right',
					],
					'stretch' => [
						'title' => esc_html__('Stretch', 'elementor'),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'default' => 'start',
				'prefix_class' => 'dstab-tabs-align-',
				
			]
		);

		$this->add_control(
			'active_tab',
			[
				'label' => esc_html__('Active Tab', 'elementor'),
				'type' => Controls_Manager::NUMBER,
				'default' => 1,
				'frontend_available' => true,
				'description' => esc_html__('Set the default active tab (1-based index).', 'elementor'),
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
					'{{WRAPPER}} .dstab-tab-title' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'tab_text_color',
			[
				'label' => esc_html__('Text Color', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dstab-tab-title' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .dstab-tab-title:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'tab_hover_text_color',
			[
				'label' => esc_html__('Text Color', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dstab-tab-title:hover' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .dstab-tab-title.dstab-active' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'tab_active_text_color',
			[
				'label' => esc_html__('Text Color', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dstab-tab-title.dstab-active' => 'color: {{VALUE}};',
				],
			]
		);



		$this->end_controls_tab();

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'tab_border',
				'label' => esc_html__('Border', 'plugin-name'),
				'selector' => '{{WRAPPER}} .dstab-tab-title',
			]
		);

		$this->add_control(
			'tab_border_radius',
			[
				'label' => esc_html__('Border Radius', 'plugin-name'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%'],
				'selectors' => [
					'{{WRAPPER}} .dstab-tab-title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .dstab-tab-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tabs();
		$this->end_controls_section();

		$this->start_controls_section(
			'section_tabs_style',
			[
				'label' => esc_html__('Tabs', 'elementor'),
				'tab' => Controls_Manager::TAB_STYLE,
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
					'{{WRAPPER}} .dstab-tab-title:not(:last-child)' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.dstab-tabs-view-vertical-left .dstab-tab-title:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.dstab-tabs-view-vertical-right .dstab-tab-title:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'position!' => 'horizontal-bottom',
				]
			]
		);

		$this->add_responsive_control(
			'content_spacing',
			[
				'label' => esc_html__('Content Spacing', 'plugin-name'),
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
					'{{WRAPPER}} .dstab-tabs-content-wrapper' => 'margin-top: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.dstab-tabs-view-horizontal-bottom .dstab-tabs-content-wrapper' => 'margin-top: 0; margin-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.dstab-tabs-view-vertical-left .dstab-tabs-content-wrapper' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}}.dstab-tabs-view-vertical-right .dstab-tabs-content-wrapper' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);


		$this->add_control(
			'navigation_width',
			[
				'label' => esc_html__('Navigation Width', 'elementor'),
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
					'{{WRAPPER}}.dstab-tabs-view-vertical-left .dstab-tabs-wrapper, 
             {{WRAPPER}}.dstab-tabs-view-vertical-right .dstab-tabs-wrapper' => 'width: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}}.dstab-tabs-view-horizontal .dstab-tabs-wrapper,
             {{WRAPPER}}.dstab-tabs-view-horizontal-bottom .dstab-tabs-wrapper' => 'height: {{SIZE}}{{UNIT}}',
				],
				// 'condition' => [
				// 	'type' => 'vertical',
				// ],
			]
		);

		// $this->add_control(
		// 	'border_width',
		// 	[
		// 		'label' => esc_html__('Border Width', 'elementor'),
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
		// 		'label' => esc_html__('Border Color', 'elementor'),
		// 		'type' => Controls_Manager::COLOR,
		// 		'selectors' => [
		// 			'{{WRAPPER}} .dstab-tab-title, {{WRAPPER}} .dstab-tab-title.dstab-active, {{WRAPPER}} .dstab-tab-content, {{WRAPPER}} .dstab-tabs-content-wrapper' => 'border-color: {{VALUE}};',
		// 		],
		// 	]
		// );

		// $this->add_control(
		// 	'background_color',
		// 	[
		// 		'label' => esc_html__('Background Color', 'elementor'),
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
		// 		'label' => esc_html__('Title', 'elementor'),
		// 		'type' => Controls_Manager::HEADING,
		// 		'separator' => 'before',
		// 	]
		// );

		// $this->add_control(
		// 	'tab_color',
		// 	[
		// 		'label' => esc_html__('Color', 'elementor'),
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
		// 		'label' => esc_html__('Active Color', 'elementor'),
		// 		'type' => Controls_Manager::COLOR,
		// 		'selectors' => [
		// 			'{{WRAPPER}} .dstab-tab-title.dstab-active' => 'color: {{VALUE}}',
		// 		],
		// 		'global' => [
		// 			'default' => Global_Colors::COLOR_ACCENT,
		// 		],
		// 	]
		// );

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'tab_typography',
				'selector' => '{{WRAPPER}} .elementor-tab-title',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'text_stroke',
				'selector' => '{{WRAPPER}} .elementor-tab-title',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_shadow',
				'selector' => '{{WRAPPER}} .elementor-tab-title',
			]
		);

		$this->add_control(
			'title_align',
			[
				'label' => esc_html__('Alignment', 'elementor'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__('Left', 'elementor'),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__('Center', 'elementor'),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__('Right', 'elementor'),
						'icon' => 'eicon-text-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-tab-title' => 'text-align: {{VALUE}};',
				],
				'condition' => [
					'tabs_align' => 'stretch',
				],
			]
		);

		$this->add_control(
			'heading_content',
			[
				'label' => esc_html__('Content', 'elementor'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'content_color',
			[
				'label' => esc_html__('Color', 'elementor'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-tab-content' => 'color: {{VALUE}};',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .elementor-tab-content',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'content_shadow',
				'selector' => '{{WRAPPER}} .elementor-tab-content',
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

		$this->add_render_attribute('dstab-tabs', [
			'class' => 'dstab-tabs dstab-tabs-view-' . $position,
			'data-active-tab' => $active_tab,
		]);
?>
		<div <?php $this->print_render_attribute_string('dstab-tabs'); ?>>
			<div class="dstab-tabs-inner">
				<?php if ($position === 'horizontal-bottom') : ?>
					<div class="dstab-tabs-content-wrapper">
						<?php $this->render_tab_contents($tabs, $id_int, $active_tab); ?>
					</div>
				<?php endif; ?>

				<div class="dstab-tabs-wrapper" role="tablist">
					<?php
					foreach ($tabs as $index => $item) :
						$tab_count = $index + 1;
						$tab_id = 'dstab-tab-title-' . $id_int . $tab_count;
						$active_class = $tab_count === $active_tab ? 'dstab-active' : '';

						$this->add_render_attribute($tab_id, [
							'id' => $tab_id,
							'class' => ['dstab-tab-title', 'dstab-tab-desktop-title', $active_class],
							'aria-selected' => $tab_count === $active_tab ? 'true' : 'false',
							'data-tab' => $tab_count,
							'role' => 'tab',
							'aria-controls' => 'dstab-tab-content-' . $id_int . $tab_count,
							'tabindex' => $tab_count === $active_tab ? '0' : '-1',
						]);
					?>
						<div <?php $this->print_render_attribute_string($tab_id); ?>>
							<?php if (!empty($item['tab_icon']['value'])) : ?>
								<span class="dstab-tab-icon"><i class="<?php echo esc_attr($item['tab_icon']['value']); ?>"></i></span>
							<?php endif; ?>
							<span class="dstab-tab-title-text"><?php echo esc_html($item['tab_title']); ?></span>
						</div>
					<?php endforeach; ?>
				</div>

				<?php if ($position !== 'horizontal-bottom') : ?>
					<div class="dstab-tabs-content-wrapper">
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
			$tab_content_id = 'dstab-tab-content-' . $id_int . $tab_count;
			$active_class = $tab_count === $active_tab ? 'dstab-active' : '';

			$this->add_render_attribute($tab_content_id, [
				'id' => $tab_content_id,
				'class' => ['dstab-tab-content', $active_class],
				'data-tab' => $tab_count,
				'role' => 'tabpanel',
				'aria-labelledby' => 'dstab-tab-title-' . $id_int . $tab_count,
			]);

			if ($tab_count !== $active_tab) {
				$this->add_render_attribute($tab_content_id, 'hidden', 'hidden');
			}

			$this->add_inline_editing_attributes($tab_content_id, 'advanced');
		?>
			<div <?php $this->print_render_attribute_string($tab_content_id); ?>>
				<?php echo $item['tab_content']; ?>
			</div>
		<?php endforeach;
	}
	/**
	 * Render tabs widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 2.9.0
	 * @access protected
	 */
	protected function content_template()
	{
		?>
		<div class="dstab-tabs dstab-tabs-view-{{ settings.position }}" data-active-tab="{{ settings.active_tab }}">
			<div class="dstab-tabs-inner">
				<# if ( settings.position==='horizontal-bottom' ) { #>
					<div class="dstab-tabs-wrapper" role="tablist">
						<# _.each( settings.tabs, function( item, index ) {
							var tabCount=index + 1;
							var tabId='dstab-tab-title-' + view.getIDInt().toString().substr(0, 3) + tabCount;
							#>
							<div id="{{ tabId }}" class="dstab-tab-title dstab-tab-desktop-title <# if (tabCount === settings.active_tab) { #>dstab-active<# } #>" aria-selected="{{ tabCount === settings.active_tab ? 'true' : 'false' }}" data-tab="{{ tabCount }}" role="tab" aria-controls="dstab-tab-content-{{ view.getIDInt().toString().substr(0, 3) + tabCount }}" tabindex="{{ tabCount === settings.active_tab ? '0' : '-1' }}">
								<# if (item.tab_icon && item.tab_icon.value) { #>
									<span class="dstab-tab-icon"><i class="{{ item.tab_icon.value }}"></i></span>
									<# } #>
										{{{ item.tab_title }}}
							</div>
							<# }); #>
					</div>
					<div class="dstab-tabs-content-wrapper">
						<# _.each( settings.tabs, function( item, index ) {
							var tabCount=index + 1;
							var tabContentId='dstab-tab-content-' + view.getIDInt().toString().substr(0, 3) + tabCount;
							#>
							<div id="{{ tabContentId }}" class="dstab-tab-content <# if (tabCount === settings.active_tab) { #>dstab-active<# } #>" data-tab="{{ tabCount }}" role="tabpanel" aria-labelledby="dstab-tab-title-{{ view.getIDInt().toString().substr(0, 3) + tabCount }}" <# if (tabCount !==settings.active_tab) { #>hidden="hidden"<# } #>>
									{{{ item.tab_content }}}
							</div>
							<# }); #>
					</div>
					<# } else { #>
						<div class="dstab-tabs-wrapper" role="tablist">
							<# _.each( settings.tabs, function( item, index ) {
								var tabCount=index + 1;
								var tabId='dstab-tab-title-' + view.getIDInt().toString().substr(0, 3) + tabCount;
								#>
								<div id="{{ tabId }}" class="dstab-tab-title dstab-tab-desktop-title <# if (tabCount === settings.active_tab) { #>dstab-active<# } #>" aria-selected="{{ tabCount === settings.active_tab ? 'true' : 'false' }}" data-tab="{{ tabCount }}" role="tab" aria-controls="dstab-tab-content-{{ view.getIDInt().toString().substr(0, 3) + tabCount }}" tabindex="{{ tabCount === settings.active_tab ? '0' : '-1' }}">
									<# if (item.tab_icon && item.tab_icon.value) { #>
										<span class="dstab-tab-icon"><i class="{{ item.tab_icon.value }}"></i></span>
										<# } #>
											{{{ item.tab_title }}}
								</div>
								<# }); #>
						</div>
						<div class="dstab-tabs-content-wrapper">
							<# _.each( settings.tabs, function( item, index ) {
								var tabCount=index + 1;
								var tabContentId='dstab-tab-content-' + view.getIDInt().toString().substr(0, 3) + tabCount;
								#>
								<div id="{{ tabContentId }}" class="dstab-tab-content <# if (tabCount === settings.active_tab) { #>dstab-active<# } #>" data-tab="{{ tabCount }}" role="tabpanel" aria-labelledby="dstab-tab-title-{{ view.getIDInt().toString().substr(0, 3) + tabCount }}" <# if (tabCount !==settings.active_tab) { #>hidden="hidden"<# } #>>
										{{{ item.tab_content }}}
								</div>
								<# }); #>
						</div>
						<# } #>
			</div>
		</div>
<?php
	}
}
