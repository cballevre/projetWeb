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
        'route' => '?controller=pages&action=dashboard'
    ),
    array(
        'title' => 'Emprunts',
        'icon' => 'fas fa-receipt',
        'children' => array(
            array(
                'title' => 'Toutes les emprunts',
                'route' => '?controller=borrowKeychains&action=index'
            ),
            array(
                'title' => 'Ajouter',
                'route' => '?controller=borrowKeychains&action=store'
            )
        )
    ),
    array(
        'title' => 'Utilisateurs',
        'icon' => 'fa fa-user',
        'children' => array(
            array(
                'title' => 'Toutes les utilisateurs',
                'route' => '?controller=users&action=index'
            ),
            array(
                'title' => 'Ajouter',
                'route' => '?controller=users&action=store'
            )
        )
    ),
    array(
        'title' => 'Clés',
        'icon' => 'fa fa-key',
        'children' => array(
            array(
                'title' => 'Toutes les clés',
                'route' => '?controller=keys&action=index'
            ),
            array(
                'title' => 'Ajouter',
                'route' => '?controller=keys&action=store'
            ),
            array(
                'title' => 'Trousseaux',
                'route' => '?controller=keychains&action=index'
            )
        )
    ),
    array(
        'title' => 'Portes',
        'icon' => 'fas fa-door-open',
        'children' => array(
            array(
                'title' => 'Toutes les portes',
                'route' => '?controller=doors&action=index'
            ),
            array(
                'title' => 'Tous les barrilets',
                'route' => '?controller=locks&action=index'
            ),
            array(
                'title' => 'Toutes les salles',
                'route' => '?controller=rooms&action=index'
            )
        )
    ),
    array(
        'title' => 'Paramètres',
        'icon' => 'fa fa-cog',
        'route' => '?controller=pages&action=setting'
    )

);