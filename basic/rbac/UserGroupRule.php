<?php
namespace app\rbac;

use Yii;
use yii\rbac\Rule;

class UserGroupRule extends Rule
{
    public $name = 'userGroup';

    public function execute($user, $item, $params)
    {
        if (!\Yii::$app->user->isGuest) {
            $group = \Yii::$app->user->identity->group;
            if ($item->name === 'admin') {
                return $group == 'admin';
            } elseif ($item->name === 'user') {
                return $group == 'admin' || $group == 'user';
            } elseif ($item->name === 'author') {
                return $group == 'admin' || $group == 'author';
            }
        }
        return true;
    }
}