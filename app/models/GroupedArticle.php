<?php

/**
 * Article
 *
 * @property integer $id
 * @property string $title
 * @property integer $position
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Article sorted() 
 */
class GroupedArticle extends Eloquent {

    protected static $sortableGroupField = 'category';

    use \Rutorika\Sortable\SortableTrait;
}