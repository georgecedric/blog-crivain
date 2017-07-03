<?php

namespace BlogJF\DAO;

use Doctrine\DBAL\Connection;
use BlogJF\Domain\Contact;

class ContactDAO extends DAO
{
    
        /**
     * Saves an article into the database.
     *
     * @param \BlogJF\Domain\Contact $contact The contact to save
     */
    public function save(Contact $contact) {
        $contactData = array(
            'contact_title' => $contact->getTitle(),
            'contact_content' => $contact->getContent(),
            'contact_author' => $contact->getAuthor(),
            'contact_email' => $contact->getEmail(),
            );

        if ($contact->getId()) {
            // The article has already been saved : update it
            $this->getDb()->update('contact', $contactData, array('contact_id' => $contact->getId()));
        } else {
            // The article has never been saved : insert it
            $this->getDb()->insert('contact', $contactData);
            // Get the id of the newly created article and set it on the entity.
            $id = $this->getDb()->lastInsertId();
            $contact->setId($id);
        }
    }

    /**
     * Removes an contact message from the database.
     *
     * @param integer $id The contact id.
     */
    public function delete($id) {
        // Delete the article
        $this->getDb()->delete('contact', array('contact_id' => $id));
    } 
    
   
    /**
     * Return a list of all articles, sorted by date (most recent first).
     *
     * @return array A list of all articles.
     */
    public function findAll() {
        $sql = "select * from contact order by contact_date desc";
        $result = $this->getDb()->fetchAll($sql);

        // Convert query result to an array of domain objects
        $contacts = array();
        foreach ($result as $row) {
            $contactId = $row['contact_id'];
            $contacts[$contactId] = $this->buildDomainObject($row);
        }
        return $contacts;
    }
 
       /**
     * Returns an article matching the supplied id.
     *
     * @param integer $id
     *
     * @return \BlogJF\Domain\Contact|throws an exception if no matching article is found
     */
    public function find($id) {
        $sql = "select * from contact where contact_id=?";
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
       
        $contact = new Contact();
        $contact->setId($row['contact_id']);
        $contact->setTitle($row['contact_title']);
        $contact->setDate($row['contact_date']);
        $contact->setContent($row['contact_content']);
        $contact->setEmail($row['contact_email']);
        $contact->setAuthor($row['contact_author']);
        return $contact;
    }
}