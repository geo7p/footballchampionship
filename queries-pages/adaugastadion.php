<html>
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
        <title>MECIURI</title>
        <link rel="stylesheet" href="style/action.css">
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
                <td> <a class="button" href="interogari1.php"> INTEROGARI </td>
			</tr>
		</table>
        <div class="welcome" style = "width:700px;">
            <b>ADAUGA STADION<b>
        </div>
        <table class="meniu">
		</table>
        <div class="container">
        <form method = "GET">
            <div class="text">NUME STADION</div>
            <input type="text" id = "echipa1" name = "nume" value = "">
            <div class="text">CAPACITATE</div>
            <input type="text" id = "echipa2" name = "capacitate" value = "">
            <button type="submit" class = "submit" name = "submit">ADAUGA</button>
        </form>
        <?php
            if($_GET){
                $nume = $_GET['nume'];
                $capacitate = $_GET['capacitate'];

                $q = "SELECT * FROM STADIOANE";
                $s = oci_parse(oci_connect("System", "g.4367eo", "localhost/XE"), $q);
                oci_execute($s);
                $i = 310;
                $j=0;
                $k=0;
                while(($rtest = oci_fetch_array($s, OCI_ASSOC)))
                {
                    $i = $i+1;
                    $qqq = "UPDATE STADIOANE SET STADIONID = $i";
                    $sss = oci_parse(oci_connect("System", "g.4367eo", "localhost/XE"), $qqq);
                    oci_execute($sss);
                    if($rtest['DENUMIRE'] == $nume || $rtest['CAPACITATE'] == $capacitate)
                    {
                        $k = $k+1;
                    }
                }
                        if($i == 0)
                        {
                            echo "<script>window.location.href=\"eroareadaugas.html\"</script>";
                        }
                        else
                        {
                            if($k == 0)
                            {
                                $qf = "INSERT INTO STADIOANE(STADIONID, DENUMIRE, CAPACITATE) VALUES($i+1, '".$nume."', $capacitate)";
                                $sf = oci_parse(oci_connect("System", "g.4367eo", "localhost/XE"), $qf);
                                oci_execute($sf);
                                echo "<script>window.location.href=\"succesadaugas.html\"</script>";
                            }
                            else
                            {
                                echo "<script>window.location.href=\"eroareadaugas.html\"</script>";
                            }
                        }
                $i=0;
                while(($rtest = oci_fetch_array($s, OCI_ASSOC)))
                {
                    $i = $i+1;
                    $qqq = "UPDATE STADIOANE SET STADIONID = $i";
                    $sss = oci_parse(oci_connect("System", "g.4367eo", "localhost/XE"), $qqq);
                    oci_execute($sss);
                }
            }
        ?>
        </div>
    </body>
</html>