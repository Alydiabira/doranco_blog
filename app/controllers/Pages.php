<?php
class Pages extends Controller {
    private $msgModel;

    public function __construct() {
        $this->msgModel = $this->model('Message');
    }

    public function index() {
        $data = [
            'title' => 'Home page'
        ];

        $this->view('index', $data);
    }

    public function about() {
        $this->view('about');
    }

    public function contact() {
        $errors = [];
        $errorMessage = '';
        $successMessage = '';
        $secret = 'nEsX#G45!0Z2dSENxho2Pw^6PpwP@kyiYaw%pzif';
        $recaptchaResponse = $_POST['g-recaptcha-response'];
        $recaptchaUrl = 'https://www.google.com/recaptcha/api/siteverify?secret={' . $secret .'}&response={' . $recaptchaResponse .'}';
        $verify = json_decode(file_get_contents($recaptchaUrl));
        $data = [
            'fullname' => '',
            'email' => '',
            'message' => '',
            'fullnameError' => '',
            'emailError' => '',
            'messageError' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'user_id' => $_SESSION['user_id'],
                'fullname' => trim($_POST['fullname']),
                'email' => trim($_POST['email']),
                'message' => trim($_POST['message']),
            ];

            if(!$verify->success) $errors[] = 'Recaptcha failed';
            if(empty($data['fullname'])) $data['fullnameError'] = 'The fullname cannot be empty';
            if(empty($data['email'])) $data['emailError'] = 'The email cannot be empty';
            if(empty($data['message'])) $data['messageError'] = 'The message cannot be empty';

            if (empty($error) && empty($data['fullnameError']) && empty($data['emailError']) && empty($data['messageError'])) {
                // Adress à laquelle est envoyer le message
                $toEmail = 'test@example.com';
                $emailSubject = 'New email from your contant form';
                $header = ['From' => $data['email'], 'Reply-To' => $data['email'], 'Content-Type' => 'text/html'];
                $bodyParaphs = ["Full Name: {$data['fullname']}", "Email:  {$data['email']}", "Message:  {$data['message']}"];
                // Gère le retour automatique à la ligne
                $body = join(PHP_EOL, $bodyParaphs);

                if($this->msgModel->addMsg($data)) header('Location: ' . URL_ROOT . 'index');
                else die('Something went wrong, please try again!!!');

                if(mail($toEmail, $emailSubject, $body, $header)) $successMessage = '<p style="color: green;"> Thank you for your message!</p>';
                else $errorMessage = '<p style="color: red;"> Oops something went wrong! </p>';
            } else {
                $this->view('contact');
            }
        }

        $this->view('contact');
    }
}