<div>
<head>
    <link href="/css/bootstrap.css" rel="stylesheet">
    <script src="/js/bootstrap.min"></script>
    <title>Controle de estoque</title>
</head>

<body>
    <div class="container">
        <h1>Listagem de produtos</h1>
        <table class="table table-bordered">
            <?php foreach ($produtos as $p): ?>
                <tr>
                    <td><?= $p->nome ?> </td>
                    <td><?= $p->valor ?> </td>
                    <td><?= $p->descricao ?> </td>
                    <td><?= $p->quantidade ?> </td>
                    <td><a href="/produtos/mostra/<?= $p->id ?>"><span class="glyphicon glyphicon-search"></span></a></td>
                </tr>
            <?php endforeach ?>
        </table>
        </body>
    </div>
</html>