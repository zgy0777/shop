<?php

return [

    //站点标题
    'name' => 'Laravel-shop',

    //站点logo
    'logo' => '<b>Laravel</b> shop',

    //顶部小logo
    'logo-mini' => '<b>LS</b>',

    //路由设置
    'route' => [
        //路由前缀
        'prefix' => 'admin',
        //控制器命名空间前缀
        'namespace' => 'App\\Admin\\Controllers',
        //默认中间件列表
        'middleware' => ['web', 'admin'],
    ],

    //admin安装目录
    'directory' => app_path('Admin'),

    //页面标题
    'title' => 'Laravel shop 管理后台',

    //是否使用https
    'secure' => false,

   //用户认证设置
    'auth' => [
        'guards' => [
            'admin' => [
                'driver'   => 'session',
                'provider' => 'admin',
            ],
        ],

        'providers' => [
            'admin' => [
                'driver' => 'eloquent',
                'model'  => Encore\Admin\Auth\Database\Administrator::class,
            ],
        ],
    ],

    //文件上传设置
    'upload' => [

        // 对应filesystem.php中到  Disk in `config/filesystem.php`.
        'disk' => 'public',

        // Image and file upload path under the disk above.
        'directory' => [
            'image' => 'images',
            'file'  => 'files',
        ],
    ],

    //数据库设置
    'database' => [

        // Database connection for following tables.
        'connection' => '',

        // User tables and model.
        'users_table' => 'admin_users',
        'users_model' => Encore\Admin\Auth\Database\Administrator::class,

        // Role table and model.
        'roles_table' => 'admin_roles',
        'roles_model' => Encore\Admin\Auth\Database\Role::class,

        // Permission table and model.
        'permissions_table' => 'admin_permissions',
        'permissions_model' => Encore\Admin\Auth\Database\Permission::class,

        // Menu table and model.
        'menu_table' => 'admin_menu',
        'menu_model' => Encore\Admin\Auth\Database\Menu::class,

        // 多对多关联中间表
        'operation_log_table'    => 'admin_operation_log',
        'user_permissions_table' => 'admin_user_permissions',
        'role_users_table'       => 'admin_role_users',
        'role_permissions_table' => 'admin_role_permissions',
        'role_menu_table'        => 'admin_role_menu',
    ],

    //操作日志设置
    'operation_log' => [

        'enable' => true,

        //不起操作多路由
        'except' => [
            'admin/auth/logs*',
        ],
    ],

    //页面风格
    //@see https://adminlte.io/docs/2.4/layout
    'skin' => 'skin-blue-light',

    /*
    |--------------------------------------------------------------------------
    | Application layout
    |--------------------------------------------------------------------------
    |
    | This value is the layout of admin pages.
    | @see https://adminlte.io/docs/2.4/layout
    |
    | Supported: "fixed", "layout-boxed", "layout-top-nav", "sidebar-collapse",
    | "sidebar-mini".
    |
    */
    //页面组件布局
    'layout' => ['sidebar-mini', 'sidebar-collapse'],

    /*
    |--------------------------------------------------------------------------
    | Login page background image
    |--------------------------------------------------------------------------
    |
    | This value is used to set the background image of login page.
    | 页面背景展示
    |
    */
    'login_background_image' => '',

    /*
    |--------------------------------------------------------------------------
    | Version
    |--------------------------------------------------------------------------
    |
    | This version number set will appear in the page footer.
    | 底部展示到版本
    */
    'version' => '1.5.x-dev',

    /*
    |--------------------------------------------------------------------------
    | Settings for extensions.
    |--------------------------------------------------------------------------
    |
    | You can find all available extensions here
    | https://github.com/laravel-admin-extensions.
    | 拓展设置
    */
    'extensions' => [

    ],
];
