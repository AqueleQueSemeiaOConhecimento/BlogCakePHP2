<?php
App::uses('AppHelper', 'View');

class AuthHelper extends AppHelper {

    public function user($field = null) {
        if (isset($this->View->Auth)) {
            if ($field) {
                return $this->View->Auth->user($field);
            }
            return $this->View->Auth->user();
        }
        return null;
    }

    public function isLoggedIn() {
        return $this->user() !== null;
    }
}
