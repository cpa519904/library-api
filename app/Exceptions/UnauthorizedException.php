<?php
/**
 * User: ZhuKaihao
 * Date: 2018/6/6
 * Time: 下午12:11
 */

namespace App\Exceptions;

/**
 * 401 错误对象
 */
class UnauthorizedException extends BaseException
{
    public function __construct($message, $errMsg = 'Unauthorized', $code = 401)
    {
        parent::__construct($message, $errMsg, $code);
    }
}