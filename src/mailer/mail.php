<?php
// Подключение библиотеки
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

// // Получение данных
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];

// Контент письма
$title = 'Заявка с сайта'; // Название письма
$body = '<p><strong>Пользователь оставил данные</strong></p>'.
        '<p><strong>Имя:</strong> '.$name.'</p>'.
        '<p><strong>Телефон:</strong> '.$phone.'</p>'.
        '<p><strong>Сообщение:</strong> '.$email.'</p>';

// Настройки PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();

try {
  $mail->isSMTP();
  $mail->CharSet = 'UTF-8';
  $mail->SMTPAuth   = true;

  // Настройки почты отправителя
  $mail->Host       = ''; // SMTP сервера вашей почты
  $mail->Username   = ''; // Логин на почте
  $mail->Password   = ''; // Пароль на почте
  $mail->SMTPSecure = 'ssl';
  $mail->Port       = 465;

  $mail->setFrom('', 'Pulse'); // Адрес самой почты и имя отправителя

  // Получатель письма
  $mail->addAddress('');

  // Отправка сообщения
  $mail->isHTML(true);
  $mail->Subject = $title;
  $mail->Body = $body;

  $mail->send('d');

  // Сообщение об успешной отправке
  echo ('Сообщение отправлено успешно!');

} catch (Exception $e) {
  header('HTTP/1.1 400 Bad Request');
  echo('Сообщение не было отправлено! Причина ошибки: {$mail->ErrorInfo}');
}
