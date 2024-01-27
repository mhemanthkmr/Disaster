<?php 
// session_start();

if(isset($_SESSION['flag']))
{
    if($_SESSION['flag'] == 1)
    {
            if(isset($_SESSION['message']))
            { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Wow! </strong> <?=$_SESSION['message']?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
            unset($_SESSION['message']);
            }
    }
    if($_SESSION['flag'] == 2)
    {
            if(isset($_SESSION['message']))
            { ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Hey! </strong> <?=$_SESSION['message']?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
            unset($_SESSION['message']);
            }
    }
}



?>