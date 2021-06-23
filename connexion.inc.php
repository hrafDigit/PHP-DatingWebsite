<div class="tab-pane fade" id="login" role="tabpanel" aria-labelledby="login-tab">
    <form action="" method="POST">
        <div class="mb-3">
            <label for="pseudo" class="form-label">Nom d'utilisateur : </label>
            <input type="text" class="form-control <?= !isset($_POST['login']) ? null : (isset($formErrors['pseudo']) ? 'is-invalid' : 'is-valid') ?>" id="pseudo" name="pseudo" value="<?= !isset($pseudo) ? null : $pseudo ?>" />
            <?php if (isset($formErrors['pseudo'])) { ?>
                <p><small class="badge bg-danger"><?= $formErrors['pseudo'] ?></small></p>
            <?php } ?>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe: </label>
            <input type="password" class="form-control <?= !isset($_POST['login']) ? null : (isset($formErrors['password']) ? 'is-invalid' : 'is-valid') ?>" id="password" name="password" value="<?= !isset($password) ? null : $password ?>" />
            <?php if (isset($formErrors['password'])) { ?>
                <p><small class="badge bg-danger"><?= $formErrors['password'] ?></small></p>
            <?php } ?>
        </div>
        <div class="mb-3">
            <button class="btn btn-secondary" type="submit" name="login">Se connecter</button>
        </div>
    </form>
</div>