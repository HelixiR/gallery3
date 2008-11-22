<? defined("SYSPATH") or die("No direct script access."); ?>
<ul id="gLoginMenu" class="gInline">
  <? if ($user): ?>
    <li><a href="<?= url::site("user/{$user->id}?continue=" . url::current(true))?>">
      <?= _("Modify Profile") ?></a></li>
    <li><a href="<?= url::site("logout?continue=" . url::current(true)) ?>" id="gLogoutLink">
      <?= _("Logout") ?></a></li>
  <? else: ?>
    <li id="gLoginFormContainer"></li>
    <li id="gLoginLink"><a href="javascript:show_login('<?= url::site("login") ?>')">Login</a></li>
    <li class="gClose gHide"><a href="javascript:close_login()">X</a></li>
  <? endif; ?>
</ul>