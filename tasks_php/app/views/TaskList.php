<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Tarefas</title>
        <link rel="stylesheet" type="text/css" href="/assets/style.css" >
    </head>
    <body>

        <div class="header">
            <p>
                Tasks
            </p>
        </div>

        <div class="content">
            <table>
                <!-- <thead>
                    <tr>
                        <th>Concluído</th>
                        <th>Tarefa</th>
                    </tr>
                </thead> -->
                <tbody>
                    <?php foreach($list as $n):?>
                        <tr>
                            <td class="checkbox">
                                <input type="checkbox" data-id="<?= $n['id'] ?>" name="select_done" <?php if ( $n['done'] === "t" ) echo 'checked' ?> />
                            </td>
                            <td id="<?= $n['id'] ?>" data-id="<?= $n['id'] ?>" data-done="<?= $n['done'] ?>" contenteditable="true" class="editdata">
                                <?= $n['task_content'] ?>
                            </td>
                        </tr>
                    <?php endforeach;?>
                    <tr>
                        <td class="checkbox">
                            <input type="checkbox" name="select_done" />
                        </td>
                        <td id="-1" data-id="-1" contenteditable="true" class="editdata">
                            Click here to create a new task...
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    <script src="/assets/TaskList.js"></script>
    </body>
</html>

<!-- <?php print_r( $list ); ?>
<?php foreach($list as $n):?>
    <p><?= $n['task_content'] ?></p>
<?php endforeach;?> -->
