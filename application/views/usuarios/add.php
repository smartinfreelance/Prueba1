<div id="main-content">
  	<div class="container">
		<?php echo form_open('usuarios/add'); ?>
		<?php echo validation_errors(); ?>
		<div class="login-container">			
			<div class="well-login">
				<div class="control-group">
					<div class="controls">
						<div>
							<input type="text" placeholder="Usuario" name="user">
						</div>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<div>
							<input type="password" placeholder="Nombre" name="name">
						</div>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<div>
							<input type="password" placeholder="Password" name="pass">
						</div>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<div>
							<input type="password" placeholder="Confirmar Password" name="pass_conf">
						</div>
					</div>
				</div>
				<div class="clearfix">
		            <?php 
		        		echo form_submit(array(
		        			'id'=>'cmdSiguiente', 
		        			'value'=>'Alta',
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
