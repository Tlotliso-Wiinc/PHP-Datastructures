a<?php

require __DIR__ . '/vendor/autoload.php';

use LinearStructures\Vector;
use Trees\BinaryTrees\BinaryTree;
use LinearStructures\Matrix;
use LinearStructures\SetList;
use LinearStructures\Stack;
use LinearStructures\Queue;
use Graphs\GraphMatrixUndirected;

// ancestors of George H. W. Bush
// indentation is provided to aid in understanding relations
$JSBush = new BinaryTree("Rev. James");
$NEFay = new BinaryTree("Harriet");
$SPBush = new BinaryTree("Samuel", $JSBush, $NEFay);

$RESheldon = new BinaryTree("Robert");
$MEButler = new BinaryTree("Mary");
$FSSheldon = new BinaryTree("Flora", $RESheldon, $MEButler);

$PSBush = new BinaryTree("Prescott", $SPBush, $FSSheldon);

$DDWalker = new BinaryTree("David");
$MABeaky = new BinaryTree("Martha");
$GNWalker = new BinaryTree("George", $DDWalker, $MABeaky);

$JNWear = new BinaryTree("James II");
$JNWear->setLeft(new BinaryTree("William"));
$JNWear->setRight(new BinaryTree("Sarah"));
$NEHoliday = new BinaryTree("Nancy");
$LWear = new BinaryTree("Lucretia", $JNWear, $NEHoliday);

$DWalker = new BinaryTree("Dorothy", $GNWalker, $LWear);

// George H. W. Bush
$GNWBush = new BinaryTree("George", $PSBush, $DWalker);

$G = new GraphMatrixUndirected(7);
$V = new Vector();

// add the vertices
$G->add('a');
$G->add('b');
$G->add('c');
$G->add('d');
$G->add('e');
$G->add('f');
$G->add('g');

// add edges
$G->addEdge('a', 'b', 1);
$G->addEdge('a', 'c', 2);
$G->addEdge('a', 'e', 3);
$G->addEdge('b', 'd', 4);
$G->addEdge('b', 'f', 5);
$G->addEdge('c', 'g', 6);
$G->addEdge('e', 'f', 7);

// revome edges
//$G->removeEdge('c', 'd');

// remove vertices
//$G->remove('d');
//$G->remove('b');

//printVertices($G);
//printEdges($G);
//printNeighbors($G, 'b');
//print('<h1>' . $G->size() . '</h1>');
//breadthFirstSearchIterative($G, 'a', $V);
//findPathDFS($G, 'a', 'g', $V);

$path = findPathBFS($G, 'a', 'g');
//printList($path);
listData($path);

function printList($list)
{
	$iterator = $list->iterator();
	while ($iterator->hasNext()) {
		print('<h3>' . $iterator->next() . '</h3>');
	}
}

function listData($data)
{
	foreach ($data as $key => $value) {
		print('<h3>' . $key . ': ' . $value . '</h3>');
	}
}

function printVertices($graph)
{
	$iterator = $graph->iterator();
	while ($iterator->hasNext()) {
		print('<h3 style="color: green;">' . $iterator->next() . '</h3>');
	}
}

function printEdges($graph)
{
	$iterator = $graph->edges();
	while ($iterator->hasNext()) {
		$e = $iterator->next();
		print('<h3 style="color: blue;">' . $e->label() . '(' . $e->here() . '-' . $e->there() .  ')' . '</h3>');
	}
}

function printNeighbors($graph, $vLabel)
{
	$iterator = $graph->neighbors($vLabel);
	while ($iterator->hasNext()) {
		print('<h3 style="color: orange;">' . $iterator->next() . '</h3>');
	}
}

/**
 * Depth First Search
 * 
 * performs depth-first search on a graph adding
 * visited nodes into a list.
 * 
 * @param Graph $graph
 * @param mixed $vLabel
 * @param List $list
 * @return none
 */
