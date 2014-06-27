<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset(); ?>
        <title><?php echo $this->request->title; ?></title>
        <?php
            echo $this->Html->meta('icon');

            echo $this->Html->css('cake.generic.stripped');
            echo $this->Html->css('//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css');
            echo $this->Html->css('//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css');
			echo $this->Html->css('/vendors/bootstrap-datepicker/css/datepicker3');
            echo $this->Html->css('jsc.theme.css');
            echo $this->fetch('meta');
            echo $this->fetch('css');
            echo $this->fetch('script');
        ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        
        <?php echo $this->element('navbar'); ?>
        <div class="container">
			<div class="row row-offcanvas row-offcanvas-left">
			<?php
				//[TODO] This should probably be a helper method
			
				//Is there a sidebar avilable for this page?
				$controller = Inflector::camelize($this->request->controller);
				$action = $this->request->action;
				
				$element = "{$controller}/{$action}";
				$elementPath = null;
								
				if($this->elementExists($element)){
					$elementPath = $this->element($element);
				}
				
				//Load the content for the main display area into a single variable
				$content = null;
				$content .= $this->Html->tag('a', '', array('id'=>'Top', 'class'=>'anchor'));
				if($this->request->showTitle):
					$content .= $this->Html->tag('h1', $this->request->title);
				endif;

				$content .= $this->Session->flash();
				$content .= $this->fetch('content');
					
				//Add the footer
				$content .= $this->element('footer');
			
				//If we found a sidebar load a two column layout, otherwise load a single column.
				if($elementPath):
					echo $this->Html->div(
						'col-xs-6 col-sm-3 sidebar sidebar-offcanvas', 
						$elementPath, 
						array('id'=>'SideNav')
					);
					echo $this->Html->div(
						'col-xs-12 col-sm-9 main col-sm-offset-3', 
						$content, 
						array('id'=>'Main')
					);
				else:
					echo $this->Html->div(
						'col-xs-12 main', 
						$content, 
						array('id'=>'Main')
					);
				endif; 
			?>
			</div>
        </div>
        <?php echo $this->Html->script('//code.jquery.com/jquery-1.11.0.min.js'); ?>
        <?php echo $this->Html->script('//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js'); ?>
		<?php echo $this->Html->script('/vendors/bootstrap-datepicker/js/bootstrap-datepicker'); ?>
		<?php echo $this->Html->script('jsc'); ?>
        <?php echo $this->element('tinymce'); ?>
		<script>
			$(function() {
				$('input.datepicker').datepicker();
			});
		</script>
    </body>
</html>