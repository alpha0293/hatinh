<?php

namespace Botble\Blog\Repositories\Interfaces;

use Botble\Support\Repositories\Interfaces\RepositoryInterface;
use Eloquent;

interface PostInterface extends RepositoryInterface
{
    /**
     * @param int $limit
     * @return mixed
     */
    public function getFeatured($limit = 5);

/**
     * @param int $limit
     * @return mixed
     */
    public function getFeaturedOfCategory($idCate, $limit = 3);
    
    /**
     * @param array $filters
     * @return mixed
     */
    public function getFilters(array $filters);

    /**
     * @param array $selected
     * @param int $limit
     * @return mixed
     */
    public function getListPostNonInList(array $selected = [], $limit = 7);

    /**
     * @param array $selected
     * @param int $limit
     * @return mixed
     */
    public function get_posts_NOT_category(array $categoryid = [], array $notpost=[], $paginate = 6, $limit);

    /**
     * @param int|array $categoryId
     * @param int $paginate
     * @param int $limit
     * @return mixed
     */
    public function getByCategory($categoryId , $paginate = 12, $limit = 0);

    /**
     * @param int $authorId
     * @param int $limit
     * @return mixed
     */
    public function getByUserId($authorId, $limit = 6);

    /**
     * @return mixed
     */
    public function getDataSiteMap();

    /**
     * @param int $tag
     * @param int $paginate
     * @return mixed
     */
    public function getByTag($tag, $paginate = 12);

    /**
     * @param int $tag
     * @param int $paginate
     * @return mixed
     */
    public function getByRelativeTag($tag, $paginate = 6);

    /**
     * @param int $id
     * @param int $limit
     * @return mixed
     */
    public function getRelated($id, $limit = 3);

    /**
     * @param int $id
     * @param int $limit
     * @return mixed
     */
    public function getSamePosts(array $idCategory = [], $idPost, $paginate = 6, $limit = 6);

    /**
     * @param int $limit
     * @param int $categoryId
     * @return mixed
     */
    public function getRecentPosts($limit = 5, $categoryId = 0);

   

    /**
     * @param string $query
     * @param int $limit
     * @param int $paginate
     * @return mixed
     */
    public function getSearch($query, $limit = 10, $paginate = 10);

    /**
     * @param int $perPage
     * @param bool $active
     * @return mixed
     */
    public function getAllPosts($perPage = 12, $active = true);

    /**
     * @param int $limit
     * @param array $args
     * @return mixed
     */
    public function getPopularPosts($limit, array $args = []);

    /**
     * @param Eloquent|int $model
     * @return array
     */
    public function getRelatedCategoryIds($model);
}
