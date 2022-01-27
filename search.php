<?php
include_once("includes/header.php");
?>
<div class="textBoxContainer">
    <input type="text" class="searchInput" placeholder="Search For Somthing">
</div>

<div class="searchResults"></div>

<script>

    $(function() {

        var username = '<?php echo $userLoggedIn; ?>';
        var timer;

        $(".searchInput").keyup(function() {
            clearTimeout(timer);

            timer = setTimeout(function() {
                var val = $(".searchInput").val();
                console.log(val);
            }, 500);
        })

    })

</script>