<?php

namespace App\Controller;

use App\Logs\Log;
use App\Model\User;
use App\Validators\Validator;

class FormController extends BaseController
{
    public $layouts = "first_layouts";

    public function doRegisterAction()
    {
        $log = Log::setPathByMethod(__METHOD__);
        $log->log('Log method doRegisterAction');
        $name = trim(strip_tags($_POST['name']));
        $surname = trim(strip_tags($_POST['surname']));
        $email = trim(strip_tags($_POST['email']));
        $phone = trim(strip_tags($_POST['phone']));
        $password = trim(strip_tags($_POST['password']));
        $passwordConfirm = trim(strip_tags($_POST['passwordConfirm']));

        $data = ['name' => "$name", 'surname' => "$surname", 'email' => "$email", 'phone' => "$phone", 'password' => "$password"];

        $rules = [
            'name' => ['required', 'minLen' => 3, 'maxLen' => 20, 'alpha'],
            'surname' => ['required', 'minLen' => 5, 'maxLen' => 20, 'alpha'],
            'email' => ['required', 'minLen' => 6, 'maxLen' => 150, 'email'],
            'phone' => ['required', 'minLen' => 5, 'maxLen' => 15, 'numeric'],
            'password' => ['required', 'minLen' => 4, 'password'],
        ];
        $validator = new Validator;
        $validator->validate($data, $rules);
        if ($validator->error()) {
            $this->template->view("SignupView");
        } else {
            $user = new User;
            $user->getUser($email, $password);
            if (empty($result)) {
                $result = $user->insert($name, $surname, $email, $phone, $password);
                $user->getUser($email, $password);
                $_SESSION['logged_user'] = $user;
            }
            header('Location:../index.php');
        }
    }

    public function loginAction()
    {
        $log = Log::setPathByMethod(__METHOD__);
        $log->log('Log method loginAction');
        $this->template->view('LoginView');
        $errors = [];
        $email = trim(strip_tags($_POST['email']));
        $password = trim(strip_tags($_POST['password']));
        $user = new User;
        $result = $user->getUser($email, $password);
        if (empty($result)) {
            $errors[] = 'User with this Email was not found, or the password is incorrect';
        } else {
            $_SESSION['logged_user'] = $result;
            header('Location:../index.php');
        }
    }
    public function logoutAction()
    {
        $log = Log::setPathByMethod(__METHOD__);
        $log->log('Log method LogoutView');
        $this->template->view("LogoutView");
    }

    function indexAction()
    {
        $log = Log::setPathByMethod(__METHOD__);
        $log->log('Log method indexAction');
        $this->template->view('index');
    }
}
