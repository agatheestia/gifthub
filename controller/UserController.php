<?php
// controller/UserController.php

require_once __DIR__ . '/../model/User.php';

class UserController {
    private $model;

    public function __construct() {
        // plus de session_start() ici
        $this->model = new User();
    }

    /**
     * Affiche le formulaire de connexion et traite le POST
     */
    public function login(): void {
        $error = '';
        $email = trim($_POST['email']    ?? '');
        $pass  = $_POST['password']      ?? '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!$email || !$pass) {
                $error = 'Email et mot de passe sont obligatoires.';
            }
            elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = 'Email invalide.';
            }
            else {
                $user = $this->model->findByEmail($email);
                if (!$user || !password_verify($pass, $user['password'])) {
                    $error = 'Email ou mot de passe incorrect.';
                } else {
                    // Auth OK → on stocke l’ID en session
                    $_SESSION['user_id'] = $user['id'];
                    // redirection vers la home (à implémenter)
                    header('Location: /giftHub/public/index.php/');
                    exit;
                }
            }
            // pour conserver l’email en cas d’erreur
            $_POST['email'] = $email;
        }

        // Affichage de la vue
        require __DIR__ . '/../view/auth/login.php';
    }

    /**
     * Affiche le formulaire d’inscription et traite le POST
     */
    public function register(): void {
        $error = '';

        // on trim et sécurise les inputs
        $last   = trim($_POST['last_name']  ?? '');
        $first  = trim($_POST['first_name'] ?? '');
        $usern  = trim($_POST['username']   ?? '');
        $email  = trim($_POST['email']      ?? '');
        $pass   = $_POST['password']        ?? '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!$last || !$first || !$usern || !$email || !$pass) {
                $error = 'Tous les champs sont obligatoires.';
            }
            elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = 'L\'adresse email n\'est pas valide.';
            }
            elseif ($this->model->findByEmail($email)) {
                $error = 'Cette adresse email est déjà utilisée.';
            }
            elseif ($this->model->findByUsername($usern)) {
                $error = 'Ce nom d\'utilisateur est déjà pris.';
            }
            else {
                $hash = password_hash($pass, PASSWORD_DEFAULT);
                $this->model->create([
                    'last_name'  => $last,
                    'first_name' => $first,
                    'username'   => $usern,
                    'email'      => $email,
                    'password'   => $hash,
                ]);
                header('Location: /giftHub/public/index.php/login');
                exit;
            }

            $_POST['last_name']  = $last;
            $_POST['first_name'] = $first;
            $_POST['username']   = $usern;
            $_POST['email']      = $email;
        }

        require __DIR__ . '/../view/auth/register.php';
    }
}
