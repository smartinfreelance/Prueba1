<div id="main-content">
  	<div class="container">
		<?php echo form_open('items/confirm_add_item'); ?>
		<?php echo validation_errors(); ?>
		<div class="login-container">
			<div class="well-login">
				<div class="control-group">
					<div class="controls">
						<div>
							<input type="hidden" name="id_list" value = "<?php echo $id_list; ?>" class="login-input user-name">
						</div>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<div>
							<input type="text" placeholder="Nombre Item" name="name" class="login-input user-name">
						</div>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<div>
							<textarea id = "description" name="description" placeholder="Description... " cols="21" rows="12"></textarea>
						</div>
					</div>
				</div>
				<div class="clearfix">
		            <?php 
		        		echo form_submit(array(
		        			'id'=>'cmdSiguiente', 
		        			'value'=>'Guardar Item',
		        			'class'=>'btn btn-inverse login-btn'
		        		)); 
		        	?>
				</div>
		<?php echo form_close(); ?>				
				<!--<div class="remember-me">
					<input class="rem_me" type="checkbox" value=""> Remeber Me
				</div>-->
			</div>
		</div>
	</div>
</div>
