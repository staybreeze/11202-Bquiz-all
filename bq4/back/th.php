<h3 class="ct">商品分類</h3>
<div class="ct">
    <label for="">新增大分類</label>
    <input type="text" name="big" id="big">
    <button onclick="addType('big')">新增</button>
</div>
<div class="ct">
    <label for="">新增中分類</label>
    <select name="bigs" id="bigs"></select>
    <input type="text" name="mid" id="mid">
    <button onclick="addType('mid')">新增</button>
</div>

<table class="all">
    <?php
    $bigs = $Type->all(['big_id' => 0]);
    foreach ($bigs as $big) {
    ?>

        <tr class="tt ct">
            <td><?= $big['name']; ?></td>
            <td>
                <button onclick="edit(this,<?= $big['id']; ?>)">修改</button>
                <button onclick="del('type',<?= $big['id']; ?>)">刪除</button>
            </td>
        </tr>
        <?php
        if ($Type->count(['big_id' => $big['id']])) {
            $mids = $Type->all(['big_id' => $big['id']]);
            foreach ($mids as $mid) {
        ?>
                <tr class="pp ct">
                    <td><?= $mid['name']; ?></td>
                    <td>
                        <button onclick="edit(this,<?= $mid['id']; ?>)">修改</button>
                        <button onclick="del('type',<?= $mid['id']; ?>)">刪除</button>
                    </td>
                </tr>
    <?php
            }
        }
    } ?>
</table>

<h3 class="ct">商品管理</h3>
<div class="ct">
    <button onclick="location.href='?do=add_goods'">新增商品</button>
</div>

<table class="all">
    <tr class="tt ct ">
        <td>編號</td>
        <td>商品名稱</td>
        <td>庫存量</td>
        <td>狀態</td>
        <td>操作</td>
    </tr>
    <tr class="pp ct ">
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td style="display:flex">
            <button>修改</button>
            <button>刪除</button>
            <button>上架</button>
            <button>下架</button>
        </td>
    </tr>
</table>

<script>
    function sw(id,sh){
        $.post("./api/sw.php",{id,sh},()=>{
            location.reload()
        })
    }
    function addType(type) {
        let data = {};
        switch (type) {
            case "big":
                data = {
                    name: $(`#big`).val(),
                    big_id: 0
                }
                break;
            case "mid":
                data = {
                    name: $(`#mid`).val(),
                    big_id: $("#bigs").val()
                }
                break;

        }
        $.post("./api/save_type.php", data, (res) => {
            console.log(res)
            location.reload()
        })
    }
    getTypes(0)

    function getTypes(big_id) {
        $.post("./api/get_types.php", {
            big_id
        }, (res) => {
            console.log(res)
            $(`#bigs`).html(res)
        })
    }

    function edit(dom, id) {
        let text = $(dom).parent().prev().text();
        let name = prompt("請輸入你要修改的類別名稱", text)
        if (name != null) {
            $.post("./api/save_type.php", {
                name,
                id
            }, () => {
                $dom.parent().prev().text(name)

            })
        }

    }
</script>