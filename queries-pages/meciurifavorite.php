<html>
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
        <title>MECIURI</title>
        <link rel="stylesheet" href="style/meciurifavorite.css">
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
                <td> <a class="buttonClicked" href="meciurifavorite.php"> MECIURI FAVORITE </td>
                <td> <a class="button" href="interogari1.php"> INTEROGARI </td>
			</tr>
		</table>
        <div class="welcome">
            <b>MECIURI FAVORITE<b>
        </div>
        <table class="meniu">
            <tr>
				<td> <a class="button" href="adauga.php"> ADAUGA MECI </td>
				<td> <a class="button" href="sterge.php"> STERGE MECI </td>
			</tr>
		</table>
        <div class="container">
        <?php
            $querya = "SELECT STADIOANE.DENUMIRE, MECIURIFAVORITE.MECIID, MECIURIFAVORITE.ECHIPA1ID, MECIURIFAVORITE.ECHIPA2ID, MECIURIFAVORITE.ECHIPA1SCOR, MECIURIFAVORITE.ECHIPA2SCOR, MECIURIFAVORITE.SCOR1PEN, MECIURIFAVORITE.SCOR2PEN, MECIURIFAVORITE.TIPMECI AS T
                        FROM MECIURIFAVORITE
                        JOIN STADIOANE ON MECIURIFAVORITE.STADIONID = STADIOANE.STADIONID
                        ORDER BY MECIID";
            $parsea = oci_parse(oci_connect("System", "g.4367eo", "localhost/XE"), $querya);
            oci_execute($parsea);
            $queryb = "SELECT ECHIPE.DENUMIRETARA AS DENUMIRE1
                        FROM ECHIPE
                        JOIN MECIURIFAVORITE ON ECHIPE.ECHIPAID = MECIURIFAVORITE.ECHIPA1ID";
            $parseb = oci_parse(oci_connect("System", "g.4367eo", "localhost/XE"), $queryb);
            oci_execute($parseb);
            $queryc = "SELECT ECHIPE.DENUMIRETARA AS DENUMIRE2
                        FROM ECHIPE
                        JOIN MECIURIFAVORITE ON ECHIPE.ECHIPAID = MECIURIFAVORITE.ECHIPA2ID";
            $parsec = oci_parse(oci_connect("System", "g.4367eo", "localhost/XE"), $queryc);
            oci_execute($parsec);
            $i = 0;
                 while(($rowa = oci_fetch_array($parsea, OCI_ASSOC))!=false && ($rowb = oci_fetch_array($parseb, OCI_ASSOC))!=false && ($rowc = oci_fetch_array($parsec, OCI_ASSOC))!=false)
                {
                        $i = $i+1;
                        echo "<div class=\"grupa\">";
                        echo "<br>";
                            echo "<div class=\"meci\">
                            <div class=\"echipa1\">
                                <div class=\"steag1\">
                                    <img class=\"flag1\", src='flags/".$rowb['DENUMIRE1'].".png', width=100px, height=65px, style=\"float:left; border:2px solid white; border-radius:20px;\">
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
                                    Jucat in:";if($rowa['T']==8){echo" OPTIMI";}else if($rowa['T']==4){echo" SFERTURI";}else if($rowa['T']==2){echo" SEMIFINALE";}else if($rowa['T']==1){echo" FINALA";}echo"
                            </div>
                            </div>
                            <br>";
                }
                if($i==0)
                {
                    echo "<div class=\"welcome\" style=\"font-weight:normal; width:1200px; font-size:40px; margin-top:100px;\">Nu exista meciuri favorite momentan.</div>";
                }

        ?>
        </div>
    </body>
</html>