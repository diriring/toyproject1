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
    
    private $kind;
    private $search;
    

    public function getPerPage()
    {
        return $this->perPage;
    }

    public function getStartRow()
    {
        return $this->startRow;
    }

    public function getPn()
    {
        return $this->pn;
    }

    public function getStartNum()
    {
        return $this->startNum;
    }

    public function getLastNum()
    {
        return $this->lastNum;
    }

    public function getPre()
    {
        return $this->pre;
    }

    public function getNext()
    {
        return $this->next;
    }

    public function getKind()
    {
        return $this->kind;
    }

    public function getSearch()
    {
        if ($this->search == null) {
            $this->search="";
        }
        return $this->search;
    }

    /**
     * @param mixed $perPage
     */
    public function setPerPage($perPage)
    {
        $this->perPage = $perPage;
    }

    /**
     * @param number $startRow
     */
    public function setStartRow($startRow)
    {
        $this->startRow = $startRow;
    }

    /**
     * @param mixed $pn
     */
    public function setPn($pn)
    {
        $this->pn = $pn;
    }

    /**
     * @param number $startNum
     */
    public function setStartNum($startNum)
    {
        $this->startNum = $startNum;
    }

    /**
     * @param number $lastNum
     */
    public function setLastNum($lastNum)
    {
        $this->lastNum = $lastNum;
    }

    /**
     * @param boolean $pre
     */
    public function setPre($pre)
    {
        $this->pre = $pre;
    }

    /**
     * @param boolean $next
     */
    public function setNext($next)
    {
        $this->next = $next;
    }

    /**
     * @param mixed $kind
     */
    public function setKind($kind)
    {
        $this->kind = $kind;
    }

    /**
     * @param mixed $search
     */
    public function setSearch($search)
    {
        $this->search = $search;
    }

    public function __construct($perPage, $pn) {
        $this->perPage = $perPage;
        $this->pn = $pn;
    }
    


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