<?php

    echo $this->tag->linkTo(["signup", "Sign Up Here!", 'class' => 'btn btn-primary']);

    if ($users->count() > 0) {
    ?>
    <table class="table table-bordered table-hover">
        <thead class="thead-light">
        <tr>
            <th scope="col">Days</th>
            {%for user in users%}
            <th scope="col">{{user.name}}</th>
            {%endfor%}
        </tr>

        </thead>
        <tbody>

        <tr>
            <td colspan="3">Количество пользователей: <?php echo $users->count(); ?></td>
        </tr>
        </tbody>
    </table>
    <?php
}
    echo $this->getContent(); ?>