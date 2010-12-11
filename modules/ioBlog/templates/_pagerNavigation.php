<?php $params = unescape_variable($params) ?>
<?php $webRoot = sfConfig::get('app_io_blog_web_dir', '/ioBlogPlugin') ?>

<?php if ($pager->haveToPaginate()): ?>
  <div class="pagination">
    <a href="<?php echo url_for($route, array_merge($params, array('page' => 1))) ?>"><?php echo image_tag($webRoot.'/images/pager/first.png', array('alt' => 'First page')) ?></a>

    <a href="<?php echo url_for($route, array_merge($params, array('page' => $pager->getPreviousPage()))) ?>"><?php echo image_tag($webRoot.'/images/pager/previous.png', array('alt' => 'Previous page')) ?></a>

    <?php foreach ($pager->getLinks() as $page): ?>
      <?php if ($page == $pager->getPage()): ?>
        <b><?php echo $page ?></b>
      <?php else: ?>
        <a href="<?php echo url_for($route, array_merge($params, array('page' => $page))) ?>"><?php echo $page ?></a>
      <?php endif; ?>
    <?php endforeach; ?>

    <a href="<?php echo url_for($route, array_merge($params, array('page' => $pager->getNextPage()))) ?>"><?php echo image_tag($webRoot.'/images/pager/next.png', array('alt' => 'Next page')) ?></a>

    <a href="<?php echo url_for($route, array_merge($filterQueryParams, array('page' => $pager->getLastPage()))) ?>"><?php echo image_tag($webRoot.'/images/pager/last.png', array('alt' => 'Last page')) ?></a>
  </div>
<?php endif; ?>
