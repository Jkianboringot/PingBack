<?php

$permission = [
    "Admin/Owner" => [
        "Dashboard",
        "Roles",
        "Users",
        "Customer",
        "Supplier",
        "Units",
        "Brand",
        "Category",
        "Product List",
        "Purchases",
        "Sales",
        "Order",
        "New Arrival",
        "Unsuccessful Transaction",
        "Return",
        "Approval",
        "Product Defect"
    ],
    "Supervisor" => [
        "Dashboard",
        "Customer",
        "Supplier",
        "Units",
        "Brand",
        "Category",
        "Product List",
        "Purchases",
        "Sales",
        "Order",
        "New Arrival",
        "Unsuccessful Transaction",
        "Return",
        "Approval",
        "Product Defect"
    ],
    "Sales Clerk" => [
        "Customer",
        "Sales"
    ],
    "Inventory Clerk" => [
        "New Arrival",
        "Return"
    ],
    "Warehouse Keeper" => [
        "Order",
        "Product Defect"
    ],
    "Return and Exchange Clerk" => [
        "Dashboard",
        "Return"
    ],
];
$check = ['Order','Return'];

foreach ($permission as $role => $actions) {
    $found = array_intersect($check, $actions);

    if (!empty($found)) {
        echo implode(', ', $found) . " found in $role <br>";
    } else {
        echo implode(', ', $check) . " NOT found in $role <br>";
    }
}


// $check = ['Order','Return'];

// $rolesToCheck = ['Warehouse Keeper', 'Inventory Clerk', "Admin/Owner", "Sales Clerk", "Return and Exchange Clerk", "Supervisor"];

// foreach ($rolesToCheck as $role) {
//     if (in_array(array($check), $permission[$role])) {
//         echo "$check found in $role <br>";
//     }
//     else {
//                echo "$check NOT found in $role <br>";

//     }
// }
