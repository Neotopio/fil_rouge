<?php ob_start(); ?>

<div class="container">
    <h1>Modification couleurs</h1>


    <form action="controllers/updateColors.php" method="POST" class="row my-5">
        <div class="mb-3">
            <label for="nom" class="form-label">Couleurs</label>
            <input type="text" class="form-control" name="nom" value="<?php echo $nomTitre; ?> ">

        </div>
        <div class="mb-3">
            <label for="enable" class="form-label">Active</label>
            <select name="enable" id="">
                <option value="1">Oui</option>
                <option value="0">Non</option>
            </select>
           
        </div>

       <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
        <div class="mb-3 col-3">
            <button type="submit" class="btn btn-primary" name="submit">Valider</button>
        </div>
    </form>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>