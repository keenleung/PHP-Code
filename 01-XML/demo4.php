<?php

function getChilds($node){
    echo "<ul>";
    if($node->nodeType == 3){ // 1:元素节点, 2:属性节点, 3:值节点, 9:根节点
        echo "<li>" . $node->nodeValue . "</li>";
    }
    else{
        echo "<li>" . $node->nodeName . "</li>"; // 输出元素节点的名称
        if($node->attributes->length > 0){ // 元素节点的属性个数大于0 : 此节点有属性
            //echo "attr name: " . $node->attributes->item(0)->name;
            //echo "attr value: " . $node->attributes->item(0)->value;
            foreach($node->attributes as $attr){
                echo "<li>" . $attr->value . "</li>"; // 输出属性节点的值
            }
        }
        // 输出子元素
        foreach($node->childNodes as $child){ // 遍历子元素
            getChilds($child); // 递归输出
        }
    }
    echo "</ul>";
}

$doc = new DOMDocument();
$doc->preserveWhiteSpace = false; // 不保护空格
$doc->load("./books.xml");
$root = $doc->documentElement; // 获取最顶层元素
getChilds($root);


?>