<?php

namespace Model\Resource;

use \Model\ContactModel;

class ContactResource extends Base
{
    public function getContacts()
    {
        $sql = '
        SELECT `id`,
            `name`,
            `firstname`,
            `lastname`,
            `city`,
            `phone`,
            `created_at`,
            `updated_at`
            FROM `contact`
        ';

        $dbResult = $this->connect()->query($sql);

        $contactList = [];

        while ($row = $dbResult->fetch(\PDO::FETCH_ASSOC)) {
            $contact = new ContactModel();

            $contact->setId($row['id']);
            $contact->setName($row['name']);
            $contact->setFirstname($row['firstname']);
            $contact->setLastname($row['lastname']);
            $contact->setCity($row['city']);
            $contact->setPhone($row['phone']);
            $contact->setCreatedAt($row['created_at']);
            $contact->setUpdatedAt($row['updated_at']);

            $contactList[] = $contact;
        }

        return $contactList;
    }

    public function getContact(int $id)
    {
        $sql = "
        SELECT `id`,
            `name`,
            `firstname`,
            `lastname`,
            `city`,
            `phone`,
            `created_at`,
            `updated_at`
            FROM `contact`
            WHERE `id` = $id
        ";

        $dbResult = $this->connect()->query($sql);

        $row = $dbResult->fetch(\PDO::FETCH_ASSOC);

        $contact = new ContactModel;

        $contact->setId($row['id']);
        $contact->setName($row['name']);
        $contact->setFirstname($row['firstname']);
        $contact->setLastname($row['lastname']);
        $contact->setCity($row['city']);
        $contact->setPhone($row['phone']);
        $contact->setCreatedAt($row['created_at']);
        $contact->setUpdatedAt($row['updated_at']);

        return $contact;
    }

    public function add(array $values)
    {
        $contact = new ContactModel();

        $contact->setName($values['name']);
        $contact->setFirstname($values['firstname']);
        $contact->setLastname($values['lastname']);
        $contact->setCity($values['city']);
        $contact->setPhone($values['phone']);

        $sql = '
        INSERT INTO `contact`(
            `name`,
            `firstname`,
            `lastname`,
            `city`,
            `phone`)
            VALUES (
                :name,
                :firstname,
                :lastname,
                :city,
                :phone)
        ';

        $con = $this->connect();

        $stmt = $con->prepare($sql);

        $stmt->bindParam(':name', $contact->getName());
        $stmt->bindParam(':firstname', $contact->getFirstname());
        $stmt->bindParam(':lastname', $contact->getLastname());
        $stmt->bindParam(':city', $contact->getCity());
        $stmt->bindParam(':phone', $contact->getPhone());

        $stmt->execute();
    }

    public function delete(int $id)
    {
        $sql = "
        DELETE FROM `contact`
            WHERE `id`= :id
        ";

        $con = $this->connect();

        $stmt = $con->prepare($sql);

        $stmt->bindParam(':id', $id);

        $stmt->execute();
    }

    public function getContactPerson(int $id)
    {
        $sql = "
        SELECT `firstname`,
            `lastname`
            FROM `contact`
            WHERE `id` = $id
        ";

        $dbResult = $this->connect()->query($sql);

        $row = $dbResult->fetch(\PDO::FETCH_ASSOC);

        $contact = new ContactModel();

        $contact->setFirstname($row['firstname']);
        $contact->setLastname($row['lastname']);

        $contact->setContactPerson($this->_firstname . '&nbsp;' . $this->_lastname);

        return $contact->getContactPerson();
    }
}
