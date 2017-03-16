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
     * Associated comment.
     *
     * @var \Blogjf\Domain\Comment
     */
    private $comment;


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

    public function setAuthor(User $author) {
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
    

}