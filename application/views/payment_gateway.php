<!--submit form to payment gateway OR in api environment you can pass this form data-->
   
        <form id="myForm" action="<?php echo PAYTM_TXN_URL ?>" method="post">
        <?php
         foreach ($paramList as $a => $b) {
        echo '<input type="text" name="'.htmlentities($a).'" value="'.htmlentities($b).'">';
       }
       ?>
            <input type="text" name="CHECKSUMHASH" value="<?php echo $checkSum ?>">
        </form>
        <script type="text/javascript">
            document.getElementById('myForm').submit();
         </script>