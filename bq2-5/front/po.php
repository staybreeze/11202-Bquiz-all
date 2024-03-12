目前位置:首頁>分類網誌><span id="types">健康新知</span>

<div class="flex">
    <fieldset style="width:30%">
        <legend>分類網誌</legend>
        <div class="tag" data-id="1">健康新知 </div>
        <div class="tag" data-id="2">菸害防治</div>
        <div class="tag" data-id="3">癌症防治</div>
        <div class="tag" data-id="4">慢性病防治</div>
    </fieldset>
    <fieldset style="width:70%">
        <legend>文章列表</legend>
        <div class="news-list"></div>
        <pre class="news"></pre>
    </fieldset>
</div>

<script>
    $(".tag").click(function() {

        $("#types").text($(this).text())
        let type = $(this).data('id')
        getType(type)

        function getType(type) {
            $.post('./api/get_type.php', {
                type: type
            }, (res) => {
                $(".news").hide()
                $(".news-list").html(res)
                $(".news-list").show()

            })
        }

    })

    function getNews(id) {
        $.post('./api/get_news.php', {
            id: id
        }, (res) => {
            $(".news-list").hide()
            $(".news").html(res)
            $(".news").show()
        })
    }
</script>