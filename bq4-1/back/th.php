<h2 class="ct">商品分類</h2>

<div class="ct">新增大分類<input type="text" id="big"><input type="button" value="新增" onclick="add('big')"></div>
<div class="ct">新增中分類
    <select name="big_list" id="bigList"></select>
    <input type="text" id="mid">
    <input type="button" value="新增" onclick="add('mid')">
</div>

<table class="all">
    <?php
    $bigs = $Type->all(['big_id' => 0]);
    foreach ($bigs as $big) {
    ?>
        <tr>
            <td class="tt"><?= $big['name']; ?></td>
            <td class="tt">
                <input type="button" value="修改" onclick="location.href='?do=edit_admin&id=<?= $row['id']; ?>'">
                <input type="button" value="刪除" onclick="location.href='./api/del_admin.php?id=<?= $row['id']; ?>'">
            </td>
        </tr>

        <?php
        $mids = $Type->all(['big_id' => $big['id']]);
        foreach ($mids as $mid) {
        ?>
            <tr>
                <td class="pp"><?= $mid['name']; ?></td>
                <td class="pp">
                    <input type="button" value="修改" onclick="location.href='?do=edit_admin&id=<?= $row['id']; ?>'">
                    <input type="button" value="刪除" onclick="location.href='./api/del_admin.php?id=<?= $row['id']; ?>'">
                </td>
            </tr>
    <?php
        }
    } ?>
</table>

<script>
    getTypes(0)

    function add(type) {
        let name
        let big_id

        let bigList = $('#bigList').val();

        switch (type) {
            case "big":
                name = $('#big').val();
                big_id = 0;
                break;
            case "mid":
                name = $('#mid').val();
                big_id = $('#bigList').val()
                break;

        }
        $.post('./api/add_type.php', {
            name: name,
            big_id: big_id
        }, (res) => {

            location.reload();
        })
    }

    function getTypes(big_id) {
        $.post('./api/get_opt.php', {
            big_id: big_id
        }, (res) => {

            $('#bigList').html(res)

        })

    }
</script>