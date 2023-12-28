<!DOCTYPE html>
<html>
<head>
    <title>Hasil Diagnosa</title>
    <link rel="stylesheet" type="text/css" href="styles.css">


</head>
<body>
    
    <?php
        // Aturan untuk menentukan penyakit
        $penyakit = "";
        // Mengecek apakah semua gejala terpilih adalah "Ya"
        $semua_ya = true;

        foreach ($_POST as $key => $value) {
            if (strpos($key, 'gejala_') === 0 && $value != 'Ya') {
                $semua_ya = false;
                break; // Hentikan pengecekan jika ada yang tidak "Ya"
            }
        }

        if ($semua_ya) {
            $id_penyakit = 1; // ID penyakit untuk "Positif Bipolar"
        } else {
            $id_penyakit = 2; // ID penyakit untuk "Negatif Bipolar"
        }

        // Sambungkan ke database MySQL
        $koneksi = mysqli_connect("localhost", "root", "", "penyakitbipolar");
        if (!$koneksi) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }

        // Query SQL untuk mendapatkan saran berdasarkan penyakit
        $sql = "SELECT penyakit.nama_penyakit, saran.keterangan_saran
        FROM saran
        INNER JOIN penyakit ON saran.id_penyakit = penyakit.id_penyakit
        WHERE penyakit.id_penyakit = $id_penyakit";

        $result = mysqli_query($koneksi, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $penyakit = $row['nama_penyakit'];
            $saran = $row['keterangan_saran'];
            echo "<h3>Hasil Anda - Tes Bipolar</h3><h1>" . $penyakit . "</h1>";
            echo "<h4>Saran: " . $saran . "</h4>";
            // Selipkan kalimat di bawah saran
            echo "<p>Berbicara dengan ahlinya akan membantu Anda memahami pilihan Anda dan menentukan tindakan yang paling tepat. Tim penasihat klinis kami semuanya adalah profesional terlatih yang dapat membantu mengidentifikasi apakah ada masalah yang dapat kami bantu. Kami dapat mengatur penilaian psikiatris dan sesi terapi pribadi, baik secara langsung atau di salah satu klinik kami.</p>";
        } else {
            echo "Tidak ada saran yang tersedia untuk penyakit ini.";
        }

        // Tutup koneksi ke database
        mysqli_close($koneksi);
    ?>

    <?php
    // Tambahkan tautan ke berbagai platform media sosial
    echo "<p>Bantuan dan Dukungan:</p>";
    echo "<ul>";
    echo "<li><a href='mailto:youremail@example.com'>Email Helpdesk</a></li>";
    echo "<li><a href='https://wa.me/123456789'>WhatsApp Helpdesk</a></li>";
    echo "<li><a href='https://www.facebook.com/helpdesk'>Facebook Helpdesk</a></li>";
    echo "<li><a href='https://twitter.com/helpdesk'>Twitter Helpdesk</a></li>";
    echo "<li><a href='https://www.instagram.com/helpdesk'>Instagram Helpdesk</a></li>";
    echo "<li><a href='https://www.linkedin.com/company/helpdesk'>LinkedIn Helpdesk</a></li>";
    echo "</ul>";    

    // Tampilkan informasi hak cipta
    echo "<p>&copy; Hak Cipta 2023 | Mental Health Palopo | Jl. Sungai Larona No.09, Ussu, Kec. Wara Utara, Kota Palopo, Sulawesi Selatan 91913.</p>";
    ?>
</body>
</html>
