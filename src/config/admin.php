<?php

$settings = [
    'cancel_route' => '/dash',
    'paginate' => [
        'enabled' => true,
        'count' => 20
    ],
    'theme' => 'light',
    'sign_in_view' => [
        'heading' => 'Sign In.',
        'logo' => [
            'image' => 'images/logo.svg',
            'class' => 'img-fluid',
            'route' => null,
            'alt' => 'Company logo'
        ]
    ],
    'nav' => [
        'logged_out' => [
            'display' => false,
            'logo' => [
                'image' => 'images/logo.svg',
                'class' => 'logo',
                'route' => '/',
                'alt' => 'Company logo'
            ],
            'style' => 'light',
            'left' => [
                'list' => []
            ],
            'right' => [
                'list' => [
                    [
                        'title' => 'Login',
                        'route'   =>  'login',
                    ],
                    [
                        'title' => 'Sign Up',
                        'route'   =>  'register',
                    ]
                ]
            ]
        ],
        'roles' => [
            'admin' => [
                'display' => true,
                'show_collapse' => true,
                'logo' => [
                    'image' => 'images/logo.svg',
                    'class' => 'logo',
                    'route' => 'admin'
                ],
                'style' => 'dark',
                'left' => [
                    'list' => [
                        [
                            'title' => 'Home',
                            'route'   =>  'admin',
                        ],
                    ]
                ],
                'right' => [
                    'list' => [
                        [
                            'title' => ['auth.first_name', 'auth.last_name'],
                            'list' => [
                                [
                                    'title' => 'Settings',
                                    'route' => 'admin/settings',
                                    'onclick' => ''
                                ],
                                [],
                                [
                                    'title' => 'Logout',
                                    'route' => 'logout',
                                    'onclick' => 'event.preventDefault();document.getElementById(\'logout-form\').submit();',
                                    'logoutForm' => true
                                ],
                            ]
                        ],
                    ]
                ]
            ],
            'user' => [
                'display' => true,
                'show_collapse' => true,
                'logo' => [
                    'image' => 'images/logo.svg',
                    'class' => 'logo',
                    'route' => 'dash'
                ],
                'style' => 'dark',
                'left' => [
                    'list' => [
                        [
                            'title' => 'Home',
                            'route'   =>  'dash',
                        ],
                    ]
                ],
                'right' => [
                    'list' => [
                        [
                            'title' => ['auth.first_name', 'auth.last_name'],
                            'list' => [
                                [
                                    'title' => 'Settings',
                                    'route' => 'admin/settings',
                                    'onclick' => ''
                                ],
                                [],
                                [
                                    'title' => 'Logout',
                                    'route' => 'logout',
                                    'onclick' => 'event.preventDefault();document.getElementById(\'logout-form\').submit();',
                                    'logoutForm' => true
                                ],
                            ]
                        ],
                    ]
                ]
            ]
        ]
    ],
    'side_nav' => [
        'roles' => [
            'admin' => [
                'theme' => 'dark',
                'show' => true,
                'buttons' => [
                   [
                       'title' => 'Dashboard',
                       'route' => 'dash',
                       'order' => 1 
                   ]
               ]
           ]
       ]
    ]
];

if(file_exists(base_path() . '/vendor/jameron/regulator/') && isset($settings['side_nav']['roles']['admin'])) { 
    array_push($settings['side_nav']['roles']['admin']['buttons'], ['title'=>'Users','route'=> \Config::get('regulator.user.resource_route'), 'icon'=>'<i class="fa fa-users" aria-hidden="true"></i>','order'=>9]);
    array_push($settings['side_nav']['roles']['admin']['buttons'], ['title'=>'Roles','route'=> \Config::get('regulator.role.resource_route'), 'icon'=>'<i class="fa fa-gavel" aria-hidden="true"></i>','order'=>10]);
    array_push($settings['side_nav']['roles']['admin']['buttons'], ['title'=>'Permissions','route'=> \Config::get('regulator.permission.resource_route'),'icon'=>'<i class="fa fa-hand-paper-o" aria-hidden="true"></i>','order'=>11]);
}

if(file_exists(base_path() . '/vendor/jameron/invitations/') && isset($settings['side_nav']['roles']['admin'])) {
    array_push($settings['side_nav']['roles']['admin']['buttons'], ['title'=>'Invitations','route'=> \Config::get('invitations.resource_route'), 'icon'=>'<i class="fa fa-paper-plane-o" aria-hidden="true"></i>', 'order'=>12]);
}

function sortOrder($x,$y) {

    if ($x['order']>$y['order']){
        return true;
    } else if ($x['order']<$y['order']){
        return false;
    } else {
        return 0;
    }

}

usort($settings['side_nav']['roles']['admin']['buttons'], 'sortOrder');

return $settings;
