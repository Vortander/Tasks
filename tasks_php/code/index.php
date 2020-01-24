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
                <?php
                    echo "Tarefas";
                ?>
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
                            Nova Tarefa
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    <script src="index.js"></script>
    </body>
</html>
