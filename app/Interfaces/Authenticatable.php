<?php
/**
 * User: ZhuKaihao
 * Date: 2018/6/17
 * Time: 下午1:47
 */

namespace App\Interfaces;


interface Authenticatable
{
    public function getToken($payload);
}