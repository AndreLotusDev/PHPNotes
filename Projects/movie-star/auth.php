<?php
require_once("templates/header.php");
?>

<div id="main-container" class="container-fluid">
    <div class="col-md-12">
        <div class="row" id="auth-row">
            <div class="col-md-4" id="login-container">
                <h2>Entrar</h2>
                <form action="" method="POST">
                    <input type="hidden" name="type" value="login">

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input id="email" name="email" class="form-control" type="email" placeholder="Digite seu email">
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="password">Senha:</label>
                        <input id="password" name="password" class="form-control" type="password"
                            placeholder="Digite sua senha">
                    </div>

                    <input type="submit" value="Entrar" class="btn card-btn">
                </form>
            </div>

            <div class="col-md-4" id="register-container">
                <h2>Cadastrar</h2>
                <form action="<?= $BASE_URL ?>auth_process.php" method="POST">
                    <input type="hidden" name="type" value="register">

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input id="email" name="email" class="form-control" type="email" placeholder="Digite seu email">
                    </div>

                    <!-- Name -->
                    <div class="form-group">
                        <label for="name">Nome:</label>
                        <input id="name" name="name" class="form-control" type="text"
                            placeholder="Digite seu nome">
                    </div>

                    <!-- Last Name -->
                    <div class="form-group">
                        <label for="last_name">Sobrenome:</label>
                        <input id="last_name" name="last_name" class="form-control" type="text"
                            placeholder="Digite seu sobrenome">
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="password">Senha:</label>
                        <input id="password" name="password" class="form-control" type="password"
                            placeholder="Digite sua senha">
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-group">
                        <label for="confirm_password">Confirmar Senha:</label>
                        <input id="confirm_password" name="confirm_password" class="form-control" type="password"
                            placeholder="Confirme sua senha">
                    </div>

                    <input type="submit" value="Registrar" class="btn card-btn">
                </form>
            </div>
        </div>
    </div>
</div>

<?php
require_once("templates/footer.php");
?>