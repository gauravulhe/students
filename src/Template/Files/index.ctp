<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Student'), ['controller' => 'Students', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="courses index large-9 medium-8 columns content">
    <fieldset>
        <legend><?= __('New File Upload') ?></legend>
		<div class="content">
			<?= $this->Flash->render() ?>
			<div class="upload-frm">
				<?= $this->Form->create($uploadData, ['type' => 'file']) ?>
					<?= $this->Form->input('file', ['type' => 'file', 'class' => 'form-control']) ?>
					<?= $this->Form->button(__('Upload File'), ['type' => 'submit', 'class' => 'form-controlbtn btn-sm btn-success']) ?>
				<?= $this->Form->end() ?>
			</div>
		</div>
	</fieldset>

    <fieldset>
        <legend><?= __('Uploaded Files') ?></legend>
		<table class="table">
			<tr>
				<th>#</th>
				<th>File</th>
				<th>Upload Date</th>
			</tr>
			<?php if ($filesRowNum > 0): $count = 0; foreach($files as $file): $count++; ?>		
			<tr>
				<td><?php echo $count; ?></td>
				<td><img src="/uploads/files/<?php echo $file->name; ?>" width="100px" height="100px"></td>
				<!-- <td><img src="<?php echo $file->path.$file->name; ?>" width="100px" height="100px"></td> -->
				<td><?php echo $file->created; ?></td>
			</tr>
			<?php endforeach; else:?>
			<tr>
				<td colspan="3">No file(s) found ....</td>
			</tr>	
			<?php endif; ?>
		</table>
	</fieldset>
</div>