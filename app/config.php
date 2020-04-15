<?php

class Config
{
    static public $mvc_bd_hostname = "localhost";
    static public $mvc_bd_nombre = "inmobiliaria";
    static public $mvc_bd_usuario = "root";
    static public $mvc_bd_clave = "";


    static public $oauthJSON = '{
                                    "web":{
                                        "client_id":"498199509579-8a07elvkdfahkjm9sj09rp6tvmsfb9ek.apps.googleusercontent.com",
                                        "project_id":"proyecto-inmobiliaria-abastos",
                                        "auth_uri":"https://accounts.google.com/o/oauth2/auth",
                                        "token_uri":"https://oauth2.googleapis.com/token",
                                        "auth_provider_x509_cert_url":"https://www.googleapis.com/oauth2/v1/certs",
                                        "client_secret":"FNKetPKlI6Ro8XJYgKnVYcQG",
                                        "redirect_uris":["http://localhost:8080/proyecto/web/index.php"]
                                    }
                                }';
}
