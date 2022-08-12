<?php

class BoardVO {
    
    private $bnum;
    private $title;
    private $id;
    private $content;
    private $regDate;
    private $hit;
    private $rmd;
    private $report;
    private $editDate;
    
    public function __construct($bnum, $title, $id, $content, $regDate) {
        
    }
    
    // Getter
    public function getBnum() {
        return $this->bnum;
    }
    public function getTitle() {
        return $this->title;
    }
    public function getId() {
        return $this->id;
    }
    public function getContent() {
        return $this->content;
    }
    public function getRegDate() {
        return $this->regDate;
    }
    public function getHit() {
        return $this->hit;
    }
    public function getRmd() {
        return $this->rmd;
    }
    public function getReport() {
        return $this->report;
    }
    public function getEditDate() {
        return $this->editDate;
    }
    
    // Setter
    public function setBnum($bnum) {
        $this->bnum = $bnum;
    }
    public function setTitle($title) {
        $this->title = $title;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function setContent($content) {
        $this->content = $content;
    }
    public function setRegDate($regDate) {
        $this->regDate = $regDate;
    }
    public function setHit($hit) {
        $this->hit = $hit;
    }
    public function setRmd($rmd) {
        $this->rmd = $rmd;
    }
    public function setReport($report) {
        $this->report = $report;
    }
    public function setEditDate($editDate) {
        $this->editDate = $editDate;
    }
    
}