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
class Article extends Eloquent {

    use \Rutorika\Sortable\SortableTrait;
}