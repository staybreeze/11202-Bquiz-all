<style>
    .tag {
        border: 1px solid black;
        margin-left: -1px;
        text-align: center;
        width: 100px;
    }

    .tags {
        display: flex;
    }

    .article {
        border: 1px solid black;
        margin-left: -1px;
        margin-top: -1px;
    }

    .active {
        background-color: gainsboro;
    }
    article{
        display: none;
    }
</style>


<div class="tags">
    <div class="tag active" id="sec1" data-id="1">健康新知</div>
    <div class="tag" id="sec2" data-id="2">菸害防治</div>
    <div class="tag" id="sec3" data-id="3">癌症防治</div>
    <div class="tag" id="sec4" data-id="4">慢性病防治</div>
</div>

<div class="article">
    <article id="section1">
        <h2><b>健康新知</b></h2>
        <pre></pre>
    </article>
    <article id="section2">
        <h2><b>菸害防治</b></h2>
        <pre></pre>
    </article>
    <article id="section3">
        <h2><b>癌症防治</b></h2>
        <pre></pre>
    </article>
    <article id="section4">
        <h2><b>慢性病防治</b></h2>
        <pre></pre>
    </article>
</div>
<script>
$('#section1').show()
$('.tag').click(function(){
    $('.tag').removeClass('active')
    $(this).addClass('active')
    // $(this).attr('id').replace("sec","section");
    let id =$(this).data('id');
    $('article').hide();
    $('#section'+id).show()
})

</script>