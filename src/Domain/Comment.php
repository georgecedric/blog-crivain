<?php

namespace BlogJF\Domain;

class Comment 
{
    /**
     * Comment id.
     *
     * @var integer
     */
    private $id;

   /**
     * Comment author.
     *
     * @var \BlogJF\Domain\User
     */
    private $author;
    
    /**
     * Comment date.
     *
     * @var datetime
     */
    private $date;

    /**
     * Comment content.
     *
     * @var integer
     */
    private $content;
    
   
    


 

    /**
     * Associated article.
     *
     * @var \Blogjf\Domain\Article
     */
    private $article;

    
    private $compte;
    private $reponse= array();



    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function setAuthor($author) {
        $this->author = $author;
        return $this;
    }
    
    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
        return $this;
    }

    public function getContent() {
        return $this->content;
    }

    public function setContent($content) {
        $this->content = $content;
        return $this;
    }
    
            public function getCompte() {
        return $this->compte;
    }

    public function setCompte($compte) {
        $this->compte = $compte;
        return $this;
    }
    
    public function getArticle() {
        return $this->article;
    }
     public function setArticle(Article $article) {
        $this->article = $article;
        return $this;
    }
public function getReponse() {
        return $this->reponse;
    }

    public function addReponse(Reply $reply) {
    
     $this->reponse[] = $reply;
       return $this; 
    }
}