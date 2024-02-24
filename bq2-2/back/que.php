<fieldset>
    <legend>新增問卷</legend>
    <form action="./api/que.php" method="post">
        <div style="display:flex">
        問卷名稱
            <input type="text" name="subject" id="">
        </div>
        <div class="box">
           選項
            <input type="text" name="opt[]" id="">
     
          <input type="button" value="更多" onclick="more()">
        </div>
        <div>
            <input type="submit" value="新增">|
            <input type="reset" value="清空">
        </div>
    </form>
</fieldset>

<script>
    function more() {
        let more = `        <div>
           選項
            <input type="text" name="opt[]" id="">

        </div>`

        $('.box').before(more)
    }
</script>