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

class UpTabs_Widget extends \Elementor\Widget_Base
{
	use RepeaterTabsTrait, TabContainerStyleTrait, TabTitleStyleTrait, TabIconStyleTrait, TabContentStyleTrait, TabInfoStyleTrait;
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
			'section_tabs',
			[
				'label' => esc_html__('Tabs', 'uptabs'),
			]
		);
		$repeater = new Elementor\Repeater();
		$this->uptabs_repeater_tabs($repeater);

		$this->add_control(
			'tabs',
			[
				'label' => esc_html__('Tabs Items', 'uptabs'),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'uptabs_tab_title' => esc_html__('Tab #1', 'uptabs'),
						'uptabs_tab_heading' => esc_html__('This is a heading', 'uptabs'),
						'uptabs_tab_description' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ultricies leo in dui ultricies porttitor. Fusce placerat massa vitae diam aliquam, ac tincidunt tortor venenatis.', 'uptabs'),
					],
					[
						'uptabs_tab_title' => esc_html__('Tab #2', 'uptabs'),
						'uptabs_tab_heading' => esc_html__('This is a heading', 'uptabs'),
						'uptabs_tab_description' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ultricies leo in dui ultricies porttitor. Fusce placerat massa vitae diam aliquam, ac tincidunt tortor venenatis.', 'uptabs'),
					],
				],
				'title_field' => '{{{ uptabs_tab_title }}}',
			]
		);

		// $this->add_responsive_control(
		// 	'position',
		// 	[
		// 		'label' => esc_html__('Direction', 'uptabs'),
		// 		'type' => Controls_Manager::CHOOSE,
		// 		'options' => [
		// 			'horizontal' => ['title' => esc_html__('Top', 'uptabs'), 'icon' => 'eicon-v-align-top'],
		// 			'horizontal-bottom' => ['title' => esc_html__('Bottom', 'uptabs'), 'icon' => 'eicon-v-align-bottom'],
		// 			'vertical-left' => ['title' => esc_html__('Left', 'uptabs'), 'icon' => 'eicon-h-align-left'],
		// 			'vertical-right' => ['title' => esc_html__('Right', 'uptabs'), 'icon' => 'eicon-h-align-right'],
		// 		],
		// 		'selectors' => [
		// 			'{{WRAPPER}}.' => 'text-align: {{VALUE}};',
		// 		],

		// 	]
		// );

		$this->add_responsive_control(
			'uptabs_tabs_position',
			[
				'label'       => esc_html__('Tab Position', 'uptabs'),
				'type'        => Controls_Manager::CHOOSE,
				'options'     => [
					'column'        => ['title' => esc_html__('Top', 'uptabs'),    'icon' => 'eicon-v-align-top'],
					'column-reverse' => ['title' => esc_html__('Bottom', 'uptabs'), 'icon' => 'eicon-v-align-bottom'],
					'row'     => ['title' => esc_html__('Left', 'uptabs'),   'icon' => 'eicon-h-align-left'],
					'row-reverse'    => ['title' => esc_html__('Right', 'uptabs'),  'icon' => 'eicon-h-align-right'],
				],
				'default'     => 'column',
				// 'prefix_class' => 'uptabs-tabs-view-',
				'render_type' => 'template',
				'selectors'   => [
					// 1. Main flex-direction control
					'{{WRAPPER}} .uptabs-tabs-inner' => 'flex-direction: {{VALUE}};',
				],

			]
		);


		$this->add_responsive_control(
			'uptabs_tabs_justify',
			[
				'label' => esc_html__('Justify', 'uptabs'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'start' => ['title' => esc_html__('Start', 'uptabs'), 'icon' => 'eicon-text-align-left'],
					'center' => ['title' => esc_html__('Center', 'uptabs'), 'icon' => 'eicon-text-align-center'],
					'end' => ['title' => esc_html__('End', 'uptabs'), 'icon' => 'eicon-text-align-right'],
					'stretch' => ['title' => esc_html__('Stretch', 'uptabs'), 'icon' => 'eicon-text-align-justify'],
				],
				'default' => 'center',
				// 'selectors'   => [
				// 	'{{WRAPPER}} .uptabs-tabs-wrapper'  => 'justify-content: {{VALUE}};',
				// ],

				'prefix_class' => 'uptabs-tabs-align-',
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
					'px' => ['min' => 10, 'max' => 500],
					'%' => ['min' => 10, 'max' => 50],
					'em' => ['min' => 1, 'max' => 50],
					'rem' => ['min' => 1, 'max' => 50],
				],
				'selectors' => [
					// '{{WRAPPER}}.uptabs-position-row .uptabs-tabs-inner > .uptabs-tabs-wrapper' => 'width: {{SIZE}}{{UNIT}}; flex: 0 0 {{SIZE}}{{UNIT}};',
					// '{{WRAPPER}}.uptabs-position-row-reverse .uptabs-tabs-inner > .uptabs-tabs-wrapper' => 'width: {{SIZE}}{{UNIT}}; flex: 0 0 {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .uptabs-position-row .uptabs-tabs-wrapper, .uptabs-position-row-reverse .uptabs-tabs-wrapper' => 'width: {{SIZE}}{{UNIT}}'
				],
				'condition' => ['uptabs_tabs_position' => ['row', 'row-reverse']],
			]
		);







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
			'section_tab_container_style',
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
			'section_tab_title_style',
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
		$this->start_controls_section(
			'section_tab_icon_style',
			[
				'label' => esc_html__('Tab Icon', 'uptabs'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->uptabs_tab_icon_style($this);


		$this->end_controls_section();

		// ===========================================
		// STYLE TAB: TAB CONTENT
		// ===========================================
		$this->start_controls_section(
			'section_tab_content_style',
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
			$active_tab = isset($_SESSION['uptabs_active_tab'][$widget_id]) ?
				$_SESSION['uptabs_active_tab'][$widget_id] : (!empty($settings['active_tab']) ? intval($settings['active_tab']) : 1);
		} else {
			$active_tab = !empty($settings['active_tab']) ? intval($settings['active_tab']) : 1;
		}

		$position = !empty($settings['uptabs_tabs_position']) ? $settings['uptabs_tabs_position'] : 'column';
		$id_int = substr($this->get_id_int(), 0, 3);


			$this->add_render_attribute('uptabs-tabs', [

				// 'class' => ['uptabs-tabs', 'uptabs-tabs-view-' . $position],
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
						$icon_position = $settings['tab_icon_position'] ?? 'left';

						if (!empty($item['tab_icon']['value'])) {
							ob_start();
							\Elementor\Icons_Manager::render_icon($item['tab_icon'], ['aria-hidden' => 'true']);
							$icon_html = ob_get_clean();
						}

						$this->add_render_attribute($tab_id, [
							'id' => $tab_id,
							'class' => ['uptabs-tab-title', 'uptabs-icon-' . $icon_position, $active_class],
							'aria-selected' => $tab_count === $active_tab ? 'true' : 'false',
							'data-tab' => $tab_count,
							'role' => 'tab',
							'aria-controls' => 'uptabs-tab-content-' . $id_int . $tab_count,
							'tabindex' => $tab_count === $active_tab ? '0' : '-1',
						]);
					?>
						<div <?php $this->print_render_attribute_string($tab_id); ?>>
							<?php if ($icon_html) : ?>
								<?php if ($icon_position === 'top' || $icon_position === 'bottom') : ?>
									<div class="uptabs-icon-wrapper uptabs-icon-wrapper-<?php echo esc_attr($icon_position); ?>">
										<span class="uptabs-tab-icon"><?php echo $icon_html; ?></span>
										<span class="uptabs-tab-title-text"><?php echo esc_html($item['uptabs_tab_title']); ?></span>
									</div>
								<?php else : ?>
									<div class="uptabs-tab-title-inner">
										<?php if ($icon_position === 'left') : ?>
											<span class="uptabs-tab-icon"><?php echo $icon_html; ?></span>
										<?php endif; ?>
										<span class="uptabs-tab-title-text"><?php echo esc_html($item['uptabs_tab_title']); ?></span>
										<?php if ($icon_position === 'right') : ?>
											<span class="uptabs-tab-icon"><?php echo $icon_html; ?></span>
										<?php endif; ?>
									</div>
								<?php endif; ?>
							<?php else : ?>
								<span class="uptabs-tab-title-text"><?php echo esc_html($item['uptabs_tab_title']); ?></span>
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
		$image_position = $settings['image_position'] ?? 'left';
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
					'image-position-' . esc_attr($image_position),
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
								'<%1$s class="uptab-header">%2$s</%1$s>',
								tag_escape($heading_tag),
								esc_html($item['uptabs_tab_heading'])
							);
						}
						?>


						<div class="uptab-description">


							<p class="uptabs-card-description"><?php echo esc_html($item['uptabs_tab_description']); ?></p>
						</div>
						<?php if (!empty($btn_text)) : ?>
							<div class="uptab-card-button-wrapper">
								<a class="uptabs-card-button" href="<?php echo esc_url($btn_link['url']); ?>" <?php echo $btn_link['is_external'] ? 'target="_blank"' : ''; ?> <?php echo $btn_link['nofollow'] ? 'rel="nofollow"' : ''; ?>>
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



	protected function content_template()
	{
		?>
		<#
			var id_int=Math.random().toString(36).substr(2, 5);
			var active_tab=settings.active_tab ? parseInt(settings.active_tab) : 1;
			var position=settings.uptabs_tabs_position || 'column' ;
			var heading_tag=settings.uptabs_tab_heading_tag || 'h2' ;
			var icon_position=settings.tab_icon_position || 'left' ;
			var image_position=settings.image_position || 'left' ;
			#>

			<div class="uptabs-tabs uptabs-position-{{ position }}" data-active-tab="{{ active_tab }}">
				<div class="uptabs-tabs-inner">
					<div class="uptabs-tabs-wrapper" role="tablist">
						<# _.each(settings.tabs, function(item, index) {
							var tab_count=index + 1;
							var tab_id='uptabs-tab-title-' + id_int + tab_count;
							var active_class=(tab_count===active_tab) ? 'uptabs-active' : '' ;
							var icon_html='' ;

							if (item.tab_icon && item.tab_icon.value) {
							icon_html=elementor.helpers.renderIcon(view, item.tab_icon, { 'aria-hidden' : true }, 'i' , 'object' );
							}
							#>
							<div id="{{ tab_id }}"
								class="uptabs-tab-title uptabs-icon-{{ icon_position }} {{ active_class }}"
								aria-selected="{{ tab_count === active_tab ? 'true' : 'false' }}"
								data-tab="{{ tab_count }}"
								role="tab"
								aria-controls="uptabs-tab-content-{{ id_int }}{{ tab_count }}"
								tabindex="{{ tab_count === active_tab ? '0' : '-1' }}">
								<# if (icon_html.value) { #>
									<# if (icon_position==='top' || icon_position==='bottom' ) { #>
										<div class="uptabs-icon-wrapper uptabs-icon-wrapper-{{ icon_position }}">
											<span class="uptabs-tab-icon">{{{ icon_html.value }}}</span>
											<span class="uptabs-tab-title-text">{{{ item.uptabs_tab_title }}}</span>
										</div>
										<# } else { #>
											<div class="uptabs-tab-title-inner">
												<# if (icon_position==='left' ) { #>
													<span class="uptabs-tab-icon">{{{ icon_html.value }}}</span>
													<# } #>
														<span class="uptabs-tab-title-text">{{{ item.uptabs_tab_title }}}</span>
														<# if (icon_position==='right' ) { #>
															<span class="uptabs-tab-icon">{{{ icon_html.value }}}</span>
															<# } #>
											</div>
											<# } #>
												<# } else { #>
													<span class="uptabs-tab-title-text">{{{ item.uptabs_tab_title }}}</span>
													<# } #>
							</div>
							<# }); #>
					</div>

					<div class="uptabs-tabs-content-wrapper">
						<# _.each(settings.tabs, function(item, index) {
							var tab_count=index + 1;
							var tab_content_id='uptabs-tab-content-' + id_int + tab_count;
							var active_class=(tab_count===active_tab) ? 'uptabs-active' : '' ;
							var has_image=item.uptabs_tab_image && item.uptabs_tab_image.url;
							var btn_text=item.uptabs_tab_button_text || '' ;
							var btn_link=item.uptabs_tab_button_link || {};
							#>
							<div id="{{ tab_content_id }}"
								class="uptabs-tab-content elementor-repeater-item-{{ item._id }} {{ active_class }} image-position-{{ image_position }} {{ has_image ? 'has-image' : 'no-image' }}"
								data-tab="{{ tab_count }}"
								role="tabpanel"
								aria-labelledby="uptabs-tab-title-{{ id_int }}{{ tab_count }}"
								<# if (tab_count !==active_tab) { #>hidden<# } #>>
									<div class="uptabs-card-content-wrapper">
										<div class="uptabs-card-left-section">
											<# if (item.uptabs_tab_heading) { #>
												<{{ heading_tag }} class="uptab-header">{{{ item.uptabs_tab_heading }}}</{{ heading_tag }}>
												<# } #>

													<div class="uptab-description">
														<p class="uptabs-card-description">{{{ item.uptabs_tab_description }}}</p>
													</div>

													<# if (btn_text) { #>
														<div class="uptab-card-button-wrapper">
															<a class="uptabs-card-button"
																href="{{ btn_link.url }}"
																<# if (btn_link.is_external) { #>target="_blank"<# } #>
																	<# if (btn_link.nofollow) { #>rel="nofollow"<# } #>>
																			{{{ btn_text }}}
															</a>
														</div>
														<# } #>
										</div>

										<# if (has_image) { #>
											<div class="uptabs-card-image">
												<#
													var image={
													id: item.uptabs_tab_image.id,
													url: item.uptabs_tab_image.url,
													size: settings.thumbnail_size,
													dimension: settings.thumbnail_custom_dimension,
													model: view.getEditModel()
													};
													var image_url=elementor.imagesManager.getImageUrl(image);
													#>
													<img src="{{ image_url }}" alt="{{ item.uptabs_tab_title }}">
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
