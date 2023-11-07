<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class todo extends Model //クラスの複数形がデータベースの名前でないと操作できない
{
    protected $fillable = ['contents'];
}
