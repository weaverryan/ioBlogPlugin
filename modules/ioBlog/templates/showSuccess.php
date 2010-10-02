<?php use_stylesheet('/ioBlogPlugin/css/blog.css') ?>

<?php echo editable_content_tag('h1', $blog, 'title') ?>

<?php echo editable_content_tag('div', $blog, 'author_id', array('class' => 'byline', 'partial' => 'ioBlog/byline')) ?>

<?php echo editable_content_tag('div', $blog, 'body', array('class' => 'body')) ?>

<?php include_component('comment', 'formComment', array('object' => $blog)) ?>
<?php include_component('comment', 'list', array('object' => $blog, 'i' => 0)) ?>
