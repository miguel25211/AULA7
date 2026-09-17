<?php

ob_start();
?>

<div class="mb-4">
    <h3 class="page-title mb-1">Nova movimentação</h3>
    <p class="page-subtitle mb-0">
        Cadastre uma entrada ou saída financeira.
    </p>
</div>

<div class="card">
    <div class="card-body p-4">

        <form action="movimentacao-create.php" method="POST">

            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label">Pessoa</label>

                    <select name="pessoa_id" class="form-select" required>
                        <option value="">Selecione...</option>

                        <?php foreach ($pessoas as $pessoa): ?>
                            <option value="<?= $pessoa['id'] ?>">
                                <?= htmlspecialchars($pessoa['nome']) ?>
                            </option>
                        <?php endforeach; ?>

                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Data</label>

                    <input
                        type="date"
                        name="data"
                        class="form-control"
                        value="<?= date('Y-m-d') ?>"
                        required>
                </div>

                <div class="col-md-8">
                    <label class="form-label">Descrição</label>

                    <input
                        type="text"
                        name="descricao"
                        class="form-control"
                        placeholder="Ex.: Salário mensal"
                        required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Tipo</label>

                    <select name="tipo" class="form-select" required>
                        <option value="">Selecione...</option>
                        <option value="entrada">Entrada</option>
                        <option value="saida">Saída</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Valor</label>

                    <div class="input-group">
                        <span class="input-group-text">R$</span>

                        <input
                            type="number"
                            name="valor"
                            class="form-control"
                            step="0.01"
                            min="0"
                            placeholder="0,00"
                            required>
                    </div>
                </div>

            </div>

            <div class="d-flex justify-content-end gap-2 mt-4">

                <a
                    href="movimentacao-list.php"
                    class="btn btn-light">
                    Cancelar
                </a>

                <button
                    type="submit"
                    class="btn btn-primary">
                    <i class="bi bi-check-lg me-1"></i>
                    Salvar
                </button>

            </div>

        </form>

    </div>
</div>

<?php

$content = ob_get_clean();

include 'layout.php';
