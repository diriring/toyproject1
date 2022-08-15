<?php

class BoardVO {
    
    private $bnum;
    private $id;
    private $title;
    private $content;
    private $regDate;
    private $hit;
    private $rmd;
    private $report;
    private $editDate;
    
    
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
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
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
     * @return mixed
     */
    public function getHit()
    {
        return $this->hit;
    }

    /**
     * @return mixed
     */
    public function getRmd()
    {
        return $this->rmd;
    }

    /**
     * @return mixed
     */
    public function getReport()
    {
        return $this->report;
    }

    /**
     * @return mixed
     */
    public function getEditDate()
    {
        return $this->editDate;
    }

    /**
     * @param mixed $bnum
     */
    public function setBnum($bnum)
    {
        $this->bnum = $bnum;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
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

    /**
     * @param mixed $hit
     */
    public function setHit($hit)
    {
        $this->hit = $hit;
    }

    /**
     * @param mixed $rmd
     */
    public function setRmd($rmd)
    {
        $this->rmd = $rmd;
    }

    /**
     * @param mixed $report
     */
    public function setReport($report)
    {
        $this->report = $report;
    }

    /**
     * @param mixed $editDate
     */
    public function setEditDate($editDate)
    {
        $this->editDate = $editDate;
    }

}