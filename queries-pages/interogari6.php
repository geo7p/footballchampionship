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
                <td> <a class="button" href="interogari5.php"> << </td>
				<td> <a class="button" href="interogari7.php"> >> </td>
			</tr>
		</table>
        <div class="enunt">
            6. Tarile care au jucat in semifinale:
        </div>
		</table>
            <?php
                $querya = "SELECT DENUMIRETARA, TIPMECI FROM MECIURI JOIN ECHIPE ON MECIURI.ECHIPA1ID = ECHIPE.ECHIPAID WHERE TIPMECI = 'SEMIFINALE'";
                $stida = oci_parse(oci_connect("System", "g.4367eo", "localhost/XE"), $querya);
                oci_execute($stida);
                $queryb = "SELECT DENUMIRETARA, TIPMECI FROM MECIURI JOIN ECHIPE ON MECIURI.ECHIPA2ID = ECHIPE.ECHIPAID WHERE TIPMECI = 'SEMIFINALE'";
                $stidb = oci_parse(oci_connect("System", "g.4367eo", "localhost/XE"), $queryb);
                oci_execute($stidb);
                echo "<div class=\"grupa\">";
            while(($rowa = oci_fetch_array($stida, OCI_ASSOC))!=false)
            {
                echo "<br>";
                echo "<div class=\"echipa\">
                <div class=\"steag\">
                <img class=\"flag\", src='flags/".$rowa['DENUMIRETARA'].".png', width=100px, height=65px, style=\"margin-left:125px; margin-right:20px; border:2px solid white; border-radius:20px;\">
                </div>
                <div class=\"info\">
                <div class=\"nume\">$rowa[DENUMIRETARA]</div>
                <div class=\"rez\">A jucat pana in <b>$rowa[TIPMECI]</b></div>
                </div>
                </br>
                </div>";
            }
            while(($rowb = oci_fetch_array($stidb, OCI_ASSOC))!=false)
            {
                echo "<br>";
                echo "<div class=\"echipa\">
                <div class=\"steag\">
                <img class=\"flag\", src='flags/".$rowb['DENUMIRETARA'].".png', width=100px, height=65px, style=\"margin-left:125px; margin-right:20px; border:2px solid white; border-radius:20px;\">
                </div>
                <div class=\"info\">
                <div class=\"nume\">$rowb[DENUMIRETARA]</div>
                <div class=\"rez\">A jucat pana in <b>$rowb[TIPMECI]</b></div>
                </div>
                </div>";
            }
            echo "</div>";
            ?>
        </div>
    </body>
</html>