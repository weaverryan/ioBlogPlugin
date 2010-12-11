<?php use_stylesheet('/ioBlogPlugin/css/blog.css') ?>

<h1><?php echo $title ?></h1>

<?php include_partial('ioBlog/pagerNavigation', array(
  'pager'   => $pager,
  'route'   => $pagerRoute,
  'params'  => $filterQueryParams,
)) ?>

<?php if ($pager->getNbResults() > 0): ?>

  <?php echo editable_content_list(
    'div',
    $pager->getResults(),
    array('with_delete' => true, 'with_new' => true),
    'div',
    array('title', 'author_id', 'teaser'),
    array('partial' => 'ioBlog/blogPreview', 'class' => 'blog_preview')
  ) ?>
  
<?php else: ?>
  <?php if ($sf_params->get('tag')): ?>
    No blog entries found that match "<?php echo $sf_params->get('tag') ?>".
  <?php else: ?>
    No blog entries found.
  <?php endif; ?>
<?php endif; ?>

<?php include_partial('ioBlog/pagerNavigation', array(
  'pager'   => $pager,
  'route'   => $pagerRoute,
  'params'  => $filterQueryParams,
)) ?>