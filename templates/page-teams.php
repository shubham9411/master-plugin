<?php
get_header();
?>
<div class="row">
	<div class="col-xs-offset-1 col-md-offset-3 col-xs-10 col-md-6">
		<div class="kidprint text-center">
			<h1 class="border-bottom-text">Meet Our Team</h1>
		</div>
		<div>
			<p class="text-center">
				Our practice specializes in the treatment of developmental disabilities and<br> childhood disorders affecting the way children function and communicate in<br> their world.<br>
				Our licensed physical therapists, occupational therapists, and<br> speech-language pathologists are trained specifically in the treatment of<br> infants, children and adolescents. In our practice it is our goal to help each<br> and every child exceed expectations on a daily basis
			</p>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-offset-1 col-xs-10">
		<?php
		$args = array('post_type' => 'members', 'posts_per_page' => 10);
		$loop = new WP_Query($args);
		while($loop->have_posts()){
			$loop->the_post();
			$values = get_post_custom(get_the_id());
			$designation = isset($values['cc_member_designation']) ? esc_attr($values['cc_member_designation'][0]) : '';
			$email = isset($values['cc_member_mail']) ? esc_attr($values['cc_member_mail'][0]) : '';
		?>
		<div class="mediumpurple-color">
			<div class="team-heading font-white row">
				<div class="col-xs-7">
					<h2 class="inline-block-text"><?php the_title();?></h2>
					<h3 class="inline-block-text"><i><?php echo $designation; ?></i></h3>
				</div>
				<div class="col-xs-5">
					<h3 class="pull-right"><?php echo $email;?></h3>
				</div>
			</div>
		</div>
		<div class="full-border-purple">
			<div class="gap-top">
				<div class="row">
					<div class="col-xs-4">
						<?php echo get_the_post_thumbnail(0,'medium','class=img-responsive');?>
					</div>
					<div class="col-xs-8">
						<p class="excerpt">
							<?php echo get_the_content();?>
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="gap-top"></div>
		<?php
		}
		?>
		<div class="mediumpurple-color">
			<div class="team-heading font-white row">
				<div class="col-xs-3">
					<h2 class="inline-block-text">You</h2>
				</div>
				<div class="">
					<h3 class="pull-right">Email Resume at: Opportunities@SpecialNeedsPT.com</h3>
				</div>
			</div>
		</div>
		<div class="full-border-purple col-xs-12">
			<div class="gap-top">
				<div class="col-xs-4 graphite-bg your-image">
					<h1 class="text-center">YOU</h1>
				</div>
				<div class="col-xs-8">
					<p class="excerpt">
						Special Needs Pediatric Therapy Services will consider licensed physical and occupational therapists with a minimum of one year pediatric experience. NDT & SI training is highly favored.
					</p>
				</div>
			</div>
		</div>
		<div class="gap-top"></div>
	</div>
</div>
<div class="gap-top"></div>
<?php
get_footer();
?>