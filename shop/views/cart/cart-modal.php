<?php if(!empty($session['cart'])):?>
    <div class="table-responsive">
        <table class="table-hover table-striped">
            <thead>
                <tr>
                    <th>Фото</th>
                    <th>Наименование</th>
                    <th>Количество</th>
                    <th>Цена</th>
                    <th><i class="bi bi-x-circle">х</i></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($session['cart'] as $id=>$item ): ?>
                <tr>
                    <td><?= $item['img'] ?></td>
                    <td><?= $item['name'] ?></td>
                    <td><?= $item['qty'] ?></td>
                    <td><?= $item['price'] ?></td>
                    <td><i class="bi bi-x-circle text-danger del-item" //role="button">х</i></span></td>
                    </tr>
            <?php endforeach  ?>  
                    <tr>
                        <td colspan="4">Итого:</td>
                        <td><?= $session['cart.qty'] ?></td>
                      </tr>
                      <tr>
                        <td colspan="4">На сумму:</td>
                        <td><?= $session['cart.sum'] ?></td>
                      </tr>
            </tbody>
        </table>
    </div>
    <?php  else:  ?>
    <h3>корзина пуста</h3>
    <?php endif;  ?>