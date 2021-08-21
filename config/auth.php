<?php

return [

    'defaults' => [
        'guard' => 'super_admin',
        'passwords' => 'users',
    ],
    'guards' => [
        'super_admin' => [
            'driver' => 'session',
            'provider' => 'super_admins',
        ],
        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],
        'user' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'candidate' => [
            'driver' => 'session',
            'provider' => 'candidates',
        ],
        'teacher' => [
            'driver' => 'session',
            'provider' => 'teachers',
        ],
        'student' => [
            'driver' => 'session',
            'provider' => 'students',
        ],
        'company' => [
            'driver' => 'session',
            'provider' => 'companies',
        ],
        'api' => [
            'driver' => 'token',
            'provider' => 'users',
            'hash' => false,
        ],
    ],



    'providers' => [
        'super_admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\SuperAdmin::class,
        ],
        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class,
        ],
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
        'candidates' => [
            'driver' => 'eloquent',
            'model' => Modules\Company\Entities\Candidate::class,
        ],
        'teachers' => [
            'driver' => 'eloquent',
            'model' => App\Models\Teacher::class,
        ],
        'students' => [
            'driver' => 'eloquent',
            'model' => App\Models\Student::class,
        ],
        'companies' => [
            'driver' => 'eloquent',
            'model' => Modules\Company\Entities\Company::class,
        ],
        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],



    'passwords' => [
        'super_admins' => [
            'provider' => 'super_admins',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
        'admins' => [
            'provider' => 'admins',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
        'candidates' => [
            'provider' => 'candidates',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
        'students' => [
            'provider' => 'students',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
        'teachers' => [
            'provider' => 'teachers',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
        'companies' => [
            'provider' => 'companies',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],



    'password_timeout' => 10800,

];
