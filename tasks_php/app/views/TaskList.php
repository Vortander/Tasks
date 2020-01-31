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
                    <tr>
                        <?php foreach($list as $n):?>
                            <td class="checkbox">
                                <input type="checkbox" name="selectDone" value="unchecked" />
                            </td>
                            <td id="<?= $n[id] ?>" data-id="algum conteudo" contenteditable="true" class="editdata">
                                <p><?= $n['task_content'] ?></p>
                            </td>
                        <?php endforeach;?>
                    </tr>
                    <tr>
                        <td class="checkbox">
                            <input type="checkbox" name="selectDone" value="unchecked" />
                        </td>
                        <td id="data1" data-id="algum conteudo" contenteditable="true" class="editdata">
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
