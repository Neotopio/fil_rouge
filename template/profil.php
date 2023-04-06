<?php ob_start(); ?>
<div class="container mt-5">
    <h2 class="mt-5">Votre compte personnel EMP</h2>

    <form action="../controllers/updateClient.php" method="post">
        <div class="row mt-5">
<?php foreach($clients as $client){?>
            <div class="col-lg-6">
                <label for="">Votre prénom</label>
                <input type="text" name="first_name" class="form-control" placeholder="Prénom" value="<?=$client['first_name']?>" >
            </div>
            <div class="col-lg-6">
                <label for="">Votre nom</label>
                <input type="text" name="name" class="form-control" placeholder="Nom" value="<?=$client['name']?>">
            </div>
        </div>
        <div class="row mt-5 ">
            <div class="col-lg-7">
                <label for="">Votre adresse</label>
                <input type="text" class="form-control" name="adress" placeholder="Votre adresse" value="<?=$client['adress']?>">
            </div>
            <div class="col-lg-2">
                <label for="">Votre code postal</label>
                <input type="number" class="form-control" name="cp" placeholder="Votre code postal" value="<?=$client['cp']?>">
            </div>
            <div class="col-lg-3">
                <label for="">Votre ville</label>
                <input type="text" class="form-control" name="city" placeholder="Votre ville" value="<?=$client['city']?>">
            </div>
        </div>
        <input type="hidden" value="<?=$client['id']?>" name="id">
        <div class="row mt-5">
            <label for="">Votre email</label>
            <div class="col-lg-6 "><input class="form-control" type="email" placeholder="E-mail" name="email" value="<?=$client['email']?>"></div>
            <?php }?>
        </div>
        <button type="submit" class="btn btn-primary mt-5 mb-5">Modifier</button>
        
    </form>
    <form action="../model/logout.php" method="get" class="mb-5"> <button class="btn btn-danger" type="submit" onclick="return(confirm('Voulez-vous vous déconnecter ?'));">Se déconnecter</button> </form>
                            
</div>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>