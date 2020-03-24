<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Request;

class SignupController extends Controller
{
    public function indexAction()
    {

    }

    public function registerAction()
    {
        // Getting a request instance
        $request = new Request();

        // Check whether the request was made with method POST
        if ($request->isPost()) {
            // Check whether the request was made with Ajax
            if ($request->isAjax()) {
                echo 'Request was made using POST and AJAX';
            }
        } else {
            echo "No Post Request";
        }

        $user = new Users();

        // Store and check for errors
        $success = $user->save(
            $this->request->getPost(),
            [
                "name",
                "email"
            ]
        );

        if ($success) {
            // Direct flash message
            $this->flashSession->success("Вы зарегистрировались!");

            //Make a full HTTP redirection
            return $this->response->redirect('signup');
        } else {
            echo "Ошибка при регистрации!";

            $messages = $user->getMessages();

            foreach ($messages as $message) {
                echo $message->getMessage(), "<br/>";
            }
        }

        $this->view->disable();
    }
}