<?php

namespace app\commands;

use Yii;
use yii\console\Controller;
/**
 * Инициализатор RBAC выполняется в консоли php yii rbac/init
 */
class RbacController extends Controller {

    public function actionInit() {
        $auth = Yii::$app->authManager;

        $auth->removeAll(); //На всякий случай удаляем старые данные из БД...

        // Создадим роли админа и редактора новостей
        $root = $auth->createRole('roleRoot');
        $user = $auth->createRole('roleUser');
        $stud = $auth->createRole('roleStud');

        // запишем их в БД
        $auth->add($root);
        $auth->add($user);
        $auth->add($stud);

        // Создаем разрешения. Например, просмотр админки PermissionRoot и редактирование новости PermissionUser
        $PermissionRoot = $auth->createPermission('PermissionRoot');
        $PermissionRoot->description = 'Просмотр ЛК root';

        $PermissionUser = $auth->createPermission('PermissionUser');
        $PermissionUser->description = 'Просмотр ЛК user';

        $PermissionStud = $auth->createPermission('PermissionStud');
        $PermissionStud->description = 'Просмотр ЛК stud';

        // Запишем эти разрешения в БД
        $auth->add($PermissionRoot);
        $auth->add($PermissionUser);
        $auth->add($PermissionStud);

        // Теперь добавим наследования. Для роли user мы добавим разрешение PermissionUser,
        // а для админа добавим наследование от роли user и еще добавим собственное разрешение PermissionRoot

        // Роли «Редактор новостей» присваиваем разрешение «Редактирование новости»
        $auth->addChild($user,$PermissionUser);

        // админ наследует роль редактора новостей. Он же админ, должен уметь всё! :D
        $auth->addChild($root, $user);

        // Еще админ имеет собственное разрешение - «Просмотр админки»
        $auth->addChild($root, $PermissionRoot);

        $auth->addChild($stud, $PermissionStud);

        // Назначаем роль admin пользователю с ID 3
        $auth->assign($root, 3);

        // Назначаем роль editor пользователю с ID 4
        $auth->assign($user, 4);

        $auth->assign($stud, 5);
    }
}
