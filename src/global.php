<!-- this is a php file that should be included in every php pages file. it contains the global script and global css -->
<?php
    // return global script and global css
    function echo_global() {
        $html = <<<"EOT"
            <script src="../../global.js"></script>
            <link rel="stylesheet" href="../../global.css" />
        EOT;
        echo $html;
    }
?>