<?php $this->layout('template', ['title' => 'Test']) ?>

<h1>User Profile</h1>
<p>Hello, <?= $this->e($name) ?></p>
<pre>
    <?php var_dump($this->data) ?>
</pre>
