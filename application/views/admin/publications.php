

<?php
if (!$_SESSION['S_id_user']) {
    redirect(base_url('connection/login)'));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="">

    <?php //include_once('layout/lien_css.html'); ?>
    <?php //include_once('layout/lien_js.html');?>
    <title>Admin Pannel</title>
</head>
<body>
<?php $this->load->view('layout/headeradmin.php');?>
<div class="he" style="height:62px"></div>


<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <?php
            if (isset($_SESSION['msg'])) {
                echo '<div class="alert alert-warning" role="alert">'.$_SESSION['msg'].'</div>';
                unset($_SESSION['msg']);
            }
            $query = $this->db->where('id_shop',$_SESSION['S_id_shop']);
            $query = $this->db->get('article');
            $query->result();
            $r = $query->num_rows();
            ?>
            <h1><?= $this->lang->line('publication_mesArticles') ?>(<?= $r ?>)</h1>
            <div class="panel panel-striped">
                <table class="table table-bordered" style="margin-top: 20px;">
                    <thead>
                    <tr>
                        <th><?= $this->lang->line('publication_articleColumn') ?></th>
                        <th><?= $this->lang->line('publication_descriptionColumn') ?></th>
                        <th><?= $this->lang->line('publication_dateColumn') ?></th>
                        <th><?= $this->lang->line('publication_optionColumn') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (isset($results)) {
                        ?>
                        <?php foreach ($results as $row): ?>
                            <tr class="table-light">
                                <td>
                                    <img src="<?php if($row->type_a == 'service'){ echo base_url('/_seller_datas_/'.$_SESSION['id_seller'].'/_publication/_service/'.$row->name_image ); }else{echo base_url('/_seller_datas_/'.$_SESSION['id_seller'].'/_publication/_product/'.$row->name_image );}?>" class="img-thumbnail" alt="<?= $row->name_article;
                                    ?>" width="60">
                                    <?= $row->name_article ?>
                                </td>
                                <td><?= $row->description_article ?></td>
                                <td><?= $row->date_publication ?></td>
                                <td>
                                    <a class="btn btn-xs badge rounded-pill btn-primary rounded me-2" href="<?= base_url('info/'.$row->id_article) ?>"><i class="fa fa-plus-circle"></i> info</a>
                                    <a class="btn btn-xs badge rounded-pill btn-danger rounded" href="<?= base_url('del/'.$row->id_article) ?>"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                        <?php
                    }
                    else
                    {
                        ?>
                        <tr class="table-light">
                            <td colspan="4" height="150"><center><b>Vous n'avez posté aucun article !</b></center></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td class="text-center" colspan="5">
                            <div class="row justify-content-center">
                                <div class="col-4">
                                    <?= $this->pagination_bootstrap->render() ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    </tfoot>
                </table>
            </div>

        </div>
        <div class="col-sm-4" style="margin-top: 50px;">
            <div class="card w-80">
                <div class="card-body">
                    <h5 class="card-title"><?= $this->lang->line('publication_addArticle') ?></h5>
                    <p class="card-text"><?= $this->lang->line('publication_guide') ?></p>
                    <a  style="background-color:#FDB219 !important;border:1px solid #FDB219" href="<?= base_url('addarticle')?>" class="btn btn-primary"><?= $this->lang->line('publication_addArticleButton') ?></a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>



<?php
$this->load->view('/layout/footer.php');
?>

<style>
    @media all and (min-width:0px) and  (max-width:600px){
        .he{
            height:80px !important;
        }
    }
</style>
</body>
</html>