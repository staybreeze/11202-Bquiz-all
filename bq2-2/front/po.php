目前位置>首頁>分類網誌><span id="types"></span>
<div style="display:flex;width:80%">
    <fieldset class="type" style="width:30%">
        <legend>分類網誌</legend>
        <div class="type-item" data-id="1">健康新知</div>
        <div class="type-item" data-id="2">菸害防制</div>
        <div class="type-item" data-id="3">癌症防治</div>
        <div class="type-item" data-id="4">慢性病防治</div>
    </fieldset>
    <fieldset class="list" style="width:70%">
        <legend>文章列表</legend>
        <div class="list-item" style="display:none">

        </div>
        <div class="article" style="display:none"></div>
    </fieldset>
</div>

<script>
    $('.type-item').click(function() {
        $('#types').text($(this).text())
        let type = $(this).data('id');
        getList(type);
    })

    function getList(type) {
$.post('./api/get_list.php',{type:type},(res)=>{
    // location.reload();
    $('.list-item').html(res);
    $('.list-item').show();
    $('.article').hide();
})
    }

    function getNews(id){
        $.post('./api/get_news.php',{id:id},(res)=>{
            $('.list-item').hide();
            $('.article').html(res);
            $('.article').show();
    })}
</script>