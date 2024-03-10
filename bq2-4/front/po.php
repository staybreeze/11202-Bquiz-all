目前位置:首頁>分類網誌><span id="types"></span>
<div class="flex">
    <fieldset  style="width:30%">
        <legend>分類網誌</legend>
        <div class="tag" data-id="1">健康新知 </div>
        <div class="tag" data-id="2">菸害防治</div>
        <div class="tag" data-id="3">癌症防治</div>
        <div class="tag" data-id="4">慢性病防治</div>
    </fieldset>
    <fieldset style="width:70%">
        <legend>文章列表</legend>
        <div class="title"></div>
        <article class="news">
   
        </article>
    </fieldset>

</div>

<script>
    getType(1)
    $('.tag').click(function() {
        $("#types").text($(this).text())
        let type = $(this).data('id')
     
        console.log(type)
         getType(type)
       
    })

    function getType(type) {
        $.post('./api/get_type.php', {
            type: type
        }, (res) => {
            console.log(res)
            $(".title").html(res)
            $("article").hide()
            $(".title").show()
        })
    }

    function getNews(id){
        $.post('./api/get_news.php', {
            id: id
        }, (res) => {
            console.log(res)
            $(".news").html(res)
            $(".news").show()
            $(".title").hide()
        })
    }
</script>