
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Students'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Branches'), ['controller' => 'Branches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Branch'), ['controller' => 'Branches', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="students form large-9 medium-8 columns content">
    <?= $this->Form->create($student, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Add Student') ?></legend>
        <?php
            echo $this->Form->input('full_name');
            echo $this->Form->input('address');
            echo $this->Form->input('enrollment_number');
            echo $this->Form->input('roll_number');
            echo $this->Form->input('course_id', ['type' => 'select', 'id' => 'course_id', 'empty' => '--- Select Course ---', 'options' => $courses]);
            echo $this->Form->input('branch_id', ['type' => 'select', 'id' => 'branch_id', 'empty' => '--- Select Course First ---']);
            echo $this->Form->input('year_of_passing');
            echo $this->Form->input('file', ['type' => 'file', 'class' => 'form-control']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
