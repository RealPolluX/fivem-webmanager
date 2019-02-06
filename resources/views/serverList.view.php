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


lalalalalalalalalal
