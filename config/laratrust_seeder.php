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
        'admin' => [
            'specialties' => 'c,r,u,d',
            'users' => 'c,r,u,d',
            'doctors' => 'c,r,u,d',
            'times' => 'r',
            'available_times' => 'c,r,u,d',
            'appointments' => 'c,r,u,d',
        ],
        'patient' => [
            'specialties' => 'r',
            'users' => 'c,r,u,d',
            'available_times' => 'r',
            'appointments' => 'c,r,u,d',
        ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
    ],
];
