<div id="main-content">
  	<div class="container">
		<?php echo form_open('lists/confirm_delete_list'); ?>
		<?php echo validation_errors(); ?>
		<div class="login-container">
			<?php echo validation_errors(); ?>
			<input type ="text" id ="id" name="id" value ="<?php echo $list->id; ?>" style ="display:none;"/>
			<div class="well-login">
				<div class="control-group">
					<div class="controls">
						<div>
							<?php echo $list->name; ?>
						</div>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<div>
							<?php echo $list->description; ?>
						</div>
					</div>
				</div>
				<div class="clearfix">
		            <?php 
		        		echo form_submit(array(
		        			'id'=>'cmdSiguiente', 
		        			'value'=>'Eliminar Lista',
		        			'class'=>'btn btn-inverse login-btn'
		        		)); 
		        	?>
				</div>
				<?php echo anchor('start/panel/' , '<i class="icon-share-alt icon-white"></i> Cancelar');?>
		<?php echo form_close(); ?>				
				<!--<div class="remember-me">
					<input class="rem_me" type="checkbox" value=""> Remeber Me
				</div>-->
			</div>
		</div>
	</div>
</div>
