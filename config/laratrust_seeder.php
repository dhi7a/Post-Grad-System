<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'administrator' => [
            'users' => 'c,r,u,d',
            'payments' => 'c,r,u,d',
            'profile' => 'r,u',
        ],
        'faculty' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u',
        ],
        'department' => [
            'profile' => 'r,u',
        ],
        'dcca' => [
            'profile' => 'r,u',
        ],
        'supervisor' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u',
        ],
        'student' => [
            'profile' => 'r,u',
        ],
        'user' => [
            'profile' => 'r,u',
        ],

    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
    ],
];