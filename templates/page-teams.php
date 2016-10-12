<?php
get_header();
?>
<div class="row">
	<div class="text-center">
		<h1>Teams</h1>
	</div>
</div>
<div class="gap-div"></div>
<div class="row">
	<div class="col-xs-offset-1 col-md-offset-2 col-xs-10 col-md-8">
		<?php
		$args = array('post_type' => 'members', 'posts_per_page' => 10);
		$loop = new WP_Query($args);
		while($loop->have_posts()){
			$loop->the_post();
		?>
		<div class="row">
			<div class="team-heading row">
				<div class="col-xs-7">
					<h2 class="inline-block-text"><?php the_title();?></h2>
					<h3 class="inline-block-text"><i>&nbsp;<?php echo get_post_meta(get_the_id(),'cc_team_designation')[0];?></i></h3>
				</div>
				<div class="col-xs-5">
					<h3 class="pull-right"><?php echo get_post_meta(get_the_id(),'cc_team_mail')[0];?></h3>
				</div>
			</div>
		</div>
		<div class="gap-div"></div>
		<div class="row">
			<div class="col-xs-3">
				<?php echo get_the_post_thumbnail( $post_id, 'medium' , 'class=img-responsive' );?>
			</div>
			<div class="col-xs-9">
				<p class="excerpt"><?php echo get_the_content();?></p>
			</div>
		</div>
		<div class="gap-div"></div>
		<?php
		}
		?>
	</div>
</div>
<div class="gap-div"></div>
<?php
get_footer();
?>