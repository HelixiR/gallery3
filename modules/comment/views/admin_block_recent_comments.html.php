<?php defined("SYSPATH") or die("No direct script access.") ?>
<ul>
  <? foreach ($comments as $i => $comment): ?>
  <li class="<?= ($i % 2 == 0) ? "gEvenRow" : "gOddRow" ?>">
    <img src="<?= $comment->author()->avatar_url(32, $theme->url("images/avatar.jpg", true)) ?>"
         class="gAvatar"
         alt="<?= p::clean($comment->author_name()) ?>"
         width="32"
         height="32" />
    <?= gallery::date_time($comment->created) ?>
    <?= t('<a href="#">%author_name</a> said <em>%comment_text</em>',
          array("author_name" => p::clean($comment->author_name()),
                "comment_text" => text::limit_words(p::clean($comment->text), 50))); ?>
  </li>
  <? endforeach ?>
</ul>
