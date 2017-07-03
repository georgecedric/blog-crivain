<?php

namespace BlogJF\Domain;

class Reply {
    /**
     * Reply id.
     *
     * @var integer
     */
    private $id;

   /**
     * Reply author.
     *
     * @var \BlogJF\Domain\User
     */
    private $author;
    
    /**
     * Reply date.
     *
     * @var datetime
     */
    private $date;

    /**
     * CReply content.
     *
     * @var integer
     */
    private $content;
     /**
     * Associated comment.
     *
     * @var \Blogjf\Domain\Comment
     */
    private $comment;
    
    /**
     * Reply advert.
     *
     * @var integer
     */
    private $advert;
    
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
    public function getComment() {
        return $this->comment;
}
    public function setComment(Comment $comment) {
        $this->comment = $comment;
        return $this;
    }
    public function getAdvert() {
        return $this->advert;
    }

    public function setAdvert($advert) {
        $this->advert = $advert;
        return $this;
    }
    public function getReponse() {
        return $this->reponse;
    }

    public function addReponse(Reponsereply $reponsereply) {
    
     $this->reponse[] = $reponsereply;
       return $this; 
    }


    
}