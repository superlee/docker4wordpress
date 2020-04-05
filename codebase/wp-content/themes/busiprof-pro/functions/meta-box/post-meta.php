<?php
/************ Home slider meta post ****************/
add_action('admin_init','busiprof_slider_init');
function busiprof_slider_init()
	{
		add_meta_box('home_slider_meta', __('Slider Detail','busiprof'), 'busiprof_meta_slider', 'busiprof_slider', 'normal', 'high');
		add_meta_box('home_service_meta', __('Service Detail','busiprof'), 'busiprof_meta_service', 'busiprof_service', 'normal', 'high');
		add_meta_box('home_project_meta', __('Project Details','busiprof'), 'busiprof_meta_project', 'busiprof_project', 'normal', 'high');
		add_meta_box('busiprof_testimonial_meta', __('Testimonial Detail','busiprof'), 'busiprof_testimonial_meta_box', 'busiprof_testimonial', 'normal', 'high');
		add_meta_box('busiprof_team_meta', __('Member Details','busiprof'), 'busiprof_team_meta_box', 'busiprof_team', 'normal', 'high');		
		add_meta_box('busiprof_client_strip', __('Client Detail','busiprof'), 'busiprof_clientstrip_meta_box', 'busiprof_clientstrip', 'normal', 'high');
		
		add_action('save_post','busiprof_meta_save');
	}
	// code for project description
	function busiprof_meta_project()
	{	global $post ;
		
		$project_link =sanitize_text_field( get_post_meta( get_the_ID(), 'project_link', true ));
		$project_target =sanitize_text_field( get_post_meta( get_the_ID(), 'project_target', true ));
		$project_title_description =sanitize_text_field( get_post_meta( get_the_ID(), 'project_title_description', true ));
	?>	<p><h4 class="heading"><?php _e('Link','busiprof');?></h4></p>
		<p><input style="width:600px;" name="project_link" id="project_link" placeholder="<?php _e('Link','busiprof');?>" type="text" value="<?php if (!empty($project_link)) echo esc_attr($project_link);?>"> </p>
		<p><input type="checkbox" id="project_target" name="project_target" <?php if($project_target) echo "checked"; ?> > <?php _e('Open link in new tab','busiprof'); ?></p>
		<p><h4 class="heading"><?php _e('Description','busiprof');?></h4>
		<p><textarea name="project_title_description" id="project_title_description" style="width: 480px; height: 56px; padding: 0px;" placeholder="<?php _e('Description','busiprof');?>"  rows="3" cols="10" ><?php if (!empty($project_title_description)) echo esc_attr($project_title_description);?></textarea></p>	
<?php }

// code for testimonial description
function busiprof_testimonial_meta_box()
	{	global $post ;
		$testimonial_description = sanitize_text_field( get_post_meta( get_the_ID(), 'testimonial_desc', true ));
		$testimonial_author_designation = sanitize_text_field( get_post_meta( get_the_ID(), 'author_designation', true ));
		$testimonial_author_link = sanitize_text_field( get_post_meta( get_the_ID(), 'author_link', true ));
		$testimonial_author_link_target = sanitize_text_field( get_post_meta( get_the_ID(), 'author_link_target', true ));
	?>	
		<p><label><?php _e('Description','busiprof');?></label></p>
		<p><textarea name="meta_testimonial_desc" id="meta_testimonial_desc" style="width: 480px; height: 56px; padding: 0px;" placeholder="<?php _e('Description','busiprof');?>"  rows="3" cols="10" ><?php if (!empty($testimonial_description)) echo esc_textarea( $testimonial_description ); ?></textarea></p>
		<p><label><?php _e('Designation','busiprof');?></label></p>
		<p><input  name="meta_testimonial_author_designation" id="meta_testimonial_designation" placeholder="<?php _e('Designation','busiprof');?>" type="text" value="<?php if (!empty($testimonial_author_designation)) echo esc_attr($testimonial_author_designation);?>"></p>
		<p>	<label><?php _e('Link','busiprof');?></label></p>
		<p><input  name="meta_testimonial_author_link" id="meta_testimonial_link" placeholder="<?php _e('Link','busiprof');?>" type="text" value="<?php if (!empty($testimonial_author_link)) echo esc_attr($testimonial_author_link);?>"></p>
		<p><input type="checkbox" id="meta_testimonial_author_link_target" name="meta_testimonial_author_link_target" <?php if($testimonial_author_link_target) echo "checked"; ?> > <?php _e('Open link in new tab','busiprof'); ?></p>
<?php }