function depthFirstSearch($graph, $vLabel, $list)
{
	$graph->visit($vLabel);
	$neighbors = $graph->neighbors($vLabel);

	while ($neighbors->hasNext()) {
		$neighbor = $neighbors->next();

		// potentially deepen the search if the neighbor
		// has not been visited
		if (!$graph->isVisited($neighbor)) {
			depthFirstSearch($graph, $neighbor, $list);
		}
	}

	$list->add($vLabel);
}

/**
 * Depth First Search
 * 
 * performs depth-first search on a graph adding
 * visited nodes into a list.
 * 
 * @param Graph $graph
 * @param mixed $vLabel
 * @param List $list
 * @return none
 */
function depthFirstSearchIterative($graph, $vLabel, $list)
{
	$S = new Stack();
	$S->push($vLabel);

	while (!$S->isEmpty()) {
		$v = $S->pop();

		if (!$graph->isVisited($v)) {
			$graph->visit($v);
			$list->add($v);

			$neighbors = $graph->neighbors($v);

			while ($neighbors->hasNext()) {
				$neighbor = $neighbors->next();
				$S->push($neighbor);
			}
		}
	}
}

/**
 * Breadth First Search
 * 
 * performs breadth-first search on a graph enqueing
 * unvisited descendants of a node into a queue.
 * 
 * @param Graph $graph
 * @param mixed $vLabel
 * @param List $list
 * @return none
 */
function breadthFirstSearchIterative($graph, $vLabel, $list)
{
	$Q = new Queue();
	$Q->enqueue($vLabel);

	while (!$Q->isEmpty()) {
		$v = $Q->dequeue();

		if (!$graph->isVisited($v)) {
			$graph->visit($v);
			$list->add($v);

			$neighbors = $graph->neighbors($v);

			while ($neighbors->hasNext()) {
				$neighbor = $neighbors->next();
				$Q->enqueue($neighbor);
			}
		}
	}
}

/**
 * Find path (Depth First Search)
 * 
 * @param Graph $graph
 * @param mixed $start
 * @param mixed $goal
 * @param List $list
 * @return none
 */ 
function findPathDFS($graph, $start, $goal, $list)
{
	$S = new Stack();
	$S->push($start);

	while (!$S->isEmpty()) {
		$v = $S->pop();

		if (!$graph->isVisited($v)) {
			$graph->visit($v);
			$list->add($v);

			if ($v == $goal) {
				return; // terminate
			}

			$neighbors = $graph->neighbors($v);

			while ($neighbors->hasNext()) {
				$neighbor = $neighbors->next();
				$S->push($neighbor);
			}
		}
	}
}

/**
 * Find path (Breadth First Search)
 * 
 * @param Graph $graph
 * @param mixed $start
 * @param mixed $goal
 * @param List $list
 * @return none
 */ 
function findPathBFS($graph, $start, $goal)
{
	$Q = new Queue();
	$Q->enqueue($start);

	while (!$Q->isEmpty()) {
		$v = $Q->dequeue();

		if (!$graph->isVisited($v)) {
			$graph->visit($v);

			$neighbors = $graph->neighbors($v);

			while ($neighbors->hasNext()) {
				$neighbor = $neighbors->next();
				$parent[$neighbor] = $v;
				$Q->enqueue($neighbor);
			}
		}
	}

	//$path = constructPath($parent, $start, $goal);

	return $parent;
}

/**
 * Construct a path
 * 
 * construct a path from a start node to the goal node
 * from a breadth first search forest stored in an
 * array
 * 
 * @param array $parent
 * @param mixed $start
 * @param mixed $goal
 * @return Stack
 */ 
function constructPath($parent, $start, $goal)
{
	$s = new Stack();
	$v = $parent[$goal];
	$s->push($v);

	while ($v != $start) {
		$v = $parent[$v];
		$s->push($v);
	}

	$s->push($start);

	return $s;
}