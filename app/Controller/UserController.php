<?php

namespace App\Controller;

class UserController extends Controller {

    public function displayLog() {
        try {
            $template = $this->twig->load('log.html.twig');
            echo $template->render(array());
        } catch (\Exception $e) {
            // die ('ERROR: ' . $e->getMessage());
        }
    }
    public function displayRegistration() {
        try {
            $template = $this->twig->load('registration.html.twig');
            echo $template->render(array());
        } catch (\Exception $e) {
            // die ('ERROR: ' . $e->getMessage());
        }
    }
}