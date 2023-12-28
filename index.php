<!DOCTYPE html>
<html>
<head>
    <title>Diagnosa Penyakit Bipolar</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>

    <header> 
        <img src="logoplp.png" alt="Logo Brand Anda" width="90px">
        <p>Mental Health Palopo</p>     
    </header>

    <main>
        <h1>Tes Bipolar</h1>
        <p>Gangguan bipolar atau juga dikenal dengan sebutan bipolar disorder adalah kondisi mental yang menyebabkan terjadinya perubahan mood yang ekstrem pada seseorang. <br>Kondisi ini membuat orang dengan gangguan bipolar memiliki mood yang sangat bahagia dan sangat sedih yang fluktuatif.</p>
        <form action="diagnosa.php" method="post">
            
            <?php
            
            // Sambungkan ke database MySQL
            $koneksi = mysqli_connect("localhost", "root", "", "penyakitbipolar");

            if (!$koneksi) {
                die("Koneksi gagal: " . mysqli_connect_error());
            }

            // Ambil pertanyaan dari database
            $sql_gejala = "SELECT id_gejala, nama_gejala FROM gejala";
            $result_gejala = mysqli_query($koneksi, $sql_gejala);

            if (mysqli_num_rows($result_gejala) > 0) {
                while ($row = mysqli_fetch_assoc($result_gejala)) {
                    echo "<h4>Apakah Anda " . $row['nama_gejala'] . "?</h4>";
                    echo "<label><input type='radio' name='gejala_" . $row['id_gejala'] . "' value='Ya'> Ya</label> ";
                    echo "<label><input type='radio' name='gejala_" . $row['id_gejala'] . "' value='Tidak'> Tidak</label><br>";
                }
            }

            // Tutup koneksi ke database
            mysqli_close($koneksi);
            ?>
            <br>
            <input type="submit" value="Submit">
            <br>
            </form>
            <p>Harap diperhatikan: Pemeriksaan ini tidak dapat menggantikan penilaian menyeluruh dan juga tidak boleh digunakan untuk mendiagnosis diri sendiri atau memutuskan rencana pengobatan. Alat skrining online bukanlah instrumen diagnostik. Anda dianjurkan untuk membagikan hasil Anda dengan dokter atau penyedia layanan kesehatan. </p>
        
    </main>

    <footer>
        <p>Kontak Helpdesk:</p>
        <ul>
            <li><a href="mailto:helpdesk@example.com">Email Helpdesk</a></li>
            <li><a href="https://wa.me/123456789">WhatsApp Helpdesk</a></li>
            <li><a href="https://www.facebook.com/helpdesk">Facebook Helpdesk</a></li>
            <li><a href="https://twitter.com/helpdesk">Twitter Helpdesk</a></li>
            <li><a href="https://www.instagram.com/helpdesk">Instagram Helpdesk</a></li>
            <li><a href="https://www.linkedin.com/company/helpdesk">LinkedIn Helpdesk</a></li>
        </ul>
        <p>&copy; Hak Cipta 2023 | Mental Health Palopo | Jl. Sungai Larona No.09, Ussu, Kec. Wara Utara, Kota Palopo, Sulawesi Selatan 91913</p>
    </footer>
</body>
</html>
