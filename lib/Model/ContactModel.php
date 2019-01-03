<?php

namespace Model;

class ContactModel
{
    private $_id = 0;
    private $_company = '';
    private $_name = '';
    private $_firstname = '';
    private $_lastname = '';
    private $_street = '';
    private $_city = '';
    private $_state = '';
    private $_country = '';
    private $_phone = '';
    private $_mobile = '';
    private $_email = '';
    private $_createdAt = '';
    private $_updatedAt = '';
    private $_contactPerson = '';

    /**
     * Get the value of Id
     *
     * @return int
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * Set the value of Id
     *
     * @param int id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->_id = $id;

        return $this;
    }

    /**
     * Get the value of Name
     *
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * Set the value of Name
     *
     * @param string name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->_name = $name;

        return $this;
    }

    /**
     * Get the value of Firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->_firstname;
    }

    /**
     * Set the value of Firstname
     *
     * @param string firstname
     *
     * @return self
     */
    public function setFirstname($firstname)
    {
        $this->_firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of Lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->_lastname;
    }

    /**
     * Set the value of Lastname
     *
     * @param string lastname
     *
     * @return self
     */
    public function setLastname($lastname)
    {
        $this->_lastname = $lastname;

        return $this;
    }

    /**
     * Get the value of City
     *
     * @return string
     */
    public function getCity()
    {
        return $this->_city;
    }

    /**
     * Set the value of City
     *
     * @param string city
     *
     * @return self
     */
    public function setCity($city)
    {
        $this->_city = $city;

        return $this;
    }

    /**
     * Get the value of Phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    /**
     * Set the value of Phone
     *
     * @param string phone
     *
     * @return self
     */
    public function setPhone($phone)
    {
        $this->_phone = $phone;

        return $this;
    }

    /**
     * Get the value of Created At
     *
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->_createdAt;
    }

    /**
     * Set the value of Created At
     *
     * @param string createdAt
     *
     * @return self
     */
    public function setCreatedAt($createdAt)
    {
        $this->_createdAt = $createdAt;

        return $this;
    }

    /**
     * Get the value of Updated At
     *
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->_updatedAt;
    }

    /**
     * Set the value of Updated At
     *
     * @param string updatedAt
     *
     * @return self
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->_updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get the value of Contact Person
     *
     * @return string
     */
    public function getContactPerson()
    {
        return $this->_contactPerson;
    }

    /**
     * Set the value of Contact Person
     *
     * @param string contactPerson
     *
     * @return self
     */
    public function setContactPerson($contactPerson)
    {
        $this->_contactPerson = $contactPerson;

        return $this;
    }
}
