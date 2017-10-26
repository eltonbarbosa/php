<form method="POST">
    <fieldset><legend>Nova tarefa</legend>
    <label>Qual minha tarefa?<br><input type="text" name="titulo"/></label><br><br>
    <label>Pronto?<br>
        <input type="checkbox" name="concluida" />
        <?php if ($errosValidacao && isset($errosValidacao["concluida"])):?>
            <?php echo $errosValidacao["concluida"]?>
        <?php endif;?>
    </label><br><br>
    <label>O que devo fazer?<br><textarea name="descricao" cols="40" rows="10"></textarea></label><br><br>
    <input type="submit" value="Adicionar" /></fieldset>
</form>
