<?php
    function userCard($args){
        // $id, $username, $email, $is_admin, $name

        extract($args);
        $role  = $is_admin ? "Admin" : "User";
        $html = <<<"EOT"
            <div class="user-card border-2 border-white flex">
                    <div class="">$id</div>
                    <div class="">
                        <h3>$name</h3>
                    </div>
                    <div class="">
                        <h4>$username</h4>
                    </div>
                    <div class="">
                        <h4>$email</h4>
                    </div>
                    <div class="">
                        <h4>$role</h4>
                    </div>
            </div>
        EOT;
        return $html;
    }
?>