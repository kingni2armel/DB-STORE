<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
//include_once ("class/Utilisateur.php");
include_once ("C_Client.php");

class Formclient extends CI_Controller{


    function __construct() 
    {
            parent::__construct();
            $this->load->helper('language'); 
            $this->lang->load("signin");
            $this->load->helper('url');
    } 

    public function formulaireclient()
    {
        if (isset($_SESSION['site_lang']) && $_SESSION['site_lang'] == 'french')
        { 
            //le champs nom
            $this->form_validation->set_rules(
                'nom',
                '<b>Nom</b>',
                'required',
                array(
                    'required'=>'Le champ {field} est requis.'
                )
            );
             //le champs prenom
            $this->form_validation->set_rules(
                'prenom',
                '<b>Prenom</b>',
                'required',
                array(
                    'required'=>'Le champs {field} est requis.'
                )
            );
             //le champs email
            $this->form_validation->set_rules(
                'email',
                '<b>Email</b>',
                'trim|required|valid_email',
                array(
                    'required'=>'Le champs {field} est requis.',
                    'valid_email'=>'Vous devez entrer une adresse email valide.'
                )
            );
             //le champs numero de telephone
            $this->form_validation->set_rules(
                'phone',
                '<b>Numero de telephone</b>',
                'required|numeric',
                array(
                    'required'=>'Le champs {field} est requis.',
                    'numeric'=>'Votre {field} est incorrecte.'
                )
            );
            //le champ MOT DE PASSE
            $this->form_validation->set_rules(
                'password',
                '<b>Mot de passe</b>',
                'required|min_length[8]|alpha_numeric',
                array(
                    'required'=>'le champs {field} est requis.',
                    'min_length'=>'Votre {field} doit contenir au moins 8 caractères.',
                    'alpha_numeric'=>'Le champs {field} doit contenir des chiffres et des lettres.'
                )
            );
            //le champ de CONFIRMATION DE MOT DE PASSE
            $this->form_validation->set_rules(
                'password_confirme',
                '<b>Mots de passe</b>',
                'required|matches[password]',
                array(
                    'required'=>'Le champs {field} est requis.',
                    'matches'=>'Les {field} ne sont pas identiques.'
                )
            );

        }
        else
        {
            //le champs nom
            $this->form_validation->set_rules(
                'nom',
                '<b>First name</b>',
                'required',
                array(
                    'required'=>'The field {field} is required.'
                )
            );
             //le champs prenom
            $this->form_validation->set_rules(
                'prenom',
                '<b>Name</b>',
                'required',
                array(
                    'required'=>'The field {field} is required.'
                )
            );
             //le champs email
            $this->form_validation->set_rules(
                'email',
                '<b>Email</b>',
                'trim|required|valid_email',
                array(
                    'required'=>'The field {field} is required.',
                    'valid_email'=>'You must enter a valid email address.'
                )
            );
             //le champs numero de telephone
            $this->form_validation->set_rules(
                'phone',
                '<b>Phone number</b>',
                'required|numeric',
                array(
                    'required'=>'The field {field} is required.',
                    'numeric'=>'The field {field} is incorrect.'
                )
            );
            //le champ MOT DE PASSE
            $this->form_validation->set_rules(
                'password',
                '<b>Password</b>',
                'required|min_length[8]|alpha_numeric',
                array(
                    'required'=>'The field {field} is required.',
                    'min_length'=>'Your {field} most contain least {param} chars.',
                    'alpha_numeric'=>'The field {field} must contain numbers and letters.'
                )
            );
            //le champ de CONFIRMATION DE MOT DE PASSE
            $this->form_validation->set_rules(
                'password_confirme',
                '<b>Password confirm</b>',
                'required|matches[password]',
                array(
                    'required'=>'The field {field} is required.',
                    'matches'=>'The Passwords fields dont match.'
                )
            );
        }

        $this->form_validation->run();
        $this->load->view('formulaireclient');

        //___Si le formulaire est valide
        if ($this->form_validation->run() == true) 
        {         
 
            $this->load->model('signupuser');//___Chargement du model

            //___Recuperation des champs du vendeur
            $nom = $this->input->get_post('nom');
            $prenom = $this->input->get_post('prenom');
            $email = $this->input->get_post('email');
            $phone = $this->input->get_post('phone');
            $password = $this->input->get_post('password');

            //___echaper les champs
            $nom = trim(strip_tags($nom));
            $prenom = trim(strip_tags($prenom));
            $email = trim(strip_tags($email));
            $phone = trim(strip_tags($phone));
            $password = trim(strip_tags($password));

            //___cryptage du mot de passe
            $password = password_hash($password, PASSWORD_DEFAULT);
             
            //___Traitement
            //___Creation du client
            $client = new Client($nom, $prenom, $email, $phone, $password);
            $client->setPrivilege("customer");      
            $id_user = $this->signupuser->saveCustomer($client);
            $client->setIdUser($id_user);    
            
            
            if ($_SESSION['site_lang'] == 'french') {
                //___Fonction message msg  
                $this->session->set_userdata('msg',"Inscription reussie");
            }
            else
            {
                $this->session->set_userdata('msg', "Successful registration");
            }
            
            redirect(site_url('login'));
        } 
        
    }
}

?> 
