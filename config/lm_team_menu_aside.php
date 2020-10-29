<?php
// Aside menu
return [

    'items' => [
        // Dashboard
        [
            'title' => 'Dashboard',
            'root' => true,
            'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => '/',
            'new-tab' => false,
        ],

        // Custom
        [
            'section' => 'Projects',
        ],
        [
            'title' => 'Project List',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'root' => true,
            'new-tab' => false,
            'page' => 'taskmanager/projects/list'
        ],
        // Custom
        [
            'section' => 'Team',
        ],
        [
            'title' => 'Team List',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'root' => true,
            'new-tab' => false,
            'page' => 'taskmanager/team/list'
        ],
        [
            'title' => 'Create Team',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'root' => true,
            'new-tab' => false,
            'page' => 'taskmanager/team/create'
        ],
        // Custom
        [
            'section' => 'Tasks',
        ],
        [
            'title' => 'Create Task(s)',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'root' => true,
            'new-tab' => false,
            'page' => 'taskmanager/tasks/create'
        ],
        [
            'title' => 'All Tasks',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'root' => true,
            'new-tab' => false,
            'page' => 'taskmanager/tasks/listall'
        ],
        [
            'title' => 'My Tasks',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'root' => true,
            'new-tab' => false,
            'page' => 'taskmanager/tasks/my_tasks'
        ],

    ]

];
