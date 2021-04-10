<?php

class Accueil {
    // Properties
    private $nom;
    private $prenom;
    private $phrase_accroche;
    private $github;
    private $twitter;
    private $linkedin;

    // Methods
    
    /**
     * __construct
     *
     * @param  string $pseudo
     * @param  string $nom
     * @param  string $prenom
     * @param  string $phrase_accroche
     * @param  string $github
     * @return void
     */
    public function __construct($nom, $prenom, $phrase_accroche, $github, $twitter, $linkedin) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->phrase_accroche = $phrase_accroche;
        $this->github = $github;
        $this->twitter = $twitter;
        $this->linkedin = $linkedin;
    }
    
    
    /**
     * get_nom
     *
     * @return nom utilisateur
     */
    public function get_nom() {
        return $this->nom;
    }
    
    /**
     * get_prenom
     *
     * @return prenom utilisateur
     */
    public function get_prenom() {
        return $this->prenom;
    }
  
    /**
     * get_phrase_accroche
     *
     * @return phrase_accroche utilisateur
     */
    public function get_phrase_accroche() {
        return $this->phrase_accroche;
    }
  
    /**
     * get_github
     *
     * @return github utilisateur
     */
    public function get_github() {
        return $this->github;
    }

    /**
     * get_twitter
     *
     * @return twitter utilisateur
     */
    public function get_twitter() {
        return $this->twitter;
    }

    /**
     * get_linkedin
     *
     * @return linkedin utilisateur
     */
    public function get_linkedin() {
        return $this->linkedin;
    }
}
