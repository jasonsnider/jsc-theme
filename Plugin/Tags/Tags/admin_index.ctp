<h1 class="header"><?php echo __d('tags', 'Tags');?></h1>
<div class="table-responsive">
	<table class="table table-bordered table-condensed table-striped table-hover">
		<thead>
			<tr>
				<th><?php echo $this->Paginator->sort('id');?></th>
				<th><?php echo $this->Paginator->sort('identifier');?></th>
				<th><?php echo $this->Paginator->sort('name');?></th>
				<th><?php echo $this->Paginator->sort('keyname');?></th>
				<th><?php echo $this->Paginator->sort('created');?></th>
				<th><?php echo $this->Paginator->sort('modified');?></th>
				<th class="actions"><?php echo __d('tags', 'Actions');?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($tags as $tag): ?>
			<tr>
				<td>
					<?php echo $this->Html->link($tag['Tag']['id'], array('action' => 'edit', $tag['Tag']['id'])); ?>
				</td>
				<td>
					<?php echo $tag['Tag']['identifier']; ?>
				</td>
				<td>
					<?php echo $tag['Tag']['name']; ?>
				</td>
				<td>
					<?php echo $tag['Tag']['keyname']; ?>
				</td>
				<td>
					<?php echo $tag['Tag']['created']; ?>
				</td>
				<td>
					<?php echo $tag['Tag']['modified']; ?>
				</td>
				<td class="actions">

					<?php echo $this->Html->link(__d('tags', 'Edit'), array('action' => 'edit', $tag['Tag']['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
</div>
<?php echo $this->element('pager'); ?>