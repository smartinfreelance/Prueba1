<div id="main-content">
  	<div class="container">
		<?php echo form_open('start/login'); ?>
		<div class="login-container">
			<?php echo validation_errors(); ?>
			<div class="well-login">
				<div class="control-group">
					<div class="controls">
						<div>
							<input type="text" placeholder="Username or Email" name="usuario" class="login-input user-name">
						</div>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<div>
							<input type="password" placeholder="Password" name="pass" class="login-input user-pass">
						</div>
					</div>
				</div>
				<div class="clearfix">
		            <?php 
		        		echo form_submit(array(
		        			'id'=>'cmdSiguiente', 
		        			'value'=>'Conectarse',
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
