<?php
/**
 * Created by PhpStorm.
 * User: xuxiaodao
 * Date: 2017/11/5
 * Time: 下午4:43
 */

namespace App\Http\Logic;


use App\User;

class UserLogic
{

    /**
     * 新增用户
     *
     * @author yezi
     *
     * @param $openId
     * @param $data
     *
     * @return mixed
     */
    public function createWeChatUser($openId, $data)
    {
        $result = User::create([
            User::FIELD_ID_OPENID => $openId,
            User::FIELD_NICKNAME  => $data['nickName'],
            User::FIELD_GENDER    => $data['gender'] ? $data['gender'] : 0,
            User::FIELD_AVATAR    => $data['avatarUrl'],
            User::FIELD_CITY      => $data['city'] ? $data['city'] : '无',
            User::FIELD_COUNTRY   => $data['country'] ? $data['country'] : '无',
            User::FIELD_PROVINCE  => $data['province'] ? $data['province'] : '无',
            User::FIELD_LANGUAGE  => $data['language'],
            User::FIELD_TYPE      => User::ENUM_TYPE_WE_CHAT_USER,
            User::FIELD_STATUS    => User::ENUM_STATUS_ACTIVITY
        ]);

        return $result;
    }

}