<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
            echo $this->Form->control('role_id', ['options' => $roles, 'empty' => true]);
            echo $this->Form->control('email');
            echo $this->Form->control('password');
            echo $this->Form->control('first_name');
            echo $this->Form->control('last_name');
            echo $this->Form->control('dob', ['empty' => true]);
            echo $this->Form->control('gender_id', ['options' => $genders, 'empty' => true]);
            echo $this->Form->control('address1');
            echo $this->Form->control('address2');
            echo $this->Form->control('zip');
            echo $this->Form->control('city_id', ['options' => $cities, 'empty' => true]);
            echo $this->Form->control('user_current_location');
            echo $this->Form->control('created_date', ['empty' => true]);
            echo $this->Form->control('status_id', ['options' => $statuses, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