// code for team description
function busiprof_team_meta_box()
	{	global $post ;
		$team_designation = sanitize_text_field( get_post_meta( get_the_ID(), 'busi_designation', true ));
		$team_description = sanitize_text_field( get_post_meta( get_the_ID(), 'busi_desc', true ));
		$team_twitter_url = sanitize_text_field (get_post_meta(get_the_ID(),'twitter_url',true));
		$team_fb_url = sanitize_text_field(get_post_meta(get_the_ID(),'fb_url',true));
		$team_linked_url = sanitize_text_field (get_post_meta(get_the_ID(),'linked_url',true));
        $team_member_link =sanitize_text_field( get_post_meta( get_the_ID(), 'team_member_link', true ));
		$team_target =sanitize_text_field( get_post_meta( get_the_ID(), 'team_target', true ));		
		
	?>	
		<p><label><?php _e('Designation','busiprof');?></label></p>
		<p><input  name="meta_team_member_designation" id="meta_team_designation" placeholder="<?php _e("Designation","busiprof");?>"	type="text" value="<?php if (!empty($team_designation)) echo esc_attr($team_designation);?>"></p>
		<p><label><?php _e('Description','busiprof');?></label></p>
		<p><textarea name="meta_team_member_desc" id="meta_team_desc" style="width: 480px; height: 56px; padding: 0px;" placeholder="<?php _e("Description","busiprof");?>"  rows="3" cols="10" ><?php if (!empty($team_description)) echo esc_textarea( $team_description ); ?></textarea></p>
		<p><h4 class="heading"><?php _e('Link','busiprof');?></h4></p>
		<p><input style="width:600px;" name="team_member_link" id="team_member_link" placeholder="<?php _e('Link','busiprof');?>" type="text" value="<?php if (!empty($team_member_link)) echo esc_attr($team_member_link);?>"> </p>		
		<p><label><?php _e('Twitter URL','busiprof');?></label></p>
		<p><input  name="meta_team_member_twitter" id="meta_team_twitter" placeholder="<?php _e("Twitter URL","busiprof");?>" type="text" value="<?php if (!empty($team_twitter_url)) echo esc_attr($team_twitter_url); ?>"></p>
		<p><label><?php _e('Facebook URL','busiprof');?></label></p>
		<p><input  name="meta_team_member_fb" id="meta_team_fb" placeholder="<?php _e("Facebook URL","busiprof");?>" type="text" value="<?php if (!empty($team_fb_url)) echo esc_attr($team_fb_url);?>"></p>
		<p><label><?php _e('LinkedIn URL','busiprof');?></label></p>
		<p><input  name="meta_team_member_linked" id="meta_team_linked" placeholder="<?php _e("LinkedIn URL","busiprof");?>" type="text" value="<?php if (!empty($team_linked_url)) echo esc_attr($team_linked_url);?>"></p>
		<p><input type="checkbox" id="team_target" name="team_target" <?php if($team_target) echo "checked"; ?> > <?php _e('Open link in new tab','busiprof'); ?></p>
		
		
<?php }

function busiprof_clientstrip_meta_box()
	{	?>	
		<p><label><?php _e('Upload client image using featured image','busiprof');?></label></p>
		<?php
	}
	

function busiprof_meta_save($post_id) 
{	 
	if ((defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) || (defined('DOING_AJAX') && DOING_AJAX) || isset($_REQUEST['bulk_edit']))
        return;
		
	if ( ! current_user_can( 'edit_page', $post_id ) )
	{   return ;	} 
		
	if(isset( $_POST['post_ID']))
	{ 	
		$post_ID = $_POST['post_ID'];				
		$post_type=get_post_type($post_ID);
		if($post_type=='busiprof_slider')
		{	//if($_POST) { print_r($_POST); die(); }
			update_post_meta($post_ID, 'image_description', sanitize_text_field($_POST['meta_image_description']));					 
			update_post_meta($post_ID, 'readmore_button', sanitize_text_field($_POST['readmore_button']));				
			update_post_meta($post_ID, 'readmore_link', sanitize_text_field($_POST['readmore_link']));
			update_post_meta($post_ID, 'readmore_link_target', sanitize_text_field($_POST['readmore_link_target']));
			
		}
		
		else if($post_type=='busiprof_project')
		{	
			update_post_meta($post_ID, 'project_title_description', sanitize_text_field($_POST['project_title_description']));
			update_post_meta($post_ID, 'project_link', sanitize_text_field($_POST['project_link']));	
			update_post_meta($post_ID, 'project_target', sanitize_text_field($_POST['project_target']));								
		}
		
		else if($post_type=='busiprof_team')
		{
			update_post_meta($post_ID, 'busi_designation', sanitize_text_field($_POST['meta_team_member_designation']));				
			update_post_meta($post_ID, 'busi_desc', sanitize_text_field($_POST['meta_team_member_desc']));  
			update_post_meta($post_ID, 'team_member_link', sanitize_text_field($_POST['team_member_link']));		
			update_post_meta($post_ID, 'team_target', sanitize_text_field(isset($_POST['team_target'])));
			update_post_meta($post_ID, 'twitter_url', sanitize_text_field($_POST['meta_team_member_twitter']));				
			update_post_meta($post_ID, 'fb_url', sanitize_text_field($_POST['meta_team_member_fb']));				
			update_post_meta($post_ID, 'linked_url', sanitize_text_field($_POST['meta_team_member_linked']));
		}
					
	}				
} 
?>