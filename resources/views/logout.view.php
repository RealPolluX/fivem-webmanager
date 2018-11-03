<?php $this->layout('template', ['title' => 'Logout']) ?>

<br>

<div class="card">
    <div class="card-header">
        <h2 class="h6 text-uppercase mb-0">Logout</h2>
    </div>
    <div class="card-body">
        <p class="mb-5 text-success">Your log-out was successful. You will be redirected shortly.</p>
        <meta http-equiv="refresh" content="10; URL=<?= $this->url() ?>">
    </div>
</div>