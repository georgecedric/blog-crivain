<?php

namespace BlogJF\DAO;


use BlogJF\Domain\Reponse;

class ReponseDAO extends DAO 
{
    /**
     * @var \MicroCMS\DAO\ArticleDAO
     */
    private $commentDAO;

    /**
     * @var \MicroCMS\DAO\UserDAO
     */
    private $userDAO;
    


    public function setCommentDAO(CommentDAO $commentDAO) {
        $this->commentDAO = $commentDAO;
    }

    public function setUserDAO(UserDAO $userDAO) {
        $this->userDAO = $userDAO;
  }
      
    /**
     * Return a list of all comments for an article, sorted by date (most recent last).
     *
     * @param integer $articleId The article id.
     *
     * @return array A list of all comments for the article.
     */
    public function findAllByComment($comId) {
        // The associated article is retrieved only once
        $comment = $this->commentDAO->find($comId);

        // com_id is not selected by the SQL query
        // The article won't be retrieved during domain objet construction
        $sql = "select * from reponse where com_id=? order by com_id";
        $result = $this->getDb()->fetchAll($sql, array($reponseId));

        // Convert query result to an array of domain objects
        $reponses = array();
        foreach ($result as $row) {
            $reponseId = $row['rep_id'];
            $reponse = $this->buildDomainObject($row);
            // The associated article is defined for the constructed comment
            $reponse->setComment($comment);
            $reponses[$reponseId] = $reponse;
        }
        return $reponses;
    }
    /**
     * Returns a user matching the supplied id.
     *
     * @param integer $id The user id.
     *
     * @return \BlogJF\Domain\User|throws an exception if no matching user is found
     */
    public function find($id) {
        $sql = "select * from reponse where rep_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No user matching id " . $id);
    }

    protected function buildDomainObject(array $row) {
        $reponse = new User();
        $reponse->setId($row['rep_id']);
        $reponse->setContent($row['rep_content']);
        $reponse->setDate($row['rep_date']);
        $reponse->setAuthor($row['usr_id']);
        
        if (array_key_exists('com_id', $row)) {
            // Find and set the associated article
            $comId = $row['com_id'];
            $comment = $this->commentDAO->find($comId);
            $comment->setComment($comment);
        }
        if (array_key_exists('usr_id', $row)) {
            // Find and set the associated author
            $userId = $row['usr_id'];
            $user = $this->userDAO->find($userId);
            $comment->setAuthor($user);
        }
        

        
        return $reponse;
    }
}