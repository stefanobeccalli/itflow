<?php

if (isset($_POST['edit_default_settings'])) {

    validateCSRFToken($_POST['csrf_token']);

    $start_page = sanitizeInput($_POST['start_page']);
    $expense_account = intval($_POST['expense_account']);
    $payment_account = intval($_POST['payment_account']);
    $payment_method = sanitizeInput($_POST['payment_method']);
    $expense_payment_method = sanitizeInput($_POST['expense_payment_method']);
    $transfer_from_account = intval($_POST['transfer_from_account']);
    $transfer_to_account = intval($_POST['transfer_to_account']);
    $calendar = intval($_POST['calendar']);
    $net_terms = intval($_POST['net_terms']);
    $hourly_rate = floatval($_POST['hourly_rate']);
    $phone_mask = intval($_POST['phone_mask']);

    mysqli_query($mysqli,"UPDATE settings SET config_start_page = '$start_page', config_default_expense_account = $expense_account, config_default_payment_account = $payment_account, config_default_payment_method = '$payment_method', config_default_expense_payment_method = '$expense_payment_method', config_default_transfer_from_account = $transfer_from_account, config_default_transfer_to_account = $transfer_to_account, config_default_calendar = $calendar, config_default_net_terms = $net_terms, config_default_hourly_rate = $hourly_rate, config_phone_mask = $phone_mask WHERE company_id = 1");

    //Logging
    mysqli_query($mysqli,"INSERT INTO logs SET log_type = 'Settings', log_action = 'Modify', log_description = '$session_name modified default settings', log_ip = '$session_ip', log_user_agent = '$session_user_agent', log_user_id = $session_user_id");

    $_SESSION['alert_message'] = "Default settings updated";

    header("Location: " . $_SERVER["HTTP_REFERER"]);
}