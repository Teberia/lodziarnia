<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Logowanie</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
        }
        .login-card {
            max-width: 420px;
            width: 100%;
        }
    </style>
</head>

<body class="bg-light d-flex align-items-center justify-content-center">

<div class="login-card">

    <!-- ===== panel logowania ===== -->
    <div class="card shadow-sm">
        <div class="card-body p-4">

            <div class="text-center mb-4">
                <h2 class="fw-bold">🍦 Frosty Manager</h2>
                <p class="text-muted mb-0">Zaloguj się do systemu</p>
            </div>


            {if $msgs->isError()}
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        {foreach $msgs->getMessages() as $msg}
                            {if $msg->type == 2}
                                <li>{$msg->text}</li>
                            {/if}
                        {/foreach}
                    </ul>
                </div>
            {/if}

            {if $msgs->isInfo()}
                <div class="alert alert-success">
                    <ul class="mb-0">
                        {foreach $msgs->getMessages() as $msg}
                            {if $msg->type == 0}
                                <li>{$msg->text}</li>
                            {/if}
                        {/foreach}
                    </ul>
                </div>
            {/if}

            <!-- ===== formularz ===== -->
            <form method="post" action="{$conf->action_url}login">

                <div class="mb-3">
                    <label for="login" class="form-label">Login</label>
                    <input id="login"
                           name="login"
                           type="text"
                           class="form-control"
                           placeholder="Wprowadź login"
                           required>
                </div>

                <div class="mb-4">
                    <label for="haslo_hash" class="form-label">Hasło</label>
                    <input id="haslo_hash"
                           name="haslo_hash"
                           type="password"
                           class="form-control"
                           placeholder="Wprowadź hasło"
                           required>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-box-arrow-in-right"></i> Zaloguj
                    </button>

                </div>

            </form>

        </div>
    </div>


    <p class="text-center text-muted mt-3 mb-0 small">
        System zarządzania lodziarnią
    </p>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
