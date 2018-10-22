<?php

namespace Model\Resource;

use \Model\Customer as CustomerModel;

class Customer extends Base
{
    public function getCustomers()
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
            FROM `customer`
        ';

        $dbResult = $this->connect()->query($sql);

        $customerList = [];

        while ($row = $dbResult->fetch(\PDO::FETCH_ASSOC)) {
            $customer = new CustomerModel;

            $customer->setId($row['id']);
            $customer->setName($row['name']);
            $customer->setFirstname($row['firstname']);
            $customer->setLastname($row['lastname']);
            $customer->setCity($row['city']);
            $customer->setPhone($row['phone']);
            $customer->setCreatedAt($row['created_at']);
            $customer->setUpdatedAt($row['updated_at']);

            $customerList[] = $customer;
        }

        return $customerList;
    }

    public function getCustomer(array $params)
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
            FROM `customer`
            WHERE `id` = ' . $params['id'];

        $dbResult = $this->connect()->query($sql);

        $row = $dbResult->fetch(\PDO::FETCH_ASSOC);

        $customer = new CustomerModel;

        $customer->setId($row['id']);
        $customer->setName($row['name']);
        $customer->setFirstname($row['firstname']);
        $customer->setLastname($row['lastname']);
        $customer->setCity($row['city']);
        $customer->setPhone($row['phone']);
        $customer->setCreatedAt($row['created_at']);
        $customer->setUpdatedAt($row['updated_at']);

        return $customer;
    }

    public function add(array $values)
    {
        $customer = new CustomerModel();

        $customer->setName($values['name']);
        $customer->setFirstname($values['firstname']);
        $customer->setLastname($values['lastname']);
        $customer->setCity($values['city']);
        $customer->setPhone($values['phone']);

        $sql = '
        INSERT INTO `customer`(
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

        $stmt->bindParam(':name', $customer->getName());
        $stmt->bindParam(':firstname', $customer->getFirstname());
        $stmt->bindParam(':lastname', $customer->getLastname());
        $stmt->bindParam(':city', $customer->getCity());
        $stmt->bindParam(':phone', $customer->getPhone());

        $stmt->execute();
    }

    public function getContactPerson(int $id)
    {
        $sql = "
        SELECT `firstname`,
            `lastname`
            FROM `customer`
            WHERE `id` = $id
        ";

        $dbResult = $this->connect()->query($sql);

        $row = $dbResult->fetch(\PDO::FETCH_ASSOC);

        $customer = new CustomerModel();

        $customer->setFirstname($row['firstname']);
        $customer->setLastname($row['lastname']);

        $customer->setContactPerson($this->_firstname . '&nbsp;' . $this->_lastname);

        return $customer->getContactPerson();
    }
}
