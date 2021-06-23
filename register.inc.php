<div class="tab-pane fade show active" id="register" role="tabpanel" aria-labelledby="register-tab">
    <form action="" method="POST">
        <div class="mb-3">
            <label for="civility">Vous êtes :</label>
            <?php
            foreach ($civilityList as $value => $text) { ?>
                <label class="form-label" for="<?= $value ?>"><?= $text ?></label>
                <input type="radio" <?= (isset($civility) && $civility == $value) ? 'checked' : ''; ?> value="<?= $value ?>" name="civility" />
            <?php } ?>
            <p small class="badge bg-danger"><?= (isset($formErrors['civility'])) ? $formErrors['civility'] : ''; ?></p>
        </div>
        <div class="mb-3">
            <label for="genre">Je cherche :</label>
            <?php
            foreach ($civilityList as $value => $text) { ?>
                <label class="form-label" for="<?= $value ?>"><?= $text ?></label>
                <input type="radio" <?= (isset($_SESSION['genre']) && $_SESSION['genre'] == $value) ? 'checked' : ''; ?> value="<?= $value ?>" name="genre" />
            <?php } ?>
            <p small class="badge bg-danger"><?= (isset($formErrors['genre'])) ? $formErrors['genre'] : ''; ?></p>
        </div>
        <div class="mb-3">
            <label for="pseudo" class="form-label">Nom d'utilisateur : </label>
            <input type="text" class="form-control <?= !isset($_POST['register']) ? null : (isset($formErrors['pseudo']) ? 'is-invalid' : 'is-valid') ?>" id="pseudo" name="pseudo" value="<?= !isset($_SESSION['pseudo']) ? null : $_SESSION['pseudo'] ?>" />
            <?php if (isset($formErrors['pseudo'])) { ?>
                <p><small class="badge bg-danger"><?= $formErrors['pseudo'] ?></small></p>
            <?php } ?>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Adresse mail : </label>
            <input type="email" class="form-control <?= !isset($_POST['register']) ? null : (isset($formErrorList['email']) ? 'is-invalid' : 'is-valid') ?>" id="email" name="email" value="<?= !isset($email) ? null : $email ?>" />
            <?php if (isset($formErrors['email'])) { ?>
                <p><small class="badge bg-danger"><?= $formErrors['email'] ?></small></p>
            <?php } ?>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe: </label>
            <input type="password" class="form-control <?= !isset($_POST['register']) ? null : (isset($formErrors['password']) ? 'is-invalid' : 'is-valid') ?>" id="password" name="password" value="<?= !isset($password) ? null : $password ?>" />
            <?php if (isset($formErrors['password'])) { ?>
                <p><small class="badge bg-danger"><?= $formErrors['password'] ?></small></p>
            <?php } ?>
        </div>
        <div class="mb-3">
            <label for="dob" class="form-label">Date de naissance : </label>
            <input type="date" class="form-control <?= !isset($_POST['register']) ? null : (isset($formErrors['dob']) ? 'is-invalid' : 'is-valid') ?>" id="dob" name="dob" value="<?= !isset($dob) ? null : $dob ?>" />
            <?php if (isset($formErrors['dob'])) { ?>
                <p><small class="badge bg-danger"><?= $formErrors['dob'] ?></small></p>
            <?php } ?>
        </div>
        <div class="mb-3">
            <label for="city" class="form-label">Ville : </label>
            <input type="text" class="form-control <?= !isset($_POST['register']) ? null : (isset($formErrors['city']) ? 'is-invalid' : 'is-valid') ?>" id="city" name="city" value="<?= !isset($city) ? null : $city ?>" />
            <?php if (isset($formErrors['city'])) { ?>
                <p><small class="badge bg-danger"><?= $formErrors['city'] ?></small></p>
            <?php } ?>
        </div>
        <div class="mb-3">
            <button class="btn btn-secondary" type="submit" name="register">S'enregistrer</button>
        </div>
    </form>
</div>