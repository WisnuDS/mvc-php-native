<?php


class FlashMessage
{
    public static function setFlasher($message, $boldMessage, $type)
    {
        $_SESSION['flash'] = [
            "message" => $message,
            "bold" => $boldMessage,
            "type" => $type
        ];
    }

    public static function showFlasher()
    {
        if (isset($_SESSION['flash'])) {
            echo '<div class="alert alert-'. $_SESSION['flash']['type'] .' alert-dismissible fade show" role="alert">
                  <strong>'. $_SESSION['flash']['bold'] .'!</strong> '.$_SESSION['flash']['message'].'
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                  </div>';
            unset($_SESSION['flash']);
        }
    }
}