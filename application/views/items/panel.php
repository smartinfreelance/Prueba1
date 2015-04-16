<div id="main-content">
  <div class="container">
    <h1>Mis Items</h1>
  	<h2><?php echo $this->session->userdata('nombre')."(".$this->session->userdata('user').")"; ?></h2>
  	<?php echo anchor('items/add_item/'.$idList, 'Agregar item', 'class="link-class"'). " - "; ?>
    <?php echo anchor('start/deslogin', 'Desloguear', 'class="link-class"') ?>
    <?php
      foreach ($items as $i) {
    ?>
        <li>

            <ol>
              <?php 
                echo $i->name;
                echo " - ";
                echo anchor('items/edit_item/'.$i->id.'/'.$idList, "Editar", 'class="link-class"');
                echo " - ";
                echo anchor('items/delete_item/'.$i->id.'/'.$idList, "Eliminar", 'class="link-class"');
                echo $i->fecha_alta; 
                ?>
            </ol>

        </li>
    <?php
      }
    ?>
	</div>
</div>
