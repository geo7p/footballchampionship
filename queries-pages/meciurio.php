<html>
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
        <title>MECIURI</title>
        <link rel="stylesheet" href="style/meciuri.css">
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
				<td> <a class="buttonClicked" href="meciurio.php"> MECIURI </td>
                <td> <a class="button" href="stadioane.php"> STADIOANE </td>
                <td> <a class="button" href="meciurifavorite.php"> MECIURI FAVORITE </td>
                <td> <a class="button" href="interogari1.php"> INTEROGARI </td>
			</tr>
		</table>
        <div class="welcome">
            <b>OPTIMI<b>
        </div>
        <table class="meniu">
			<tr>
				<td> <a class="buttonClicked" href="meciurio.php"> OPTIMI </td>
				<td> <a class="button" href="meciuris.php"> SFERTURI </td>
                <td> <a class="button" href="meciurisf.php"> SEMIFINALE </td>
                <td> <a class="button" href="meciurifm.php"> FINALA MICA </td>
                <td> <a class="button" href="meciurif.php"> FINALA </td>
			</tr>
		</table>
        <div class="container">
        <?php
            $querya = "SELECT MECIURI.MECIID, MECIURI.STADIONID, MECIURI.ECHIPA1ID, MECIURI.ECHIPA2ID, MECIURI.TIPMECI, MECIURI.ECHIPA1SCOR, MECIURI.ECHIPA2SCOR, MECIURI.DATAMECI, STADIOANE.DENUMIRE, MECIURI.SCOR1PEN, MECIURI.SCOR2PEN
                        FROM MECIURI
                        JOIN STADIOANE ON STADIOANE.STADIONID = MECIURI.STADIONID
                        WHERE TIPMECI = 'OPTIMI'
                        ORDER BY MECIID ASC";
            $queryb = 'SELECT ECHIPE.DENUMIRETARA AS DENUMIRE1
                        FROM ECHIPE
                        JOIN MECIURI ON ECHIPE.ECHIPAID = MECIURI.ECHIPA1ID
                        ORDER BY MECIID';
            $queryc = 'SELECT ECHIPE.DENUMIRETARA AS DENUMIRE2
                        FROM ECHIPE
                        JOIN MECIURI ON ECHIPE.ECHIPAID = MECIURI.ECHIPA2ID
                        ORDER BY MECIID';
            $stida = oci_parse(oci_connect("System", "g.4367eo", "localhost/XE"), $querya);
            $stidb = oci_parse(oci_connect("System", "g.4367eo", "localhost/XE"), $queryb);
            $stidc = oci_parse(oci_connect("System", "g.4367eo", "localhost/XE"), $queryc);
            oci_execute($stida);
            oci_execute($stidb);
            oci_execute($stidc);
            while(($rowa = oci_fetch_array($stida, OCI_ASSOC))!=false && ($rowb = oci_fetch_array($stidb, OCI_ASSOC))!=false && ($rowc = oci_fetch_array($stidc, OCI_ASSOC))!=false)
            {
                echo "<div class=\"grupa\">";
                echo "<br>";
                    echo "<div class=\"meci\">
                    <div class=\"echipa1\">
                        <div class=\"steag1\">
                            <img class=\"flag1\", src='../flags/".$rowb['DENUMIRE1'].".png', width=100px, height=65px, style=\"float:left; border:2px solid white; border-radius:20px;\">
                            <div class=\"scor1\">
                                $rowa[ECHIPA1SCOR]";if($rowa['SCOR1PEN']!=-1){echo"($rowa[SCOR1PEN])";}echo"
                            </div>
                        </div>
                        <div class=\"denumiretara1\">
                            $rowb[DENUMIRE1]
                        </div>
                    </div>
                    <div class=\"echipa2\">
                        <div class=\"steag2\">
                            <img class=\"flag2\", src='flags/".$rowc['DENUMIRE2'].".png', width=100px, height=65px, style=\"float:right; border:2px solid white; border-radius:20px;\">
                            <div class=\"scor2\">
                                $rowa[ECHIPA2SCOR]";if($rowa['SCOR2PEN']!=-1){echo"($rowa[SCOR2PEN])";}echo"
                            </div>
                        </div>
                        
                        <div class=\"denumiretara2\">
                            $rowc[DENUMIRE2]
                        </div>
                    </div>
                    <div class=\"stadion\">
                            Stadion: $rowa[DENUMIRE]
                    </div>
                    <div class=\"data\">
                            Data meciului: $rowa[DATAMECI]
                    </div>
                    </div>
                    <br>";
            }
            ?>
        </div>
    </body>
</html>