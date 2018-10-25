<?php

namespace Model;

class User
{
    private $_id = 0;
    private $_email = '';

    /**
     * Get the value of _id
     */ 
    public function getId()
    {
        return $this->_id;
    }

    /**
     * Set the value of _id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->_id = $id;

        return $this;
    }

    /**
     * Get the value of _login
     */ 
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * Set the value of _login
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->_email = $email;

        return $this;
    }

}