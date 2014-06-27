<div class="footer text-center" role="footer">
	<div>&copy2012 - <?php echo date('Y'); ?> JSC</div>
	<div>
		Built by <a href="https://jasonsnider.com" target="_blank">Jason</a> in Chicago
		(<?php 						
			echo $this->Html->link(
				'Admin',
				'/admin'
			);

			if ($this->Session->check('Auth.User')):
				echo ' | ';

				if(!empty($this->request->MetaData)):
					echo $this->Html->link(
						'Edit Meta Data',
						array(
							'admin'=>true,
							'plugin'=>'contents',
							'controller'=>'meta_data',
							'action'=>'edit',
							$this->request->MetaData['id']
						)

					);

				else:

					echo $this->Html->link(
						'Add Meta Data',
						array(
							'admin'=>true,
							'plugin'=>'contents',
							'controller'=>'meta_data',
							'action'=>'add',
							(isset($this->request->plugin)?$this->request->plugin:null),
							$this->request->controller,
							$this->request->action,
							(isset($this->request->params['pass'][0])?$this->request->params['pass'][0]:null)
						)

					);

				endif;

				if($this->request->controller == 'posts' && $this->request->action == 'view'):
					echo ' | ';
					echo $this->Html->link(
						'Manage This Post',
						array(
							'admin'=>true,
							'controller'=>'posts',
							'action'=>'edit',
							$id
						)

					); 
				endif;



				if($this->request->controller == 'pages' && $this->request->action == 'view'):
					echo ' | ';
					echo $this->Html->link(
						'Manage This Page',
						array(
							'admin'=>true,
							'controller'=>'pages',
							'action'=>'edit',
							$id
						)

					); 
				endif;


				echo ' | ';
				echo $this->Html->link('Log Out', '/users/users/logout');
			endif; 


		?>)
	</div>
	<div class="text-right">
	<?php 
		$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
		echo $this->Html->link(
			$this->Html->image('cake.power.gif', 
			array(
				'alt' => $cakeDescription, 
				'title'=> $cakeDescription,
				'border' => '0',
				'width'=>'98px',
				'height'=>'13px'
			)),
			'http://www.cakephp.org/',
			array('target' => '_blank', 'escape' => false)
		);
	?>
	</div>
</div>