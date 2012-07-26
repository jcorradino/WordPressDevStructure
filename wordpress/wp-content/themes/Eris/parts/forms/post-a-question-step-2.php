<?php
global $current_user;
get_currentuserinfo();
?>
			<section class="content-body clearfix">
				
				<h6 class="content-headline">Post your question</h6>
				
				<form id="new_question" name="new_question" method="post" action="">
					<?php wp_nonce_field('front-end-post_question-step-2'); ?>

					<div class="state_post-question-details">
						<ul class="form-fields">
							<li>
								<label for="screen-name" class="required">Screen Name</label>
								<input type="text" class="input_text" name="screen-name" id="screen-name" value="<?php echo $current_user->user_login; ?>" required/>
							</li>
							<li>
								<label for="your-question" class="required">Your Question</label>
								<textarea name="your-question" id="your-question" class="input_textarea" required><?php 
									echo esc_textarea( ($_POST['post-question']) ? $_POST['post-question'] : $_POST['your-question'] ); 
								?></textarea>
							</li>
							<li>
								<label for="more-details" class="optional">Add More Details</label>
								<textarea name="more-details" id="more-details" class="input_textarea"><?php 
									echo esc_textarea( $_POST['more-details'] ); 
								?></textarea>
							</li>
							<li>
								<label for="category" class="required">Category</label>
									<?php 
									wp_dropdown_categories(array(
										'depth'=> 1,
										'selected' => get_queried_object()->term_id,
										'hierarchical' => true,
										'hide_if_empty' => true,
										'class' => 'input_select',
										'name' => 'category',
										'id' => 'category'
									));
									wp_dropdown_categories(array(
										'depth'=> 1,
										'child_of' => get_queried_object()->term_id,
										'hierarchical' => true,
										'hide_if_empty' => true,
										'class' => 'input_select',
										'name' => 'sub-category',
										'id' => 'sub-category'
									));
									?>
							</li>


							<li>
								<button type="submit" class="<?php echo theme_option("brand"); ?>_button">Post</button>
								<button type="submit" class="<?php echo theme_option("brand"); ?>_button azure">Cancel</button>
							</li>
						</ul>
					</div>
				</form>
				
			</section>