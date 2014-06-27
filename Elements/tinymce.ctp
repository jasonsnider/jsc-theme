<?php if(isset($this->request->hasEditor)): ?>
	<?php echo $this->Html->script('//tinymce.cachefly.net/4.0/tinymce.min.js'); ?>
    <script>
        tinymce.init({
            
            selector: '.editor',
            content_css : '<?php echo Configure::read('JSC.Editor.css'); ?>',
            plugins: 'autoresize, code, image, link, media, paste',
            menubar: false,
            toolbar: "undo redo | styleselect | bold italic | numlist bullist | image link media | pastetext | code",
			
            auto_resize : true,

			browser_spellcheck : true,
			schema: "html5",
                        
            //Fix for image src maddness
			//http://ellislab.com/forums/viewthread/130868/#645748
			relative_urls : false,
			remove_script_host : true,
			document_base_url : "/",
			convert_urls : true,
	
			//Remove inline styles from copy and paste actions
			//http://stackoverflow.com/questions/16847324/tinymce-paste-includes-styles
			cleanup_on_startup : true,
			fix_list_elements : false,
			fix_nesting : false,
			fix_table_elements : false,
			paste_use_dialog : true,
			paste_auto_cleanup_on_paste : true
        });
    </script>
<?php endif; ?>