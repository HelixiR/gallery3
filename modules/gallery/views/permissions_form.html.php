<?php defined("SYSPATH") or die("No direct script access.") ?>
<fieldset>
  <legend> <?= t('Edit Permissions') ?> </legend>

  <table>
    <tr>
      <th> </th>
      <? foreach ($groups as $group): ?>
      <th> <?= p::clean($group->name) ?> </th>
      <? endforeach ?>
    </tr>

    <? foreach ($permissions as $permission): ?>
    <tr>
      <td> <?= t($permission->display_name) ?> </td>
      <? foreach ($groups as $group): ?>
        <? $intent = access::group_intent($group, $permission->name, $item) ?>
        <? $allowed = access::group_can($group, $permission->name, $item) ?>
        <? $lock = access::locked_by($group, $permission->name, $item) ?>

        <? if ($lock): ?>
          <td class="gDenied">
            <img src="<?= url::file('themes/default/images/ico-denied.png') ?>" title="<?= t('denied and locked through parent album') ?>" alt="<?= t('denied icon') ?>" />
            <a href="javascript:show(<?= $lock->id ?>)" title="<?= t('click to go to parent album') ?>">
              <img src="<?= url::file('themes/default/images/ico-lock.png') ?>" alt="<?= t('locked icon') ?>" />
            </a>
          </td>
        <? else: ?>
          <? if ($intent === null): ?>
            <? if ($allowed): ?>
              <td class="gAllowed">
                <a href="javascript:set('allow',<?= $group->id ?>,<?= $permission->id ?>,<?= $item->id ?>)"
                  title="<?= t('allowed through parent album, click to allow explicitly') ?>">
                  <img src="<?= url::file('themes/default/images/ico-success-pale.png') ?>" alt="<?= t('passive allowed icon') ?>" />
                </a>
                <a href="javascript:set('deny',<?= $group->id ?>,<?= $permission->id ?>,<?= $item->id ?>)"
                  title="<?= t('click to deny') ?>">
                  <img src="<?= url::file('themes/default/images/ico-denied-gray.png') ?>" alt="<?= t('inactive denied icon') ?>" />
                </a>
              </td>
            <? else: ?>
              <td class="gDenied">
                <a href="javascript:set('allow',<?= $group->id ?>,<?= $permission->id ?>,<?= $item->id ?>)"
                  title="<?= t('click to allow') ?>">
                  <img src="<?= url::file('themes/default/images/ico-success-gray.png') ?>" alt="<?= t('inactive allowed icon') ?>" />
                </a>
                <a href="javascript:set('deny',<?= $group->id ?>,<?= $permission->id ?>,<?= $item->id ?>)"
                  title="<?= t('denied through parent album, click to deny explicitly') ?>">
                  <img src="<?= url::file('themes/default/images/ico-denied-pale.png') ?>" alt="<?= t('passive denied icon') ?>" />
                </a>
              </td>
            <? endif ?>

          <? elseif ($intent === access::DENY): ?>
            <td class="gDenied">
              <a href="javascript:set('allow',<?= $group->id ?>,<?= $permission->id ?>,<?= $item->id ?>)"
                title="<?= t('click to allow') ?>">
                <img src="<?= url::file('themes/default/images/ico-success-gray.png') ?>" alt="<?= t('inactive allowed icon') ?>" />
              </a>
              <? if ($item->id == 1): ?>
                <img src="<?= url::file('themes/default/images/ico-denied.png') ?>" alt="<?= t('denied icon') ?>" title="<?= t('denied') ?>"/>
              <? else: ?>
                <a href="javascript:set('reset',<?= $group->id ?>,<?= $permission->id ?>,<?= $item->id ?>)"
                  title="<?= t('denied, click to reset') ?>">
                  <img src="<?= url::file('themes/default/images/ico-denied.png') ?>" alt="<?= t('denied icon') ?>" />
                </a>
              <? endif ?>
            </td>
          <? elseif ($intent === access::ALLOW): ?>
            <td class="gAllowed">
              <? if ($item->id == 1): ?>
                <img src="<?= url::file('themes/default/images/ico-success.png') ?>" title="<?= t("allowed") ?>" alt="<?= t('allowed icon') ?>" />
              <? else: ?>
                <a href="javascript:set('reset',<?= $group->id ?>,<?= $permission->id ?>,<?= $item->id ?>)"
                  title="<?= t('allowed, click to reset') ?>">
                  <img src="<?= url::file('themes/default/images/ico-success.png') ?>" alt="<?= t('allowed icon') ?>" />
                </a>
              <? endif ?>
              <a href="javascript:set('deny',<?= $group->id ?>,<?= $permission->id ?>,<?= $item->id ?>)"
                title="<?= t('click to deny') ?>">
                <img src="<?= url::file('themes/default/images/ico-denied-gray.png') ?>" alt="<?= t('inactive denied icon') ?>" />
              </a>
            </td>
          <? endif ?>
        <? endif ?>
      </td>
      <? endforeach ?>
    </tr>
    <? endforeach ?>
  </table>
</fieldset>
