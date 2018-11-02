<h1>Tree Builder</h1>
PHP, Tree Builder

<h2>Use</h2>
<p>Use method (set) to add data</p>

<p>To override “id” and “parent_id”, use setColumn</p>
<pre>
require_once __DIR__ . '/lib/treeBuild.php';
use lib\TreeBuild;
<br>
$tree = new TreeBuild;
$result = $tree->set($data)
               ->setColumn(['id', 'parent_id'])
               ->get();
</pre>
<h2>Example</h2>
<pre>

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
$result = $tree->set($data)->setColumn(['id', 'parent_id'])->get();
print_r($result);
</pre>
<h2>Result</h2>
<pre>
Array
(
    [0] => Array
        (
            [id] => 1
            [name] => Cat 1
            [obj] => test
            [children] => Array
                (
                    [0] => Array
                        (
                            [id] => 3
                            [name] => Cat 1.2
                            [children] => 
                        )

                    [1] => Array
                        (
                            [id] => 7
                            [name] => Cat 1.3
                            [children] => 
                        )

                )

        )

    [1] => Array
        (
            [id] => 6
            [name] => Cat 2
            [children] => Array
                (
                    [0] => Array
                        (
                            [id] => 5
                            [name] => Cat 2.1
                            [children] => 
                        )

                )

        )

)
</pre>
