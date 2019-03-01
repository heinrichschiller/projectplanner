<?php

namespace Model;

use \Util\Date;

class ProjectModel
{
    private $_id = 0;
    private $_title = '';
    private $_desc = '';
    private $_begin = '';
    private $_end = '';
    private $_priority = '';
    private $_statusId = 0;
    private $_status = '';
    private $_contactId = '';
    private $_contact = '';
    private $_createdAt = '';


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
     * Get the value of Title
     *
     * @return mixed
     */
    public function getTitle()
    {
        return $this->_title;
    }

    /**
     * Set the value of Title
     *
     * @param mixed _title
     *
     * @return self
     */
    public function setTitle($_title)
    {
        $this->_title = $_title;

        return $this;
    }

    /**
     * Get the value of Desc
     *
     * @return mixed
     */
    public function getDesc()
    {
        return $this->_desc;
    }

    /**
     * Set the value of Desc
     *
     * @param mixed _desc
     *
     * @return self
     */
    public function setDesc($_desc)
    {
        $this->_desc = $_desc;

        return $this;
    }

    /**
     * Get the value of Begin
     *
     * @return mixed
     */
    public function getBegin()
    {
        return $this->_begin;
    }

    /**
     * Set the value of Begin
     *
     * @param mixed _begin
     *
     * @return self
     */
    public function setBegin($begin)
    {
        $this->_begin = Date::getInstance()->formatDateTime($begin);

        return $this;
    }

    /**
     * Get the value of End
     *
     * @return mixed
     */
    public function getEnd()
    {
        return $this->_end;
    }

    /**
     * Set the value of End
     *
     * @param mixed _end
     *
     * @return self
     */
    public function setEnd($end)
    {
        $this->_end = Date::getInstance()->formatDateTime($end);

        return $this;
    }

    public function getPriority()
    {
        return $this->_priority;
    }

    public function setPriority($priority)
    {
        $this->_priority = $priority;

        return $this;
    }

    public function getStatusId()
    {
        return $this->_statusId;
    }

    public function setStatusId($id)
    {
        $this->_statusId = $id;

        return $this;
    }
    /**
     * Get the value of Status
     *
     * @return mixed
     */
    public function getStatus()
    {
        return $this->_status;
    }

    /**
     * Set the value of Status
     *
     * @param mixed _status
     *
     * @return self
     */
    public function setStatus($status)
    {
        $this->_status = $status;

        return $this;
    }

    /**
     * Get the value of Customer Id
     *
     * @return mixed
     */
    public function getContactId()
    {
        return $this->_contactId;
    }

    /**
     * Set the value of Customer Id
     *
     * @param mixed _customerId
     *
     * @return self
     */
    public function setContactId($contactId)
    {
        $this->_contactId = $contactId;

        return $this;
    }

    /**
     * Get the name of contact
     *
     * @return mixed
     */
    public function getContact()
    {
        return $this->_contact;
    }

    /**
     * Set the name of contact.
     *
     * @param mixed contact
     *
     * @return self
     */
    public function setContact(string $contact)
    {
        $this->_contact = $contact;

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
    public function setCreatedAt($createdAt)
    {
        $this->_createdAt = Date::getInstance()->formatDateTime($createdAt);

        return $this;
    }
}
