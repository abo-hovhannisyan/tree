<?php

require_once __DIR__ . '/lib/treeBuild.php';

$data = array(
    array('id' => 1, 'parent_id' => null, 'name' => 'Cat 1'),
    array('id' => 2, 'parent_id' => 1, 'name' => 'Cat 1.1'),
    array('id' => 3, 'parent_id' => 1, 'name' => 'Cat 1.2'),
    array('id' => 4, 'parent_id' => 2, 'name' => 'Cat 1.1.1'),
    array('id' => 5, 'parent_id' => 6, 'name' => 'Cat 2.1'),
    array('id' => 6, 'parent_id' => null, 'name' => 'Cat 2'),
    array('id' => 7, 'parent_id' => 1, 'name' => 'Cat 1.3'),
);

use lib\TreeBuild;

$tree = new TreeBuild;
$result = $tree->set($data)
              ->setColumn(['id', 'parent_id'])
              ->get();
print_r($result);
