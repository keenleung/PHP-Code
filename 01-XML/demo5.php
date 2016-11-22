<?php
/*
*   XPath
*/

$doc = new DOMDocument('1.0', 'utf-8');
$doc->preserveWhiteSpace = false;
$doc->load('./books.xml');
$xpath = new DOMXPath($doc);

// 查询所有的书
$query = '/books/book/name';
$result = $xpath->query($query);
echo "书名: <br>";
foreach($result as $nameNode){
    echo $nameNode->nodeValue . "<br>";
}

echo "<br>==========<br>";

// 查询指定类型的书
$query = '/books/book[@type="动态语言"]/name';
$result = $xpath->query($query);
foreach($result as $nameNode){
    echo $nameNode->nodeValue . "<br>";
}

echo "<br>==========<br>";

// 通过为止来查询
$query = "/books/book[position()>1]/name";
$result = $xpath->query($query);
foreach($result as $nameNode){
    echo $nameNode->nodeValue . "<br>";
}

?>