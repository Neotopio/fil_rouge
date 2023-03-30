<?php ob_start(); ?>
<div class="container font-flou mb-5">
    <h1 class="title gauche">Contact</h1>
    <div class="row yellow gauche">
        <div class="col-lg-6">
            <form action="../controllers/contactMail.php" method="post">

                <div>
                    <label for="exampleFormControlInput1" class="form-label">Nom</label>
                    <input type="text" class="form-control button" placeholder="" aria-label="Last name" name="last_name">
                </div>
                <div>
                    <label for="exampleFormControlInput1" class="form-label">Prénom</label>
                    <input type="text" class="form-control button" placeholder="" aria-label="First name" name="first_name">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Téléphone</label>
                    <input type="number" class="form-control button" name="tel">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Adresse Email</label>
                    <input type="email" class="form-control button"  placeholder="name@example.com" name="mail">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                    <textarea class="form-control button"  rows="8" name="text"></textarea>
                </div>
                <button class="btn btn-outline-dark button" type="submit">Envoyer</button>
            </form>
        </div>
        <div class="col">
            <div class="ratio ratio-1x1"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10786585.24587791!2d-2.8236237803990396!3d48.69700044001338!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6122250553903%3A0x8567fc630ab616b7!2sEmp!5e0!3m2!1sfr!2sfr!4v1680165195672!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> </div>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>