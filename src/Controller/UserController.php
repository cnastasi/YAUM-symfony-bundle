<?php
/**
 * UserController.php
 *
 * @author cnastasi - Christian Nastasi <christian.nastasi@dxi.eu>
 * Created on Jun 08, 2015, 12:39
 * Copyright (C) DXI Ltd
 */

namespace YAUM\Symfony\Controller;

use Symfony\Component\HttpFoundation\Response;
use YAUM\Contract\UserService;
use YAUM\Exception\UserNotFoundException;
use YAUM\Exception\WrongPasswordException;
use YAUM\Model\BasicCredential;


/**
 * Class UserController
 */
class UserController
{
    /**
     * @var UserService
     */
    private $userService;

    public function __construct(UserService $userService)
    {

        $this->userService = $userService;
    }

    public function login($username, $password)
    {
        try {

            $credential = new BasicCredential($username, $password);

            $token = $this->userService->login($credential);

            $responseBody = "<html><body>" .
                            "Hello <strong>{$username}</strong>!<br/>" .
                            "Your password is <em>\"{$password}\"</em><br/>" .
                            "And your token is: {$token}" .
                            "</body></html>";

            $response = new Response($responseBody);

        } catch (UserNotFoundException $exception) {
            $response = new Response (
                $exception->getMessage(),
                401
            );
        } catch (WrongPasswordException $exception) {
            $response = new Response (
                $exception->getMessage(),
                401
            );
        } catch (\Exception $exception) {
            $response = new Response (
                $exception->getMessage(),
                500
            );
        }

        return $response;
    }
}
