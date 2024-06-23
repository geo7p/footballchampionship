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
                <td> <a class="button" href="interogari4.php"> << </td>
				<td> <a class="button" href="interogari6.php"> >> </td>
			</tr>
		</table>
        <div class="enunt">
            5. Numele si varsta antrenorului tarii care a castigat campionatul si stadionul pe care s-a jucat meciul:
        </div>
		</table>
            <?php
                $querya = "SELECT NUME, VARSTA, DENUMIRE FROM ANTRENORI JOIN ECHIPE ON ECHIPE.ANTRENORID = ANTRENORI.ANTRENORID JOIN MECIURI ON MECIURI.ECHIPA1ID = ECHIPE.ECHIPAID JOIN STADIOANE ON MECIURI.STADIONID = STADIOANE.STADIONID WHERE(TIPMECI = 'FINALA' AND ((ECHIPA1SCOR > ECHIPA2SCOR) OR (SCOR1PEN > SCOR2PEN)))";
                $stida = oci_parse(oci_connect("System", "g.4367eo", "localhost/XE"), $querya);
                oci_execute($stida);
                $queryb = "SELECT NUME, VARSTA, DENUMIRE FROM ANTRENORI JOIN ECHIPE ON ECHIPE.ANTRENORID = ANTRENORI.ANTRENORID JOIN MECIURI ON MECIURI.ECHIPA2ID = ECHIPE.ECHIPAID JOIN STADIOANE ON MECIURI.STADIONID = STADIOANE.STADIONID WHERE(TIPMECI = 'FINALA' AND (ECHIPA1SCOR > ECHIPA2SCOR) OR (SCOR1PEN > SCOR2PEN))";
                $stidb = oci_parse(oci_connect("System", "g.4367eo", "localhost/XE"), $queryb);
                oci_execute($stidb);
            while(($rowa = oci_fetch_array($stida, OCI_ASSOC))!=false)
            {
                echo "<div class=\"grupa\">";
                echo "<br>";
                    echo "<div class=\"echipa\" style = \"height:100px;\"><br>
                    Antrenorul este <b>$rowa[NUME]</b> in varsta de <b>$rowa[VARSTA]</b> de ani. Stadionul se numeste <b>$rowa[DENUMIRE]</b>.
                    </div>";
                echo "<br>";
                echo "</div>";
            }
            ?>
        </div>
    </body>
</html>