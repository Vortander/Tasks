<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Tarefas</title>
        <link rel="stylesheet" type="text/css" href="style.css">
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
                        <td class="checkbox">
                            <input type="checkbox" name="selectDone" value="unchecked" />
                        </td>
                        <td id="data1" data-id="algum conteudo" contenteditable="true" class="editdata">
                            New Task
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    <script src="TaskList.js"></script>
    </body>
</html>


<?php print( __DIR__ ); ?>
<?php print_r( $list ); ?>
<?php foreach($list as $n):?>
    <p><?= $n['task_content'] ?></p>
<?php endforeach;?>
