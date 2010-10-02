<div class="byline">
  <?php if ($io_blog->isPublished()): ?>
    posted on <a href="<?php echo url_for('io_blog_show', $io_blog) ?>"><?php echo $io_blog->getFriendlyPublishedDate() ?></a>
  <?php else: ?>
    not yet published
  <?php endif; ?>

  by <?php echo $io_blog->getAuthorName() ?>
</div>