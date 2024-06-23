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
                <td> <a class="button" href="interogari2.php"> << </td>
				<td> <a class="button" href="interogari4.php"> >> </td>
			</tr>
		</table>
        <div class="enunt">
            3. Meciul in care echipa cu antrenorul Gareth Southgate a pierdut:
        </div>
        <?php
            $qp11 = "SELECT DENUMIRETARA AS DENUMIRE1 FROM ECHIPE JOIN MECIURI ON ECHIPE.ECHIPAID = MECIURI.ECHIPA2ID JOIN ANTRENORI ON ECHIPE.ANTRENORID = ANTRENORI.ANTRENORID WHERE (ECHIPA1ID = (SELECT ECHIPAID FROM ECHIPE JOIN ANTRENORI ON ECHIPE.ANTRENORID = ANTRENORI.ANTRENORID JOIN MECIURI ON MECIURI.ECHIPA1ID = ECHIPE.ECHIPAID WHERE NUME = 'Gareth Southgate' AND ECHIPA1SCOR < ECHIPA2SCOR) AND ECHIPA1SCOR < ECHIPA2SCOR) ORDER BY MECIID ASC";
            $sp11 = oci_parse(oci_connect("System", "g.4367eo", "localhost/XE"), $qp11);
            oci_execute($sp11);
            $qp12 = "SELECT DENUMIRETARA AS DENUMIRE2 FROM ECHIPE JOIN MECIURI ON ECHIPE.ECHIPAID = MECIURI.ECHIPA1ID JOIN ANTRENORI ON ECHIPE.ANTRENORID = ANTRENORI.ANTRENORID WHERE (ECHIPA2ID = (SELECT ECHIPAID FROM ECHIPE JOIN ANTRENORI ON ECHIPE.ANTRENORID = ANTRENORI.ANTRENORID JOIN MECIURI ON MECIURI.ECHIPA2ID = ECHIPE.ECHIPAID WHERE NUME = 'Gareth Southgate' AND ECHIPA2SCOR < ECHIPA1SCOR) AND ECHIPA2SCOR < ECHIPA1SCOR) ORDER BY MECIID ASC";
            $sp12 = oci_parse(oci_connect("System", "g.4367eo", "localhost/XE"), $qp12);
            oci_execute($sp12);
            $qp13 = "SELECT DENUMIRETARA AS ORIGINAL FROM ECHIPE JOIN MECIURI ON ECHIPE.ECHIPAID = MECIURI.ECHIPA1ID JOIN ANTRENORI ON ECHIPE.ANTRENORID = ANTRENORI.ANTRENORID WHERE (NUME = 'Gareth Southgate' AND ECHIPA1SCOR < ECHIPA2SCOR)";
            $sp13 = oci_parse(oci_connect("System", "g.4367eo", "localhost/XE"), $qp13);
            oci_execute($sp13);
            $r13 = oci_fetch_array($sp13, OCI_ASSOC);
            $query1 = "SELECT ECHIPA1SCOR, ECHIPA2SCOR, SCOR1PEN, SCOR2PEN, DATAMECI, TIPMECI, DENUMIRE FROM MECIURI JOIN STADIOANE ON MECIURI.STADIONID = STADIOANE.STADIONID JOIN ECHIPE ON MECIURI.ECHIPA1ID = ECHIPE.ECHIPAID JOIN ANTRENORI ON ECHIPE.ANTRENORID = ANTRENORI.ANTRENORID WHERE (NUME = 'Gareth Southgate' AND ECHIPA1SCOR < ECHIPA2SCOR) ORDER BY MECIID ASC";
            $parse1 = oci_parse(oci_connect("System", "g.4367eo", "localhost/XE"), $query1);
            oci_execute($parse1);
            $query2 = "SELECT * FROM MECIURI JOIN ECHIPE ON MECIURI.ECHIPA2ID = ECHIPE.ECHIPAID JOIN ANTRENORI ON ECHIPE.ANTRENORID = ANTRENORI.ANTRENORID WHERE (NUME = 'Gareth Southgate' AND ECHIPA1SCOR > ECHIPA2SCOR) ORDER BY MECIID ASC";
            $parse2 = oci_parse(oci_connect("System", "g.4367eo", "localhost/XE"), $query2);
            oci_execute($parse2);
            
            while(($row1 = oci_fetch_array($parse1, OCI_ASSOC))!=false && ($rp11 = oci_fetch_array($sp11, OCI_ASSOC))!=false)
            {
                echo "<div class=\"grupa\">";
                echo "<br>";
                    echo "<div class=\"meci\">
                    <div class=\"echipa1\">
                        <div class=\"steag1\">
                            <img class=\"flag1\", src='flags/".$r13['ORIGINAL'].".png', width=100px, height=65px, style=\"float:left; border:2px solid white; border-radius:20px;\">
                            <div class=\"scor1\">
                                $row1[ECHIPA1SCOR]";if($row1['SCOR1PEN']!=-1){echo"($row1[SCOR1PEN])";}echo"
                            </div>
                        </div>
                        <div class=\"denumiretara1\">
                            $r13[ORIGINAL]
                        </div>
                    </div>
                    <div class=\"echipa2\">
                        <div class=\"steag2\">
                            <img class=\"flag2\", src='flags/".$rp11['DENUMIRE1'].".png', width=100px, height=65px, style=\"float:right; border:2px solid white; border-radius:20px;\">
                            <div class=\"scor2\">
                                $row1[ECHIPA2SCOR]";if($row1['SCOR2PEN']!=-1){echo"($row1[SCOR2PEN])";}echo"
                            </div>
                        </div>
                        
                        <div class=\"denumiretara2\">
                            $rp11[DENUMIRE1]
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