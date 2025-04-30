<?php

namespace gdev\phpmvc;

use Exception;
use gdev\phpmvc\db\Database;

/**
 * class Application
 * 
 * @author Maurizio Giambrone <email@email.com>
 * @package core/Application
 */

class Application
{
    public static string $ROOT_DIR;

    public string $layout = 'main';
    public string $userClass;
    public Router $router;
    public Request $request;
    public Response $response;
    public static Application $app;
    public Database $db;
    public ?Controller $controller = null;
    public Session $session;
    public ?UserModel $user;
    public View $view;

    public function __construct($rootPath, array $config)
    {
        self::$app = $this;
        self::$ROOT_DIR = $rootPath;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);
        $this->db = new Database($config['db']);
        $this->userClass = $config['userClass'];
        $this->view = new View();

        $primaryKeyValue = $this->session->get('user');

        if ($primaryKeyValue) {
            $primaryKey = $this->userClass::primaryKey();
            $this->user = $this->userClass::findOne([$primaryKey => $primaryKeyValue]);
        } else {
            $this->user = null;
        }
        
    }

    public function run()
    {
        try {
            echo $this->router->resolve();
        } catch (Exception $e) {
            $this->response->setStatusCode($e->getCode());
            echo $this->view->renderView('_error', [
                'exception' => $e
            ]);
        }
    }

    /**
     * Get the value of controller
     */
    public function getController(): Controller
    {
        return $this->controller;
    }

    /**
     * Set the value of controller
     */
    public function setController(Controller $controller): self
    {
        $this->controller = $controller;

        return $this;
    }

    public function login(UserModel $user)
    {
        $this->user  = $user;
        $primaryKey = $user->primaryKey();
        $primaryKeyValue = $user->{$primaryKey};
        $this->session->set('user', $primaryKeyValue);

        return true;
    }

    public function logout()
    {
        $this->user = null;
        $this->session->remove('user');
    }

    public static function isGuest()
    {
        return !self::$app->user;
    }
}