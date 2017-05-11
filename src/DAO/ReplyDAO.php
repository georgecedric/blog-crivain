<?php

namespace BlogJF\DAO;

use Doctrine\DBAL\Connection;
use BlogJF\Domain\Reply;

class ReplyDAO extends DAO
{
        /**
     * @var \MicroCMS\DAO\ArticleDAO
     */
    private $articleDAO;

    /**
     * @var \MicroCMS\DAO\UserDAO
     */
    private $userDAO;
     /**
     * @var \MicroCMS\DAO\UserDAO
     */
    private $commentDAO;
    

    


    public function setArticleDAO(ArticleDAO $articleDAO) {
        $this->articleDAO = $articleDAO;
    }

    public function setUserDAO(UserDAO $userDAO) {
        $this->userDAO = $userDAO;
  }
    public function setCommentDAO(CommentDAO $commentDAO) {
        $this->commentDAO = $commentDAO;
  }
   
   
        /**
     * Saves a comment into the database.
     *
     * @param \BlogJS\Domain\Comment $comment The comment to save
     */
    public function save(Reply $reply) {
        
        $replyData = array(
            
            'rep_content' => $reply->getContent(),
            'rep_user' => $reply->getAuthor()
            );

        if ($reply->getId()) {
            // The comment has already been saved : update it
            $this->getDb()->update('reponse', $replyData, array('rep_id' => $reply->getId()));
        } else {
            // The comment has never been saved : insert it
            $this->getDb()->insert('reponse', $replyData);
            // Get the id of the newly created comment and set it on the entity.
            $id = $this->getDb()->lastInsertId();
            $reply->setId($id);
        }
    }
    
         
   /**
     * Returns a list of all comments, sorted by date (most recent first).
     *
     * @return array A list of all comments.
     */
    public function findAll() {
        $sql = "select * from reponse order by rep_id desc";
        $result = $this->getDb()->fetchAll($sql);

        // Convert query result to an array of domain objects
        $entities = array();
        foreach ($result as $row) {
            $id = $row['rep_id'];
            $entities[$id] = $this->buildDomainObject($row);
        }
        return $entities;
    }  
    
    
    
    
    
    
    
    
    
    
    
    
    
       /**
     * Returns an article matching the supplied id.
     *
     * @param integer $id
     *
     * @return \BlogJF\Domain\Reponse|
     */
    public function findReply($commentId) {
           
        

        $sql = "select * FROM reponse WHERE com_id = '.$commentId.' order by rep_id";
        $result = $this->getDb()->fetchAll($sql, array($commentId));

        // Convert query result to an array of domain objects
        $replies = array();
           
            foreach ($result as $row) {
            $replyId = $row['rep_id'];
            
            $reply = $this->buildDomainObject($row);
            // The associated comment is defined for the constructed comment
            $reply->setComment($comment);
            $replies[$replyId] = $reply;
             
        }
         
       return $replies;  
     }
    
    
    /**
     * Returns a comment matching the supplied id.
     *
     * @param integer $id The comment id
     *
     * @return \MicroCMS\Domain\Comment|throws an exception if no matching comment is found
     */
    public function find($id) {
        $sql = "select * from reponse where rep_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No comment matching id " . $id);
    }

    // ...

    /**
     * Removes a comment from the database.
     *
     * @param @param integer $id The comment id
     */
    public function delete($id) {
        // Delete the comment
        $this->getDb()->delete('reponse', array('rep_id' => $id));
    }
    
    
    
    
    
    
    
    
    
    
       public function findAllByComment($commentId) {
           
        $comment = $this->commentDAO->find($commentId);

        $sql = "select * FROM reponse where com_id=? order by rep_id";
        $result = $this->getDb()->fetchAll($sql, array($commentId));

        // Convert query result to an array of domain objects
        $replies = array();
           
            foreach ($result as $row) {
            $replyId = $row['rep_id'];
            
            $reply = $this->buildDomainObject($row);
            // The associated comment is defined for the constructed comment
            $reply->setComment($comment);
            $replies[$replyId] = $reply;
             
        }
   
        return $replies;
    }
        
        /**
     * Saves a comment into the database.
     *
     * @param \BlogJf\Domain\Comment $comment The comment to save
     */
    

    /**
     * Creates an Comment object based on a DB row.
     *
     * @param array $row The DB row containing Comment data.
     * @return \BlogJF\Domain\Comment
     */
    protected function buildDomainObject(array $row) {
        $reply = new Reply();
        $reply->setId($row['rep_id']);
        $reply->setContent($row['rep_content']);
        $reply->setDate($row['rep_date']);
        $reply->setAuthor($row['rep_user']);

        if (array_key_exists('com_id', $row)) {
            // Find and set the associated article
            $commentId = $row['com_id'];
            $comment = $this->commentDAO->find($commentId);
            $reply->setComment($comment);
        }
        
        
        return $reply;
    }
        }


