<?php
/**
 * Created by PhpStorm.
 * User: 'K'loud
 * Date: 25.08.2017
 * Time: 17:36
 */

namespace app\src\models;

/**
 * Class Post
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 *
 */

/**
 * @method static Builder where($column, $operator = null, $value = null, $boolean = 'and')
 * @method static Builder create(array $attributes = [])
 * @method public Builder update(array $values)
 */


class User extends \Illuminate\Database\Eloquent\Model {

    protected $table = 'users';
    public $timestamps = false;

}