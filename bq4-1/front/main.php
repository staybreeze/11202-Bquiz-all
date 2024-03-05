<?php
$type = $_GET['type'] ?? 0;
$nav = '';

if ($type == 0) {
    $nav = "全部商品";
    $goods = $Good->all();
} else {
    $t = $Type->find($type);
    if ($t['big_id'] == 0) {
        $nav = $t['name'];
        $goods = $Good->all(['sh' => 1, 'big' => $t['id']]);
    } else {
        $s = $Type->find($t['big_id']);
        $nav = $s['name'] . ">" . $t['name'];
        $goods = $Good->all(['sh' => 1, 'big' => $s['id']]);
    }
}


?>
<h2><?= $nav; ?></h2>