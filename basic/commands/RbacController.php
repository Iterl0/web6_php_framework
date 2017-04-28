<?php
namespace app\commands;

use Yii;
use yii\console\Controller;
use \app\rbac\UserGroupRule;

class RbacController extends Controller
{
    public function actionInit()
    {
        $authManager = \Yii::$app->authManager;

        // Create roles
        $guest  = $authManager->createRole('guest');
        $user  = $authManager->createRole('user');
        $author = $authManager->createRole('author');
        $admin  = $authManager->createRole('admin');

        // Create simple, based on action{$NAME} permissions
        $login  = $authManager->createPermission('login');
        $logout = $authManager->createPermission('logout');
        $post = $authManager->createPermission('post');
        $posts = $authManager->createPermission('posts');

        // Add permissions in Yii::$app->authManager
        $authManager->add($login);
        $authManager->add($logout);
        $authManager->add($post);
        $authManager->add($posts);

        // Add rule, based on UserExt->group === $user->group
        $userGroupRule = new UserGroupRule();
        $authManager->add($userGroupRule);

        // Add rule "UserGroupRule" in roles
        $guest->ruleName  = $userGroupRule->name;
        $user->ruleName  = $userGroupRule->name;
        $author->ruleName = $userGroupRule->name;
        $admin->ruleName  = $userGroupRule->name;

        // Add roles in Yii::$app->authManager
        $authManager->add($guest);
        $authManager->add($user);
        $authManager->add($author);
        $authManager->add($admin);

        // Add permission-per-role in Yii::$app->authManager
        // Guest
        $authManager->addChild($guest, $login);
        $authManager->addChild($guest, $logout);

        // user
        $authManager->addChild($user, $guest);
        $authManager->addChild($author, $post);
        $authManager->addChild($author, $posts);
        //author
        $authManager->addChild($author, $user);
        //admin
        $authManager->addChild($admin, $author);

        $authManager->assign($user, 101);
        $authManager->assign($admin, 100);
    }
}
