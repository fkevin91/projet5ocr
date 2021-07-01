<?php
namespace App\Controller;


class ContactController extends Controller {

    public function displayContact() {
        try {
            $template = $this->twig->load('contact.html.twig');
            $titre = "Contact";
            echo $template->render(array(
                'titre' => $titre,
            ));
        } catch (\Exception $e) {
            // die ('ERROR: ' . $e->getMessage());
        }
    }
}