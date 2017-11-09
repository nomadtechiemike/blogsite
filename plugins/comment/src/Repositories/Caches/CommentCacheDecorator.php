<?php

namespace Botble\Comment\Repositories\Caches;

use Botble\Base\Repositories\Caches\CacheAbstractDecorator;
use Botble\Base\Services\Cache\CacheInterface;
use Botble\Comment\Repositories\Interfaces\CommentInterface;

class CommentCacheDecorator extends CacheAbstractDecorator implements CommentInterface
{
    /**
     * @var CommentInterface
     */
    protected $repository;

    /**
     * @var CacheInterface
     */
    protected $cache;

    /**
     * CommentCacheDecorator constructor.
     * @param CommentInterface $repository
     * @param CacheInterface $cache
     * @author Sang Nguyen
     */
    public function __construct(CommentInterface $repository, CacheInterface $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }
}
