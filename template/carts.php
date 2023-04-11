<?php ob_start();
if (isset($_SESSION['success_message'])) {
    echo "<div class='alert alert-success'>" . $_SESSION['success_message'] . "</div>";
    unset($_SESSION['success_message']);
} elseif (isset($_SESSION['echec_message'])) {
    echo "<div class='alert alert-warning'>" . $_SESSION['echec_message'] . "</div>";
    unset($_SESSION['echec_message']);
}
?>
<div class="container mb-5">
    <h2>Panier</h2>
    <div class="">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Produit</th>
                    <th scope="col">Taille</th>
                    <th scope="col">Couleur</th>
                    <th scope="col">Prix unitaire</th>
                    <th scope="col">Total</th>
                    <th scope="col">Quantité</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($carts as $cart)  {?>
                    <tr data-id="<?= $cart['id_product']; ?>">
                        <td><?= $cart['name']; ?></td>
                        <td><?= $cart['size']; ?></td>
                        <td><?= $cart['color']; ?></td>
                        <td class="price"><?= $cart['price'] . ' €'; ?></td>
                        <td class="product-total-price"><?= $cart['price'] * $cart['quantity']; ?>€</td>
                        <td>
                            <button class="btn btn-sm btn-secondary minus-btn">-</button>
                            <span class="quantity"><?= $cart['quantity']; ?></span>
                            <button class="btn btn-sm btn-secondary plus-btn">+</button>
                         </td>  
                         <td> <form action="../model/deleteProductCart.php" method="get"><input type="hidden" name='id_carts' value="<?php echo $cart['id_carts']; ?>"><button class="btn btn-sm btn-danger plus-btn" type="submit"><i class="bi bi-trash3"></i></button></form>
                        </td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="4" class="text-right">Total</td>
                    <td id="total"> <?= $resultat; ?> €</td>
                </tr>
            </tbody>
        </table>
        <a href="../controllers/createOrders.php">
            <button type="submit" class="btn btn-primary">Valider le devis</button>
        </a>
    </div>
</div>
<script>
    function updateCartTotal(cartTotal) {

        var totalElement = document.getElementById("total");
        totalElement.innerText = cartTotal + ' €';
    }

    function updateProductTotalPrice(row) {
        var priceElement = row.querySelector(".price");
        var quantityElement = row.querySelector(".quantity");
        var totalElement = row.querySelector(".product-total-price");
        var price = parseFloat(priceElement.innerText);
        var quantity = parseInt(quantityElement.innerText);
        var total = price * quantity;
        totalElement.innerText = total + " €";
    }

    function updateQuantity(productId, quantity) {
        $.ajax({
            url: "updateQuantity.php",
            method: "POST",
            data: {
                productId: productId,
                quantity: quantity
            },
            dataType: "json",
            success: function(response) {
                updateCartTotal(response.cartTotal);
                var rows = document.querySelectorAll("tbody tr");
                rows.forEach(function(row) {
                    if (row.dataset.id == productId) {
                        updateProductTotalPrice(row);
                    }
                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log("Erreur AJAX : " + textStatus + " - " + errorThrown);
            }
        });
        updateCartCount();
    }

    $(".minus-btn").click(function() {
        var quantityElement = $(this).siblings(".quantity");
        var quantity = parseInt(quantityElement.text()) - 1;
        if (quantity < 1) {
            quantity = 1;
        }
        quantityElement.text(quantity);

        var productId = $(this).closest("tr").data("id");
        updateQuantity(productId, quantity);
    });

    $(".plus-btn").click(function() {
        var quantityElement = $(this).siblings(".quantity");
        var quantity = parseInt(quantityElement.text()) + 1;
        quantityElement.text(quantity);

        var productId = $(this).closest("tr").data("id");
        updateQuantity(productId, quantity);
    });
</script>
<?php $content = ob_get_clean(); ?>
<?php require('layout.php') ?>