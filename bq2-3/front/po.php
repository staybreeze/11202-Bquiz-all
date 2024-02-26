
    目前位置:首頁>分類網誌><span id=types></span>
    <div class="flex">

        <fieldset style="width:30%">
            <legend>分類網誌</legend>
            <div class="type-list">
                <div class="type-item" data-id="1">健康新知</div>
                <div class="type-item" data-id="2">菸害防治</div>
                <div class="type-item" data-id="3">癌症防治</div>
                <div class="type-item" data-id="4">慢性病防治</div>
            </div>

        </fieldset>
        <fieldset style="width:70%">
            <legend>文章列表</legend>
            <div class="news-list">
                <div class="news-item"></div>
                <div class="article"></div>
            </div>
        </fieldset>
    </div>

    <script>
        getlist(1)
        $('.type-item').click(function() {
            $('#types').text($(this).text())
            let type = $(this).data('id')
            getlist(type)
            console.log(type)
        })

        function getlist(type) {
            $.post('./api/get_list.php', {
                type: type
            }, (res) => {

                $('.news-item').html(res)
                $('.news-item').show();
                $('.article').hide()
            })
        }

        function getnews(id) {
            $.post('./api/get_news.php', {

                id:id
            }, (res) => {
                $('.article').html(res)
                $('.news-item').hide();
                $('.article').show()
            })
        }
    </script>