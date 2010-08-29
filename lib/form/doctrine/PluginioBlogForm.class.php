<?php

/**
 * PluginuhpBlog form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfDoctrineFormPluginTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
abstract class PluginioBlogForm extends BaseioBlogForm
{
  public function setup()
  {
    parent::setup();

    $this->useFields(array(
      'title',
      'slug',
      'body',
      'meta_keywords',
      'meta_description',
      'author_id',
      'published_at',
      'teaser',
    ));

    $this->widgetSchema['author_id'] = new sfWidgetFormDoctrineChoice(array(
      'model' => 'sfGuardUser',
      'add_empty' => true,
    ));

    $this->addTagsField();
  }
}
