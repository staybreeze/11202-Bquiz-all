<h2 class="ct">新增動主選單</h2>
<hr>
<form action="./api/add.php" method="post" enctype="multipart/form-data">

    <div class="ct">
        主選單名稱:
        <input type="text" name="text" id="">
    </div>
    
    <div class="ct">
        選單連結網址:
        <input type="text" name="href" id="">
    </div>
    <div class="ct">
      
            <input type="hidden" name="table" value="<?=$_GET['table'];?>">
            <input type="submit" value="新增">
            <input type="reset" value="重置">
      
    </div>
</form>