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
        <div class="welcome">
            <b>STERGE MECI<b>
        </div>
        <table class="meniu">
		</table>
        <div class="container">
        <form method = "GET">
            <div class="text">ECHIPA 1</div>
            <input type="text" id = "echipa1" name = "echipa1" value = "">
            <div class="text">ECHIPA 2</div>
            <input type="text" id = "echipa2" name = "echipa2" value = "">
            <div class="text">In ce etapa au jucat?</div>
            <input type="text" id = "tipmeci" name = "tipmeci" value = "">
            <button type="submit" class = "submit" name = "submit">STERGE</button>
        </form>
        <?php
            if($_GET){
                $echipa1 = $_GET['echipa1'];
                $echipa2 = $_GET['echipa2'];
                $tipmeci = $_GET['tipmeci'];
                $t = 0;
                if($tipmeci == 'OPTIMI')
                {
                    $t = 8;
                }
                else if($tipmeci == 'SFERTURI')
                {
                    $t = 4;
                }
                else if($tipmeci == 'SEMIFINALE')
                {
                    $t = 2;
                }
                else if($tipmeci == 'FINALA')
                {
                    $t = 1;
                }

                $q1 = "SELECT * FROM MECIURI
                        WHERE TIPMECI = '".$tipmeci."'";
                $s1 = oci_parse(oci_connect("System", "g.4367eo", "localhost/XE"), $q1);
                oci_execute($s1);
                $q2 = "SELECT ECHIPAID AS ID1
                        FROM ECHIPE
                        WHERE DENUMIRETARA = '".$echipa1."'";
                $s2 = oci_parse(oci_connect("System", "g.4367eo", "localhost/XE"), $q2);
                oci_execute($s2);
                $r2 = oci_fetch_array($s2, OCI_ASSOC);
                $q3 = "SELECT ECHIPAID AS ID2
                        FROM ECHIPE
                        WHERE DENUMIRETARA = '".$echipa2."'";
                $s3 = oci_parse(oci_connect("System", "g.4367eo", "localhost/XE"), $q3);
                oci_execute($s3);
                $r3 = oci_fetch_array($s3, OCI_ASSOC);
                $qq = "SELECT * FROM MECIURIFAVORITE";
                $ss = oci_parse(oci_connect("System", "g.4367eo", "localhost/XE"), $qq);
                oci_execute($ss);
                $i = 0;
                while(($rr = oci_fetch_array($ss, OCI_ASSOC)))
                {
                            if(($rr['ECHIPA1ID'] == $r2['ID1']) && ($rr['ECHIPA2ID'] == $r3['ID2']) && ($rr['TIPMECI'] == $t))
                            {
                                $i = $i+1;
                                    $qf = "DELETE FROM MECIURIFAVORITE WHERE TIPMECI = ".$t." AND ECHIPA1ID = ".$r2['ID1']." AND ECHIPA2ID = ".$r3['ID2']."";
                                    $sf = oci_parse(oci_connect("System", "g.4367eo", "localhost/XE"), $qf);
                                    oci_execute($sf);
                            }
                }
                if($i==0)
                {
                    echo "<script>window.location.href=\"eroaresterge.html\"</script>";
                }
                else if($i!=0)
                {
                    echo "<script>window.location.href=\"successterge.html\"</script>";
                }
            }
        ?>
        </div>
    </body>
</html>