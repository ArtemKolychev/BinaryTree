<?php

require_once 'MySplDoublyLinkedList/MyBinaryTree.php';
require_once 'MySplDoublyLinkedList/MyBinaryTreeNode.php';

use MySplDoublyLinkedList\MyBinaryTree;

$myBinaryTreeStr = new MyBinaryTree();

$myBinaryTreeStr->add('e');
$myBinaryTreeStr->add('c');
$myBinaryTreeStr->add('b');
$myBinaryTreeStr->add('d');
$myBinaryTreeStr->add('a');
$myBinaryTreeStr->remove('c');


foreach ($myBinaryTreeStr as $node) {
    echo "-> " . $node?->value . PHP_EOL;
}

echo "----------------------" . PHP_EOL;

$myBinaryTreeNumber = new MyBinaryTree();
$myBinaryTreeNumber->add(3);
$myBinaryTreeNumber->add(5);
$myBinaryTreeNumber->add(1);
$myBinaryTreeNumber->add(2);
$myBinaryTreeNumber->add(4);
$myBinaryTreeNumber->remove(2);

foreach ($myBinaryTreeNumber as $node) {
    echo "-> " . $node?->value . PHP_EOL;
}