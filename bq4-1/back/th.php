<h2 class="ct">商品分類</h2>

<div class="ct">新增大分類<input type="text" id="big"><input type="button" value="新增" onclick="add('big')"></div>
<div class="ct">新增中分類
    <select name="big_list" id="bigList"></select>
    <input type="text" id="mid">
    <input type="button" value="新增" onclick="add('mid')">
</div>

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