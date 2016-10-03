<?php
include('cc_plugins_desc.php');
$plugins = get_option('cc_wpmp_plugins');
?>
<div class="wrap">
	<h1>Plugins</h1>
	<table class="wp-list-table widefat fixed striped plugins">
		<thead>
			<tr>
				<th scope="col" id='plugin' class='manage-column'>Plugin</th>
				<th scope="col" id='status' class='manage-column'>Option</th>
				<th scope="col" id='description' class='manage-column'>Description</th>
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
				<?php 
					if($plugins[$counter]['status']=='active'){
						echo 'Deactivate';
					}
					else{
						echo 'Activate';
					}
				?>
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