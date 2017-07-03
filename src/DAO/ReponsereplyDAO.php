<?php

namespace BlogJF\DAO;

use Doctrine\DBAL\Connection;
use BlogJF\Domain\Reponsereply;

class ReponsereplyDAO extends DAO
{
    /**
     * @var \blogJF\DAO\ArticleDAO
     */
    private $articleDAO;

    /**
     * @var \blogJF\DAO\UserDAO
     */
    private $userDAO;
     /**
     * @var \blogJF\DAO\CommentDAO
     */
    private $commentDAO;
     /**
     * @var \blogJF\DAO\ReplyDAO
     */
    private $replyDAO;
    

    public function setArticleDAO(ArticleDAO $articleDAO) {
        $this->articleDAO = $articleDAO;
    }

    public function setUserDAO(UserDAO $userDAO) {
        $this->userDAO = $userDAO;
  }
    public function setCommentDAO(CommentDAO $commentDAO) {
        $this->commentDAO = $commentDAO;
  }
     public function setReplyDAO(ReplyDAO $replyDAO) {
        $this->replyDAO = $replyDAO;
  }
 
    /**
     * Saves a reponsereply into the database.
     *
     * @param \BlogJF\Domain\Reponsereply $reponsereply The reponsereply to save
     */
    public function save(Reponsereply $reponsereply) {
        
        $reponsereplyData = array(
            'rep_id' => $reponsereply->getReply()->getId(),
            'reply_content' => $reponsereply->getContent(),
            'reply_advert' => $reponsereply->getAdvert(),
            'reply_user' => $reponsereply->getAuthor()
            );

        if ($reponsereply->getId()) {
            // The reponsereply has already been saved : update it
            $this->getDb()->update('reponsereply', $reponsereplyData, array('reply_id' => $reponsereply->getId()));
        } else {
            // The reponsereply has never been saved : insert it
            $this->getDb()->insert('reponsereply', $reponsereplyData);
            // Get the id of the newly created reponsereply and set it on the entity.
            $id = $this->getDb()->lastInsertId();
            $reponsereply->setId($id);
        }
    } 
    

   /**
     * Returns a list of all reponsereplies, sorted by date (most recent first).
     *
     * @return array A list of all reponsereplies.
     */
    public function findAll() {
        $sql = "select * from reponsereply order by reply_id desc";
        $result = $this->getDb()->fetchAll($sql);

        // Convert query result to an array of domain objects
        $entities = array();
        foreach ($result as $row) {
            $id = $row['reply_id'];
            $entities[$id] = $this->buildDomainObject($row);
        }
        return $entities;
    }  
     
 
       /**
     * Returns an reponsereply matching the supplied id.
     *
     * @param integer $id
     *
     * @return \BlogJF\Domain\reponsereply|
     */
    public function findReponsereply($replyId) {
           

        $sql = "select * FROM reponsereply WHERE rep_id = '.$replyd.' order by reply_id";
        $result = $this->getDb()->fetchAll($sql, array($replyId));

        // Convert query result to an array of domain objects
        $reponsereplies = array();
           
            foreach ($result as $row) {
            $reponsereplyId = $row['reply_id'];
            
            $reponsereply = $this->buildDomainObject($row);
            // The associated comment is defined for the constructed comment
            $rreponseeply->setReply($reply);
            $reponsereplies[$reponsereplyId] = $reponsereply;
             
        }
         
       return $reponsereplies;  
     }
    
    
    /**
     * Returns a reponsereply matching the supplied id.
     *
     * @param integer $id The reponsereply id
     *
     * @return \BlogJF\Domain\Reponsereply|throws an exception if no matching reponsereply is found
     */
    public function find($id) {
        $sql = "select * from reponsereply where reply_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No reponsereply matching id " . $id);
    }

    // ...

    /**
     * Removes a reponsereply from the database.
     *
     * @param @param integer $id The reponsereply id
     */
    public function delete($id) {
        // Delete the reponsereply
        $this->getDb()->delete('reponsereply', array('reply_id' => $id));
    }
    
    
       public function addAdvert(Reponsereply $reponsereply) {
  
$reponsereplyData = array(
            'reply_id' => $reponsereply->getReply()->getId(),
            'reply_advert' => $reponsereply->getAdvert(),
            
            );

        if ($reply->getId()) {
            // The reponsereply has already been saved : update it
            $this->getDb()->update('reponsereply', $reponsereplyData, array('reply_id' => $reponsereply->getId()));
        } else {
            // The reponsereply has never been saved : insert it
            $this->getDb()->insert('reponsereply', $reponsereplyData);
            // Get the id of the newly created comment and set it on the entity.
            $id = $this->getDb()->lastInsertId();
            $reponsereply->setId($id);
        }
    } 
    
    
    /**
     * Removes a advert reponsereply from the database.
     *
     * @param @param integer $id The reponsereply id
     */
    public function advertdelete($id) {

       $this->getDb()->exec('UPDATE reponsereply SET reply_advert = null  WHERE reply_id = '.$id.'');
  
    }
    
    

       public function findAllByReply($replyId) {
           
        $reply = $this->replyDAO->find($replyId);

        $sql = "select * FROM reponsereply where rep_id=? order by reply_id";
        $result = $this->getDb()->fetchAll($sql, array($replyId));

        // Convert query result to an array of domain objects
        $reponsereplies = array();
           
            foreach ($result as $row) {
            $reponsereplyId = $row['reply_id'];
            
            $reponsereply = $this->buildDomainObject($row);
            // The associated reponsereply is defined for the constructed reponsereply
            $reponsereply->setReply($reply);
            $reponsereplies[$reponsereplyId] = $reponsereply;
             
        }
   
        return $reponsereplies;
    }
        
        /**
     * Saves a reponsereply into the database.
     *
     * @param \BlogJf\Domain\reponsereply $reponsereply The reponsereply to save
     */
    

    /**
     * Creates an reponsereply object based on a DB row.
     *
     * @param array $row The DB row containing Reponsereply data.
     * @return \BlogJF\Domain\Reponsereply
     */
    protected function buildDomainObject(array $row) {
        $reponsereply = new Reponsereply();
        $reponsereply->setId($row['reply_id']);
        $reponsereply->setContent($row['reply_content']);
        $reponsereply->setDate($row['reply_date']);
        $reponsereply->setAdvert($row['reply_advert']);
        $reponsereply->setAuthor($row['reply_user']);
        
        if (array_key_exists('rep_id', $row)) {
            // Find and set the associated reply
            $replyId = $row['rep_id'];
            $reply = $this->replyDAO->find($replyId);
            $reponsereply->setReply($reply);
        }


        return $reponsereply;
    }
}


