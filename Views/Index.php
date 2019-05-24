<div id="container">

    <table id="filter-table">
        <tr>
            <th>Имя</th>
            <th>E-mail</th>
            <th>Задача</th>
            <th>Выполнение</th>
            <th>Редактирование</th>
        </tr>
        <tr class='table-filters'>
            <td>
                <input type="text"/>
            </td>
            <td>
                <input type="text"/>
            </td>
            <td>
                <input type="text"/>
            </td>
            <td></td>
            <td></td>
        </tr>

            <?php
            foreach(@$this->item as $items){ ?>
        <tr class='table-data'>
            <?php if(Session::get('loggedIn')== 1) { ?>
            <form action="<?php echo PATH?>Index/edit" method="post" >
                <td><input class="edit" type="text" name="username" value="<?php echo $items['username']; ?>"></td>
                <td><input class="edit" type="text" name="email" value="<?php echo $items['email']; ?>" ></td>
                <td><input class="edit" type="text" name="task" value="<?php echo $items['task']; ?>" >
                    <input type="hidden" name="id" value="<?php echo $items['id']; ?>" ></td>
                <td><input type="checkbox" name="status" value="checked" <?php echo $items['status']; ?>></td>
                <td> <input type="submit" value="Сохранить"></td>
            </form>
                <?php } else { ?>

                    <td><?php echo $items['username']; ?></td>
                    <td><?php echo $items['email']; ?></td>
                    <td><?php echo $items['task']; ?></td>
    <td><input type="checkbox" name="status" value="checked" <?php echo $items['status']; ?> disabled></td>
    <td></td>

                  <?php }  ?>
        </tr>
           <?php }  ?>
    </table>


    <ul class="pagination">
<?php
$i=0;
$ii=3;
while($i <= $this->pagination):  ?>

    <li><a href="<?php echo PATH.'Index/index/'.$ii ?>"><?php echo $i+1 ?></a></li>

 <?php  $ii=$ii+3; $i++;
endwhile;  ?>


    </ul>
    <div id="help"><a href="javascript:collapsElement('text')" title="" rel="nofollow">Справка</a>
        <div id="text" style="display: none">
            <p>Текстовые поля редактируются при правах админа (нужно кликнуть на текст), также появляется кнопка "сохранить" (изменения) в столбце "Редактирование" </p>
        </div>
    </div>
</div>








