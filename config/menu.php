<?php
/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 30/05/2018
 * Time: 13:30
 */

return array(

    array(
        'title' => 'Tableau de bord',
        'icon' => 'fas fa-tachometer-alt',
        'route' => '/?controller=pages&action=index'
    ),
    array(
        'title' => 'Réservations',
        'icon' => 'fas fa-receipt',
        'children' => array(
            array(
                'title' => 'Toutes les réservations',
                'route' => ''
            ),
        )
    ),
    array(
        'title' => 'Utilisateurs',
        'icon' => 'fa fa-user',
        'children' => array(
            array(
                'title' => 'Toutes les utilisateurs',
                'route' => ''
            ),
            array(
                'title' => 'Ajouter',
                'route' => '/users/add'
            ),
        )
    ),
    array(
        'title' => 'Clés',
        'icon' => 'fa fa-key',
        'children' => array(
            'title' => 'Réservations',
            'route' => '/users/index'
        )
    ),
    array(
        'title' => 'Portes',
        'icon' => 'fas fa-door-open',
        'children' => array(
            'title' => 'Réservations',
            'route' => '/users/index'
        )
    ),
    array(
        'title' => 'Paramètres',
        'icon' => 'fa fa-cog',
        'route' => '/users/index'
    )

);