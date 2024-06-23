<html>
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
        <title>MECIURI</title>
        <link rel="stylesheet" href="style/stadioane.css">
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
                <td> <a class="buttonClicked" href="stadioane.php"> STADIOANE </td>
                <td> <a class="button" href="meciurifavorite.php"> MECIURI FAVORITE </td>
                <td> <a class="button" href="interogari1.php"> INTEROGARI </td>
			</tr>
		</table>
        <div class="welcome">
            <b>STADIOANE<b>
        </div>
        <table class="meniu">
			<tr>
				<td> <a class="button" href="schimbastadion.php"> UPDATE STADION </td>
                <td> <a class="button" href="adaugastadion.php"> ADAUGA STADION </td>
                <td> <a class="button" href="stergestadion.php"> STERGE STADION </td>
			</tr>
		</table>
        <div class="container">
        <?php
            $querya = "SELECT DENUMIRE, CAPACITATE from STADIOANE ORDER BY STADIONID ASC";
            $stida = oci_parse(oci_connect("System", "g.4367eo", "localhost/XE"), $querya);
            oci_execute($stida);
            while(($rowa = oci_fetch_array($stida, OCI_ASSOC))!=false)
            {
                echo "<div class=\"stadion\">";
                echo "
                    <div class=\"stadionimg\">
                        <img class=\"stdimg\", src='../stadioane/".$rowa['DENUMIRE'].".jpg', width=500px, height=350px, style=\"border:2px solid white; border-radius:100px;\">
                    </div>
                    <div class=\"denumire\">
                        $rowa[DENUMIRE]
                    </div>
                    
                    
                    <div class=\"capacitate\">
                            Capacitate: $rowa[CAPACITATE]
                    </div>
                    <br>";
            }
            ?>
        </div>
    </body>
</html>