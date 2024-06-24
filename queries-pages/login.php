<html>
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
        <title>LOGIN</title>
        <link rel="stylesheet" href="style/login.css">
        <?php
            $user="System";
            $pass="g.1234eo";
            $host="localhost/XE";
            echo 
            "<div class=\"head\">
                <div class=\"logo\">
                    <img class=\"llogo\", src=\"style/worldcup.png\", width=\"150px\", height=\"150px\">
                </div>
                <div class=\"welcome\"><b>LOGIN</b></div>
                    <div class=\"loginbox\">
                        <div class=\"username\">USERNAME</div>
                        <div class=\"u\">
                        <input type=\"text\" id=\"username\" name=\"username\" value=\"\"><br>
                        </div>
                        <div class=\"parola\">PAROLA</div>
                        <div class=\"p\">
                        <input type=\"password\" id=\"parola\" name=\"parola\" value=\"\"><br>
                        </div>
                        <div class=\"button\" onclick=\"login()\"> CONECTARE </div>
                </div>
            </div>
            <script>
            function login(){
                var username = document.getElementById(\"username\").value;
                var password = document.getElementById(\"parola\").value;
                if(username === '$user' && password === '$pass'){
                    window.location.href=\"meniu.php\";
                }
                else
                {
                    window.location.href=\"eroare.html\";
                }
            }
            </script>";
        ?>
    </head>
</html>