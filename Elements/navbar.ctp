<?php
    //Returns all plugins in the system, if that plugin has a controller and that follows the CakePHP standard of 
    //naming, it will try to link to the index view of that controller.
    //Not intended for production, rather as an aid for plugin development.

    $li = null;
    $pluginLi = null;
    $adminPluginLi = null;

    //Find all of the Plugins
    $plugins = scandir(APP . 'Plugin');
    foreach($plugins as $plugin):

        //Create the expected path to the plugins default controller
        $loc = Inflector::underscore($plugin); 

        $pluginMain = 
            ROOT . DS . 
            APP_DIR . DS . 
            'Plugin' .  DS . 
            $plugin . DS . 
            'Controller' . DS . 
            "{$plugin}Controller.php";

        //Does the plugin have a controller named after the plugin?
        if(!in_array($plugin, array('.', '..'))):
            //It does create a link
            $li .= $this->Html->tag('li',  $plugin, array('class'=>'dropdown-header'));
        endif;

        $pluginControllers = 
            ROOT . DS . 
            APP_DIR . DS . 
            'Plugin' .  DS . 
            $plugin . DS . 'Controller';

        $pluginViews = 
            ROOT . DS . 
            APP_DIR . DS . 
            'Plugin' .  DS . 
            $plugin . DS . 'View';

        $nav = array();
        $adminNav = array();

        if(is_dir($pluginControllers)):
			
            foreach(scandir($pluginControllers) as $directory):

                if(!in_array($directory, array('.', '..', 'Component'))):
                     $theController = str_replace('Controller.php', '', $directory);

                     //Regular pages
                    if(is_file($pluginViews . DS . $theController . DS . 'index.ctp')){
                        $nav[$plugin][] = $theController;
                    }

                    //Admin pages
                    if(is_file($pluginViews . DS . $theController . DS . 'admin_index.ctp')){
                        $adminNav[$plugin][] = $theController;
                    }

                endif;

            endforeach;

        endif;

        foreach($nav as $key => $menu):

            $pluginLi .= $this->Html->tag('li', $key, array('class'=>'dropdown-header'));

            for($i=0; $i<count($menu); $i++):

                $pluginLi .= $this->Html->tag(
                    'li', 
                    $this->Html->link(
                        $menu[$i], 
                        array(
                            'admin'=>false,
                            'plugin'=>Inflector::underscore($plugin),
                            'controller'=>Inflector::underscore($menu[$i]),
                            'action'=>'index'
                        )
                    )
                );

            endfor;

        endforeach;

        foreach($adminNav as $key => $menu):

            $adminPluginLi .= $this->Html->tag('li', $key, array('class'=>'dropdown-header'));

            for($i=0; $i<count($menu); $i++):

                $adminPluginLi .= $this->Html->tag(
                    'li', 
                    $this->Html->link(
                        $menu[$i], 
                        array(
                            'admin'=>true,
                            'plugin'=>Inflector::underscore($plugin),
                            'controller'=>Inflector::underscore($menu[$i])
                        )
                    )
                );

            endfor;

        endforeach;

    endforeach;
        
?>
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <i class="fa fa-navicon"></i>
            </button>
			
            <button type="button" class="navbar-toggle"  data-toggle="offcanvas">
                <i class="fa fa-th-large"></i>
            </button>
            <a class="navbar-brand" href="/"><?php echo Configure::read('JSC.Project.brand'); ?></a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li>
                <?php echo $this->Html->link('Home', '/'); ?></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if ($this->Session->check('Auth.User')): ?> 
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Installed Plugins <b class="caret"></b></a>
                        <?php echo $this->Html->tag('ul', $li, array('class'=>'dropdown-menu')); ?>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu <b class="caret"></b></a>
                        <?php echo $this->Html->tag('ul', $pluginLi, array('class'=>'dropdown-menu')); ?>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin <b class="caret"></b></a>
                        <?php echo $this->Html->tag('ul', $adminPluginLi, array('class'=>'dropdown-menu')); ?>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Actions <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><?php echo $this->Html->link('Log Out', '/users/users/logout'); ?></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu <b class="caret"></b></a>
                        <?php echo $this->Html->tag('ul', $pluginLi, array('class'=>'dropdown-menu')); ?>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Actions <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><?php echo $this->Html->link('Login', '/users/users/login'); ?></li>
                            <li><?php echo $this->Html->link('New Account', '/users/users/create'); ?></li>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>