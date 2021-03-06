<?php

namespace BlogJF\Domain;

class Article 
{
    /**
     * Article id.
     *
     * @var integer
     */
    private $id;

    /**
     * Article title.
     *
     * @var string
     */
    private $title;

    /**
     * Article content.
     *
     * @var 
     */
    private $content;
    /**
     * Article date.
     *
     * @var datetime
     */
    private $date;
    /**
     * Article count.
     *
     * @var count;
     */
    private $compte;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }
    
    public function getCompte() {
        return $this->compte;
    }

    public function setCompte($compte) {
        $this->compte = $compte;
        return $this;
    }

    public function getContent() {
        return $this->content;
    }

    public function setContent($content) {
        $this->content = $content;
        return $this;
    }
     public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
             
        
if (setlocale(LC_TIME, 'fr_FR') == '') {
    setlocale(LC_TIME, 'FRA');  //correction problème pour windows
    $format_jour = '%#d';
} else {
    $format_jour = '%e';
}
$this->date = strftime(" $format_jour %B %Y", strtotime($date)) ;

        return $this;
    }
}
