<div id="main-content">
  	<div class="container">
		<?php echo form_open('items/confirm_edit_item'); ?>
		<?php echo validation_errors(); ?>
		<div class="login-container">
			<input type ="text" id ="id" name="id" value ="<?php echo $item->id; ?>" style ="display:none;"/>
			<input type ="text" id ="id_list" name="id_list" value ="<?php echo $item->id_list; ?>" style ="display:none;"/>
			<div class="well-login">
				<div class="control-group">
					<div class="controls">
						<div>
							<input type="text" placeholder="Nombre Item" name="name" class="login-input user-name" value ="<?php echo $item->name; ?>">
						</div>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<div>
							<textarea id = "description" name="description" placeholder="Description... " cols="21" rows="12"><?php echo $item->description; ?></textarea>
						</div>
					</div>
				</div>
				<div class="clearfix">
		            <?php 
		        		echo form_submit(array(
		        			'id'=>'cmdSiguiente', 
		        			'value'=>'Guardar Cambios',
		        			'class'=>'btn btn-inverse login-btn'
		        		)); 
		        	?>
				</div>
				<?php echo anchor('items/see_items/'.$item->id_list , '<i class="icon-share-alt icon-white"></i> Cancelar');?>
		<?php echo form_close(); ?>				
				<!--<div class="remember-me">
					<input class="rem_me" type="checkbox" value=""> Remeber Me
				</div>-->
			</div>
		</div>
	</div>
</div>
