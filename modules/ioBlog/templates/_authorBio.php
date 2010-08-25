<?php use_helper('Gravatar') ?>
<?php use_stylesheet('/ioBlogPlugin/css/author.css') ?>

<?php if ($blog['Author']): ?>
  <div class="author_bio">
    <?php echo image_tag(
      gravatar_image_path($blog['Author']->email_address, 80),
      array(
        'alt' => $blog['Author']->getFirstName().' '.$blog['Author']->getLastName(),
        'class' => 'float_left'
      )
    ) ?>

    <div class="clear">&nbsp;</div>
  </div>
<?php endif; ?>