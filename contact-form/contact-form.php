<?php
/**
 * Plugin Name: contact-form
 * Description:  formulaire de contact pour wordpress
 */



function contact_form_plugin() 
{
    $content = '';
    $content .= '<h2>Formulaire de contact</h2>';
    $content .= '<form class="form_control" action="" method="post" action ="http://localhost/wordpress/?page_id=3&preview=true" >';
   $content .= '<label for="name">Nom</label><br />';
   $content .= '<input type="text" name="name" id="name" class="form-control" placeholder="Votre nom" required><br />';
   $content .= '<label for="lastname">Prénom</label><br />';
   $content .= '<input type="text" name="lastname" id="lastname" class="form-control" placeholder="Votre prénom" required><br />'; 
   $content .= '<label for="email">Email</label><br />';
   $content .= '<input type="email" name="email" id="email" class="form-control" placeholder="Votre email" required><br />';  
    $content .= '<label for="message">Message</label><br />';
    $content .= '<textarea name="message" id="message" class="form-control" placeholder="Votre message" required></textarea><br />';
    
    $content .= '<br /><input type="submit" name="submit" value="Envoyer">';
    $content .= '</form>';
    return $content;
} 
 'add_shortcode'('contact-form', 'contact_form_plugin');



function contact_form_activation() 
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'contact_form';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        lastname VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        message TEXT NOT NULL,
        date DATETIME NOT NULL
    )";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    'dbDelta'($sql);

}
'register_activation_hook'(__FILE__, 'contact_form_activation');


?>