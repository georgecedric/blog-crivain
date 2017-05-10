<?php

namespace BlogJF\DAO;

use Doctrine\DBAL\Connection;
use BlogJF\Domain\Newsletter;

class NewsletterDAO extends DAO
{
    
        /**
     * Saves an article into the database.
     *
     * @param \BlogJF\Domain\Contact $contact The contact to save
     */
    public function save(Newsletter $newsletter) {
        $newsletterData = array(
            
            'newsletter_name' => $newsletter->getName(),
            'newsletter_email' => $newsletter->getEmail(),
            );

        if ($newsletter->getId()) {
            // The article has already been saved : update it
            $this->getDb()->update('newsletter', $newsletterData, array('newsletter_id' => $newsletter->getId()));
        } else {
            // The article has never been saved : insert it
            $this->getDb()->insert('newsletter', $newsletterData);
            // Get the id of the newly created article and set it on the entity.
            $id = $this->getDb()->lastInsertId();
            $newsletter->setId($id);
        }
    }

    /**
     * Removes an contact message from the database.
     *
     * @param integer $id The contact id.
     */
    public function delete($id) {
        // Delete the article
        $this->getDb()->delete('newsletter', array('newsletter_id' => $id));
    } 
    
    
    
    
    
    
    /**
     * Return a list of all articles, sorted by date (most recent first).
     *
     * @return array A list of all articles.
     */
    public function findAll() {
        $sql = "select * from newsletter ";
        $result = $this->getDb()->fetchAll($sql);

        // Convert query result to an array of domain objects
        $newsletters = array();
        foreach ($result as $row) {
            $newsletterId = $row['newsletter_id'];
            $newsletters[$newsletterId] = $this->buildDomainObject($row);
        }
        return $newsletters;
    }
 
       /**
     * Returns an article matching the supplied id.
     *
     * @param integer $id
     *
     * @return \BlogJF\Domain\Contact|throws an exception if no matching article is found
     */
    public function find($id) {
        $sql = "select * from newsletter where newsletter_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No message matching id " . $id);
    }

    /**
     * Creates an Message object based on a DB row.
     *
     * @param array $row The DB row containing Contact data.
     * @return \BlogJF\Domain\Contact
     */
    protected function buildDomainObject(array $row) {
       
        $newsletter = new Newsletter();
        $newsletter->setId($row['newsletter_id']);
        $newsletter->setName($row['newsletter_name']);
        $newsletter->setLastname($row['newsletter_lastname']);
        $newsletter->setEmail($row['newsletter_email']);
        
        return $newsletter;
    }
}