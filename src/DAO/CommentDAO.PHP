<?php

namespace BlogJF\DAO;

use BlogJF\Domain\Comment;
use BlogJF\Domain\Reply;
use BlogJF\Domain\Reponsereply;

class CommentDAO extends DAO 
{
    /**
     * @var \Blogjf\DAO\ArticleDAO
     */
    private $articleDAO;

    /**
     * @var \Blogjf\DAO\UserDAO
     */
    private $userDAO;
    /**
     * @var \Blogjf\DAO\ReplyDAO
     */
    private $replyDAO;
    
    public function setArticleDAO(ArticleDAO $articleDAO) {
        $this->articleDAO = $articleDAO;
    }

    public function setUserDAO(UserDAO $userDAO) {
        $this->userDAO = $userDAO;
  }
    public function setReplyDAO(ReplyDAO $replyDAO) {
        $this->replyDAO = $replyDAO;
  } 
  

   function ComptageReponse($commentid) {

$req = 'SELECT COUNT(*) AS nb FROM reponse WHERE com_id = '.$commentid.'';
$data = $this->getDb()->fetchAssoc($req);
$count =$data['nb'];     
return $count;      
       
       
  }  
    
    /**
     * Removes all comments for an article
     *
     * @param $articleId The id of the article
     */
    public function deleteAllByArticle($articleId) {
        $this->getDb()->delete('comment', array('art_id' => $articleId));
    }
    
     
       /**
     * Saves a advert into the database.
     *
     * @param \BlogJF\Domain\Comment $comment The comment to save
     */
    public function addAdvert(Comment $comment) {
  
$commentData = array(
            'com_id' => $comment->getArticle()->getId(),
            'com_advert' => $comment->getAdvert(),
            );

        if ($comment->getId()) {
            // The advert comment has already been saved : update it
            $this->getDb()->update('comment', $commentData, array('com_id' => $comment->getId()));
        } else {
            // The advert comment has never been saved : insert it
            $this->getDb()->insert('comment', $commentData);
            // Get the id of the newly created comment and set it on the entity.
            $id = $this->getDb()->lastInsertId();
            $comment->setId($id);
        }
    }
    
    
    /**
     * Saves a comment into the database.
     *
     * @param \BlogJF\Domain\Comment $comment The comment to save
     */
    public function save(Comment $comment) {
        $commentData = array(
            'art_id' => $comment->getArticle()->getId(),
            'com_user' => $comment->getAuthor(),
            'com_advert' => $comment->getAdvert(),
            'com_content' => $comment->getContent()
            );

        if ($comment->getId()) {
            // The comment has already been saved : update it
            $this->getDb()->update('comment', $commentData, array('com_id' => $comment->getId()));
        } else {
            // The comment has never been saved : insert it
            $this->getDb()->insert('comment', $commentData);
            // Get the id of the newly created comment and set it on the entity.
            $id = $this->getDb()->lastInsertId();
            $comment->setId($id);
        }
    }

    
    
    public function findAllByComment($commentId) {

        $sql = "select * FROM reponse where com_id=? order by rep_id";
        $result = $this->getDb()->fetchAll($sql, array($commentId));

        // Convert query result to an array of domain objects
        $replies = array();
           
            foreach ($result as $row) {
            $replyId = $row['rep_id'];
            $reply = $this->buildDomainObject2($row);
            // The associated comment is defined for the constructed comment
            $replies[$replyId] = $reply;       
        }
   
        return $replies;
    }
    
    public function findAllByreply($replyId) {

        $sql = "select * FROM reponsereply where rep_id=? order by reply_id";
        $result = $this->getDb()->fetchAll($sql, array($replyId));

        // Convert query result to an array of domain objects
        $reponsereplies = array();
           
            foreach ($result as $row) {
            $reponsereplyId = $row['reply_id'];
            $reponsereply = $this->buildDomainObject3($row);
            // The associated comment is defined for the constructed comment
            $reponsereplies[$reponsereplyId] = $reponsereply;       
        }
   
        return $reponsereplies;
    }
    
    
    /**
     * Returns a list of all comments, sorted by date (most recent first).
     *
     * @return array A list of all comments.
     */
    public function findAll() {
        $sql = "select * from comment order by com_id desc";
        $result = $this->getDb()->fetchAll($sql);

        // Convert query result to an array of domain objects
        $entities = array();
        foreach ($result as $row) {
            $id = $row['com_id'];
            $entities[$id] = $this->buildDomainObject($row);
        }
        return $entities;
    }

    
    

