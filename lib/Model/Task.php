<?php

namespace Model;

class Task
{
    private $_id = 0;
    private $_title = '';
    private $_desc = '';
    private $_begin = '';
    private $_end = '';
    private $_status = '';
    private $_customer_id = '';
    private $_project_id = '';
    private $_created_at = '';
    private $_updated_at = '';


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
    public function setBegin($_begin)
    {
        $this->_begin = $_begin;

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
    public function setEnd($_end)
    {
        $this->_end = $_end;

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
    public function setStatus($_status)
    {
        $this->_status = $_status;

        return $this;
    }

    /**
     * Get the value of Customer Id
     *
     * @return mixed
     */
    public function getCustomerId()
    {
        return $this->_customer_id;
    }

    /**
     * Set the value of Customer Id
     *
     * @param mixed _customer_id
     *
     * @return self
     */
    public function setCustomerId($_customer_id)
    {
        $this->_customer_id = $_customer_id;

        return $this;
    }

    /**
     * Get the value of Project Id
     *
     * @return mixed
     */
    public function getProjectId()
    {
        return $this->_project_id;
    }

    /**
     * Set the value of Project Id
     *
     * @param mixed _project_id
     *
     * @return self
     */
    public function setProjectId($_project_id)
    {
        $this->_project_id = $_project_id;

        return $this;
    }

    /**
     * Get the value of Created At
     *
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->_created_at;
    }

    /**
     * Set the value of Created At
     *
     * @param mixed _created_at
     *
     * @return self
     */
    public function setCreatedAt($_created_at)
    {
        $this->_created_at = $_created_at;

        return $this;
    }

    /**
     * Get the value of Updated At
     *
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->_updated_at;
    }

    /**
     * Set the value of Updated At
     *
     * @param mixed _updated_at
     *
     * @return self
     */
    public function setUpdatedAt($_updated_at)
    {
        $this->_updated_at = $_updated_at;

        return $this;
    }

}
