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
            <b>SCHIMBA STADION<b>
        </div>
        <table class="meniu">
		</table>
        <div class="container">
        <form method = "GET">
            <div class="text">Schimba:</div>
            <input type="text" id = "echipa1" name = "d1">
            <div class="text">cu:</div>
            <input type="text" id = "echipa2" name = "d2">
            <button type="submit" class = "submit" name = "submit">SCHIMBA</button>
        </form>
        <?php
            if($_GET)
            {
                $d1 = $_GET['d1'];
                $d2 = $_GET['d2'];
                
                $query1 = "UPDATE STADIOANE SET DENUMIRE = '".$d2."' WHERE DENUMIRE = '".$d1."'";
                $parse1 = oci_parse(oci_connect("System", "g.4367eo", "localhost/XE"), $query1);
                $query2 = "SELECT DENUMIRE FROM STADIOANE";
                $parse2 = oci_parse(oci_connect("System", "g.4367eo", "localhost/XE"), $query2);
                oci_execute($parse2);
                $i = 0;
                $j = 0;
                while(($row = oci_fetch_array($parse2, OCI_ASSOC))!=false)
                {
                    if($row['DENUMIRE']==$d2)
                    {
                        $i = $i+1;
                    }
                    if($row['DENUMIRE']==$d1)
                    {
                        $j = $j+1;
                    }
                }
                if($i==0 && $j==1)
                {
                    oci_execute($parse1);
                    echo "<script>window.location.href=\"successchimbas.html\"</script>";
                }
                else if($i != 0 && $j == 1)
                {
                    echo "<script>window.location.href=\"eroareschimbas1.html\"</script>";
                }
                else if($i == 0 && $j == 0)
                {
                    echo "<script>window.location.href=\"eroareschimbas2.html\"</script>";
                }
                else
                {
                    echo "<script>window.location.href=\"eroareschimbas2.html\"</script>";
                }

            }
        ?>
        </div>
    </body>
</html>