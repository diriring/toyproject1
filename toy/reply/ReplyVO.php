<?php

class ReplyVO {
    
    private $rnum;
    private $id;
    private $bnum;
    private $content;
    private $regDate;
   
    
   /**
     * @return mixed
     */
    public function getRnum()
    {
        return $this->rnum;
    }

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
    public function getBnum()
    {
        return $this->bnum;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return mixed
     */
    public function getRegDate()
    {
        return $this->regDate;
    }

    /**
     * @param mixed $rnum
     */
    public function setRnum($rnum)
    {
        $this->rnum = $rnum;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $bnum
     */
    public function setBnum($bnum)
    {
        $this->bnum = $bnum;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @param mixed $regDate
     */
    public function setRegDate($regDate)
    {
        $this->regDate = $regDate;
    }

}