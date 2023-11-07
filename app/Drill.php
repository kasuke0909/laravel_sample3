<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drill extends Model // 必ず単数系　複数形(Drills)のテーブル名ちリンクする fillable ⇔ guardedは変更してもいいカラム
{
    protected $fillable = ['title', 'category_name', 'problem0', 'problem1', 'problem2', 'problem3', 'problem4', 'problem5', 'problem6', 'problem7', 'problem8', 'problem9'];
}
