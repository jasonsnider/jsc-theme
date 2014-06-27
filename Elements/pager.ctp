<div class="text-center">
	<ul class="pagination pagination-large no-margin">
		<?php
			echo $this->Paginator->prev(
				__('prev'), 
				array('tag' => 'li'), 
				null, 
				array('tag' => 'li','class' => 'disabled','disabledTag' => 'a')
			);
			echo $this->Paginator->numbers(
				array(
					'separator' => '',
					'currentTag' => 'a', 
					'currentClass' => 'active',
					'tag' => 'li',
					'first' => 1
				)
			);

			echo $this->Paginator->next(
				__('next'), 
				array('tag' => 'li',
					'currentClass' => 'disabled'
				), 
				null, 
				array(
					'tag' => 'li',
					'class' => 'disabled',
					'disabledTag' => 'a'
				)
			);
		?>
	</ul>
</div>
<div class="text-center text-muted">
	<?php
	echo $this->Paginator->counter(
		array(
			'format' => 'Showing {:start} through {:end} of {:count}'
		)
	);
	?>	
</div>