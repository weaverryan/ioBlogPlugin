<?php

$feed = new sfRss201Feed();
$feed->setTitle('Usedhogparts.com Blog');
$feed->setLink(url_for('@io_blog_index', true));

foreach ($pager->getResults() as $post)
{
  $item = new sfFeedItem();
  $item->setTitle($post->getTitle());
  $item->setLink(url_for('io_blog_show', $post, true));
  $item->setAuthorName($post->getAuthor()->getName());
  $item->setAuthorEmail($post->getAuthor()->email_address);
  $item->setPubdate(date('U', strtotime($post->created_at)));
  $item->setUniqueId($post->id);
  $item->setDescription($post->getPreview());

  $feed->addItem($item);
}

decorate_with(false);
echo $feed->asXml();