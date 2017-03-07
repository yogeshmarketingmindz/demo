<div class=" about-wrap td-admin-wrap theme-browser">
	<h1><?php echo TD_THEME_NAME ?> demos</h1>
	<?php if ( !is_plugin_active( 'js_composer/js_composer.php' ) ) { ?>
		<div class="td-admin-box-text td-admin-required-plugins">
			<div class="td-admin-required-plugins-wrap">
				<p><strong>Please install Visual Composer.</strong></p>
				<p>Visual Composer is a required plugin for this theme to work best.</p>
				<a class="button button-primary" href="plugins.php">Go to plugin installer</a>
			</div>
		</div>
	<?php } ?>
	<hr/>


	<div class="td-admin-columns">
		<?php
			global $demo_list;
			$installed_demo = td_demo_state::get_installed_demo();
			foreach ( $demo_list as $demo_id => $stack_params ) {
				$tmp_class = '';
				if ( $installed_demo !== false and $installed_demo[ 'demo_id' ] == $demo_id ) {
					$tmp_class = 'td-demo-installed';
				}
				?>

				<div class="td-demo-<?php echo $demo_id ?> td-wp-admin-demo theme <?php echo $tmp_class ?>">

					<!-- Import content -->
					<div class="theme-screenshot">
						<img class="td-demo-thumb" src="<?php echo $demo_list[ $demo_id ][ 'img' ] ?>"/>
					</div>

					<div class="td-admin-title">
						<div class="td-progress-bar-wrap">
							<div class="td-progress-bar"></div>
						</div>
						<h3 class="theme-name"><?php echo $stack_params[ 'text' ] ?></h3>
					</div>

					<div class="td-admin-checkbox td-small-checkbox">
						<div class="td-demo-install-content">
							<?php
								echo td_config::checkbox(
									array(
										'ds'          => 'td_import_theme_styles',
										'option_id'   => 'td_import_menus',
										'true_value'  => '',
										'false_value' => 'no',
									)
								);
							?>
							<p>Include content</p>
						</div>
						<p class="td-installed-text">
							<?php
								if ( !empty( $demo_list[ $demo_id ][ 'demo_installed_text' ] ) ) {
									echo $demo_list[ $demo_id ][ 'demo_installed_text' ];
								}
								else {
									echo 'Demo installed!';
								}
							?>
						</p>
					</div>

					<div class="theme-actions">
						<a class="button button-secondary td-button-demo-preview"
							href="<?php echo $demo_list[ $demo_id ][ 'demo_url' ] ?>"
							target="_blank">Preview</a> <a class="button button-secondary td-button-install-demo"
							href="#" data-demo-id="<?php echo $demo_id ?>">Install</a> <a
							class="button button-primary td-button-uninstall-demo" href="#"
							data-demo-id="<?php echo $demo_id ?>">Uninstall</a> <a
							class="button button-primary disabled td-button-installing-demo" href="#"
							data-demo-id="<?php echo $demo_id ?>">Installing...</a> <a
							class="button button-secondary disabled td-button-demo-disabled" href="#"">Install</a>


						<a class="button button-primary disabled td-button-uninstalling-demo" href="#"
							data-demo-id="<?php echo $demo_id ?>">Uninstalling...</a>
					</div>
				</div>
			<?php } ?>
	</div>
</div>


