<fieldset>
    <legend>新增問卷</legend>
    <form action="./api/que.php" method="post">
        <div style="display:flex">
            <div>
                <div>問卷名稱</div>
            </div>
            <div><input type="text" name="sub"></div>
        </div>
        <div>

            <div id="more">選項

                <input type="text" name="opt[]">
                <input type="button" onclick="more()" value="更多">
            </div>
        </div>
        <div class="ct">
            <input type="submit" value="送出">
            <input type="reset" value="清空">
        </div>
    </form>
</fieldset>

<script>
    function more() {

        let opt = `            <div id="more">選項

<input type="text" name="opt[]">

</div>`
        $('#more').before(opt)
    }
</script>