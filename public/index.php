<?php

ob_start();
?>

<div class="text-center py-5">

    <h1 class="page-title">
        Bem-vindo ao Sistema Financeiro
    </h1>

    <p class="page-subtitle">
        Controle suas movimentações de forma simples e organizada.
    </p>

</div>

<?php

$content = ob_get_clean();

require __DIR__ . '/layout.php';
?>