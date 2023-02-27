
<?php

// Product Total er Buying price ->----//
foreach ($db->select('SELECT SUM(product_total) 
FROM tbl_product') as $row) {

    $product_total = $row['SUM(product_total)'];
}
// Sales Total er Selling price -> ----//
foreach ($db->select('SELECT SUM(sales_total) 
FROM tbl_sales') as $row) {

    $sales_total = $row['SUM(sales_total)'];
}

// Staff er  Sate Transaction  ------->//
foreach ($db->select('SELECT SUM(trans_amount) 
FROM tbl_staff_trans') as $row) {

    $trans_amount = $row['SUM(trans_amount)'];
}
// Dukan er Extra Koroch  ------->//
foreach ($db->select('SELECT SUM(ex_amount) 
FROM tbl_expence') as $row) {

    $ex_amount = $row['SUM(ex_amount)'];
}


// Dukan Baki   ------->//
foreach ($db->select('SELECT SUM(sales_due) 
FROM tbl_sales') as $row) {

    $sales_due = $row['SUM(sales_due)'];
}
// Dukan er Lav  ------->//


foreach ($db->select('SELECT SUM(sales_profit) 
FROM tbl_sales') as $row) {

    $sales_profit = $row['SUM(sales_profit)'];
}
// lost capital 
foreach ($db->select('SELECT SUM(cap_loss) 
FROM tbl_net_capital') as $row) {

    $cap_loss = $row['SUM(cap_loss)'];
}

foreach ($db->select('SELECT SUM(amount) 
FROM tbl_p_withdraw') as $row) {

    $w_amount = $row['SUM(amount)'];
}

$profit = $sales_profit - ($ex_amount + $trans_amount + $w_amount);
// date wise seasrch ------->//

// Muldon Hisab  ------->//
$sales_buying_price = $sales_total - $sales_profit;
$capital = ($product_total + $sales_buying_price) - $cap_loss;


foreach ($db->select('SELECT SUM(sales_total) FROM tbl_sales WHERE DATE(sales_date) = DATE(NOW()) ORDER BY sales_id DESC') as $row) {
    $t_sale = $row['SUM(sales_total)'];
}
foreach ($db->select('SELECT SUM(sales_due) FROM tbl_sales WHERE DATE(sales_date) = DATE(NOW()) ORDER BY sales_id DESC') as $row) {
    $t_due = $row['SUM(sales_due)'];
}
foreach ($db->select('SELECT SUM(ex_amount) FROM tbl_expence WHERE DATE(date) = DATE(NOW()) ORDER BY ex_id DESC') as $row) {
    $t_exp = $row['SUM(ex_amount)'];
}
foreach ($db->select('SELECT SUM(sales_profit) FROM tbl_sales WHERE DATE(sales_date) = DATE(NOW()) ORDER BY sales_id DESC') as $row) {
    $t_profit = ($row['SUM(sales_profit)']) - $t_exp;
}

foreach ($db->select('SELECT SUM(sales_total) FROM tbl_sales WHERE WEEKOFYEAR(sales_date)=WEEKOFYEAR(NOW()) ORDER BY sales_id DESC') as $row) {
    $w_sale = $row['SUM(sales_total)'];
}
foreach ($db->select('SELECT SUM(sales_due) FROM tbl_sales WHERE WEEKOFYEAR(sales_date)=WEEKOFYEAR(NOW()) ORDER BY sales_id DESC') as $row) {
    $w_due = $row['SUM(sales_due)'];
}
foreach ($db->select('SELECT SUM(ex_amount) FROM tbl_expence WHERE WEEKOFYEAR(date)=WEEKOFYEAR(NOW()) ORDER BY ex_id DESC') as $row) {
    $w_exp = $row['SUM(ex_amount)'];
}
foreach ($db->select('SELECT SUM(sales_profit) FROM tbl_sales WHERE WEEKOFYEAR(sales_date)=WEEKOFYEAR(NOW()) ORDER BY sales_id DESC') as $row) {
    $w_profit = ($row['SUM(sales_profit)']) - $w_exp;
}

foreach ($db->select('SELECT SUM(sales_total) FROM tbl_sales WHERE YEAR(sales_date) = YEAR(NOW()) AND MONTH(sales_date)=MONTH(NOW()) ORDER BY sales_id DESC') as $row) {
    $m_sale = $row['SUM(sales_total)'];
}
foreach ($db->select('SELECT SUM(ex_amount) FROM tbl_expence WHERE YEAR(date) = YEAR(NOW()) AND MONTH(date)=MONTH(NOW()) ORDER BY ex_id DESC') as $row) {
    $m_exp = $row['SUM(ex_amount)'];
}
foreach ($db->select('SELECT SUM(sales_profit) FROM tbl_sales WHERE YEAR(sales_date) = YEAR(NOW()) AND MONTH(sales_date)=MONTH(NOW()) ORDER BY sales_id DESC') as $row) {
    $m_profit = ($row['SUM(sales_profit)']) - $m_exp;
}
foreach ($db->select('SELECT SUM(sales_due) FROM tbl_sales WHERE YEAR(sales_date) = YEAR(NOW()) AND MONTH(sales_date)=MONTH(NOW()) ORDER BY sales_id DESC') as $row) {
    $m_due = $row['SUM(sales_due)'];
}
?>



