<?php use_helper('Gravatar') ?>
<?php use_stylesheet('/ioBlogPlugin/css/author.css') ?>

<?php if ($blog['Author']['Profile']->bio): ?>
  <div class="author_bio">
    <?php echo image_tag(
      gravatar_image_path($blog['Author']->email_address, 80),
      array('alt' => $blog['Author']->getFullName(), 'class' => 'float_left')
    ) ?>

    <p>
      <b>About the author</b> - <?php echo $blog['Author']['Profile']->getRaw('bio') ?>
    </p>

    <div class="clear">&nbsp;</div>
  </div>
<?php endif; ?>