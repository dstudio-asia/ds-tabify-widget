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

























protected function content_template()
	{
		?>
		<#
			var id_int=view.getIDInt().toString().substr(0, 3);
			var position=settings.position ? settings.position : 'horizontal' ;
			var active_tab=settings.active_tab ? parseInt(settings.active_tab) : 1;
			#>
			<div class="dstabify-tabs dstabify-tabs-view-{{ position }}" data-active-tab="{{ active_tab }}">
				<div class="dstabify-tabs-inner">
					<# if (position==='horizontal-bottom' ) { #>
						<div class="dstabify-tabs-content-wrapper">
							<# _.each(settings.tabs, function(item, index) {
								var tab_count=index + 1;
								var tab_content_id='dstabify-tab-content-' + id_int + tab_count;
								var active_class=tab_count===active_tab ? 'dstabify-active' : '' ;
								var image_url=item.dstabify_tab_image && item.dstabify_tab_image.url ? item.dstabify_tab_image.url : '' ;
								var has_image=image_url !=='' ;
								var btn_text=item.dstabify_tab_button_text || '' ;
								var btn_link=item.dstabify_tab_button_link || {};
								var image_position=item.image_position || 'left' ;
								var heading_tag=item.dstabify_tab_heading_tag ? item.dstabify_tab_heading_tag : 'h2' ;
								#>
								<div id="{{ tab_content_id }}"
									class="dstabify-tab-content elementor-repeater-item-{{ item._id }} {{ active_class }} image-position-{{ image_position }} {{ has_image ? 'has-image' : 'no-image' }}"
									data-tab="{{ tab_count }}"
									role="tabpanel"
									aria-labelledby="dstabify-tab-title-{{ id_int }}{{ tab_count }}"
									<# if (tab_count !==active_tab) { #>hidden<# } #>>
										<div class="dstabify-card-content-wrapper">
											<div class="dstabify-card-left-section">
												<# if (item.dstabify_tab_heading) { #>
													<{{ heading_tag }} class="dstabify-card-heading">{{{ item.dstabify_tab_heading }}}</{{ heading_tag }}>
													<# } #>

														<p class="dstabify-card-description">{{{ item.dstabify_tab_description }}}</p>
														<# if (btn_text) { #>
															<a class="dstabify-card-button" href="{{ btn_link.url }}"
																<# if (btn_link.is_external) { #>target="_blank"<# } #>
																	<# if (btn_link.nofollow) { #>rel="nofollow"<# } #>>
																			{{{ btn_text }}}
															</a>
															<# } #>
											</div>

											<# if (has_image) { #>
												<div class="dstabify-card-image">
													<#
														var image={
														id: item.dstabify_tab_image.id,
														url: item.dstabify_tab_image.url,
														size: item.thumbnail_size,
														dimension: item.thumbnail_custom_dimension,
														model: view.getEditModel()
														};
														var image_url=elementor.imagesManager.getImageUrl(image);
														#>
														<img src="{{ image_url }}" alt="{{ item.dstabify_tab_heading }}">
												</div>
												<# } #>
										</div>
								</div>
								<# }); #>
						</div>
						<# } #>

							<div class="dstabify-tabs-wrapper" role="tablist">
								<# _.each(settings.tabs, function(item, index) {
									var tab_count=index + 1;
									var tab_id='dstabify-tab-title-' + id_int + tab_count;
									var active_class=tab_count===active_tab ? 'dstabify-active' : '' ;
									var icon_html='' ;
									var icon_position=item.tab_icon_position || 'left' ;

									if (item.tab_icon && item.tab_icon.value) {
									icon_html=elementor.helpers.renderIcon(view, item.tab_icon, { 'aria-hidden' : true }, 'i' , 'object' );
									}
									#>
									<div id="{{ tab_id }}"
										class="dstabify-tab-title dstabify-icon-{{ icon_position }} {{ active_class }}"
										aria-selected="{{ tab_count === active_tab ? 'true' : 'false' }}"
										data-tab="{{ tab_count }}"
										role="tab"
										aria-controls="dstabify-tab-content-{{ id_int }}{{ tab_count }}"
										tabindex="{{ tab_count === active_tab ? '0' : '-1' }}">
										<# if (icon_html.value) { #>
											<# if (icon_position==='top' || icon_position==='bottom' ) { #>
												<div class="dstabify-icon-wrapper dstabify-icon-wrapper-{{ icon_position }}">
													<span class="dstabify-tab-icon">{{{ icon_html.value }}}</span>
													<span class="dstabify-tab-title-text">{{{ item.dstabify_tab_title }}}</span>
												</div>
												<# } else { #>
													<div class="dstabify-tab-title-inner">
														<# if (icon_position==='left' ) { #>
															<span class="dstabify-tab-icon">{{{ icon_html.value }}}</span>
															<# } #>
																<span class="dstabify-tab-title-text">{{{ item.dstabify_tab_title }}}</span>
																<# if (icon_position==='right' ) { #>
																	<span class="dstabify-tab-icon">{{{ icon_html.value }}}</span>
																	<# } #>
													</div>
													<# } #>
														<# } else { #>
															<span class="dstabify-tab-title-text">{{{ item.dstabify_tab_title }}}</span>
															<# } #>
									</div>
									<# }); #>
							</div>

							<# if (position !=='horizontal-bottom' ) { #>
								<div class="dstabify-tabs-content-wrapper">
									<# _.each(settings.tabs, function(item, index) {
										var tab_count=index + 1;
										var tab_content_id='dstabify-tab-content-' + id_int + tab_count;
										var active_class=tab_count===active_tab ? 'dstabify-active' : '' ;
										var image_url=item.dstabify_tab_image && item.dstabify_tab_image.url ? item.dstabify_tab_image.url : '' ;
										var has_image=image_url !=='' ;
										var btn_text=item.dstabify_tab_button_text || '' ;
										var btn_link=item.dstabify_tab_button_link || {};
										var image_position=item.image_position || 'left' ;
										var heading_tag=item.dstabify_tab_heading_tag ? item.dstabify_tab_heading_tag : 'h2' ;
										#>
										<div id="{{ tab_content_id }}"
											class="dstabify-tab-content elementor-repeater-item-{{ item._id }} {{ active_class }} image-position-{{ image_position }} {{ has_image ? 'has-image' : 'no-image' }}"
											data-tab="{{ tab_count }}"
											role="tabpanel"
											aria-labelledby="dstabify-tab-title-{{ id_int }}{{ tab_count }}"
											<# if (tab_count !==active_tab) { #>hidden<# } #>>
												<div class="dstabify-card-content-wrapper">
													<div class="dstabify-card-left-section">
														<# if (item.dstabify_tab_heading) { #>
															<{{ heading_tag }} class="dstabify-card-heading">{{{ item.dstabify_tab_heading }}}</{{ heading_tag }}>
															<# } #>

																<p class="dstabify-card-description">{{{ item.dstabify_tab_description }}}</p>
																<# if (btn_text) { #>
																	<a class="dstabify-card-button" href="{{ btn_link.url }}"
																		<# if (btn_link.is_external) { #>target="_blank"<# } #>
																			<# if (btn_link.nofollow) { #>rel="nofollow"<# } #>>
																					{{{ btn_text }}}
																	</a>
																	<# } #>
													</div>

													<# if (has_image) { #>
														<div class="dstabify-card-image">
															<#
																var image={
																id: item.dstabify_tab_image.id,
																url: item.dstabify_tab_image.url,
																size: item.thumbnail_size,
																dimension: item.thumbnail_custom_dimension,
																model: view.getEditModel()
																};
																var image_url=elementor.imagesManager.getImageUrl(image);
																#>
																<img src="{{ image_url }}" alt="{{ item.dstabify_tab_heading }}">
														</div>
														<# } #>
												</div>
										</div>
										<# }); #>
								</div>
								<# } #>
				</div>
			</div>
	<?php
	}