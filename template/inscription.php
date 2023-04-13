<?php ob_start(); ?>
<?php if (isset($_SESSION['echec_message'])) {
    echo "<div class='alert alert-warning'>" . $_SESSION['echec_message'] . "</div>";
    unset($_SESSION['echec_message']);}?>


<div class="container mt-5">
    <h2 class="mt-5">Créer votre compte personnel EMP</h2>

    <form action="../controllers/createClient.php" method="post" >
        <div class="row mt-5">
            <div class="col-lg-6">
                <input type="text" name="first_name" class="form-control" placeholder="Prénom">
            </div>
            <div class="col-lg-6">
                <input type="text" name="name" class="form-control" placeholder="Nom">
            </div>
        </div>
        <div class="row mt-5 ">
            <div class="col-lg-7">
                <input type="text" class="form-control" name="adress" placeholder="Votre adresse">
            </div>
            <div class="col-lg-2">
                <input type="number" class="form-control" name="cp" placeholder="Votre code postal">
            </div>
            <div class="col-lg-3">
                <input type="text" class="form-control" name="city" placeholder="Votre ville">
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-6 "><input class="form-control" type="email" placeholder="E-mail" name="email"></div>
            <div class="col-lg-3"><input class="form-control" type="password" name="password" placeholder="Votre mot de passe" id="pswd1"></div>
            <div class="col-lg-3"><input class="form-control" type="password" name="passwordVerify" placeholder="Conformé votre mot de passe" id="pswd2"></div>
        </div>
        <button type="submit"  class="btn btn-primary mt-5 mb-5">Enregistrer</button>
    </form>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>