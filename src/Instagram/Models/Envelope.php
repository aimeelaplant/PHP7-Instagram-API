<?php declare(strict_types = 1);

namespace laplant\Instagram\Models;

class Envelope
{
    private $meta;
    private $data;
    private $pagination;

    public function setMeta(Meta $meta) : self
    {
        $this->meta = $meta;
        return $this;
    }

    public function getMeta() : Meta
    {
        return $this->meta;
    }

    public function setData($data) : self
    {
        $this->data = $data;
        return $this;
    }
    
    public function getData()
    {
        return $this->data;
    }

    public function setPagination(Pagination $pagination) : self
    {
        $this->pagination = $pagination;
        return $this;
    }
    
    public function getPagination() : Pagination
    {
        return $this->pagination;
    }
    
    public function jsonSerialize()
    {
        return [
            "meta" => $this->getMeta()->jsonSerialize(),
      //      "data" => $this->getData()->jsonSerialize(),
        //    "pagination" => $this->getPagination()->jsonSerialize()
        ];
    }
}