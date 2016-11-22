<?php

$arrs = array(
    array('name'=>'php', 'type'=>'脚本语言'),
    array('name'=>'xml', 'type'=>'标记语言'),
    array('name'=>'c#', 'type'=>'动态语言')
);

$doc = new DOMDocument('1.0', 'utf-8'); // 设置版本号和字符编码
$doc->formatOutput = true; // 格式化输出

$books = $doc->createElement('books'); // 创建元素节点

foreach($arrs as $arr){
    $book = $doc->createElement('book');
    $name = $doc->createElement('name', $arr['name']); // 创建 name 元素节点并赋值
    $book->appendChild($name);
    $book->setAttribute('type', $arr['type']); // 设置元素属性并赋值
    $books->appendChild($book);
}

$doc->appendChild($books);
$doc->save('books.xml');
echo "写入Success";

?>