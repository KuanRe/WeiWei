<?php
if (post_password_required()) return; ?>

<div id="comments" class="comments-area">

  <?php if (have_comments()) : ?>
    <h2 class="comments-title">
      <?php printf('%d 条评论', get_comments_number()); ?>
    </h2>

    <div class="comment-list">
      <?php
      wp_list_comments([
        'style'      => 'ol',
        'short_ping' => true,
        'avatar_size'=> 48,
      ]);
      ?>
    </div>

    <?php the_comments_pagination(); ?>
  <?php endif; ?>

  <?php
  // 关闭则给出提示（可选）
  if (!comments_open() && get_comments_number()) :
    echo '<p class="no-comments">评论已关闭</p>';
  endif;

  comment_form();
  ?>
</div>
