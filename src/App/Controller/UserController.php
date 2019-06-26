<?php

namespace App\Controller;

use Exception;

class UserController extends Controller
{

    public function list( $request, $response, $args ) {

        try {

            $users = ( new \App\Model\User() )->getAll();
            throw new Exception();

        } catch ( \App\Exception\BadRequestException $e ) {

        } catch ( Exception $e ) {

        }

        return $this->view->render( $response, 'admin/user_list.twig', [ 'users' => $users ] );

    }
}