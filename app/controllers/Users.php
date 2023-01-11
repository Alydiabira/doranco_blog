<?php
class Users extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }
    
    function register()
    {
        $data = [
            'lastname' => '',
            'firstname' => '',
            'email' => '',
            'password' => '',
            'confirmPassword' => '',
            'alias' => '',
            'bio' => '',
            'lastnameError' => '',
            'firstnameError' => '',
            'emailError' => '',
            'passwordError' => '',
            'confirmPasswordError' => '',
            'aliasError' => '',
            'bioError' => '',
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'lastname' => trim($_POST['lastname']),
                'firstname' => trim($_POST['firstname']),
                'email' => trim($_POST['email']),
                'password' => $_POST['password'],
                'alias' => trim($_POST['alias']),
                'bio' => $_POST['bio'],
                'lastnameError' => '',
                'firstnameError' => '',
                'emailError' => '',
                'passwordError' => '',
                'confirmPasswordError' => '',
                'aliasError' => '',
                'bioError' => '',
            ];
        }

        $nameValidation = "/^[a-zA-Z0-9]$/";
        $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";
    
        if (empty($data['lastname'])) {
            $data['lastnameError'] = "Please enter lastname";
        } elseif (strlen($data['lastname']) < 2 || strlen($data['lastname']) > 20) {
            $data['lastnameError'] = "Please enter lastname";
        }
        elseif (!preg_match($nameValidation, $data['lastname'])) {
            $data['lastnameError'] = "Lastname can only contain letters and numbers";
        }

        if (empty($data['firstname'])) {
            $data['firstnameError'] = "Please enter firstname";
        } elseif (strlen($data['firstname']) < 2 || strlen($data['firstname']) > 20) {
            $data['firstnameError'] = "Length not valid";
        }
        elseif (!preg_match($nameValidation, $data['firstname'])) {
            $data['firstnameError'] = "firstname can only contain letters and numbers";
        }

        if (empty($data['email'])) {
            $data['emailError'] = "Please enter email address";
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $data['emailError'] = "Please enter a validate email";
        } else {
            if ($this->userModel->findUserByEmail($data['email'])) {
                $data['emailError'] = "Email already taken";
            }
        }

        if (empty($data['password'])) {
            $data['passwordError'] = "Please enter password";
        } else if (strlen($data['password']) < 6) {
            $data['passwordError'] = "Password must be at least 6 characters";
        } elseif (!preg_match($passwordValidation, $data['password'])) {
            $data['passwordError'] = "Password must be have at least one numeric value";
        }

        if (empty($data['confirmPassword'])) {
            $data['confirmPasswordError'] = "Please enter password";
        } else {
            if ($data['password'] != $data['confirmPassword']) {
                $data['confirmPasswordError'] = "Passwords do not match";
            }
        }

        if (empty($data['alias'])) {
            $data['aliasError'] = "Please enter alias";
        } elseif (!preg_match($nameValidation, $data['alias'])) {
            $data['aliasError'] = "alias can only contain letters and numbers";
        }

        if (empty($data['lastnameError']) && empty($data['firstnameError']) && empty($data['emailError']) && empty($data['aliasError']) && empty($data['bioError']) && empty($data['passwordError'] && empty($data['confirmPasswordError']))) {
            // Hash password
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            // Register
            if ($this->userModel->register($data)) {
                // Redirection
                header('location: ' . URL_ROOT . '/users/login');
            } else {
                die('Error !!');
            }
        }

        $this->view('users/register', $data);
    }
}