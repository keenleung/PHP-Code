<?php

$doc = new DOMDocument();
$doc->preserveWhiteSpace = false;
$doc->load("./books.xml");

$books = $doc->getElementsByTagName('book');

echo "<table border=1>";
echo "<tr><td>书名</td><td>类型</td></tr>";

foreach($books as $book){
    echo "<tr>";
    echo "<td>". $book->nodeValue . "</td>";
    echo "<td>". $book->getAttribute('type') . "</td>";
    echo "</tr>";
}

echo "</table>";

?>