<?php

namespace BlogJF\Domain;

class Contact 
{
    /**
     * Contact id.
     *
     * @var integer
     */
    private $id;

   /**
     * Contact author.
     *
     * @var \BlogJF\Domain\Contact
     */
    private $author;
    
    /**
     * Contact date.
     *
     * @var datetime
     */
    private $date;

    /**
     * Contact content.
     *
     * @var integer
     */
    private $content;
    
    /**
     * Contact advert.
     *
     * @var integer
     */
    private $title;
    /**
     * Contact advert.
     *
     * @var integer
     */
    private $email;
    
    /**
     * Associated comment.
     *
     * @var \Blogjf\Domain\Comment
     */
    private $article;
    

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
    
    
    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }
    
            public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }
    public function getComment() {
        return $this->comment;
    }
     public function setComment(Comment $comment) {
        $this->comment = $comment;
        return $this;
    }
 

}