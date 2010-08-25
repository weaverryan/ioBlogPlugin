<?php echo editable_content_tag('h1', $blog, 'title') ?>

<?php echo editable_content_tag('div', $blog, 'body', array('class' => 'body')) ?>

<?php include_partial('ioBlog/authorBio', array('blog' => $blog)) ?>
<br/><br/>

<?php include_component('comment', 'formComment', array('object' => $blog)) ?>
<?php include_component('comment', 'list', array('object' => $blog, 'i' => 0)) ?>

<?php slot('sidebar') ?>
  <?php include_partial('ioBlog/blogSidebar', array('blog' => $blog)) ?>
<?php end_slot() ?>