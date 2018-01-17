<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ListingType[]|\Cake\Collection\CollectionInterface $listingTypes
 */
?>
<div class="listingTypes index large-9 medium-8 columns content">
    <table cellpadding="0" cellspacing="0">
        <tbody>
			 <tr>
            <?php foreach ($listingTypes as $listingType): ?>
                <td style="color:orange">
					<?= $this->Html->link(__($listingType->title), ['controller' => 'CityCategories', 'action' => 'listing', $city_cat_id, $listingType->id]) ?>

					</td>
              <?php endforeach; ?>
            </tr>
        </tbody>
    </table>

 <div class="related">
	 <h4><?= $listing_title; ?></h4>
       <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('item') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sponsered') ?></th>
                 <th scope="col"><?= $this->Paginator->sort('Display order') ?></th>
                <th scope="col"><?= $this->Paginator->sort('location') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zip') ?></th>
                 <th scope="col"><?= $this->Paginator->sort('keywords') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>

        </thead>
        <tbody>

            <?php foreach ($itemListings as $itemListing):  ?>
            <tr>
                <td><?= $this->Number->format($itemListing->id) ?></td>
                <td><?= $itemListing->item->heading ?></td>
                <td><?= ($itemListing->item->sponsered)?"yes":"no" ?></td>
                <td><?= $this->Number->format($itemListing->display_order) ?></td>
                <td><?= $itemListing->item->location ?></td>
                <td><?= $itemListing->item->zip ?></td>
                 <td><?= $itemListing->item->keywords ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'items', 'action' => 'view', $itemListing->item->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $itemListing->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $itemListing->id], ['confirm' => __('Are you sure you want to delete # {0}?', $itemListing->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
  </div>

</div>
