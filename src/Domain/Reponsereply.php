<?php

namespace BlogJF\Domain;

class Reponsereply {
    /**
     * Reponsereply id.
     *
     * @var integer
     */
    private $id;

   /**
     * Reponsereply author.
     *
     * @var \BlogJF\Domain\User
     */
    private $author;
    
    /**
     * Reponsereply date.
     *
     * @var datetime
     */
    private $date;

    /**
     * Reponsereply content.
     *
     * @var integer
     */
    private $content;
     /**
     * Associated reply.
     *
     * @var \Blogjf\Domain\Reply
     */
    private $reply;
    
    /**
     * Reponsereply advert.
     *
     * @var integer
     */
    private $advert;


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
    public function getReply() {
        return $this->reply;
}
    public function setReply(Reply $reply) {
        $this->reply = $reply;
        return $this;
    }
    public function getAdvert() {
        return $this->advert;
    }

    public function setAdvert($advert) {
        $this->advert = $advert;
        return $this;
    }

    
}