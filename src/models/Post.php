<?php
/**
 * Created by PhpStorm.
 * User: 'K'loud
 * Date: 24.08.2017
 * Time: 17:55
 */

namespace app\src\models;

/**
 * Class Post
 *
 * @property integer $id
 * @property string $title
 * @property string $created_at
 * @property string $content
 * @property string $user_id
 *
 */

/**
 * @method static Builder where($column, $operator = null, $value = null, $boolean = 'and')
 * @method static Builder create(array $attributes = [])
 * @method public Builder update(array $values)
 */

class Post extends \Illuminate\Database\Eloquent\Model {

    protected $table = 'posts';
    public $timestamps = false;

}
