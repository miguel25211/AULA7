<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastrar Movimentação</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(135deg, #0f172a, #1e293b);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 520px;
        }

        .card {
            background: #ffffff;
            border-radius: 18px;
            padding: 35px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.25);
        }

        .cabecalho {
            text-align: center;
            margin-bottom: 30px;
        }

        .icone {
            width: 65px;
            height: 65px;
            margin: 0 auto 15px;
            border-radius: 50%;
            background: #2563eb;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
        }

        h1 {
            color: #0f172a;
            font-size: 28px;
            margin-bottom: 8px;
        }

        .subtitulo {
            color: #64748b;
            font-size: 14px;
        }

        .campo {
            margin-bottom: 20px;
        }

        label {
            display: block;
            color: #334155;
            font-weight: bold;
            margin-bottom: 8px;
            font-size: 14px;
        }

        input,
        select {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            font-size: 15px;
            outline: none;
            background: #f8fafc;
        }

        input:focus,
        select:focus {
            border-color: #2563eb;
            background: #ffffff;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12);
        }

        .botoes {
            display: flex;
            gap: 12px;
            margin-top: 28px;
        }

        .botao {
            flex: 1;
            padding: 14px;
            border: none;
            border-radius: 10px;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
        }

        .voltar {
            background: #e2e8f0;
            color: #334155;
        }

        .cadastrar {
            background: #2563eb;
            color: white;
        }

        .obrigatorio {
            color: #ef4444;
        }

        @media (max-width: 500px) {
            .card {
                padding: 25px 20px;
            }

            .botoes {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="card">

            <div class="cabecalho">

                <div class="icone">
                    💰
                </div>

                <h1>Nova Movimentação</h1>

                <p class="subtitulo">
                    Cadastre uma nova entrada ou saída
                </p>

            </div>

            <form action="movimentacao-cadastrar.php" method="POST">

                <div class="campo">

                    <label for="descricao">
                        Descrição <span class="obrigatorio">*</span>
                    </label>

                    <input
                        type="text"
                        id="descricao"
                        name="descricao"
                        placeholder="Ex: Compra de materiais"
                        required>

                </div>

                <div class="campo">

                    <label for="valor">
                        Valor <span class="obrigatorio">*</span>
                    </label>

                    <input
                        type="number"
                        id="valor"
                        name="valor"
                        placeholder="0.00"
                        step="0.01"
                        min="0.01"
                        required>

                </div>

                <div class="campo">

                    <label for="tipo">
                        Tipo <span class="obrigatorio">*</span>
                    </label>

                    <select id="tipo" name="tipo" required>

                        <option value="">
                            Selecione uma opção
                        </option>

                        <option value="entrada">
                            Entrada
                        </option>

                        <option value="saida">
                            Saída
                        </option>

                    </select>

                </div>

                <div class="campo">

                    <label for="data">
                        Data <span class="obrigatorio">*</span>
                    </label>

                    <input
                        type="date"
                        id="data"
                        name="data"
                        required>

                </div>

                <div class="botoes">

                    <a
                        href="movimentacao-list.php"
                        class="botao voltar">
                        Voltar
                    </a>

                    <button
                        type="submit"
                        class="botao cadastrar">
                        Cadastrar
                    </button>

                </div>

            </form>

        </div>

    </div>

</body>

</html>