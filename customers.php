<?php
include './php/db.php';
$database = new Database;
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Academia Towers | Admin Dashboard</title>

    <!-- Semantic UI -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css"
        integrity="sha256-9mbkOfVho3ZPXfM7W8sV2SndrGDuh7wuyLjtsWeTI1Q=" crossorigin="anonymous" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css"
        integrity="sha256-+N4/V/SbAFiW1MPBCXnfnP9QSN3+Keu+NlB+0ev/YKQ=" crossorigin="anonymous" />

    <!-- Data Tables -->
    <link src="https://cdn.datatables.net/1.10.21/css/dataTables.semanticui.min.css">
    </link>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">

    <!-- Jquery Toast CSS -->
    <link rel="stylesheet" href="css/jquery.toast.min.css">

    <!-- Easy Pie Chart CSS -->
    <link rel="stylesheet" type="text/css" href="/path/to/jquery.easy-pie-chart.css">
    <!-- Custom Css -->
    <link rel="stylesheet" href="css/style.css" />

    <!-- favicon -->
    <link rel="icon" href="images/favicon.ico">
</head>


<body>

    <!----------------------------------- Navbar -------------------------------------->
    <nav>
        <div class="ui inverted secondary sidebar vertical menu sidebar-menu" id="sidebar">
            <div id="brand">
                <img id="logo" src="images/logo.png" alt="Logo">
            </div>
            <div id="greet">
                <img id="background" src="images/greet.png" alt="">
                <div id="info">
                    <p id="name">Welcome, Arif Avcı</p>
                    <p id="mail">ahmetarifavci@gmail.com</p>
                </div>
            </div>
            <a href="index.html" class="item ">
                <div>
                    <i class="icon home"></i>
                    Anasayfa
                </div>
            </a>
            <a href="customers.html" class="item active">
                <div>
                    <i class="icon users"></i>
                    Müsteriler
                </div>
            </a>

        </div>
    </nav>

    <!----------------------------------- Navbar End -------------------------------------->


    <!----------------------------------- Header -------------------------------------->
    <div class="pusher">
        <header id="header" class="ui top fixed inverted menu">

            <!---------- Breadcrumb ----------------->
            <div class="left menu">
                <a style="color: #7f8d94;" href="#" class="sidebar-menu-toggler item" data-target="#sidebar">
                    <i class="sidebar icon"></i>
                </a>
                <div id="breadcrumb" class="ui large breadcrumb">
                    <a style="color: #af51bf;" class="section">Academia</a>
                    <i class="right chevron icon divider"></i>
                    <a style="color: #b5c5cd;" class="section">Müsteriler</a>
                </div>
            </div>

            <!---------- Header Menu Right ----------------->
            <div id="right-menu" class="right menu">
                <div style="background-color: transparent;" class="ui dropdown pointing button">
                    <a href="#" class="item">
                        <i id="notification" class="bell icon big"></i>
                    </a>
                    <div class="menu">
                        <div class="item">
                            <p style="display: inline-block;">
                                <i style="color:red!important" class="chart bar outline icon"></i>
                                Elektrik faturası 45.000₺ geldi.
                            </p>
                            <span class="time right floated">Bugün, 18:52</span>
                        </div>
                        <div class="ui divider"></div>
                        <div class="item">
                            <p style="display: inline-block;">
                                <i style="color:#4bae4f!important" class="chart line icon"></i>
                                Ali Koç 1500₺ kira ödemesi yaptı
                            </p>
                            <span class="time right floated">Bugün, 16:37</span>
                        </div>
                        <div class="ui divider"></div>
                        <div class="item">
                            <p style="display: inline-block;">
                                <i style="color:#ff6600!important" class="exclamation triangle
                icon"></i>
                                Daire 178 musluk arızası bildirdi
                            </p>
                            <span class="time right floated">6 dakika önce</span>
                        </div>
                    </div>
                </div>
                <div style="padding: 0;" class="ui dropdown item">
                    <div class="user-active">
                        <img class="ui avatar image mini" src="images/arifavci.jpg">
                    </div>
                    <span style="color: #7f8d94;">Arif Avcı</span>
                    <i style="margin-top: 6px;" class="angle down icon"></i>
                    <div class="menu">
                        <a href="#" class="item">
                            <i class="info circle icon"></i> Profil</a>
                        <a href="#" class="item">
                            <i class="wrench icon"></i>
                            Ayarlar</a>
                        <a href="#" class="item">
                            <i class="sign-out icon"></i>
                            Çıkış
                        </a>
                    </div>
                </div>
                <div class="ui dropdown item">
                </div>
        </header>
        <!----------------------------------- Header End -------------------------------------->




        <!----------------------------------- Main Content -------------------------------------->
        <div class="pusher">
            <main>
                <div id="main-content-left" class="ui grid stackable padded">
                    <div class="thirteen wide column">
                        <div class="main-content">



                            <!---------- Charts End ------------------>


                            <!------------- Table --------------------->


                            <div style="margin-bottom:3px;" class="ui equal width grid container">
                                <div class="left floated column">
                                    <h2 class="graph-header"> <i class="users icon"></i>Müsteriler</h2>
                                    <button id="addButton" class="ui basic button right floated">
                                        <i class="icon add user"></i>
                                        Ekle
                                    </button>
                                </div>

                            </div>
                            <div class="ui grid stackable padded">
                                <div class="column">
                                    <table id="customersTable" class="ui selectable striped unstackable fixed table">
                                        <thead>
                                            <tr>
                                                <th>Ad&amp;Soyad</th>
                                                <th>Telefon Numarası</th>
                                                <th>Tc Kimlik Numarası</th>
                                                <th>Daire</th>
                                                <th>Sözleşme Tarihi</th>
                                                <th>Kira Tutarı</th>
                                            </tr>
                                        </thead>
                                        <tbody id="customersData">

                                            <?php
                                            $database -> table_data();
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                    <aside
                        style="padding-top: 72px; background-color: #edf0f2; margin-top:0!important; border-left:1px solid #dcdee0;"
                        class="three wide column main-content-right">

                    </aside>
                </div>

                <!-- Add Customer -->
                <div id="addModal" class="ui tiny modal">
                    <i class="close icon"></i>
                    <div class="header">
                        Yeni Müsteri
                    </div>
                    <div class="content">
                        <div id="addCustomer">
                            <div class="ui mini three steps">
                                <div data-tab="bilgiEkle" class="active step">
                                    <i class="address card outline icon"></i>
                                    <div class="content">
                                        <div class="title">Bilgiler</div>

                                    </div>
                                </div>
                                <div data-tab="fotografEkle" class=" step">
                                    <i class="image outline icon"></i>
                                    <div class="content">
                                        <div class="title">Fotograf</div>

                                    </div>
                                </div>
                                <div id="contractStep" data-tab="sozlesmeGoruntule" class="disabled step">
                                    <i class="file alternate outline icon"></i>
                                    <div class="content">
                                        <div class="title">Sözlesme</div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div style="margin-top: 10px" class="ui tab" data-tab='bilgiEkle'>
                            <form id="customerForm" class="ui form">
                                <div class="field">
                                    <label>Ad&Soyad</label>
                                    <div class="two fields">
                                        <div class="field">
                                            <input type="text" name="name" placeholder="Ad">
                                        </div>
                                        <div class="field">
                                            <input type="text" name="surname" placeholder="Soyad">
                                        </div>
                                    </div>
                                </div>

                                <div class="field">
                                    <label>Tc Kimlik Numarası</label>
                                    <input type="text" name="tcno" placeholder="Tc Kimlik Numarası">
                                </div>
                                <div class="field">
                                    <label>Cinsiyet</label>
                                    <select class="ui dropdown">
                                        <option value="1">Erkek</option>
                                        <option value="0">Kadın</option>
                                    </select>
                                </div>

                                <div class="field">
                                    <label>Telefon Numarası</label>
                                    <div class="fields">
                                        <div class="sixteen wide field">
                                            <input type="tel" name="telno" placeholder="Telefon Numarası">
                                        </div>
                                    </div>
                                </div>

                                <div class="two fields">
                                    <div class="field">
                                        <label>Daire No</label>
                                        <input type="text" name="apartment" placeholder="Daire No">
                                    </div>
                                    <div class="field">
                                        <label>Kira Tutarı</label>
                                        <input type="text" name="amount" placeholder="Kira Tutarı">
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                            <div id="fotografEkle" style="padding: 8px" class="ui tab" data-tab='fotografEkle'>
                                <div class="ui placeholder segment">
                                    <div style="font-size: 15px" class="ui icon header">
                                    <img id="previewImage" style="margin: 8px auto ;display: block;width:238px" style="display:block" class="ui medium rounded image" src="images/upload/wireframe.png">
                                        Müsteriye ait jpg,png veya jpeg formatında bir fotograf yükleyin.
                                    </div>
                                    
                                    <div id="fileUpload"  class="ui primary button">Yükle</div>
                                    <input type="file" name="file" id="hidden-upload" style="display: none">
                                </div>
                            </div>
                            <div id="sozlesmeGoruntule" style="padding: 8px" class="ui tab" data-tab='sozlesmeGoruntule'>
                                <div id="contract"></div>
                            </div>
                      
                    </div>
                    <div class="actions">
                        <div id="close" class="ui black deny button">
                            Kapat
                        </div>
                        <div id="save" class="ui green right labeled icon button">
                            İleri
                            <i class="angle double right icon"></i>
                        </div>
                        <div style="display: none" id="contractButton" class="ui green right labeled icon button">
                            Sozlesmeyi Goruntule
                            <i class="file alternate outline icon"></i>
                        </div>
                        <div id="saveMaster" style="display:none;" class="ui green right labeled positive icon button">
                            Kaydet
                            <i class="check icon"></i>
                        </div>
                    </div>
                </div>
                <!-- Show customer -->
                <div id="showModal" class="ui small modal">
                    <i class="close icon"></i>
                    <div style="padding:0 2px 0 0;" class="header">
                        <div id="customerSegment" class="ui secondary top attached pointing menu">

                            <a class="active item" data-tab='info'>
                                <span>
                                    Bilgi
                                </span>
                            </a>
                            <a class="item" data-tab='kira'>
                                <span>
                                    Ödeme Takibi
                                </span>
                            </a>
                            <a class="item " data-tab='ariza'>
                                <span>
                                    Arıza Bildirimleri
                            </a>
                            <a class="item " data-tab='sozlesme'>
                                <span>
                                    Sözlesme
                            </a>
                            <a class="item right aligned">
                                <span data-inverted="" data-tooltip="Müsteriyi sil" data-position="top right">
                                    <i id="deleteCustomer" class="user times icon"></i>
                                </span>
                            </a>

                        </div>
                    </div>
                    <div class="">
                        <div data-tab='info' class="ui tab">
                            <div class="ui segment">
                                <div class="ui grid">

                                    <div style="padding:10px; margin-right: 0!important;" class="six wide column">
                                        <div>
                                            <div class="ui tiny card">
                                                <div class="image">
                                                    <img id="customerImage" src="images/upload/wireframe.png">
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="ten wide column">
                                        <div class="">

                                            <h3 class="ui dividing header">
                                                <i class="address card outline icon"></i> Müşteri Bilgileri
                                            </h3>

                                        </div>

                                        <div class="ui grid">
                                            <div class="sixteen wide column customer-info">
                                                <p>Ad & Soyad: <span class="customer name"></span></p>
                                                <p>Telefon Numarası: <span class="customer phone"></span> </p>
                                                <p>Kimlik Numarası: <span class="customer tcno"></span> </p>
                                                <p>Sözleşme Tarihi: <span class="customer contract"></span> </p>
                                                <p>Daire Numarası: <span class="customer apartment"></span> </p>
                                                <p>Kira Tutarı: <span class="customer amount"></span></p>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div data-tab='kira' class="ui tab">
                            <div class="ui segment">
                                <table class="ui celled structured table">
                                    <thead>
                                        <tr>
                                            <th style="visibility: hidden;" colspan="1"></th>
                                            <th colspan="3">2019</th>
                                            <th colspan="5">2020</th>
                                        </tr>

                                        <tr>
                                            <th style="visibility: hidden;"></th>
                                            <th>Kasım</th>
                                            <th>Aralık</th>
                                            <th>Ocak</th>
                                            <th>Şubat</th>
                                            <th>Mart</th>
                                            <th>Nisan</th>
                                            <th>Mayıs</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Kira</td>
                                            <td class="center aligned"><i class="large green checkmark icon"></i>
                                            </td>
                                            <td class="center aligned"><i class="large green checkmark icon"></i>
                                            </td>
                                            <td class="center aligned">
                                                <i class="large green checkmark icon"></i>
                                            </td>
                                            <td class="center aligned"><i class="large green checkmark icon"></i>
                                            </td>
                                            <td class="center aligned"><i class="large green checkmark icon"></i>
                                            </td>
                                            <td class="center aligned"><i class="large green checkmark icon"></i>
                                            </td>
                                            <td class="center aligned"><i class="large green checkmark icon"></i>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Aidat</td>
                                            <td class="center aligned"><i class="large green checkmark icon"></i>
                                            </td>
                                            <td class="center aligned"><i class="large green checkmark icon"></i>
                                            </td>
                                            <td class="center aligned">
                                                <i class="large green checkmark icon"></i>
                                            </td>
                                            <td class="center aligned"><i class="large green checkmark icon"></i>
                                            </td>
                                            <td class="center aligned"><i class="large green checkmark icon"></i>
                                            </td>
                                            <td class="center aligned"><i class="large green checkmark icon"></i>
                                            </td>
                                            <td class="center aligned"><i class="large green checkmark icon"></i>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <div data-tab='ariza' class="ui tab">
                            <div style="max-height: 270px" class="ui scrolling content segment">
                                <div class="ui  large feed">


                                    <div class="event">
                                        <div class="label">
                                            <i class="orange exclamation icon"></i>
                                        </div>
                                        <div class="content">
                                            <div class="summary">
                                                Salondaki ampul calismiyor
                                                <div class="date">
                                                    6 saat önce
                                                </div>
                                            </div>
                                            <div class="extra text">
                                                Merhaba, salonumdaki ampül bozuldu, degistirmeme ragmen calismadi.Yarin
                                                aksam misafirlerim gelecek, yardimci olur musunuz ?
                                            </div>
                                            <!-- <div class="meta">
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="ui inverted divider"></div>
                                    <div class="event">
                                        <div class="label">
                                            <i class="large green checkmark icon"></i>
                                        </div>
                                        <div class="content">
                                            <div class="summary">
                                                Dış kapı kapanmıyor.
                                                <div class="date">
                                                    10 Mayıs, 2020
                                                </div>
                                            </div>
                                            <div class="extra text">
                                                Dış kapı tam kapanmıyor. Bir bakabilir misiniz?
                                            </div>
                                            <div class="meta">
                                                <a class="ui image label">
                                                    <img src="/images/personel5.jpg">
                                                    Yasar Kandemir
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ui inverted divider"></div>
                                    <div class="event">
                                        <div class="label">
                                            <i class="large green checkmark icon"></i>
                                        </div>
                                        <div class="content">
                                            <div class="summary">
                                                Tavanda rutubet var.
                                                <div class="date">
                                                    1 Mayıs, 2020
                                                </div>
                                            </div>
                                            <div class="extra text">
                                                Son bir haftadır tavanda rutubet var, çatlaklar oluşmaya başladı.
                                            </div>
                                            <div class="meta">
                                                <a class="ui image label">
                                                    <img src="/images/personel5.jpg">
                                                    Yasar Kandemir
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ui inverted divider"></div>
                                    <div class="event">
                                        <div class="label">
                                            <i class="large green checkmark icon"></i>
                                        </div>
                                        <div class="content">
                                            <div class="summary">
                                                Sıcak su akmıyor.
                                                <div class="date">
                                                    12 Nisan, 2020
                                                </div>
                                            </div>
                                            <div class="extra text">
                                                3 gündür banyoda sıcak su akmıyor.
                                            </div>
                                            <div class="meta">
                                                <a class="ui image label">
                                                    <img src="/images/personel5.jpg">
                                                    Yasar Kandemir
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ui inverted divider"></div>
                                    <div class="event">
                                        <div class="label">
                                            <i class="large green checkmark icon"></i>
                                        </div>
                                        <div class="content">
                                            <div class="summary">
                                                Buzdolabı bozuldu.
                                                <div class="date">
                                                    27 Aralık, 2019
                                                </div>
                                            </div>
                                            <div class="extra text">
                                                Buzdolabı bir haftadır sogutmuyor, acilen gelebilir misiniz?
                                            </div>
                                            <div class="meta">
                                                <a class="ui image label">
                                                    <img src="/images/personel5.jpg">
                                                    Yasar Kandemir
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div data-tab='sozlesme' class="ui tab">
                            <div class="ui segment">
                                <div id="showContract"></div>

                            </div>
                        </div>

                    </div>
                    <div class="actions">
                        <div class="ui secondary black deny button">
                            Kapat
                        </div>

                    </div>
                </div>
                <div id="deleteModal" class="ui basic modal">
                    <div class="ui icon header">
                        <i class="user times icon"></i>
                        Müsteriyi Sil
                    </div>
                    <div style="text-align: center" class="content">
                        <p style="font-size: 20px">Bu islem geri alınamaz, müsteriyi silmek istediğinize emin misiniz?
                        </p>
                    </div>
                    <div style="text-align: center" class="actions">
                        <div class="ui red basic cancel inverted button">
                            <i class="remove icon"></i>
                            Iptal
                        </div>
                        <div id="deleteCustomerButton" class="ui green ok inverted button">
                            <i class="checkmark icon"></i>
                            Evet
                        </div>
                    </div>
                </div>
            </main>
        </div>



        <!----------------------- Footer  ----------------------------->

        <!----------------------- Footer End  ----------------------------->

    </div>
    </div>


    <!-- Preload -->
    <script src="https://unpkg.com/preload-it@latest/dist/preload-it.js"></script>

    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <!-- Semantic UI -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"
        integrity="sha256-t8GepnyPmw9t+foMh3mKNvcorqNHamSKtKRxxpUEgFI=" crossorigin="anonymous"></script>



    <!-- Data Tables -->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.semanticui.min.js
  "></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.semanticui.min.js
  "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js
  "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js
  "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js
  "></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js
  "></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js
  "></script>
    <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>

    <!-- Sparkline  -->
    <script src="./js/vendors/jquery.sparkline.min.js"></script>

    <!-- E Charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/4.7.0/echarts.min.js"></script>


    <!-- Chartjs -->
    <script src="https://ajax.aspnetcdn.com/ajax/globalize/0.1.1/globalize.min.js"></script>
    <script src="./js/vendors/dxchartjs.js"></script>

    <!-- Easy Pie Chart -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/easy-pie-chart/2.1.6/jquery.easypiechart.min.js"></script>

    <!-- PDFObject -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.1.1/pdfobject.min.js"></script>

    <!-- Jquery Toast -->
    <script src="./js/vendors/jquery.toast.min.js"></script>

    <!-- Custom Javascript -->
    <script src="./js/customers.js"></script>

</body>

</html>