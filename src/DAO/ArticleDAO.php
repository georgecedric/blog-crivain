<?php

namespace BlogJF\DAO;

use Doctrine\DBAL\Connection;
use BlogJF\Domain\Article;

class ArticleDAO extends DAO
{
    
    /**
     * Saves an article into the database.
     *
     * @param \BlogJF\Domain\Article $article The article to save
     */
    public function save(Article $article) {
        $articleData = array(
            'art_title' => $article->getTitle(),
            'art_content' => $article->getContent(),
            );

        if ($article->getId()) {
            // The article has already been saved : update it
            $this->getDb()->update('articles', $articleData, array('art_id' => $article->getId()));
        } else {
            // The article has never been saved : insert it
            $this->getDb()->insert('articles', $articleData);
            // Get the id of the newly created article and set it on the entity.
            $id = $this->getDb()->lastInsertId();
            $article->setId($id);
        }
    }
   
    /**
     * Removes an article from the database.
     *
     * @param integer $id The article id.
     */
    public function delete($id) {
        // Delete the article
        $this->getDb()->delete('articles', array('art_id' => $id));
    } 
    
    /**
     * Return a list of all articles, sorted by date (most recent first).
     *
     * @return array A list of all articles.
     */
    public function findAll() {
        $sql = "select * from articles order by art_date desc";
        $result = $this->getDb()->fetchAll($sql);

        // Convert query result to an array of domain objects
        $articles = array();
        foreach ($result as $row) {
            $articleId = $row['art_id'];
            $articles[$articleId] = $this->buildDomainObject($row);
        }
        return $articles;
    }
 
   
    /**
     *
     * @return le nombre de commentaire pour un article.
     */  
    
function ComptageComment($id) {
    
$sql = "SELECT COUNT(*) as nb FROM comment WHERE art_id = '.$id.'";
$row = $this->getDb()->fetchAssoc($sql);
$count = $row['nb'];
return $count;    
    
  }  
    
 
    /**
     * Returns an article matching the supplied id.
     *
     * @param integer $id
     *
     * @return \BlogJF\Domain\Article|throws an exception if no matching article is found
     */
    public function find($id) {
        $sql = "select * from articles where art_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No article matching id " . $id);
    }

    
    /**
     * Creates an Article object based on a DB row.
     *
     * @param array $row The DB row containing Article data.
     * @return \BlogJF\Domain\Article
     */
    protected function buildDomainObject(array $row) {
        $count= $this->ComptageComment($row['art_id']);
        $article = new Article();
        $article->setId($row['art_id']);
        $article->setTitle($row['art_title']);
        $article->setDate($row['art_date']);
        $article->setContent($row['art_content']);
        $article->setCompte($count);
        return $article;
    }
}