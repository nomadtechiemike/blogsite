<?php

namespace Botble\Comment;

use Artisan;
use Botble\Base\Supports\Commands\Permission;
use Schema;
use Botble\Base\Interfaces\PluginInterface;

class Plugin implements PluginInterface
{

    /**
     * @return array
     * @author Sang Nguyen
     */
    public static function permissions()
    {
        return [
            [
                'name' => 'Comment',
                'flag' => 'comment.list',
                'is_feature' => true
            ],
            [
                'name' => 'Create',
                'flag' => 'comment.create',
                'parent_flag' => 'comment.list'
            ],
            [
                'name' => 'Edit',
                'flag' => 'comment.edit',
                'parent_flag' => 'comment.list'
            ],
            [
                'name' => 'Delete',
                'flag' => 'comment.delete',
                'parent_flag' => 'comment.list'
            ]
        ];
    }

    /**
     * @author Sang Nguyen
     */
    public static function activate()
    {
        $permissions = self::permissions();
        Permission::registerPermission($permissions);
        Artisan::call('migrate', ['--force' => true, '--path' => 'plugins/comment/database/migrations']);
    }

    /**
     * @author Sang Nguyen
     */
    public static function deactivate()
    {

    }

    /**
     * @author Sang Nguyen
     */
    public static function remove()
    {
        $permissions = self::permissions();
        Permission::removePermission($permissions);
        Schema::dropIfExists('comment');
    }
}