<?php

class UserEventHandler {

    protected $mailer;
    protected $user;

    public function __construct(User $user, Mailer $mailer)
    {
        $this->mailer = $mailer;
        $this->user   = $user;
    }

    public function onUserRegister()
    {
        $this->mailer->setEmail($this->user->getEmail());

        return $this->mailer->sendActivationMessage();
    }

}
