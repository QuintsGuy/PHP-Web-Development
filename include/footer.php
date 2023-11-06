    <hr />

    <div class="container" style="margin-bottom: 20px;">
        <?php 
            $file = basename($_SERVER['PHP_SELF']);
            $mod_date=date("F d Y h:i:s A", filemtime($file));
            echo "File last updated $mod_date | Tristan Knott";
        ?>
    </div>

</body>

</html>