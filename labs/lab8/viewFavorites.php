<!DOCTYPE html>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <title>Pixabay API Favorites</title>
        <script>
        /* global $ */
        $(document).ready(function() {

                alert("test");
                $.ajax({
                    method: "POST",
                    url: "api/favoritesAPI.php",
                    dataType: "json",
                    data: { "action" : "favorites", "url" : "", "keyword" : ""},
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