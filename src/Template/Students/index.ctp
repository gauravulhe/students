<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Student'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Branches'), ['controller' => 'Branches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Branch'), ['controller' => 'Branches', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="students index large-10 medium-10 columns content">
    <h3><?= __('Students') ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('avatar') ?></th>
                <th><?= $this->Paginator->sort('full_name') ?></th>
                <!-- <th><?= $this->Paginator->sort('address') ?></th> -->
                <th><?= $this->Paginator->sort('enrollment_number') ?></th>
                <th><?= $this->Paginator->sort('roll_number') ?></th>
                <th><?= $this->Paginator->sort('course_id') ?></th>
                <th><?= $this->Paginator->sort('branch_id') ?></th>
                <th><?= $this->Paginator->sort('year_of_passing') ?></th>
                <!-- <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th> -->
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student): ?>
            <tr>
                <td><?= $this->Number->format($student->id) ?></td>
                <td><img src="/uploads/students/<?= h($student->avatar) ?>" width="100px"> </td>
                <td><?= h($student->full_name) ?></td>
                <!-- <td><?= h($student->address) ?></td> -->
                <td><?= h($student->enrollment_number) ?></td>
                <td><?= h($student->roll_number) ?></td>
                <td><?= $student->has('course') ? $this->Html->link($student->course->name, ['controller' => 'Courses', 'action' => 'view', $student->course->id]) : '' ?></td>
                <td><?= $student->has('branch') ? $this->Html->link($student->branch->name, ['controller' => 'Branches', 'action' => 'view', $student->branch->id]) : '' ?></td>
                <td><?= h($student->year_of_passing) ?></td>
                <!-- <td><?= h($student->created) ?></td>
                <td><?= h($student->modified) ?></td> -->
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $student->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $student->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $student->id], ['confirm' => __('Are you sure you want to delete # {0}?', $student->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
