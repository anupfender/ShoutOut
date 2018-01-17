<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sponser $sponser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $sponser->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $sponser->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Sponsers'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="sponsers form large-9 medium-8 columns content">
    <?= $this->Form->create($sponser) ?>
    <fieldset>
        <legend><?= __('Edit Sponser') ?></legend>
        <?php
            echo $this->Form->control('city_id', ['options' => $cities, 'empty' => true]);
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('bussiness_name');
            echo $this->Form->control('logo');
            echo $this->Form->control('created_date', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
