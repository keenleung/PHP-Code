<?php
/*
*   SimpleXML 演示
*   思路: 把 XML 字符串转成对象和数组
*/

$path = "./books.xml";
$xml = file_get_contents($path); // 获取 xml 字符串
$simple = new SimpleXMLElement($xml); // 把字符串转成数组, 此代表根节点

// 查询
echo "<table border=1>";
foreach($simple->book as $book){
    $attr = $book->attributes(); // 获取元素节点的属性
    echo "<tr>";
    echo "<td>". $book->name . "</td>";
    echo "<td>" . $book->price . "</td>";
    echo "<td>" . $attr['type'] . "</td>";
    echo "</tr>";
}
echo "</table>";

// 添加
/*
$book = $simple->addChild("book");
$book->addChild("name", "c++");
$book->addChild("price", "50");
$book->addAttribute("type", "动态语言");
$simple->saveXML($path);

echo "Add success";
*/

// 更新
/*
$book = $simple->xpath("/books/book[name='c#']"); // 找到 C#, 为数组
$book[0]->price = '100';
$simple->saveXML($path);
echo "Update Success";
*/

// 删除
// 使用 unset
$book = $simple->xpath("/books/book[name='c++']"); // 找到 c++
for($i=0; $i<count($simple->book); $i++){
    $currentBook = $simple->book[$i];
    if($currentBook->name == "c++"){
        unset($simple->book[$i]);
    }
}
$simple->saveXML($path);

?>