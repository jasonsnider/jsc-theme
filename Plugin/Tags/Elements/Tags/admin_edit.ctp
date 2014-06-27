<ul class="nav nav-sidebar">
	<li><?php echo $this->Html->link( __d('tags', 'Tags'), '/admin/tags'); ?></li>
	<li><?php echo $this->Html->link(__d('tags', 'New Tag'), array('action' => 'add')); ?> </li>
	<li class="divider"></li>
	<li>
		<?php 
			echo $this->Html->link(
				__d('tags', 'Delete') . ' ' . $this->Form->value('Tag.keyname'), 
				array('action' => 'delete', $this->Form->value('Tag.id')), 
				null, 
				sprintf(__d('tags', 'Are you sure you want to delete #%s?'), $this->Form->value('Tag.name'))
			); 
		?>
	</li>
	<li>
		<?php 
			echo $this->Html->link(
				__d('tags', 'View') . ' ' . $this->Form->value('Tag.keyname'), 
				array('action' => 'view',$this->Form->value('Tag.keyname')
				)
			); 
		?>
	</li>
</ul>