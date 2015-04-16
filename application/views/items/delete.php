<div id="main-content">
  	<div class="container">
		<?php echo form_open('items/confirm_delete_item'); ?>
		<?php echo validation_errors(); ?>
		<div class="login-container">
			<?php echo validation_errors(); ?>
			<input type ="text" id ="id_list" name="id_list" value ="<?php echo $idList; ?>" style ="display:none;"/>
			<input type ="text" id ="id" name="id" value ="<?php echo $item->id; ?>" style ="display:none;"/>
			<div class="well-login">
				<div class="control-group">
					<div class="controls">
						<div>
							<?php echo $item->name; ?>
						</div>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<div>
							<?php echo $item->description; ?>
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
				<?php echo anchor('items/see_items/'.$idList , '<i class="icon-share-alt icon-white"></i> Cancelar');?>
		<?php echo form_close(); ?>				
				<!--<div class="remember-me">
					<input class="rem_me" type="checkbox" value=""> Remeber Me
				</div>-->
			</div>
		</div>
	</div>
</div>
