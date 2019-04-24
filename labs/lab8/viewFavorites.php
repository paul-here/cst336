<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        <script>
        /* global $ */


        $(document).ready(function() {

                $.ajax({
                    method: "POST",
                    url: "api/favoritesAPI.php",
                    dataType: "json",
                    data: { "action": "favorites"},
                    success: function(data, status) {
                        alert("success");
                    }
                }); //ajax 

            

        }); //documentReady
    </script>
    </head>
    <body>

        <h1> Favorite Images </h1>
    </body>
</html>