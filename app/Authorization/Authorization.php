<?php
/**
 * User: ZhuKaihao
 * Date: 2018/5/3
 * Time: 下午3:44
 */

namespace App\Authorization;

use App\Exceptions\AuthorizationException;
use Firebase\JWT\JWT;

class Authorization
{
    /**
     * 加密key
     */
    const SECRET = 'love_r';

    /**
     * token 在 header 中的标志
     */
    const TOKEN_KEY = 'TOKEN';

    /**
     * 生成token
     * @param $userType string 用户类型
     *      wechat: 微信小程序用户
     *      library: 图书馆管理员
     *      wiki: 图书wiki系统用户
     *      admin: 超级管理员
     * @param $uid integer 用户id
     * @param $otherPayload array 其他数据
     * @return string
     */
    public static function encode($userType, $uid, $otherPayload = [])
    {
        // TODO token过期: 设置exp字段
        return JWT::encode(array_merge([
            'user_type' => $userType,
            'user_id'   => $uid
        ], $otherPayload), self::SECRET);
    }

    /**
     * 获取token内容
     * @param $jwt string
     * @throws \App\Exceptions\UnauthorizedException token不合法
     * @return array payload
     */
    public static function decode($jwt)
    {
        try {
            return (array)JWT::decode($jwt, self::SECRET, ['HS256']);
        } catch (\Exception $e) {
            throw AuthorizationException::invalidToken();
        }
    }
}