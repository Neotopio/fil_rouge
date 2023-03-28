<?php



function sendMail($carts, $resultat)
{

    $to = $_SESSION['email'];


    $subject = 'Devis';
    $table_style = '
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        
    </style>
    ';

    $message = '<div class="container mb-5">';
    $message .= '<h2>Devis</h2>';
    $message .= '<div class="table-responsive">';
    $message .= $table_style;
    $message .= '<table class="table">';
    $message .= '<thead>';
    $message .= '<tr>';
    $message .= '<th scope="col">Produit</th>';
    $message .= '<th scope="col">Taille</th>';
    $message .= '<th scope="col">Couleur</th>';
    $message .= '<th scope="col">Prix unitaire</th>';
    $message .= '<th scope="col">Quantité</th>';
    $message .= '<th scope="col">Total</th>';
    $message .= '</tr>';
    $message .= '</thead>';
    $message .= '<tbody>';
    foreach ($carts as $cart) {
        $message .= '<tr data-id="' . $cart['id_product'] . '">';
        $message .= '<td>' . $cart['name'] . '</td>';
        $message .= '<td>' . $cart['size'] . '</td>';
        $message .= '<td>' . $cart['color'] . '</td>';
        $message .= '<td class="price">' . $cart['price'] . ' €</td>';
        $message .= '<td>';
        $message .= '<span class="quantity">' . $cart['quantity'] . '</span>';
        $message .= '</td>';
        $message .= '<td class="product-total-price">' . ($cart['price'] * $cart['quantity']) . '€</td>';
        $message .= '</tr>';
    }
    $message .= '<tr>';
    $message .= '<td colspan="5" class="text-right">Total</td>';
    $message .= '<td id="total">' . $resultat . ' €</td>';
    $message .= '</tr>';
    $message .= '</tbody>';
    $message .= '</table>';
    $message .= '</div>';
    $message .= '</div>';


    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";


    mail($to, $subject, $message, $headers);
}
