<?php

namespace MySplDoublyLinkedList;

class BinaryTreeNode
{
    public int|string $value;
    public ?BinaryTreeNode $left;
    public ?BinaryTreeNode $right;
    public ?BinaryTreeNode $parent;

    public function __construct(int|string $value, ?BinaryTreeNode $parent = null)
    {
        $this->value = $value;
        $this->left = null;
        $this->right = null;
        $this->parent = $parent;
    }

    public function compare(int|string $value): int
    {
        if (is_string($this->value)) {
            return strcmp($this->value, $value);
        } else {
            return $this->value <=> $value;
        }
    }

    public function __toString(): string
    {
        return (string) $this->value;
    }
}