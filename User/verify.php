<?php
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, "lms");
if (isset($_GET['email']) && isset($_GET['v_code'])) {
    $query = "select * from users where email='$_GET[email]' and verification_code='$_GET[v_code]'";
    $result = mysqli_query($connection, $query);
    ?>
    <script type="text/javascript">
        alert("Verification done!!");

 </script>
    <?php
    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $res_fetch = mysqli_fetch_assoc($result);
            if ($res_fetch['is_verified'] == 0) {
                $query1 = "update users set is_verified = '1' where email='$res_fetch[email]'";
                if (mysqli_query($connection, $query1)) {
                    ?>
                    <script type="text/javascript">
                        alert("Verification done!!");

                    </script>
                    <?php
                } if ($res_fetch['is_verified'] == 1) {
                    ?>
                    <script type="text/javascript">
                        alert("Already Verified!!");

                    </script>
                    <?php
                }
            }


        }
    } else {
        ?>
        <script type="text/javascript">
            alert("Verification  not done!!");

        </script>
    <?php
    }
}
?>
