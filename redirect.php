<?php
session_start();
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['mobileNumber'])) {
        $mobileNumber = $_POST['mobileNumber'];
        // Format the mobile number
        $mobileNumber = preg_replace('/\D/', '', $mobileNumber);

        // Store mobile number in chat history session variable
        if (!isset($_SESSION['chat_history'])) {
            $_SESSION['chat_history'] = [];
        }
        $_SESSION['chat_history'][] = $mobileNumber;

        // Redirect to WhatsApp
        header("Location: https://wa.me/$mobileNumber");
        exit();
    } elseif (isset($_POST['view_history'])) {
        // Redirect to chat history page
        header("Location: chat_history.php");
        exit();
    } elseif (isset($_POST['remove_index'])) {
        // Handle removal of chat history entry
        $indexToRemove = $_POST['remove_index'];
        if (isset($_SESSION['chat_history'][$indexToRemove])) {
            array_splice($_SESSION['chat_history'], $indexToRemove, 1);
        }
        // Redirect back to chat history page
        header("Location: chat_history.php");
        exit();
    }
}
?>
