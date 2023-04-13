<?php ob_start();
if (isset($_SESSION['sucess'])) {
    echo "<div class='alert alert-success'>" . $_SESSION['sucess'] . "</div>";
    unset($_SESSION['sucess']);
}
?>
<div class="container mt-5">
    <div class="row mb-5 mt-5">
        <div class="col border mt-5">
            <form action="../model/validateUsers.php" method="post">
                <div class="row mt-5 ">
                    <h2><i class="bi bi-person">Se connecter</i></h2>
                    <div class="col-lg-8 mt-5"><input class="form-control" type="email" placeholder="Votre adresse-mail" name="email"></div>
                    <div class="col-lg-4 mt-5"><input class="form-control" type="password" placeholder="Votre mot de passe" name="password"></div>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-6"><button type="submit" class="btn btn-success">Se connecter</button></div>
                </div>
            </form>
        </div>
        <div class="col border mt-5">
            <div class="row mt-5">
                <h2>Nouveau client chez EMP ?</h2>
                <a class="text-white " href="index.php?action=createAccount">
                    <div class="col-lg-4 mt-5 bg-black ">Créer un compte
                </a>
            </div>
            <div class="col-lg-8 mt-5"></div>
        </div>
        <div class="row mt-5 d-flex">
            Les avantages d'un compte EMP
            <i class="bi bi-check-lg"> Suivez l'état de votre commande </i>
            <i class="bi bi-check-lg"> Partagez votre Liste de souhaits</i>
            <i class="bi bi-check-lg"> Notez & Commentez vos produits préférés</i>
        </div>
    </div>
</div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('layout.php') ?>