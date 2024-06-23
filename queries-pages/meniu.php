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
				<td> <a class="buttonClicked" href="meniu.php"> HOME </td>
				<td> <a class="button" href="meciurio.php"> MECIURI </td>
                <td> <a class="button" href="stadioane.php"> STADIOANE </td>
                <td> <a class="button" href="meciurifavorite.php"> MECIURI FAVORITE </td>
                <td> <a class="button" href="interogari1.php"> INTEROGARI </td>
			</tr>
		</table>
        <div class="welcome">
            Welcome to <b>WorldCup 2022!<b>
        </div>
        <div class="container">
        <table class="meniu">
			<tr>
				<td> <a class="button" href="schimba.php"> SCHIMBA O TARA </td>
			</tr>
		</table>
            <?php
            $querya = 'SELECT DENUMIRE FROM GRUPE';
            $queryb = 'SELECT DENUMIRETARA, CELMAIBUNREZULTAT FROM ECHIPE';
            $stida = oci_parse(oci_connect("System", "g.4367eo", "localhost/XE"), $querya);
            $stidb = oci_parse(oci_connect("System", "g.4367eo", "localhost/XE"), $queryb);
            oci_execute($stida);
            oci_execute($stidb);
            while(($rowa = oci_fetch_array($stida, OCI_ASSOC))!=false)
            {
                echo "<div class=\"grupa\">";
                echo "<div class=\"DenumireGrupa\">GRUPA $rowa[DENUMIRE]</div>";
                echo "<br>";
                $i=0;
                while(($i<=3) && ($rowb = oci_fetch_array($stidb, OCI_ASSOC))!=false)
                {
                    $i = $i + 1;
                    echo "<div class=\"echipa\">
                    <div class=\"steag\">
                    <img class=\"flag\", src='../flags/".$rowb['DENUMIRETARA'].".png', width=100px, height=65px, style=\"margin-left:125px; margin-right:20px; border:2px solid white; border-radius:20px;\">
                    </div>
                    <div class=\"info\">
                    <div class=\"nume\">$rowb[DENUMIRETARA]</div>
                    <div class=\"rez\">A jucat pana in <b>$rowb[CELMAIBUNREZULTAT]</b></div>
                    </div>
                    </div>";
                }
                echo "<br>";
                echo "</div>";
            }
            ?>
        </div>
    </body>
</html>