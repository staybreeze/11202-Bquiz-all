<h3>目前位置:首頁>分類網誌><span id="type">健康新知</span></h3>

<div style="display:flex">
    <fieldset style="width:20%">
        <legend>分類網誌</legend>
        <div class="types">
            <div class="type-item" data-id="1">健康新知</div>
            <div class="type-item" data-id="2">菸害防制</div>
            <div class="type-item" data-id="3">癌症防治</div>
            <div class="type-item" data-id="4">慢性病防治</div>
        </div>
    </fieldset>
    <fieldset class="new-list" style="width:80%">
        <legend>文章列表</legend>

        <div class="list-item" style="display:none">

        </div>
        <div class="article"></div>

    </fieldset>

</div>

<script>
    getList(1)
    $('.type-item').click(function() {

        $('#type').text($(this).text())
        let type = $(this).data('id')
        getList(type)
    })

    function getList(type) {

        $.get('./api/get_list.php', {
            type
        }, (list) => {
            $('.list-item').html(list)
            $('.article').hide()
            $('.list-item').show()
        })
    }

    function getNews(id) {
        $.get('./api/get_news.php', {
            id
        }, (news) => {
console.log(news)
            $('.article').html(news)
            $('.article').show()
            $('type-item').hide()
        })

    }
</script>