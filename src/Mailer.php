<?php

class Mailer {

    protected $email;

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function sendActivationMessage()
    {
        return mail($this->email, 'Wiadomość aktywacyjna', 'Lorem lipsum', 'From: test@test.pl');
    }

} 