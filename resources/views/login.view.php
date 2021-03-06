<?php $this->layout('template', ['title' => 'Login']) ?>

<!-- ERRORS -->
<?php

if (array_key_exists('notifications', $this->data)) {
    if (sizeof($this->data['notifications']) > 0) {
        // we have notifications to show!
        echo '<br>';
        foreach ($this->data['notifications'] as $element) {
            echo '<div class="notification-' . $element['type'] . '">' . $element['message'] . '</div>';
        }
    }
}

?>

<div class="page-holder d-flex align-items-center">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-5 col-lg-7 mx-auto mb-5 mb-lg-0">
                <div class="pr-lg-5"><img src="<?= $this->url() ?>img/illustration.svg" alt="Illustration"
                                          class="img-fluid"></div>
            </div>
            <div class="col-lg-5 px-lg-4">
                <h1 class="text-base text-primary text-uppercase mb-4">FiveM Web-Manager</h1>
                <h2 class="mb-4">Welcome back!</h2>
                <p class="text-muted">If you have a user account you can log-in now!</p>
                <form id="loginForm" action="<?= $this->url() ?>account/login" class="mt-4" method="post">
                    <div class="form-group mb-4">
                        <input type="text" name="username" placeholder="Username or Email address"
                               class="form-control border-0 shadow form-control-lg">
                    </div>
                    <div class="form-group mb-4">
                        <input type="password" name="password" placeholder="Password"
                               class="form-control border-0 shadow form-control-lg text-violet">
                    </div>
                    <button type="submit" class="btn btn-primary shadow px-5" name="auth" value="login">Log in</button>
                </form>
            </div>
        </div>
    </div>
</div>