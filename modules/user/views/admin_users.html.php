<? defined("SYSPATH") or die("No direct script access."); ?>
<div class="gBlock">
  <a href="" class="gClose">X</a>
  <h2>User Administration</h2>
  <div class="gBlockContent">
    <p>These are the users in your system</p>
    <table>
      <? foreach ($users as $i => $user): ?>
      <tr>
        <td>
          <a href="<?= url::site("admin/users/edit/$user->id") ?>">
            <?= $user->name ?>
          </a>
        </td>
      </tr>
      <? endforeach ?>
    </table>
  </div>
</div>