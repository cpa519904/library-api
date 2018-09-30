<?php
/**
 * User: ZhuKaihao
 * Date: 2018/6/17
 * Time: 下午4:49
 */

namespace App\Authorization;

use \Psr\Http\Message\ServerRequestInterface as Request;

class AuthDecodeHelper
{
    /**
     * 获取token的用户id
     * @param $request Request
     * @throws \App\Exceptions\UnauthorizedException
     * @return integer
     */
    public static function getUserIdFromRequest($request)
    {
        $payload = self::getTokenPayloadFromRequest($request);
        return $payload['user_id'];
    }

    /**
     * 获取token内容
     * @param $request Request
     * @throws \App\Exceptions\UnauthorizedException
     * @return array
     */
    public static function getTokenPayloadFromRequest($request) {
        $token = $request->getHeader(Authorization::TOKEN_KEY)[0];;
        return Authorization::decode($token);
    }
}