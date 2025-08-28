<?php

use Elementor\Controls_Manager;
use Elementor\Icons_Manager;
use Elementor\Plugin;

if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

class UpTabs_Widget extends \Elementor\Widget_Base
{
	use RepeaterTabsTrait, TabContainerStyleTrait, TabTitleStyleTrait, TabIconStyleTrait, TabContentStyleTrait, TabInfoStyleTrait, TabAlignmentTrait;
	public function get_name()
	{
		return 'uptabs';
	}

	public function get_title()
	{
		return esc_html__('uptabs', 'uptabs');
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


		$this->start_controls_section(
			'uptabs_section_tabs',
			[
				'label' => esc_html__('Tabs', 'uptabs'),
			]
		);
		$this->uptabs_repeater_tabs();



		$this->uptabs_tab_alignment();






		// $this->add_control(
		// 	'active_tab',
		// 	[
		// 		'label' => esc_html__('Active Tab', 'uptabs'),
		// 		'type' => Controls_Manager::NUMBER,
		// 		'default' => 1,
		// 		'frontend_available' => true,
		// 		'description' => esc_html__('Set the default active tab (1-based index).', 'uptabs'),
		// 	]
		// );

		$this->end_controls_section();

		// ===========================================
		// STYLE TAB: TABS CONTAINER
		// ===========================================
		$this->start_controls_section(
			'uptabs_section_tab_container_style',
			[
				'label' => esc_html__('Tabs Container', 'uptabs'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->uptabs_container_style($this);

		$this->end_controls_section();

		// ===========================================
		// STYLE TAB: TAB TITLE
		// ===========================================
		$this->start_controls_section(
			'uptabs_section_tab_title_style',
			[
				'label' => esc_html__('Tab Title', 'uptabs'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs('tabs_title_style');

		$this->uptabs_tab_title_style($this);

		$this->end_controls_section();

		// ===========================================
		// STYLE TAB: TAB ICON
		// ===========================================
		
		$this->uptabs_tab_icon_style($this);


	

		// ===========================================
		// STYLE TAB: TAB CONTENT
		// ===========================================
		$this->start_controls_section(
			'uptabs_section_tab_content_style',
			[
				'label' => esc_html__('Tab Content', 'uptabs'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->uptabs_tab_content_style($this);


		$this->end_controls_section();

		// ===========================================
		// STYLE TAB: TAB INFO STYLE
		// ===========================================
		$this->uptabs_tab_info_style($this);



		// ===========================================
		// CONTENT TAB: Content Tab
		// ===========================================
		$this->start_controls_section(
			'uptabs_section_content_tab',
			[
				'label' => esc_html__('Content Tab', 'marquee-addons-for-elementor'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'uptabs_tab_heading_tag',
			[
				'label' => esc_html__('Heading Tag', 'elementor-addon'),
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
			'uptabs_image_postion',
			[
				'label' => esc_html__('Image Position', 'uptabs'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'right' => ['title' => esc_html__('Left', 'uptabs'), 'icon' => 'eicon-h-align-left'],
					'left' => ['title' => esc_html__('Right', 'uptabs'), 'icon' => 'eicon-h-align-right'],
					'bottom' => ['title' => esc_html__('Top', 'uptabs'), 'icon' => 'eicon-v-align-top'],
					'top' => ['title' => esc_html__('Bottom', 'uptabs'), 'icon' => 'eicon-v-align-bottom'],
				],
				'default' => 'left',
				'toggle' => true,

				// 'prefix_class' => 'uptabs-image-position-'
			]
		);

		$this->add_responsive_control(
			'uptabs_content_align',
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

					'{{WRAPPER}} .uptabs-card-left-section' => 'align-items: {{VALUE}};',

					// Conditional mapping for flex values
					'{{WRAPPER}}.elementor-align-left .uptabs-image-position-bottom .uptabs-card-content-wrapper' => 'align-items: flex-start;',
					'{{WRAPPER}}.elementor-align-center .uptabs-image-position-bottom .uptabs-card-content-wrapper' => 'align-items: center;',
					'{{WRAPPER}}.elementor-align-right .uptabs-image-position-bottom .uptabs-card-content-wrapper' => 'align-items: flex-end;',

					'{{WRAPPER}}.elementor-align-left .uptabs-image-position-top .uptabs-card-content-wrapper' => 'align-items: flex-start;',
					'{{WRAPPER}}.elementor-align-center .uptabs-image-position-top .uptabs-card-content-wrapper' => 'align-items: center;',
					'{{WRAPPER}}.elementor-align-right .uptabs-image-position-top .uptabs-card-content-wrapper' => 'align-items: flex-end;',

					// For left/right positions
					'{{WRAPPER}}.elementor-align-left .uptabs-image-position-left .uptabs-card-content-wrapper' => 'justify-content: flex-start;',
					'{{WRAPPER}}.elementor-align-center .uptabs-image-position-left .uptabs-card-content-wrapper' => 'justify-content: center;',
					'{{WRAPPER}}.elementor-align-right .uptabs-image-position-left .uptabs-card-content-wrapper' => 'justify-content: flex-end;',

					'{{WRAPPER}}.elementor-align-left .uptabs-image-position-right .uptabs-card-content-wrapper' => 'justify-content: flex-start;',
					'{{WRAPPER}}.elementor-align-center .uptabs-image-position-right .uptabs-card-content-wrapper' => 'justify-content: center;',
					'{{WRAPPER}}.elementor-align-right .uptabs-image-position-right .uptabs-card-content-wrapper' => 'justify-content: flex-end;',
				],
				'prefix_class' => 'elementor-align-',
			]
		);

		$this->add_control(
			'uptabs_content_vertical_alignment',
			[
				'label' => esc_html__('Vertical Align (Content)', 'uptabs'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'start' => [
						'title' => esc_html__('Top', 'uptabs'),
						'icon' => 'eicon-v-align-top',
					],
					'center' => [
						'title' => esc_html__('Center', 'uptabs'),
						'icon' => 'eicon-v-align-middle',
					],
					'end' => [
						'title' => esc_html__('Bottom', 'uptabs'),
						'icon' => 'eicon-v-align-bottom',
					],
				],
				'condition' => [
					'uptabs_image_postion' => ['left', 'right'],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .uptabs-card-content-wrapper' => 'justify-content: {{VALUE}};',
					'{{WRAPPER}} .uptabs-image-position-left .uptabs-card-content-wrapper' => 'align-items: {{VALUE}};',
				],

			]
		);




		$this->end_controls_section();
		//Collupsable Section End
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
		$tabs = $settings['uptabs_tabs'];


		// Get active tab - handle both frontend and editor
		$active_tab = 1;
		if (Plugin::$instance->editor->is_edit_mode()) {
			$widget_id = $this->get_id();
			$active_tab = isset($_SESSION['uptabs_active_tab'][$widget_id]) ?
				$_SESSION['uptabs_active_tab'][$widget_id] : (!empty($settings['uptabs_active_tab']) ? intval($settings['uptabs_active_tab']) : 1);
		} else {
			$active_tab = !empty($settings['uptabs_active_tab']) ? intval($settings['uptabs_active_tab']) : 1;
		}

		$position = !empty($settings['uptabs_tabs_position']) ? $settings['uptabs_tabs_position'] : 'column';
		$id_int = substr($this->get_id_int(), 0, 3);


		$this->add_render_attribute('uptabs-tabs', [
			'class' => ['uptabs-tabs', 'uptabs-position-' . $position],
			'data-active-tab' => $active_tab,
		]);
		

		// $this->add_render_attribute('uptabs-tabs', [
		// 	'class' => ['uptabs-tabs'],
		// 	// 'data-position' => $position, // Add as data attribute
		// 	'data-active-tab' => $active_tab,
		// ]);
?>
		<div <?php $this->print_render_attribute_string('uptabs-tabs'); ?>>
			<div class="uptabs-tabs-inner">
				<div class="uptabs-tabs-wrapper" role="tablist">
					<?php foreach ($tabs as $index => $item) :
						$tab_count = $index + 1;
						$tab_id = 'uptabs-tab-title-' . $id_int . $tab_count;
						$active_class = $tab_count === $active_tab ? 'uptabs-active' : '';
						$icon_html = '';
						$icon_position = $settings['uptabs_tab_icon_position'] ?? 'left';

						if (!empty($item['uptabs_tab_icon']['value'])) {
							ob_start();
							Icons_Manager::render_icon($item['uptabs_tab_icon'], ['aria-hidden' => 'true']);
							$icon_html = ob_get_clean();
						}

						$this->add_render_attribute($tab_id, [
							'id' => $tab_id,
							'class' => ['uptabs-tab-title', $active_class],
							'aria-selected' => $tab_count === $active_tab ? 'true' : 'false',
							'data-tab' => $tab_count,
							'role' => 'tab',
							'aria-controls' => 'uptabs-tab-content-' . $id_int . $tab_count,
							'tabindex' => $tab_count === $active_tab ? '0' : '-1',
						]);

						$tab_title = $item['uptabs_tab_title'] . " #" . $tab_count;

					?>
						<div <?php $this->print_render_attribute_string($tab_id); ?>>
							<?php if ($icon_html) : ?>
								<?php if ($icon_position === 'top' || $icon_position === 'bottom') : ?>
									<div class="uptabs-icon-wrapper uptabs-icon-wrapper-<?php echo esc_attr($icon_position); ?>">
										<span class="uptabs-tab-icon"><?php echo $icon_html; ?></span>
										<span class="uptabs-tab-title-text"><?php echo esc_html($tab_title); ?></span>
									</div>
								<?php else : ?>
									<div class="uptabs-tab-title-inner">
										<?php if ($icon_position === 'left') : ?>
											<span class="uptabs-tab-icon"><?php echo $icon_html; ?></span>
										<?php endif; ?>
										<span class="uptabs-tab-title-text"><?php echo esc_html($tab_title); ?></span>
										<?php if ($icon_position === 'right') : ?>
											<span class="uptabs-tab-icon"><?php echo $icon_html; ?></span>
										<?php endif; ?>
									</div>
								<?php endif; ?>
							<?php else : ?>
								<span class="uptabs-tab-title-text"><?php echo esc_html($tab_title ?? null); ?></span>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>




				<div class="uptabs-tabs-content-wrapper">
					<?php
					$this->render_tab_contents($tabs, $id_int, $active_tab, $settings); ?>
				</div>

			</div>
		</div>
		<?php
	}

	protected function render_tab_contents($tabs, $id_int, $active_tab, $settings)
	{

		$heading_tag = 	!empty($settings['uptabs_tab_heading_tag']) ? $settings['uptabs_tab_heading_tag'] : 'h2';
		$uptabs_image_postion = $settings['uptabs_image_postion'] ?? 'left';
		foreach ($tabs as $index => $item) :
			$tab_count = $index + 1;
			$tab_content_id = 'uptabs-tab-content-' . $id_int . $tab_count;
			$active_class = $tab_count === $active_tab ? 'uptabs-active' : '';
			$image_url = $item['uptabs_tab_image']['url'] ?? '';
			$has_image = !empty($image_url);
			$btn_text = $item['uptabs_tab_button_text'] ?? '';
			$btn_link = $item['uptabs_tab_button_link'] ?? [];



			$this->add_render_attribute($tab_content_id, [
				'id' => $tab_content_id,
				'class' => [
					'uptabs-tab-content',
					'elementor-repeater-item-' . $item['_id'],
					$active_class,
					'uptabs-image-position-' . esc_attr($uptabs_image_postion),
					$has_image ? 'has-image' : 'no-image'
				],
				'data-tab' => $tab_count,
				'role' => 'tabpanel',
				'aria-labelledby' => 'uptabs-tab-title-' . $id_int . $tab_count,
			]);

			if ($tab_count !== $active_tab) {
				$this->add_render_attribute($tab_content_id, 'hidden', 'hidden');
			}
		?>
			<div <?php $this->print_render_attribute_string($tab_content_id); ?>>
				<div class="uptabs-card-content-wrapper">
					<div class="uptabs-card-left-section">

						<?php
						if (!empty($item['uptabs_tab_heading'])) {

							$heading_tag = !empty($heading_tag) ? $heading_tag : 'h3'; // Default fallback
							printf(
								'<%1$s class="uptabs-header">%2$s</%1$s>',
								tag_escape($heading_tag),
								esc_html($item['uptabs_tab_heading'])
							);
						}
						?>


						<div class="uptabs-description">


							<p class="uptabs-card-description"><?php echo wp_kses_post($item['uptabs_tab_description']); ?></p>
						</div>
						<?php if (!empty($btn_text)) : ?>
							<div class="uptab-card-button-wrapper">
								<a class="button uptabs-card-button" href="<?php echo esc_url($btn_link['url']); ?>" <?php echo $btn_link['is_external'] ? 'target="_blank"' : ''; ?> <?php echo $btn_link['nofollow'] ? 'rel="nofollow"' : ''; ?>>
									<?php echo esc_html($btn_text); ?>
								</a>
							</div>
						<?php endif; ?>

						

						
					</div>

					<?php if ($has_image) : ?>
						<div class="uptabs-card-image">
							<?php echo \Elementor\Group_Control_Image_Size::print_attachment_image_html($item, 'thumbnail', 'uptabs_tab_image'); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
<?php endforeach;
	}
}
