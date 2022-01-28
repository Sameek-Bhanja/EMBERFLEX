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
                

                if(val != "") {
                    $.post("ajax/getSearchResults.php", { term: val, username: username }, function(data) {
                        $(".searchResults").html(data);
                    })
                }
                else{
                    $(".searchResults").html("");
                }

            }, 500);
        })

    })

</script>