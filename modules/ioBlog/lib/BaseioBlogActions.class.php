<?php

/**
 * Main blog actions class
 */
class BaseioBlogActions extends sfActions
{
  /**
   * The index page for blog items
   *
   * @param sfWebRequest $request
   * @return void
   */
  public function executeIndex(sfWebRequest $request)
  {
    $tbl = Doctrine_Core::getTable('ioBlog');

    if (!$this->userCanEditPages())
    {
      $q = $tbl->addIsPublishedQuery();
    }
    else
    {
      $q = $tbl->createQuery('p');
    }
    $q = $tbl->addRecentOrderBy($q);

    // process a tag parameter if present
    if ($request->getParameter('tag'))
    {
      Doctrine_Core::getTable('Tag')->getObjectTaggedWithQuery(
        'ioBlog',
        $request->getParameter('tag'),
        $q
      );

      $this->title = sprintf('Blog entries for "%s"', $request->getParameter('tag'));
    }
    elseif ($author = $request->getParameter('author'))
    {
      $user = Doctrine_Core::getTable('sfGuardUser')->findOneByUsername($author);
      $this->forward404Unless($user);
      $q = $tbl->addAuthorQuery($user, $q);

      $this->title = sprintf('Blog entries by %s', $author);
    }
    else
    {
      $this->title = 'Recent blog entries';
    }

    $this->pager = new sfDoctrinePager('ioBlog', 10);
    $this->pager->setQuery($q);
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
  }

  /**
   * Frontend show route for a blog entry
   *
   * @return void
   */
  public function executeShow(sfWebRequest $request)
  {
    $this->blog = $this->getRoute()->getObject();
    $this->getContentLoader($this->blog, $this)->load();
  }
}