<?php
ob_start(); // Начинаем буферизацию вывода

require ('fpdf/fpdf.php');
require_once ("vendor/connect.php");

class PDF extends FPDF
{
    function Header()
    {
        // Select DejaVuSans bold 15
        $this->AddFont('DejaVuSans', '', 'DejaVuSans.php');
        $this->SetFont('DejaVuSans', '', 15);
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(30, 10, iconv('UTF-8', 'CP1251//TRANSLIT', 'Детали заказа'), 0, 1, 'C');
        // Line break
        $this->Ln(10);
    }

    function Footer()
    {
        // Go to 1.5 cm from bottom
        $this->SetY(-15);
        $this->SetFont('DejaVuSans', '', 8);
        // Page number
        $this->Cell(0, 10, iconv('UTF-8', 'CP1251//TRANSLIT', 'Страница ') . $this->PageNo(), 0, 0, 'C');
    }

    function OrderDetails($order_data, $products_data)
    {
        $this->SetFont('DejaVuSans', '', 12);
        // Output order details
        foreach ($order_data as $key => $value) {
            if ($key == "sum") {
                $key = "Сумма заказа";
                $value = $value . " руб.";
            } else if ($key == "date_oformlen")
                $key = "Оформлен";
            else if ($key == "client_name")
                $key = "Имя заказчика";
            else if ($key == "client_phone")
                $key = "Телефон заказчика";
            else if ($key == "client_email")
                $key = "Почта заказчика";
            else if ($key == "adress_name")
                $key = "Адрес получения";
            else if ($key == "adress_store")
            {
                $key = "Способ получения";
                if ($value == 0) {
                    $value = "Курьером на адрес";
                } else
                    $value = "В пункт выдачи заказов";
            }
            $this->Cell(0, 10, iconv('UTF-8', 'CP1251//TRANSLIT', $key . ' - ' . $value), 0, 1);
        }
        // Output products
        $this->Ln(10);
        $this->Cell(0, 10, iconv('UTF-8', 'CP1251//TRANSLIT', 'Список товаров в заказе:'), 0, 1);
        $this->Ln(5);
        foreach ($products_data as $product) {
            $this->Cell(0, 10, iconv('UTF-8', 'CP1251//TRANSLIT', $product['name'] . " (". $product['count'] . " шт.)" . ' - ' . $product['price'] . " руб." ), 0, 1);
        }
    }
}

// Fetch order details from the database
$order_id = $_GET['order_id'];
$sql_order = "SELECT zakaz.sum, zakaz.date_oformlen, client.name as client_name, client.phone as client_phone, client.`e-mail` as client_email, adress.adress_name as adress_name, adress.store as adress_store
        FROM zakaz
        JOIN client ON zakaz.client_id = client.id
        JOIN adress ON zakaz.adress_id = adress.id
        WHERE zakaz.id = ?";
$stmt_order = $con->prepare($sql_order);

if (!$stmt_order) {
    // Output error message if prepare failed
    echo "Prepare failed: (" . $con->errno . ") " . $con->error;
    exit;
}

$stmt_order->bind_param("i", $order_id);
$stmt_order->execute();
$result_order = $stmt_order->get_result();
$order_data = $result_order->fetch_assoc();

// Fetch products in the order from the database
$sql_products = "SELECT product.name, product.price, zakaz_has_product.count
        FROM zakaz_has_product
        JOIN product ON zakaz_has_product.product_id = product.id
        WHERE zakaz_has_product.zakaz_id = ?";
$stmt_products = $con->prepare($sql_products);

if (!$stmt_products) {
    // Output error message if prepare failed
    echo "Prepare failed: (" . $con->errno . ") " . $con->error;
    exit;
}

$stmt_products->bind_param("i", $order_id);
$stmt_products->execute();
$result_products = $stmt_products->get_result();
$products_data = array();
while ($row_product = $result_products->fetch_assoc()) {
    $products_data[] = $row_product;
}

// PDF generation
$pdf = new PDF();
$pdf->AddPage();
$pdf->AddFont('DejaVuSans', '', 'DejaVuSans.php');
$pdf->SetFont('DejaVuSans', '', 12);

$pdf->OrderDetails($order_data, $products_data);

// Clear output buffer and turn off output buffering
ob_end_clean();

$pdf->Output('D', 'order_' . $order_id . '.pdf');

exit; // Завершаем скрипт, чтобы предотвратить дальнейший вывод
?>