    /**
     * Removes a comment from the database.
     *
     * @param @param integer $id The comment id
     */
    public function delete($id) {
        // Delete the comment
        $this->getDb()->delete('comment', array('com_id' => $id));
        
    }

    
    
    
    /**
     * Removes a advert comment from the database.
     *
     * @param @param integer $id The comment id
     */
    public function advertdelete($id) {

       $this->getDb()->exec('UPDATE comment SET com_advert = null  WHERE com_id = '.$id.'');
        
        
        
    }

      /**
     * Returns an article matching the supplied id.
     *
     * @param integer $id
     *
     * @return \BlogJF\Domain\Comment|throws an exception if no matching article is found
     */
      /**
     * Returns an article matching the supplied id.
     *
     * @param integer $id
     *
     * @return \BlogJF\Domain\Article|throws an exception if no matching article is found
     */  
    public function find($id) {
        $sql = "select * from comment where com_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No comment matching id " . $id);
    }

    
    /**
     * Return a list of all comments for an article, sorted by date (most recent last).
     *
     * @param integer $articleId The article id.
     *
     * @return array A list of all comments for the article.
   
   
   */
    
    public function findAllByArticle($articleId) {
        // The associated article is retrieved only once
        $article = $this->articleDAO->find($articleId);

        // art_id is not selected by the SQL query
        // The article won't be retrieved during domain objet construction
        $sql = "select * FROM comment where art_id=? order by com_id";
        $result = $this->getDb()->fetchAll($sql, array($articleId));
        $this->count = count($result);
        // Convert query result to an array of domain objects
        $comments = array();
        foreach ($result as $row) {
            $commentId = $row['com_id'];
            
            
            $comment = $this->buildDomainObject($row);
            // The associated article is defined for the constructed comment
            $comment->setArticle($article);
            $comments[$commentId] = $comment;
            }
        return $comments;
    }
      
    

    /**
     * Creates an Comment object based on a DB row.
     * @param array $row The DB row containing Comment data.
     * @return \BlogJF\Domain\Comment
     */
    protected function buildDomainObject(array $row) {
        
        $count= $this->ComptageReponse($row['com_id']);
        
        $comment = new Comment();
        $comment->setId($row['com_id']);
        $comment->setContent($row['com_content']);
        $comment->setDate($row['com_date']);
        $comment->setAuthor($row['com_user']);  
        $comment->setAdvert($row['com_advert']); 
        $comment->setCompte($count);
        $replies= $this->findAllByComment($row['com_id']);
        
        foreach ($replies as $reply) {
            $comment->addReponse($reply);    
        }

        if (array_key_exists('art_id', $row)) {
            // Find and set the associated article
            $articleId = $row['art_id'];
            $article = $this->articleDAO->find($articleId);
            $comment->setArticle($article);
        }
        return $comment;
    }
    
     
    
     protected function buildDomainObject2(array $row) {
        $reply = new Reply();
        $reply->setId($row['rep_id']);
        $reply->setContent($row['rep_content']);
        $reply->setDate($row['rep_date']);
        $reply->setAuthor($row['rep_user']);
         $reply->setAdvert($row['rep_advert']);

         $reponsereplies= $this->findAllByReply($row['rep_id']);
        
        foreach ($reponsereplies as $reponsereply) {
            
            $reply->addReponse($reponsereply);
             
        }
        
        
        
        return $reply;
    }
    
         protected function buildDomainObject3(array $row) {
        $reponsereply = new Reponsereply();
        $reponsereply->setId($row['reply_id']);
        $reponsereply->setContent($row['reply_content']);
        $reponsereply->setDate($row['reply_date']);
        $reponsereply->setAuthor($row['reply_user']);
        $reponsereply->setAdvert($row['reply_advert']);
        return $reponsereply;
    }
}