<?php
include('cc_plugins_desc.php');
$plugins = get_option('cc_wpmp_plugins');
?>
<div class="wrap">
	<h1>Plugins</h1>
	<table class="wp-list-table widefat fixed striped plugins">
		<thead>
			<tr>
				<th id='plugin'>Plugin</th>
				<th id='status'>Option</th>
				<th id='description'>Description</th>
			</tr>
		</thead>
		<tbody id="the-list" data-wp-lists='list:plugin'>
			<?php
			$counter = 0;
			foreach($all_plugins as $plugin){
			?>
			<tr>
				<td class="plugin"><?php echo $plugin['name'];?></td>
				<td class="status">
					<form action="" method="POST">
						<input type="hidden" id="<?php echo $plugin['name'];?>" name="plugin_name" value="<?php echo $plugin['name'];?>">
						<a onclick="toggle_plugin('<?php echo $plugin['name'];?>')" href="#">
							<?php
							if($plugins[$counter]['status'] == 'active'){
								echo 'Deactivate';
							}
							else{
								echo 'Activate';
							}
							?>
					</form>
				</td>
				<td class="description"><?php echo $plugin['description'];?></td>
			</tr>
		</tbody>
		<?php
		$counter++;
		}
		?>
	</table>
</div>