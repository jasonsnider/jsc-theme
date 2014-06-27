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

echo $this->Form->input('id');
echo $this->Form->input('identifier');
echo $this->Form->input('name', array('readonly' => 'readonly'));
echo $this->Form->input('keyname');
echo $this->Form->end(__d('tags', 'Submit'));
