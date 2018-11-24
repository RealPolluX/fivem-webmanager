<?php $this->layout('template', ['title' => 'Not Found']) ?>

<br><br><br>
<div class="container-fluid px-xl-5">
    <div class="container">
        <h1 class="mt-5"><?= $this->e($code) ?></h1>
    </div>
    <div class="container">
        <div class="jumbotron">
            <h2>Content not found</h2>
            <p><?= $this->e($message) ?></p>
        </div>
        <p><a href="<?= $this->url() ?>" class="btn btn-outline-primary btn-large">Back to the Homepage »</a></p>
    </div>
</div>