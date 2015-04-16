<div id="main-content">
  <div class="container">
    <h1>Mis Listas</h1>
  	<h2><?php echo $this->session->userdata('nombre')."(".$this->session->userdata('user').")"; ?></h2>
  	<?php echo anchor('lists/add_list', 'Agregar lista', 'class="link-class"'). " - "; ?>
    <?php echo anchor('start/deslogin', 'Desloguear', 'class="link-class"') ?>
    <?php
      foreach ($lists as $l) {
    ?>
        <li>

            <ol>
              <?php 
                echo anchor('items/see_items/'.$l->id, $l->name, 'class="link-class"');
                echo " - ";
                echo anchor('lists/edit_list/'.$l->id, "Editar", 'class="link-class"');
                echo " - ";
                echo anchor('lists/delete_list/'.$l->id, "Eliminar", 'class="link-class"');
                echo $l->fecha_alta; 
                ?>
            </ol>

        </li>
    <?php
      }
    ?>
	</div>
</div>
