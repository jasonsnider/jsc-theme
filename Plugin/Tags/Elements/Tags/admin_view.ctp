<ul class="nav nav-sidebar">
	<li><?php echo $this->Html->link(__d('tags', 'Tags'), array('action' => 'index')); ?> </li>
	<li>
	<?php 
		echo $this->Html->link(
			__d('tags', 'New'), 
			array('action' => 'add')
		); 
	?> 
	</li>
	<li class="divider"></li>
	<li>
	<?php 
		echo $this->Html->link(
			__d('tags', 'Edit') . ' ' . $tag['Tag']['keyname'], 
			array('action' => 'edit', $tag['Tag']['id'])
		); 
	?> 
	</li>
</div>
