<?php
$PASSWORD_SALT = '9z4C9wVKQfM6auRR72Ja';

function base_url() {
    $scheme = 'http://';
    if (isset($_SERVER['HTTPS'])) {
        $scheme = 'https://';
    }
    return $scheme . $_SERVER['HTTP_HOST'];
}

function go_home() {
    header('Location: ' . base_url());
}

function go_login() {
    header('Location: ' . base_url() . '/login');
}

function go_campsite($id) {
    header('Location: ' . base_url() . '/campsites/' . $id);
}

function hash_password($plaintext) {
    global $PASSWORD_SALT;
    return hash('sha256', $PASSWORD_SALT . $plaintext);
}

function is_authenticated() {
    return isset($_SESSION['auth']) && !!$_SESSION['auth'];
}
