<?php

namespace Controllers;


class IndexController extends Controller
{
    /*
     * Show the homepage
     */
    public function index() {

        echo $this->twig->render('front/home/index.html.twig');
    }

    /*
     * send mail with the contact form
     */
    public function contact() {

        // Check for empty fields
        if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            http_response_code(500);
            exit();
        }

        $name = strip_tags(htmlspecialchars($_POST['name']));
        $email = strip_tags(htmlspecialchars($_POST['email']));
        $phone = strip_tags(htmlspecialchars($_POST['phone']));
        $message = strip_tags(htmlspecialchars($_POST['message']));

        // Create the email and send the message
        $to = "contact@romain-ollier.com";
        $subject = "Message via formulaire de contact:  $name";
        $body = "Vous avez reçu un nouveau message de votre formulaire de contact de site Web.\n\n"."Voici les détails:\n\nNom: $name\n\nEmail: $email\n\nTel: $phone\n\nMessage:\n$message";
        $header = "From: noreply@romain-ollier.com\n";
        $header .= "Reply-To: $email";

        if(!mail($to, $subject, $body, $header))
            http_response_code(500);

    }

}