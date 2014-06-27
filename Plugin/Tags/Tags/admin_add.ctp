<h1 class="header"><?php echo __d('tags', 'Tag');?></h1>
<?php
echo $this->Form->create(
	'Tag', 
	array(
		'url'=>$this->here,
		'role'=>'form',
		'inputDefaults'=>array(
			'div'=>array(
				'class'=>'form-group'
			),
			'class'=>'form-control',
			'required'=>false
		)
	)
);
echo $this->Form->input('tags', array('label' => __d('tags', 'Tags (list of tags separated by comma)')));
echo $this->Form->submit(__d('tags', 'Submit'), array('class'=>'btn btn-default'));
echo $this->Form->end();