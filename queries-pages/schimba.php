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
            <b>SCHIMBA TARA<b>
        </div>
        <table class="meniu">
		</table>
        <div class="container">
        <form method = "GET">
            <div class="text">Schimba:</div>
            <input type="text" id = "echipa1" name = "tara1">
            <div class="text">cu:</div>
            <input type="text" id = "echipa2" name = "tara2">
            <button type="submit" class = "submit" name = "submit">SCHIMBA</button>
        </form>
        <?php
            if($_GET)
            {
                $tara1 = $_GET['tara1'];
                $tara2 = $_GET['tara2'];
                
                $query1 = "UPDATE ECHIPE SET DENUMIRETARA = '".$tara2."' WHERE DENUMIRETARA = '".$tara1."'";
                $parse1 = oci_parse(oci_connect("System", "g.4367eo", "localhost/XE"), $query1);
                $query2 = "SELECT DENUMIRETARA FROM ECHIPE";
                $parse2 = oci_parse(oci_connect("System", "g.4367eo", "localhost/XE"), $query2);
                oci_execute($parse2);
                $i = 0;
                $j = 0;
                while(($row = oci_fetch_array($parse2, OCI_ASSOC))!=false)
                {
                    if($row['DENUMIRETARA']==$tara2)
                    {
                        $i = $i+1;
                    }
                    if($row['DENUMIRETARA']==$tara1)
                    {
                        $j = $j+1;
                    }
                }
                if($i==0 && $j==1)
                {
                    oci_execute($parse1);
                    echo "<script>window.location.href=\"successchimba.html\"</script>";
                }
                else if($i != 0 && $j == 1)
                {
                    echo "<script>window.location.href=\"eroareschimba1.html\"</script>";
                }
                else if($i == 0 && $j == 0)
                {
                    echo "<script>window.location.href=\"eroareschimba2.html\"</script>";
                }
                else
                {
                    echo "<script>window.location.href=\"eroareschimba2.html\"</script>";
                }

            }
        ?>
        </div>
    </body>
</html>