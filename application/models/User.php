<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/10 0010
 * Time: 下午 15:46
 */
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class User extends Model {

    public $table = 'users';

    protected $fillable = ['name', 'email', 'password'];

}