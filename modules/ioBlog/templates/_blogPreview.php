<?php use_stylesheet('/ioBlogPlugin/css/blog.css') ?>

<h3>
  <a href="<?php echo url_for('io_blog_show', $io_blog) ?>"><?php echo $io_blog->title ?></a>
</h3>

<?php include_partial('ioBlog/byline', array('io_blog' => $io_blog)) ?>

<?php echo $io_blog->getPreview() ?>

<?php echo link_to('Read more', 'io_blog_show', $io_blog, array('class' => 'read_more')) ?>
<div class="clear"></div>