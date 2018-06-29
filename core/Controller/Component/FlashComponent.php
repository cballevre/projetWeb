<?php

/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 25/06/2018
 * Time: 08:44
 */

namespace Core\Controller\Component;

use Core\Network\Session;

/**
 * Class FlashComponent
 *
 * @package Core\Controller\Component
 */
class FlashComponent
{

    /**
     * @var Session
     */
    public $session;

    /**
     * FlashComponent constructor.
     */
    public function __construct()
    {
        $this->session = Session::getInstance();
    }

    /**
     * @param $message
     * @param $type
     */
    public function set($message, $type)
    {
        $this->session->write(
            'flash', array('message' => $message, 'type' => $type)
        );
    }

    /**
     *
     */
    public function render()
    {
        $flash = $this->session->read('flash');
        if(!empty($flash)) {
            echo '<div class="alert alert-' . $flash['type']
                . ' alert-dismissible fade show" role="alert">' .
                $flash['message'] .
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                .
                '<span aria-hidden="true">&times;</span>' .
                '</button>' .
                '</div>';

            unset($_SESSION['flash']);
        }
    }

}