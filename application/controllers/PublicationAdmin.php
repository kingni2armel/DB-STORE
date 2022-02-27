<?php 

class PublicationAdmin extends CI_Controller{

    public function __construct()

    {
            parent::__construct();
            $this->load->helper('url');
    }

    ///////////////////////////////////////////////////////////////////////////////////
    ///                                                                             ///
    ///     retourne la page des articles qui ont deja ete posté par un vendeur     ///
    ///                                                                             ///
    ///////////////////////////////////////////////////////////////////////////////////
    public function publications(){

        verifySession();

        if (empty($_SESSION['id_shop'])) {
            redirect(site_url('login'));
        }else{
            $this->load->model('addarticle');//___Chargement du model

            $this->load->library('Pagination_bootstrap');//___bibliotheque de pagination

            $req  = "SELECT a.id_article, a.type_a, a.name_article, a.description_article, a.price, a.date_publication, i.name_image ";
            $req .= "FROM article a, image_of_article i ";
            $req .= "WHERE a.id_article = i.id_article AND a.id_shop = ".$_SESSION['id_shop'].' ';
            $req .="GROUP BY id_article ";
            $req .="ORDER BY a.date_publication DESC";

            $sql = $this->db->query($req);
            $data = $sql->result();
            //$sql = $this->db->get('article');//___Chargement de la table

            $this->pagination_bootstrap->offset(5);


            if (empty($data)) {
                $this->load->view('admin/publications'); //___vue de la page des publications

            }
            else
            {
                $data['results'] = $this->pagination_bootstrap->config('publication/publications/',$sql);
                $this->load->view('publications',$data); //___vue de la page des publications
            }
        }


    }
    }
?>