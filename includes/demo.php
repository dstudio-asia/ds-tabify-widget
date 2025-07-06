<?php


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



@media (max-width: 767px) {
    :root {
      --dstabify-padding: 15px;
      --dstabify-gap: 12px;
    }
    
    /* Switch all layouts to vertical on mobile */
    .dstabify-tabs-inner {
      flex-direction: column;
    }
    
    /* Tab wrapper adjustments */
    .dstabify-tabs-wrapper {
      flex-direction: row !important;
      flex-wrap: nowrap;
      overflow-x: auto;
      overflow-y: hidden;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
      scrollbar-width: thin;
      padding-bottom: 5px;
      gap: 8px;
      width: 100%;
      justify-content: start !important;
    }


    /* Vertical tabs become horizontal on mobile */
    /* .dstabify-tabs-view-vertical-left .dstabify-tabs-inner
     {
      flex-direction: row ;
      flex-direction: column;
      border-left: none;
      border-right: none;
      min-width: auto;
    }
    .dstabify-tabs-view-vertical-right .dstabify-tabs-inner
     {
      flex-direction: row ;
      flex-direction: column-reverse;
      border-left: none;
      border-right: none;
      min-width: auto;
    } */
    
    .dstabify-tab-title {
      flex: 0 0 auto;
      white-space: nowrap;
      padding: 10px 15px;
    }
    
    /* Content adjustments */
    .dstabify-card-content-wrapper {
      flex-direction: column ;
    }
    
    /* .dstabify-card-left-section,
    .dstabify-card-image {
      width: 100% ;
      max-width: 100% ;
    } */
    
    /* .image-position-left .dstabify-card-image,
    .image-position-right .dstabify-card-image {
      max-width: 50%;
      margin: var(--dstabify-gap) 0 !important;
    } */

    
    /* Remove specific margins for mobile */
    .image-position-top .dstabify-card-image,
    .image-position-bottom .dstabify-card-image {
      max-width: 100%;
      margin: 0 0 var(--dstabify-gap) 0;
    }

    .image-position-left .dstabify-card-content-wrapper,
    .image-position-right .dstabify-card-content-wrapper {
      flex-direction: column !important;
    }
    .image-position-left .dstabify-card-image,
    .image-position-right .dstabify-card-image {
      order: -1;   
      width: 100%;
      max-width: 100%;    /* same as your “.image-position-top” rule */
      /* margin-bottom: 15px; */
    }
    
    .dstabify-card-button {
      align-self: center;
      width: 100%;
      text-align: center;
    }
  }
  
  @media (max-width: 480px) {
    :root {
      --dstabify-padding: 12px;
      --dstabify-gap: 10px;
    }
    
    .dstabify-tab-title {
      padding: 8px 12px;
      font-size: 0.9em;
    }
    
    .dstabify-tab-icon svg {
      width: 16px;
      height: 16px;
    }
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
		  var uptab_image_postion=settings.uptab_image_postion || 'left' ;
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
							  class="uptabs-tab-content elementor-repeater-item-{{ item._id }} {{ active_class }} image-position-{{ uptab_image_postion }} {{ has_image ? 'has-image' : 'no-image' }}"
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


			// $this->add_group_control(
		// 	Group_Control_Typography::get_type(),
		// 	[
		// 		'name' => 'content_typography',
		// 		'selector' => '{{WRAPPER}} .dstabify-tab-content',
		// 	]
		// );

		// $this->add_group_control(
		// 	Group_Control_Border::get_type(),
		// 	[
		// 		'name' => 'content_border',
		// 		'selector' => '{{WRAPPER}} .dstabify-tab-content',
		// 	]
		// );