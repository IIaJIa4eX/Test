<h1>basket_redact</h1>

<style>
    .basket_table {
        width: 100%;
    }
</style>

<script>
    function updateform(element) {
        var el = $(element);
        var data = el.parent().serialize();
        
        // el.parent().submit();

        $.post("/good_basket/updateCount", data, function (d) {
            // alert(d);
            $("#summa").html(d);
        });
    }
</script>

<div>
    <table class="basket_table">
        <tr>
            <th>номер</th>
            <th>Наименование товара</th>
            <th>Количество</th>
            <th>Цена</th>
            <th>Действия</th>
        </tr>
        
        <?php foreach($MODEL["goods_basket"] as $value): ?>
        <tr>
            <td><?= $value["id"] ?></td>
            <td><?= $value["name"] ?></td>
            <td>
                <form method="POST" action="/good_basket/updateCount">
                    <input type="number" name="countUpdate" value="<?= $value["count"] ?>"  onchange="updateform(this)"  />                
                    <input type="hidden" name="id" value="<?= $value["id"] ?>" />
                    <!-- <input type="hidden" name="countUpdate" value="<?= $value["count"] ?>"/> -->
                </form>
            
            </td>
            <td><?= $value["prise"] ?></td>
            
            <td>
                <form method="POST" action="/good_basket/deleteGoodBasket">
                    <input type="hidden" name="id" value="<?= $value["id"] ?>" />
                    <input type="submit" value="Удалить" />
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
        <tr>
         <th>  </th> 
         <th>  </th> 
        <th> Сумма заказа: </th> 
        <td id="summa"> <?= $MODEL["countOrder"] ?> </td>
        
        </tr>
        <tr>
                <th>  </th> 
                <th>  </th> 
                <th> </th> 
                <td 
                    <form method="GET" action="/good_basket/order">
                       <input type="submit" value="Оформить заказ" />
                    </form>
                </td>
               
               </tr>
        
    </table>
</div>