
    <div class="jumbotron">
        <h2><strong>Phalcon-blog</strong></h2>
        <button class="btn btn-info pull-right" 
        data-toggle="modal" data-target="#modalLogin">Login</button>
    </div>
    <?php $this->flashSession->Output() ?>
        <div class="panel panel-info">
            <div class="panel-heading">
                <h4>Timeline</h4>
            </div>
        </div>
        
        <?php foreach ($timelines as $timeline): ?>    
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>
                        <!-- 
                            ini adalah salah satu contoh menampilkan data dalam bentuk array .
                        -->
                        <strong><?= $timeline["title"] ?></strong>
                    </h4>        
                </div>
                <div class="panel-body">
                    <img height="300px" src="<?= $this->url->getStatic('img/'.$timeline["file"]) ?>" alt="<?= $timeline["file"] ?>">
                    <br>
                    <br>
                    <p>
                        <?= $timeline["description"] ?>
                    </p>   
                    <br>
                    <div class="pull-right">
                        <label for="">Author :</label>
                        <span class="text text-info">
                            <?= $timeline["author"] ?>
                        </span>
                        <label for="">Kategori :</label>
                        <span class="text text-info">
                            <?= $timeline["kategori"] ?>
                        </span>
                    </div>
                </div>
                <div class="panel-footer">
                    
                </div>
            </div>
            
            
            <hr>
        <?php endforeach ?>
        
        


<!-- modal untuk login -->
    <div class="modal fade" id="modalLogin">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Login Form</h4>
                </div>
                <div class="modal-body">
                    <form action="<?= $this->url->get('session/loginproses') ?>" method="post">
                        
                        <div class="form-group">
                        <label>Username</label>
                            <input type="text" class="form-control" name="username" >
                        </div>
                        <div class="form-group">
                        <label>Password</label>
                            <input type="password" class="form-control" name="password" >
                        </div>
                        <button type="submit" class="btn btn-success">Login</button>
                        <a href="<?= $this->url->get('index/register') ?>" class="btn btn-danger">Registrasi</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
