<?php
/**
 * Plugin configuration file for ioBlogPlugin
 *
 * This plugin depends on the following plugins:
 *   * ioPagePlugin [http://github.com/iostudio/ioPagePlugin]
 *   * sfDoctrineGuardPlugin [http://github.com/davidsblom/sfDoctrineGuardPlugin]
 *   * vjCommentPlugin [http://github.com/weaverryan/vjCommentPlugin]
 *   * sfDoctrineActAsTaggablePlugin [http://github.com/weaverryan/sfDoctrineActAsTaggablePlugin]
 *   * ioEditableContentPlugin [http://github.com/weaverryan/ioEditableContentPlugin]
 *
 * @author Ryan Weaver <ryan.weaver@iostudio.com>
 */
class ioBlogPluginConfiguration extends sfPluginConfiguration
{
  public function initialize()
  {
    sfConfig::set('sf_enabled_modules', array_merge(
      sfConfig::get('sf_enabled_modules', array()),
      array('ioBlog')
    ));
  }
}