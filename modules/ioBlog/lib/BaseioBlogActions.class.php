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
    $q = $this->setupQueryFromRequest($request);
    $this->title = $this->getTitleFromRequest($request);

    $this->pager = new sfDoctrinePager('ioBlog', sfConfig::get('app_io_blog_per_page', 10));
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

  /**
   * Creates a query from the request with proper filters for authors,
   * tags, etc
   *
   * @param sfWebRequest $request
   * @return Doctrine_Query
   */
  protected function setupQueryFromRequest(sfWebRequest $request)
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

    $this->filterQueryParams = array();
    $this->pagerRoute = 'io_blog_index';

    // process a tag parameter if present
    if ($tag = $request->getParameter('tag'))
    {
      Doctrine_Core::getTable('Tag')->getObjectTaggedWithQuery(
        'ioBlog',
        $tag,
        $q
      );

      $this->filterQueryParams['tag'] = $tag;
      $this->pagerRoute = 'io_blog_index_tag';
    }
    elseif ($author = $request->getParameter('author'))
    {
      $user = Doctrine_Core::getTable('sfGuardUser')->findOneByUsername($author);
      $this->forward404Unless($user);
      $q = $tbl->addAuthorQuery($user, $q);

      $this->filterQueryParams['author'] = $author;
      $this->pagerRoute = 'io_blog_index_author';
    }

    $q = $tbl->addAuthorJoinQuery($q);

    return $q;
  }

  /**
   * Attempts to return a decent page title based on how things are
   * being filtered
   *
   * @param sfWebRequest $request
   * @return string
   */
  protected function getTitleFromRequest(sfWebRequest $request)
  {
    // process a tag parameter if present
    if ($request->getParameter('tag'))
    {
      return sprintf('Blog entries for "%s"', $request->getParameter('tag'));
    }
    elseif ($author = $request->getParameter('author'))
    {
      return sprintf('Blog entries by %s', $author);
    }

    return sfConfig::get('app_io_blog_index_title', 'Recent Blog Entries');
  }
}