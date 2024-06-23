<html>
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
        <title>MENIU</title>
        <link rel="stylesheet" href="style/meniu.css">
    </head>
    <body>
        <div class="head">
            <div class="logo">
                <img class="llogo", src="style/worldcup.png", width="150px", height="150px">
            </div>
        </div>
        <table class="meniu">
			<tr>
				<td> <a class="button" href="meniu.php"> HOME </td>
				<td> <a class="button" href="meciurio.php"> MECIURI </td>
                <td> <a class="button" href="stadioane.php"> STADIOANE </td>
                <td> <a class="button" href="meciurifavorite.php"> MECIURI FAVORITE </td>
                <td> <a class="buttonClicked" href="interogari.php"> INTEROGARI </td>
			</tr>
		</table>
        <div class="welcome", style = "width:500px;">
            <b>INTEROGARI<b>
        </div>
        <div class="container">
        <table class="meniu" style = "margin-top:10px; margin-bottom:10px;">
			<tr>
                <td> <a class="button" href="interogari3.php"> << </td>
				<td> <a class="button" href="interogari5.php"> >> </td>
			</tr>
		</table>
        <div class="enunt">
            4. Echipele care au capitanii cu varsta mai mica sau egala cu cea introdusa:
        </div>
        <form method = "GET" class = "form">
            <input type = "text", class = "varsta", id = "varsta", name = "varsta", value = ""><br>
            <button type="submit" class = "submit" name = "submit">SEARCH</button>
        </form>
		</table>
            <?php
            $varsta = -1;
            if($_GET)
            {
                $varsta = $_GET['varsta'];
            }
                      
            if($varsta == -1)
            {
                echo "<div class = \"welcome\" style = \"width:1000px; font-size:30px;\"> Nu ati introdus nicio varsta!</div>";
            }
            else
            {
                $querya = "SELECT DENUMIRETARA, VARSTA FROM ECHIPE JOIN CAPITANI ON CAPITANI.CAPITANID = ECHIPE.CAPITANID WHERE(VARSTA <= ".$varsta.") ORDER BY VARSTA DESC";
                $stida = oci_parse(oci_connect("System", "g.4367eo", "localhost/XE"), $querya);
                oci_execute($stida);
            while(($rowa = oci_fetch_array($stida, OCI_ASSOC))!=false)
            {
                echo "<div class=\"grupa\"  style = \"border:none;\">";
                echo "<br>";
                    echo "<div class=\"echipa\">
                    <div class=\"steag\">
                    <img class=\"flag\", src='flags/".$rowa['DENUMIRETARA'].".png', width=100px, height=65px, style=\"margin-left:125px; margin-right:20px; border:2px solid white; border-radius:20px;\">
                    </div>
                    <div class=\"info\">
                    <div class=\"nume\">$rowa[DENUMIRETARA]</div>
                    <div class=\"rez\">Varsta capitanului este de <b>$rowa[VARSTA]</b> de ani</div>
                    </div>
                    </div>";
                echo "<br>";
                echo "</div>";
            }
        }
            ?>
        </div>
    </body>
</html>