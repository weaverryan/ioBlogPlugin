<h3>
  <a href="<?php echo url_for('io_blog_show', $io_blog) ?>"><?php echo $io_blog->title ?></a>
</h3>
<h4><?php echo $io_blog->Author->getName() ?></h4>

<?php echo $io_blog->getPreview() ?>

<?php echo link_to('Read more', 'io_blog_show', $io_blog, array('class' => 'read_more')) ?>
<div class="clear"></div>