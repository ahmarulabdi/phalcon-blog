<div class="page-header">
    <h1>
        Search posts
    </h1>
    <p>
        <?= $this->tag->linkTo(['posts/new', 'Create posts']) ?>
    </p>
</div>

<?= $this->getContent() ?>

<?= $this->tag->form(['posts/search', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal']) ?>

<div class="form-group">
    <label for="fieldIdPosts" class="col-sm-2 control-label">Id Of Posts</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['id_posts', 'type' => 'numeric', 'class' => 'form-control', 'id' => 'fieldIdPosts']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldIdUsers" class="col-sm-2 control-label">Id Of Users</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['id_users', 'type' => 'numeric', 'class' => 'form-control', 'id' => 'fieldIdUsers']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldTitle" class="col-sm-2 control-label">Title</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['title', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldTitle']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldDescription" class="col-sm-2 control-label">Description</label>
    <div class="col-sm-10">
        <?= $this->tag->textArea(['description', 'cols' => '30', 'rows' => '4', 'class' => 'form-control', 'id' => 'fieldDescription']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldFile" class="col-sm-2 control-label">File</label>
    <div class="col-sm-10">
        <?= $this->tag->textArea(['file', 'cols' => '30', 'rows' => '4', 'class' => 'form-control', 'id' => 'fieldFile']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldKategori" class="col-sm-2 control-label">Kategori</label>
    <div class="col-sm-10">
        <?= $this->tag->selectStatic(['kategori', 'using' => [], 'class' => 'form-control', 'id' => 'fieldKategori']) ?>
    </div>
</div>


<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <?= $this->tag->submitButton(['Search', 'class' => 'btn btn-default']) ?>
    </div>
</div>

</form>
