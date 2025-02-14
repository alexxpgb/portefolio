<?php
require_once __DIR__ . '/../includes/db.php';

class User {
    public static function login(\, \) {
        global \;
        \ = \->prepare(\"SELECT id, password FROM users WHERE email = ?\");
        \->execute([\]);
        \ = \->fetch();
        
        if (\ && password_verify(\, \['password'])) {
            \['user_id'] = \['id'];
            return true;
        }
        return false;
    }

    public static function logout() {
        session_destroy();
        header(\"Location: login.php\");
        exit();
    }
}
?>
