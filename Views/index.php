<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Projetos</h2>

    <div class = "panel panel-default">

    <div class = "panel-heading text-right">
    <div class = "pull-right"><a class = "btn btn-primary" href = '?classe = Projeto&acao = create'>Novo</a></div>
    </div>
    <br>

    <div class = "panel-body"></div>
    <table id = "tabela" class = "table table-striped table-bordered table-hover" style = "width : 100%">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Duração</th>
            <th width = "280px">Ações</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach($projetos as $projeto) {?>
            <tr>
                <td><?=$projeto->nome?></td>
                <td><?=$projeto->duracao_dmy?></td>
                <td>
                    <a class = 'btn btn-primary' href='?classe=projeto&acao=read&id=<?=$projeto->id?>'>Ver</a>
                    <button>Excluir</button>
                </td>
            </tr>
        <?php } ?>
    </tbody>

    </table>
    </div>
    </div>
</body>
</html>