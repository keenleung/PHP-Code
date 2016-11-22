<?php
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';

$doc = new DOMDocument();
$doc->preserveWhiteSpace = false; // 不保护空格
$doc->load("./person.xml");

$persons = $doc->getElementsByTagName("person");

echo "<table border=1>";
// 输出标题
$firstChild = $persons->item(0);
echo "<tr>";
foreach($firstChild->childNodes as $child){
    echo "<td>";
    echo $child->nodeName;
    echo "</td>";
}
echo "</tr>";

// 内容
foreach($persons as $person){
    echo "<tr>";
    foreach($person->childNodes as $child){
        echo "<td>";
        echo $child->nodeValue;
        echo "</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>