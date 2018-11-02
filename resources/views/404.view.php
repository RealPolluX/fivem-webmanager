<?php $this->layout('template', ['title' => 'Not Found']) ?>

<div class="d-flex align-items-stretch">
    <div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
            <div class="container">
                <h1 class="mt-5"><?= $this->data['code'] ?></h1>
            </div>
            <div class="container">
                <div class="jumbotron">
                    <h2>Content not found</h2>
                    <p><?= $this->e($this->data['message']) ?></p>
                </div>
                <p><a href="<?= $this->url() ?>" class="btn btn-outline-primary btn-large">Back to the Homepage »</a>
                </p>
            </div>
        </div>
        <footer class="footer bg-white shadow align-self-end py-3 px-xl-5 w-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 text-center text-md-left text-primary">
                        <p class="mb-2 mb-md-0">FiveM Web-Manager &copy; <?= $this->year() ?></p>
                    </div>
                    <div class="col-md-6 text-center text-md-right text-gray-400">
                        <p class="mb-0">Design by <a href="https://bootstrapious.com/admin-templates"
                                                     class="external text-gray-400">Bootstrapious</a></p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>