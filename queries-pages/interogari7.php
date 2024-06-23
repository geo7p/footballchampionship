<html>
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
        <title>MECIURI</title>
        <link rel="stylesheet" href="style/interogari.css">
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
                <td> <a class="buttonClicked" href="interogari1.php"> INTEROGARI </td>
			</tr>
		</table>
        <div class="welcome">
            <b>INTEROGARI<b>
        </div>
        <div class="container">
        <table class="meniu" style = "margin-top:10px; margin-bottom:10px;">
			<tr>
                <td> <a class="button" href="interogari6.php"> << </td>
				<td> <a class="button" href="interogari8.php"> >> </td>
			</tr>
		</table>
        <div class="enunt">
            7. Meciurile din optimi care s-au jucat pe un stadion care are capacitatea mai mare de 70000 de locuri:
        </div>
        <?php
            $qp11 = "SELECT DENUMIRETARA AS DENUMIRE1 FROM MECIURI JOIN ECHIPE ON ECHIPE.ECHIPAID = MECIURI.ECHIPA1ID JOIN STADIOANE ON MECIURI.STADIONID = STADIOANE.STADIONID WHERE TIPMECI = 'OPTIMI' AND DENUMIRE IN (SELECT DENUMIRE FROM STADIOANE WHERE CAPACITATE > 70000) ORDER BY MECIID ASC";
            $sp11 = oci_parse(oci_connect("System", "g.4367eo", "localhost/XE"), $qp11);
            oci_execute($sp11);
            $qp12 = "SELECT DENUMIRETARA AS DENUMIRE2 FROM MECIURI JOIN ECHIPE ON ECHIPE.ECHIPAID = MECIURI.ECHIPA2ID JOIN STADIOANE ON MECIURI.STADIONID = STADIOANE.STADIONID WHERE TIPMECI = 'OPTIMI' AND DENUMIRE IN (SELECT DENUMIRE FROM STADIOANE WHERE CAPACITATE > 70000) ORDER BY MECIID ASC";
            $sp12 = oci_parse(oci_connect("System", "g.4367eo", "localhost/XE"), $qp12);
            oci_execute($sp12);
            $query1 = "SELECT ECHIPA1ID, ECHIPA2ID, DENUMIRE, ECHIPA1SCOR, ECHIPA2SCOR, SCOR1PEN, SCOR2PEN, DATAMECI, TIPMECI
                        FROM MECIURI
                        JOIN STADIOANE ON MECIURI.STADIONID = STADIOANE.STADIONID
                        WHERE TIPMECI = 'OPTIMI'
                        AND DENUMIRE = (SELECT DENUMIRE FROM STADIOANE WHERE CAPACITATE > 70000)
                        ORDER BY MECIID ASC";
            $stid1 = oci_parse(oci_connect("System", "g.4367eo", "localhost/XE"), $query1);
            oci_execute($stid1);
            while(($row1 = oci_fetch_array($stid1, OCI_ASSOC))!=false && ($rp11 = oci_fetch_array($sp11, OCI_ASSOC))!=false && ($rp12 = oci_fetch_array($sp12, OCI_ASSOC))!=false)
            {
                echo "<div class=\"grupa\">";
                echo "<br>";
                    echo "<div class=\"meci\">
                    <div class=\"echipa1\">
                        <div class=\"steag1\">
                            <img class=\"flag1\", src='flags/".$rp11['DENUMIRE1'].".png', width=100px, height=65px, style=\"float:left; border:2px solid white; border-radius:20px;\">
                            <div class=\"scor1\">
                                $row1[ECHIPA1SCOR]";if($row1['SCOR1PEN']!=-1){echo"($row1[SCOR1PEN])";}echo"
                            </div>
                        </div>
                        <div class=\"denumiretara1\">
                            $rp11[DENUMIRE1]
                        </div>
                    </div>
                    <div class=\"echipa2\">
                        <div class=\"steag2\">
                            <img class=\"flag2\", src='flags/".$rp12['DENUMIRE2'].".png', width=100px, height=65px, style=\"float:right; border:2px solid white; border-radius:20px;\">
                            <div class=\"scor2\">
                                $row1[ECHIPA2SCOR]";if($row1['SCOR2PEN']!=-1){echo"($row1[SCOR2PEN])";}echo"
                            </div>
                        </div>
                        
                        <div class=\"denumiretara2\">
                            $rp12[DENUMIRE2]
                        </div>
                    </div>
                    <div class=\"stadion\">
                            Stadion: $row1[DENUMIRE]
                    </div>
                    <div class=\"data\">
                            Data meciului: $row1[DATAMECI]
                    </div>
                    <div class=\"data\">
                            Jucat in: $row1[TIPMECI]
                    </div>
                    </div>
                    <br>";
            }
            ?>
        </div>
    </body>
</html>