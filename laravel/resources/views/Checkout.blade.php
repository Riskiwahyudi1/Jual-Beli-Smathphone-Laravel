<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Checkout</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }
    .header {
        text-align: center;
        border-bottom: 2px solid #87CEEB;
        padding: 10px 0;
    }
    .container {
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    .row {
        display: flex;
        margin-bottom: 10px;
    }
    .col {
        flex: 1;
        margin-right: 10px;
    }
    .col:last-child {
        margin-right: 0;
    }
    input[type="text"],
    input[type="email"] {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border-radius: 5px;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }
    .link {
        text-align: left;
        margin-top: 10px;
    }
    .button {
        background-color: #87CEEB;
        color: white;
        border: none;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
    }
    /* Footer styling */
    footer {
        background-color: black;
        color: white;
        text-align: left;
        padding: 40px 20px;
        position: relative;
        height: 200%;
    }
    .footer-company {
        position: absolute;
        top: 20px;
        left: 20px;
        color: white;
        font-weight: bold;
        font-size: 24px;
    }
    .footer-links {
        position: absolute;
        top: 20px;
        left: 30%; /* Adjusted left position */
        color: white;
        font-size: 18px;
    }
    .footer-links > div:not(:first-child) {
        font-size: 14px; /* Changed font size to 14px */
    }
    .footer-test {
        position: absolute;
        top: 20px;
        left: 55%;
        color: white;
        font-size: 18px;
    }
    .footer-test span {
        font-size: 14px; /* Changed font size to 14px */
    }
    .footer-news {
        position: absolute;
        top: 20px;
        right: 20px;
        color: white;
        font-size: 18px;
    }
    .footer-details {
        margin-top: 30px;
        font-size: 14px;
    }
    .footer-space {
        margin-bottom: 20px; /* Added margin for space */
    }

    /* New CSS rules for bold headings */
    .footer-links > div:first-child,
    .footer-news {
        font-weight: bold;
    }
</style>
</head>
<body>

<div class="header">
    <h2 style="text-decoration: underline #87CEEB;">Checkout</h2>
</div>

<div class="container">
    <h3>Alamat Tagihan</h3> <!-- Added title here -->
    <div class="row">
        <div class="col">
            <input type="text" id="fname" name="fname" placeholder="Nama Depan">
        </div>
        <div class="col">
            <input type="text" id="lname" name="lname" placeholder="Nama Belakang">
        </div>
    </div>
    <div class="row">
        <div class="col">
            <input type="email" id="email" name="email" placeholder="Email">
        </div>
    </div>
    <div class="row">
        <div class="col">
            <input type="text" id="company" name="company" placeholder="Perusahaan">
        </div>
    </div>
    <div class="row">
        <div class="col">
            <input type="text" id="address" name="address" placeholder="Alamat">
        </div>
        <div class="col">
            <input type="text" id="city" name="city" placeholder="Kota">
        </div>
        <div class="col">
            <input type="text" id="country" name="country" placeholder="Provinsi">
        </div>
    </div>
    <div class="row">
        <div class="col">
            <input type="text" id="postal" name="postal" placeholder="Kode Pos">
        </div>
        <div class="col">
            <input type="text" id="telephone" name="telephone" placeholder="Telepon">
        </div>
    </div>
    <div class="link">
        <a href="your_shopping_cart_page.html">Kembali Ke Kartu Belanja</a>
    </div>
    <div class="row" style="justify-content: flex-end;">
        <button class="button">Continue</button>
    </div>
</div>

<!-- Footer -->
<footer>
    <div class="footer-company">TeraPhone</div>
    <div class="footer-links">
        <div>Link</div>
        <div class="footer-space"></div> <!-- Empty div for spacing -->
        <div>Tentang Kami</div> <!-- Added Terms and Conditions -->
        <div style="font-size: 14px;">Pembayaran</div>
        <div style="font-size: 14px;">Penjualan Terbaik</div>
        <div style="font-size: 14px;">Pembayaran</div>
        <div style="font-size: 14px;">Services</div> <!-- Adjusted font size -->
    </div>
    <div class="footer-space"></div> <!-- Added empty div for spacing -->
    <div class="footer-test">
        <b>Sosial Media</b> <!-- Made "Test" heading bold -->
        <br>
        <br> <!-- Blank row for spacing -->
        <span style="font-size: 14px;">@TeraPhone</span> <!-- Adjusted font size -->
        <br>
        <span style="font-size: 14px;">TeraPhone.id</span> <!-- Adjusted font size -->
        <br>
        <span style="font-size: 14px;">@TeraPhone.id</span> <!-- Adjusted font size -->
        <br>
        <span style="font-size: 14px;">TeraPhone.id</span> <!-- Adjusted font size -->
        <br>
        
    </div>
    <div class="footer-space"></div> <!-- Empty row for spacing --> 
    <div class="footer-news">Jadilah Orang Pertama Yang Mengetahuinya!</div>
    <div class="footer-details">
        teraphone@gmail.com<br>
        +62 96-23-10-68-91 <br>
        Batam, Kepulauan Riau, Indonesia
    </div>
</footer>

</body>
</html>