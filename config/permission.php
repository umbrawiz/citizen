<?php

return [

    'models' => [

        /*
         * When using the "HasPermissions" trait from this package, we need to know which
         * Eloquent model should be used to retrieve your permissions. Of course, it
         * is often just the "Permission" model but you may use whatever you like.
         *
         * The model you want to use as a Permission model needs to implement the
         * `Spatie\Permission\Contracts\Permission` contract.
         */

        'permission' => Spatie\Permission\Models\Permission::class,

        /*
         * When using the "HasRoles" trait from this package, we need to know which
         * Eloquent model should be used to retrieve your roles. Of course, it
         * is often just the "Role" model but you may use whatever you like.
         *
         * The model you want to use as a Role model needs to implement the
         * `Spatie\Permission\Contracts\Role` contract.
         */

        'role' => Spatie\Permission\Models\Role::class,

    ],

    'table_names' => [

        /*
         * When using the "HasRoles" trait from this package, we need to know which
         * table should be used to retrieve your roles. We have chosen a basic
         * default value but you may easily change it to any table you like.
         */

        'roles' => 'roles',

        /*
         * When using the "HasPermissions" trait from this package, we need to know which
         * table should be used to retrieve your permissions. We have chosen a basic
         * default value but you may easily change it to any table you like.
         */

        'permissions' => 'permissions',

        /*
         * When using the "HasPermissions" trait from this package, we need to know which
         * table should be used to retrieve your models permissions. We have chosen a
         * basic default value but you may easily change it to any table you like.
         */

        'model_has_permissions' => 'model_has_permissions',

        /*
         * When using the "HasRoles" trait from this package, we need to know which
         * table should be used to retrieve your models roles. We have chosen a
         * basic default value but you may easily change it to any table you like.
         */

        'model_has_roles' => 'model_has_roles',

        /*
         * When using the "HasRoles" trait from this package, we need to know which
         * table should be used to retrieve your roles permissions. We have chosen a
         * basic default value but you may easily change it to any table you like.
         */

        'role_has_permissions' => 'role_has_permissions',
    ],

    'column_names' => [
        /*
         * Change this if you want to name the related pivots other than defaults
         */
        'role_pivot_key' => null, //default 'role_id',
        'permission_pivot_key' => null, //default 'permission_id',

        /*
         * Change this if you want to name the related model primary key other than
         * `model_id`.
         *
         * For example, this would be nice if your primary keys are all UUIDs. In
         * that case, name this `model_uuid`.
         */

        'model_morph_key' => 'model_id',

        /*
         * Change this if you want to use the teams feature and your related model's
         * foreign key is other than `team_id`.
         */

        'team_foreign_key' => 'team_id',
    ],

    /*
     * When set to true, the method for checking permissions will be registered on the gate.
     * Set this to false, if you want to implement custom logic for checking permissions.
     */

    'register_permission_check_method' => true,

    /*
     * When set to true the package implements teams using the 'team_foreign_key'. If you want
     * the migrations to register the 'team_foreign_key', you must set this to true
     * before doing the migration. If you already did the migration then you must make a new
     * migration to also add 'team_foreign_key' to 'roles', 'model_has_roles', and
     * 'model_has_permissions'(view the latest version of package's migration file)
     */

    'teams' => false,

    /*
     * When set to true, the required permission names are added to the exception
     * message. This could be considered an information leak in some contexts, so
     * the default setting is false here for optimum safety.
     */

    'display_permission_in_exception' => false,

    /*
     * When set to true, the required role names are added to the exception
     * message. This could be considered an information leak in some contexts, so
     * the default setting is false here for optimum safety.
     */

    'display_role_in_exception' => false,

    /*
     * By default wildcard permission lookups are disabled.
     */

    'enable_wildcard_permission' => false,

    'cache' => [

        /*
         * By default all permissions are cached for 24 hours to speed up performance.
         * When permissions or roles are updated the cache is flushed automatically.
         */

        'expiration_time' => \DateInterval::createFromDateString('24 hours'),

        /*
         * The cache key used to store all permissions.
         */

        'key' => 'spatie.permission.cache',

        /*
         * You may optionally indicate a specific cache driver to use for permission and
         * role caching using any of the `store` drivers listed in the cache.php config
         * file. Using 'default' here means to use the `default` set in cache.php.
         */

        'store' => 'default',
    ],
    'list' => [
        'admins' => [
            'list'      => 'admins.list',
            'create'    => 'admins.create',
            'update'    => 'admins.update',
            'delete'    => 'admins.delete'
        ],
        'province' => [
            'list'      => 'province.list',
            'create'    => 'province.create',
            'update'    => 'province.update',
            'delete'    => 'province.delete'
        ],
        'district' => [
            'list'      => 'district.list',
            'create'    => 'district.create',
            'update'    => 'district.update',
            'delete'    => 'district.delete'
        ],
        'ward' => [
            'list'      => 'ward.list',
            'create'    => 'ward.create',
            'update'    => 'ward.update',
            'delete'    => 'ward.delete'
        ],
        'declaration' => [
            'list'      => 'declaration.list',
            'create'    => 'declaration.create',
            'update'    => 'declaration.update',
            'delete'    => 'declaration.delete'
        ],
        'search-declaration' => [
            'list'      => 'search-declaration.list',
            'create'    => 'search-declaration.create',
            'update'    => 'search-declaration.update',
            'delete'    => 'search-declaration.delete'
        ],
        'village' => [
            'list'      => 'village.list',
            'create'    => 'village.create',
            'update'    => 'village.update',
            'delete'    => 'village.delete'
        ],
        'report-province' => [
            'list'      => 'report-province.list',
            'create'    => 'report-province.create',
            'update'    => 'report-province.update',
            'delete'    => 'report-province.delete'
        ],
        'report-district' => [
            'list'      => 'report-district.list',
            'create'    => 'report-district.create',
            'update'    => 'report-district.update',
            'delete'    => 'report-district.delete'
        ],
        'report-ward' => [
            'list'      => 'report-ward.list',
            'create'    => 'report-ward.create',
            'update'    => 'report-ward.update',
            'delete'    => 'report-ward.delete'
        ],
        'report-village' => [
            'list'      => 'report-village.list',
            'create'    => 'report-village.create',
            'update'    => 'report-village.update',
            'delete'    => 'report-village.delete'
        ],
    ],
    'A1' => [
        'admins' => [
            'list'      => 'admins.list',
            'create'    => 'admins.create',
            'update'    => 'admins.update',
            'delete'    => 'admins.delete'
        ],
        'province' => [
            'list'      => 'province.list',
            'create'    => 'province.create',
            'update'    => 'province.update',
            'delete'    => 'province.delete'
        ],
        'report-province' => [
            'list'      => 'report-province.list',
            'create'    => 'report-province.create',
            'update'    => 'report-province.update',
            'delete'    => 'report-province.delete'
        ],
        'report-district' => [
            'list'      => 'report-district.list',
            'create'    => 'report-district.create',
            'update'    => 'report-district.update',
            'delete'    => 'report-district.delete'
        ],
        'report-ward' => [
            'list'      => 'report-ward.list',
            'create'    => 'report-ward.create',
            'update'    => 'report-ward.update',
            'delete'    => 'report-ward.delete'
        ],
        'report-village' => [
            'list'      => 'report-village.list',
            'create'    => 'report-village.create',
            'update'    => 'report-village.update',
            'delete'    => 'report-village.delete'
        ],
        'search-declaration' => [
            'list'      => 'search-declaration.list',
            'create'    => 'search-declaration.create',
            'update'    => 'search-declaration.update',
            'delete'    => 'search-declaration.delete'
        ],
    ],
    'A2' => [
        'admins' => [
            'list'      => 'admins.list',
            'create'    => 'admins.create',
            'update'    => 'admins.update',
            'delete'    => 'admins.delete'
        ],
        'district' => [
            'list'      => 'district.list',
            'create'    => 'district.create',
            'update'    => 'district.update',
            'delete'    => 'district.delete'
        ],
        'report-province' => [
            'list'      => 'report-province.list',
            'create'    => 'report-province.create',
            'update'    => 'report-province.update',
            'delete'    => 'report-province.delete'
        ],
        'report-district' => [
            'list'      => 'report-district.list',
            'create'    => 'report-district.create',
            'update'    => 'report-district.update',
            'delete'    => 'report-district.delete'
        ],
        'report-ward' => [
            'list'      => 'report-ward.list',
            'create'    => 'report-ward.create',
            'update'    => 'report-ward.update',
            'delete'    => 'report-ward.delete'
        ],
        'report-village' => [
            'list'      => 'report-village.list',
            'create'    => 'report-village.create',
            'update'    => 'report-village.update',
            'delete'    => 'report-village.delete'
        ],
        'search-declaration' => [
            'list'      => 'search-declaration.list',
            'create'    => 'search-declaration.create',
            'update'    => 'search-declaration.update',
            'delete'    => 'search-declaration.delete'
        ],
    ],
    'A3' => [
        'admins' => [
            'list'      => 'admins.list',
            'create'    => 'admins.create',
            'update'    => 'admins.update',
            'delete'    => 'admins.delete'
        ],
        'ward' => [
            'list'      => 'ward.list',
            'create'    => 'ward.create',
            'update'    => 'ward.update',
            'delete'    => 'ward.delete'
        ],
        'report-district' => [
            'list'      => 'report-district.list',
            'create'    => 'report-district.create',
            'update'    => 'report-district.update',
            'delete'    => 'report-district.delete'
        ],
        'report-ward' => [
            'list'      => 'report-ward.list',
            'create'    => 'report-ward.create',
            'update'    => 'report-ward.update',
            'delete'    => 'report-ward.delete'
        ],
        'report-village' => [
            'list'      => 'report-village.list',
            'create'    => 'report-village.create',
            'update'    => 'report-village.update',
            'delete'    => 'report-village.delete'
        ],
        'search-declaration' => [
            'list'      => 'search-declaration.list',
            'create'    => 'search-declaration.create',
            'update'    => 'search-declaration.update',
            'delete'    => 'search-declaration.delete'
        ],
    ],
    'B1' => [
        'admins' => [
            'list'      => 'admins.list',
            'create'    => 'admins.create',
            'update'    => 'admins.update',
            'delete'    => 'admins.delete'
        ],
        'declaration' => [
            'list'      => 'declaration.list',
            'create'    => 'declaration.create',
            'update'    => 'declaration.update',
            'delete'    => 'declaration.delete'
        ],
        'village' => [
            'list'      => 'village.list',
            'create'    => 'village.create',
            'update'    => 'village.update',
            'delete'    => 'village.delete'
        ],
        'report-ward' => [
            'list'      => 'report-ward.list',
            'create'    => 'report-ward.create',
            'update'    => 'report-ward.update',
            'delete'    => 'report-ward.delete'
        ],
        'report-village' => [
            'list'      => 'report-village.list',
            'create'    => 'report-village.create',
            'update'    => 'report-village.update',
            'delete'    => 'report-village.delete'
        ],
        'search-declaration' => [
            'list'      => 'search-declaration.list',
            'create'    => 'search-declaration.create',
            'update'    => 'search-declaration.update',
            'delete'    => 'search-declaration.delete'
        ],
    ],
    'B2' => [
        'declaration' => [
            'list'      => 'declaration.list',
            'create'    => 'declaration.create',
            'update'    => 'declaration.update',
            'delete'    => 'declaration.delete'
        ],
        'report-village' => [
            'list'      => 'report-village.list',
            'create'    => 'report-village.create',
            'update'    => 'report-village.update',
            'delete'    => 'report-village.delete'
        ],
    ]
];
