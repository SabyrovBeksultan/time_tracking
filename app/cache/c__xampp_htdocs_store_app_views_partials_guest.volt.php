<h3 class="ml-5">Гость</h3>

<div class="row ml-5 mt-5">
    <h4><?= $todayMonth ?></h4>
</div>

<div class="ml-3">
    <p>Количество дней в месяце: <?= $totalDays ?>. Рабочие: <?= $totalWorkingDays ?> дня</p>
</div>

<div class="m-4">
    <form action method="POST">
        <select name="select_month" id="form-control" onclick="this.form.submit();">
            <option value="1">Январь</option>
            <option value="2">Февраль</option>
            <option value="3">Март</option>
            <option value="4">Апрель</option>
            <option value="5">Май</option>
            <option value="6">Июнь</option>
            <option value="7">Июль</option>
            <option value="8">Август</option>
            <option value="9">Сентябрь</option>
            <option value="10">Октябрь</option>
            <option value="11">Ноябрь</option>
            <option value="12">Декабрь</option>
        </select>
    </form>
</div>

<table class="table table-dark">
    <thead>
        <tr class="showOnlyToday">
            <th scope="col">Дни недели</th>
            <?php foreach ($users as $user) { ?>
            <th scope="col"><?= $user->name ?></th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $data) { ?>
            <?php if ($today == $data['number']) { ?>
                <tr class="showOnlyToday">
            <?php } else { ?>
                <tr>
            <?php } ?>
            
            <?php if ($data['day'] == 0 || $data['day'] == 6 || $data['notWork'] != 0) { ?>
                <th class="rest"><p><?= $data['weekday'] ?></p> <p class="text-numb"><?= $data['number'] ?></p></th>
                <?php } else { ?>
                <th><p><?= $data['weekday'] ?></p> <p class="text-numb"><?= $data['number'] ?></p></th>


                <?php foreach ($data['tracking'] as $start) { ?>
                    <td>
                    <?php foreach ($start['trackingByUser'] as $byUser) { ?>
                         <p><span><?= $byUser->start_time ?></span> <span>-</span>
                        <span><?= $byUser->end_time ?></span></p>
                    <?php } ?>
                    <?php if ($start['totalTimeDay']['hour'] == 0 && $start['totalTimeDay']['minute'] == 0) { ?>
                    <?php } else { ?>
                        <p class="mt-5">Total: <?= $start['totalTimeDay']['hour'] ?>:<?= $start['totalTimeDay']['minute'] ?> </p>
                    <?php } ?>                    
                    <?php if ($start['lessTimeDay']['hour'] > -1) { ?>
                        <p class="mt-5">Less:  <?= $start['lessTimeDay']['hour'] ?>:<?= $start['lessTimeDay']['minute'] ?></p>
                    <?php } ?>
                    </td>
                <?php } ?>

            <?php } ?>
            </tr>
        <?php } ?>
    </tbody>
</table>