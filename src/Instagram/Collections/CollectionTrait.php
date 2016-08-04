<?php declare(strict_types=1);

namespace laplant\Instagram\Collections;

use laplant\Instagram\Exceptions\{InvalidKeyException,KeyHasUseException};

trait CollectionTrait
{
    private $items;

    public function addItem($item, $key = null)
    {
        if (is_null($key)) {
            $this->items[] = $item;
        } else {
            if (isset($this->items[$key])) {
                throw new KeyHasUseException("The key already exists.");
            } else {
                $this->items[$key] = $item;
            }
        }
    }

    public function getItem($key)
    {
        if (isset($this->items[$key])) {
            return $this->items[$key];
        } else {
            throw new InvalidKeyException("The key does not exist.");
        }
    }
    public function deleteItem($key)
    {
        if (isset($this->items[$key])) {
            unset($this->items[$key]);
        } else {
            throw new InvalidKeyException("Trying to delete a key that does not exist.");
        }
    }

    public function replaceItem($item, $key)
    {
        if (isset($this->items[$key])) {
            $this->items[$key] = $item;
        } else {
            throw new InvalidKeyException("The key does not exist.");
        }
    }

    public function length() : int
    {
        return count($this->items);
    }

    public function items() : array
    {
        return $this->items;
    }
}