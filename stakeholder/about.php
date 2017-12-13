<?php 
include_once('includes/_header.php');
include_once('includes/_top.php');
?>

        <div id="container" class="row-fluid">
            <?php 
            include_once('includes/_sidebar.php');
            ?>
            <!--BEGIN CONTENT-->
            <div id="main-content">
                <div class="container-fluid">
                    <div class="row-fluid">
                        <div class="span12">
                            <h3 class="page-title">
                                About Us
                            </h3>
                            <ul class="breadcrumb">
                                <li>
                                    <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                                </li>
                                <li>
                                    <a href="#">Microhydro Monitoring </a> <span class="divider">&nbsp;</span>
                                </li>
                                <li><a href="#">About Us</a><span class="divider-last">&nbsp;</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-user"></i>About Us</h4>
                                    <span class="tools">
                                        <a href="javascript:;" class="icon-chevron-down"></a>
                                        <a href="javascript:;" class="icon-remove"></a>
                                    </span>                    
                                </div>
                                <div class="widget-body">
                                    <div class="about-us">
                                        <h3>MONITORING POWER METER PADA PEMBANGKIT LISTRIK TENAGA MIKRO HIDRO DAN PEMBANGKIT LISTRIK TENAGA SURYA MENGGUNAKAN ARDUINO ETHERNET SHIELD DAN CLOUD SERVICE</h3>
                                            <p class="blockquote">Allah (Pemberi) cahaya (kepada) langit dan bumi. Perumpamaan cahaya-Nya adalah seperti sebuah lubang yang tak tembus, yang di dalamnya ada pelita besar. Pelita itu di dalam kaca (dan) kaca itu seakan-akan bintang (yang bercahaya) seperti mutiara, yang dinyalakan dengan minyak dari pohon yang banyak berkahnya, (yaitu) pohon zaitun yang tumbuh tidak di sebelah timur (sesuatu) dan tidak pula di sebelah barat(nya), yang minyaknya (saja) hampir-hampir menerangi, walaupun tidak disentuh api. Cahaya di atas cahaya (berlapis-lapis), Allah membimbing kepada cahaya-Nya siapa yang Dia kehendaki, dan Allah memperbuat perumpamaan-perumpamaan bagi manusia, dan Allah Maha mengetahui segala sesuatu. (QS. An-Nur:35) (Prinsip Dasar Listrik).</p>
                                        <div class="row-fluid">
                                            <div class="span6">
                                                <h4>Apakah PLTMH dan PLTS itu ?</h4>
                                                <p>Mikrohidro atau yang dimaksud dengan Pembangkit Listrik Tenaga Mikrohidro (PLTMH), adalah suatu pembangkit listrik skala kecil yang menggunakan tenaga air sebagai tenaga penggeraknya seperti, saluran irigasi, sungai atau air terjun alam dengan cara memanfaatkan tinggi terjunan (head) dan jumlah debit air.</p>
                                                <p>Mikrohidro merupakan sebuah istilah yang terdiri dari kata mikro yang berarti kecil dan hidro yang berarti air.[butuh rujukan] Secara teknis, mikrohidro memiliki tiga komponen utama yaitu air (sebagai sumber energi), turbin dan generator. Mikrohidro mendapatkan energi dari aliran air yang memiliki perbedaan ketinggian tertentu.[butuh rujukan] Pada dasarnya, mikrohidro memanfaatkan energi potensial jatuhan air (head).</p>
                                                <p>Pembangkit listrik tenaga surya adalah pembangkit listrik yang mengubah energi surya menjadi energi listrik. Pembangkitan listrik bisa dilakukan dengan dua cara, yaitu secara langsung menggunakan photovoltaic dan secara tidak langsung dengan pemusatan energi surya. Photovoltaic mengubah secara langsung energi cahaya menjadi listrik menggunakan efek fotoelektrik. Pemusatan energi surya menggunakan sistem lensa atau cermin dikombinasikan dengan sistem pelacak untuk memfokuskan energi matahari ke satu titik untuk menggerakan mesin kalor.</p>
                                            </div>
                                            <div class="span6">
                                                <h4>Mengapa diperlukan sistem Monitoring ?</h4>
                                                <p>Kebutuhan tenaga listrik di Indonesia tumbuh rata-rata sebesar 8,4% per tahun. Hal ini untuk mendukung pertumbuhan ekonomi nasional yang rata-rata 6% per tahun. Untuk memenuhi kebutuhan tersebut, setiap tahun dibutuhkan tambahan pasokan listrik sekitar 5.700 Mega Watt (MW). Hingga 2022 dibutuhkan tambahan pasokan listrik 60 Giga Watt (GW), jaringan transmisi 58 ribu kilo meter sirkit (kms), dan gardu induk 134 ribu Mega Volt Ampere (MVA). </p>
                                                <p>Dengan banyaknya kebutuhan listrik nasional kita yang belum terpenuhi yang disebabkan oleh minimnya infrastruktur pembangkit dan kerusakan yang ada di setiap pembangkit listrik, maka penulis menciptakan sebuah sistem monitoring yang bisa memberikan notifikasi kepada pihak teknisi untuk mengetahui performa dari sebuah pembangkit listrik. Performa dari sebuah pembangkit listrik sangat mempengaruhi produksi listrik yang dihasilkan.</p>
                                                <p>Pada penelitian ini penulis memanfaatkan konsep Internet of Things, konsep tersebut merupakan sebuah konsep yang bertujuan untuk memperluas manfaat dari konektivitas internet yang tersambung  secara  terus-menerus.  Adapun  kemampuan  seperti  berbagi  data,  remote control, dan sebagainya, termasuk juga pada benda di dunia nyata yang semuanya tersambung ke jaringan lokal dan global melalui sensor yang tertanam dan selalu aktif.</p>
                                            </div>
                                        </div>
                                        <div class="space20"></div>
                                        <div class="row-fluid">
                                            <div class="span6">
                                                <h4>Tujuan dan Manfaat</h4>
                                                <h5><strong>Monitoring Produksi Listrik</strong></h5>
                                                <p>Ada beberapa variabel yang akan dimonitoring untuk mengetahui berapa kapasitas listrik yang dihasilkan yaitu Arus, Daya, dan Tegangan. Ketiga data tersebut akan digunakan sebagai analisa produksi listrik.</p>
                                                <h5><strong>Monitoring Penggunaan Listrik</strong></h5>
                                                <p>Ada beberapa variabel yang akan dimonitoring untuk mengetahui berapa kapasitas listrik yang digunakan yaitu Daya, Powerfaktor, dan Daya Reaktif. Ketiga data tersebut akan digunakan sebagai analisa penggunaan listrik.</p>
                                                <h5><strong>Manajemen Pembangkit Listrik</strong></h5>
                                                <p>Dengan adanya sistem monitoring ini, pihak teknisi bisa lebih mudah untuk mencatat atau mengumpulkan data untuk proses maintanance dan manajemen pembangkit listrik.</p>
                                                <h5><strong>Data Analisis</strong></h5>
                                                <p>Analisa data digunakan untuk mengetahui berapa besar listrik yang dihasilkan oleh pembangkit dan yang dikonsumsi oleh masyarakat untuk jangka waktu tertentu.</p>
                                                <h5><strong>Report</strong></h5>
                                                <p>Sistem report secara langsung melalui notifikasi email dapat membantu teknisi untuk mengetahui kerusakan pada pembangkit secara langsung.</p>
                                            </div>
                                            <div class="span6">
                                                <div class="space20"></div>
                                                <div class="space20"></div>
                                                <div class="space5"></div>
                                                <h5>Cloud Service <span class="pull-right">35%</span></h5>
                                                <div class="progress progress-striped progress-danger">
                                                    <div class="bar" style="width: 35%;"></div>
                                                </div>
                                                <h5>Realtime Data <span class="pull-right">40%</span></h5>
                                                <div class="progress progress-striped">
                                                    <div class="bar" style="width: 40%;"></div>
                                                </div>
                                                <h5>Big Data <span class="pull-right">35%</span></h5>
                                                <div class="progress progress-striped">
                                                    <div class="bar" style="width: 35%;"></div>
                                                </div>
                                                <h5>Live Report <span class="pull-right">55%</span></h5>
                                                <div class="progress progress-striped progress-success">
                                                    <div class="bar" style="width: 55%;"></div>
                                                </div>
                                                <h5>Monitoring Jarak Jauh (Online) <span class="pull-right">85%</span></h5>
                                                <div class="progress progress-striped progress-warning">
                                                    <div class="bar" style="width: 85%;"></div>
                                                </div>
                                                <h5>Komputasi yang Ringan <span class="pull-right">67%</span></h5>
                                                <div class="progress progress-striped progress-danger">
                                                    <div class="bar" style="width: 67%;"></div>
                                                </div>
                                                <h5>Murah <span class="pull-right">45%</span></h5>
                                                <div class="progress progress-striped">
                                                    <div class="bar" style="width: 45%;"></div>
                                                </div>
                                                <h5>Mempermudah Manajemen<span class="pull-right">50%</span></h5>
                                                <div class="progress progress-striped progress-success">
                                                    <div class="bar" style="width: 50%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-group"></i>Our Team</h4>
                                <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                                </span>
                                </div>
                                <div class="widget-body">
                                    <div class="about-us">
                                        <h3>Tim Pembuat dan Pembimbing</h3>
                                        <div class="row-fluid">
                                            <div class="span6">
                                                <div class="team-member">
                                                    <img src="../assets/img/team/team-1.jpg" alt="">
                                                    <h3>Agus Eko Minarno, M.Kom.</h3>
                                                    <span>Pembimbing</span>
                                                    <ul class="unstyled">
                                                        <li><a href="http://www.facebook.com/indoraya" target="_blank"><i class=" icon-facebook-sign"></i></a></li>
                                                        <li><a href="http://twitter.com/agus_minarno" target="_blank"><i class=" icon-twitter-sign"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="span6">
                                                <div class="team-member">
                                                    <img src="../assets/img/team/team-2.jpg" alt="">
                                                    <h3>Aulia Arif Wardana.</h3>
                                                    <span>Mahasiswa</span>
                                                    <ul class="unstyled">
                                                        <li><a href="http://www.facebook.com/aulwardana" target="_blank"><i class=" icon-facebook-sign"></i></a></li>
                                                        <li><a href="https://id.linkedin.com/in/aulwardana" target="_blank"><i class=" icon-linkedin-sign"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--FINISH CONTENT-->
        </div>

<?php 
include_once('includes/_footer.php');
?>