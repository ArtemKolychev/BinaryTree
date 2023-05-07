<?php

namespace MySplDoublyLinkedList;

class MyBinaryTree implements \Iterator, \Countable
{
    private ?BinaryTreeNode $root = null;
    private ?BinaryTreeNode $current = null;

    /**
     * @var BinaryTreeNode[]
     */
    private array $stack = [];

    private int $count = 0;

    private int $currentNumber = 0;

    public function add(int|string $value): void
    {
        if ($this->root === null) {
            $this->root = new BinaryTreeNode($value);

            $this->count++;
            return;
        }

        $current = $this->root;

        while (true) {
            if ($current->compare($value) > 0) {
                if ($current->left === null) {
                    $current->left = new BinaryTreeNode($value, $current);

                    $this->count++;

                    break;
                } else {
                    $current = $current->left;
                }
            } else if ($current->compare($value) < 0) {
                if ($current->right === null) {
                    $current->right = new BinaryTreeNode($value, $current);
                    $this->count++;
                    break;
                } else {
                    $current = $current->right;
                }
            } else {
                break;
            }
        }
    }

    public function current(): ?BinaryTreeNode
    {
        return $this->current;
    }

    public function next(): void
    {
        if (empty($this->stack) && $this->root !== null) {
            $current = $this->root;

            while ($current !== null) {
                $this->stack[] = $current;
                $current = $current->left;
            }
        }

        if (!empty($this->stack)) {
            $node = array_pop($this->stack);

            $current = $node->right;

            while ($current !== null) {
                $this->stack[] = $current;
                $current = $current->left;
            }

            $this->currentNumber++;

            if($node === $this->getMinNode()) {
                $this->next();
                return;
            }

            $this->current = $node;

        } else {
            $this->current = null;
        }
    }

    public function remove(int|string $value): void
    {
        $this->root = $this->removeNode($this->root, $value);
    }

    private function removeNode(?BinaryTreeNode $root, int|string $value): ?BinaryTreeNode
    {
        if ($root == null) {
            return null;
        }

        if ($root->compare($value) > 0) {
            $root->left = $this->removeNode($root->left, $value);
        } else if ($root->compare($value) < 0) {
            $root->right = $this->removeNode($root->right, $value);
        } else {
            if ($root->left == null && $root->right == null) {
                $root = null;
            } else if ($root->left == null) {
                $root = $root->right;
            } else if ($root->right == null) {
                $root = $root->left;
            } else {
                $min = $this->getMinNode($root->right);
                $root->value = $min->value;
                $root->right = $this->removeNode($root->right, $min->value);
            }
        }

        return $root;
    }


    public function key(): int|string
    {
        return $this->current->value;
    }

    public function valid(): bool
    {
        return $this->currentNumber <= $this->count;
    }

    public function rewind(): void
    {
        $this->currentNumber = 0;
        $this->current = $this->getMinNode();
        $this->stack = [];

    }

    public function count(): int
    {
        return $this->count;
    }

    public function getMinNode($root = null): ?BinaryTreeNode
    {
        $current = $root?:$this->root;

        while ($current->left !== null) {
            $current = $current->left;
        }

        return $current;
    }

}