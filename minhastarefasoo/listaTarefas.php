<table>
    <tr>
        <th>MInhas Tarefas</th>
    </tr>
    <?php foreach ($tarefas as $tarefa): ?>
        <tr>
            <td><?php echo $tarefa->getTitulo()?></td>
            <td><?php echo $tarefa->getDescricao()?></td>
            <td><?php echo ($tarefa->getConcluida() ? "sim" : "não") ?></td>
        </tr>
    <?php endforeach;?>
</table>