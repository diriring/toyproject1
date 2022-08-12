<?php

class MemberVO {
    
    private $id;
    private $password;
    private $name;
    private $email;
    private $phone;
    private $regDate;
    private $idDel;
    

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return mixed
     */
    public function getRegDate()
    {
        return $this->regDate;
    }

    /**
     * @return mixed
     */
    public function getIdDel()
    {
        return $this->idDel;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @param mixed $regDate
     */
    public function setRegDate($regDate)
    {
        $this->regDate = $regDate;
    }

    /**
     * @param mixed $idDel
     */
    public function setIdDel($idDel)
    {
        $this->idDel = $idDel;
    }
}