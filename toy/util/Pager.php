<?php
class Pager {
    // DB에서 몇 개씩 조회할건지, 페이지 당 글 개수
    private $perPage;
    // DB에서 조회할 때 시작 인덱스 번호
    private $startRow;
    // 페이지 번호 (파라미터)
    private $pn;
    
    private $startNum;
    private $lastNum;
    private $pre;
    private $next;
    
    public function __construct($perPage, $pn) {
        $this->perPage = $perPage;
        $this->pn = $pn;
    }
    
    //Getter
    public function getPerPage() {
        return $this->perPage;
    }
    public function getStartRow() {
        return $this->startRow;
    }
    public function getPn() {
        return $this->pn;
    }
    public function getStartNum() {
        return $this->startNum;
    }
    public function getLastNum() {
        return $this->lastNum;
    }
    public function getPre() {
        return $this->pre;
    }
    public function getNext() {
        return $this->next;
    }
    
    //Method
    public function makeRow() {
        $this->startRow = ($this->pn - 1) * $this->perPage;
    }
    
    public function makeNum($totalCount) {
        $totalPage = $totalCount/$this->perPage;
        if($totalCount%$this->perPage != 0) {
            $totalPage = floor($totalPage) + 1;
        }
        
        $perBlock = 5;
        $totalBlock = $totalPage/$perBlock;
        if($totalPage%$perBlock != 0) {
            $totalBlock = floor($totalBlock) + 1;
        }
        
        $curBlock = $this->pn/$perBlock;
        if($this->pn%$perBlock != 0) {
            $curBlock = floor($curBlock) + 1;
        }
        
        $this->startNum = ($curBlock - 1) * $perBlock + 1;
        $this->lastNum = $curBlock * $perBlock;
        
        $this->pre = false;
        if($curBlock > 1) {
            $this->pre = true;
        }
        
        $this->next = false;
        if($totalBlock > $curBlock) {
            $this->next = true;
        }
        
        if($curBlock == $totalBlock) {
            $this->lastNum = $totalPage;
        }
    }
}