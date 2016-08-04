<?php declare(strict_types=1);

namespace laplant\Instagram\Collections;

use laplant\Instagram\Models\BaseModel;

interface CollectionInterface
{
    public function addItem($item, $key = null);
    public function getItem($key);
    public function deleteItem($key);
    public function items() : array;
    public function length() : int;
}