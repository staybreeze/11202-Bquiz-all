<fieldset>
    <legend>新增問卷</legend>
<form action="./api/que.php" method="post">
    <div>
        <div class="flex">
            <div>問卷名稱</div>
            <input type="text" name="subject" id="">
        </div>
        <div class="flex" id="box">
            <div>選項</div>
            <input type="text" name="opt[]" id="">
            <input type="button" onclick="more()" value="更多">
        </div>

    </div>
    <div class="flex">
        <div>
            <input type="submit" value="新增">|
            <input type="reset" value="清空">
        </div>

    </div></form>
</fieldset>

<script>
    function more(){
        let box=`
        <div class="flex">
            <div class="box">選項</div>
            <input type="text" name="opt[]" id="">
        </div>
        `

        $('#box').before(box)
    }
</script>