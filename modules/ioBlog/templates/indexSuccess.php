<?php use_stylesheet('/ioBlogPlugin/css/blog.css') ?>

<h1><?php echo $title ?></h1>

<?php echo get_uhp_pager_navigation($pager, 'io_blog_index') ?>

<?php if ($pager->getNbResults() > 0): ?>

  <?php foreach ($pager->getResults() as $blog): ?>
    <div class="blog_preview">
      <?php include_partial('ioBlog/blogPreview', array('io_blog' => $blog)) ?>
    </div>
  <?php endforeach; ?>
<?php else: ?>
  <?php if ($sf_params->get('tag')): ?>
    No blog entries found that match "<?php echo $sf_params->get('tag') ?>".
  <?php else: ?>
    No blog entries found.
  <?php endif; ?>
<?php endif; ?>

<?php echo get_io_pager_navigation($pager, 'io_blog_index') ?>