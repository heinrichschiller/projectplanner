<?php

namespace Model;

class Customer
{
    private $_id = 0;
    private $_name = '';
    private $_firstname = '';
    private $_lastname = '';
    private $_city = '';
    private $_phone = '';
    private $_createdAt = '';
    private $_updatedAt = '';

    private $_contactPerson = '';

    /**
     * Get the value of Id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * Set the value of Id
     *
     * @param mixed _id
     *
     * @return self
     */
    public function setId($_id)
    {
        $this->_id = $_id;

        return $this;
    }

    /**
     * Get the value of Name
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * Set the value of Name
     *
     * @param mixed _name
     *
     * @return self
     */
    public function setName($_name)
    {
        $this->_name = $_name;

        return $this;
    }

    /**
     * Get the value of Firstname
     *
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->_firstname;
    }

    /**
     * Set the value of Firstname
     *
     * @param mixed _firstname
     *
     * @return self
     */
    public function setFirstname($_firstname)
    {
        $this->_firstname = $_firstname;

        return $this;
    }

    /**
     * Get the value of Lastname
     *
     * @return mixed
     */
    public function getLastname()
    {
        return $this->_lastname;
    }

    /**
     * Set the value of Lastname
     *
     * @param mixed _lastname
     *
     * @return self
     */
    public function setLastname($_lastname)
    {
        $this->_lastname = $_lastname;

        return $this;
    }

    /**
     * Get the value of City
     *
     * @return mixed
     */
    public function getCity()
    {
        return $this->_city;
    }

    /**
     * Set the value of City
     *
     * @param mixed _city
     *
     * @return self
     */
    public function setCity($_city)
    {
        $this->_city = $_city;

        return $this;
    }

    /**
     * Get the value of Phone
     *
     * @return mixed
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    /**
     * Set the value of Phone
     *
     * @param mixed _phone
     *
     * @return self
     */
    public function setPhone($_phone)
    {
        $this->_phone = $_phone;

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
     * @param mixed _createdAt
     *
     * @return self
     */
    public function setCreatedAt($_createdAt)
    {
        $this->_createdAt = $_createdAt;

        return $this;
    }

    /**
     * Get the value of Updated At
     *
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->_updatedAt;
    }

    /**
     * Set the value of Updated At
     *
     * @param mixed _updatedAt
     *
     * @return self
     */
    public function setUpdatedAt($_updatedAt)
    {
        $this->_updatedAt = $_updatedAt;

        return $this;
    }

    /**
     * Get the value of Contact Person
     *
     * @return mixed
     */
    public function getContactPerson()
    {
        return $this->_contactPerson;
    }

    /**
     * Set the value of Contact Person
     *
     * @param mixed _contactPerson
     *
     * @return self
     */
    public function setContactPerson($_contactPerson)
    {
        $this->_contactPerson = $_contactPerson;

        return $this;
    }
}
