<?php

namespace BlogJF\Domain;

class Newsletter 
{
    /**
     * News id.
     *
     * @var integer
     */
    private $id;

   /**
     * News name.
     *
     * @var integer
     */
    private $name;
    
    /**
     * News Surname.
     *
     * @var integer
     */
    private $lastname;

    /**
     * News Email.
     *
     * @var integer
     */
    private $email;
   

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }
    
    public function getLastname() {
        return $this->lastname;
    }

    public function setLastname($lastname) {
        $this->date = $lastname;
        return $this;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }
    

}