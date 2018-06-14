<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/14
 * Time: 12:03
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'student';
    public $timestamps = true;

    public function getDateFormat()
    {
        return time();
    }
    public function asDateTime($value)
    {
        return date('Y-m-d H:i:s',$value);
    }
}