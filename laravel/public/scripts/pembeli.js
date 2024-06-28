// daftar script halaman 
    // 1.halaman detail produk
    // 2.Halaman keranjang pembeli
    // 3.Halaman checkout pembeli
    // 4.halaman riwayat transaksi


//1. detail barang 
if (document.title === 'TeraPhone | Detail Produk'){

    const imgZoom = document.getElementById('imgZoom');
    const imgsmall = document.querySelectorAll('.imgSmall');

    imgsmall.forEach((img) => {
        img.style.opacity = 0.5;
        if (img.src === imgZoom.src) {
            img.style.boxShadow = "0 0 10px rgba(0, 0, 0, 1)";
            img.style.opacity = 1;
        }
        img.addEventListener('click', function() {
            imgZoom.src = img.src;
            imgsmall.forEach((img) => {
                if (img === this) {
                    img.style.boxShadow = "0 0 10px rgba(0, 0, 0, 1)";
                    img.style.opacity = 1;
                } else {
                    img.style.opacity = 0.5;
                    img.style.boxShadow = "none";
                }
            });
        });
    });
}else if(document.title === 'TeraPhone | Keranjang' || document.title === 'TeraPhone | Checkout'){

    // 2. keranjang pembeli
    document.addEventListener('DOMContentLoaded', function () {
        const decrementButtons = document.querySelectorAll(".decrement-button");
        const incrementButtons = document.querySelectorAll(".increment-button");
        const counterProduk = document.querySelectorAll(".counter-produk");
        const hargaPcs = document.querySelectorAll(".hargaPcs");
        const checkProduk = document.querySelectorAll(".check-produk");
        const tombolCheckout = document.querySelector("#checkout");
        const alertCheckbox = document.querySelector(".alert-checkbox");
        let showTotal = document.querySelector("#show-total");
        let jmlCheckout = document.querySelectorAll('.jml-checkout');
    
        let currentHarga = [];
        let hargaSelect = 0;
    
        // menghitung total belanja pembeli
        function totalBelanja(){
            hargaSelect = 0;
            checkProduk.forEach((check, index) => {
                if (check.checked) {
                const hargaProduk = parseInt(hargaPcs[index].textContent.replace(/\D/g, ''));
                hargaSelect += hargaProduk;
                
                }
            });
            showTotal.innerHTML = hargaSelect.toLocaleString();
        }
    
        // inisialisasi nilai harga saat ini
        hargaPcs.forEach((harga, index) => {
            currentHarga[index] = parseInt(harga.innerHTML.replace(/\D/g, ''));
        });
    
        // untuk mengirim jumlah produk di beli ke menu checkout
        function kirimJmlProduk(){
            counterProduk.forEach((counter, index) => {
                jmlCheckout[index].value = counter.innerText;
            });
        }
        // fungsi untuk menghitung total harga berdasarkan jumlah produk
        function hitungTotalHarga(count) {
            let totalHarga = currentHarga[count] * counterProduk[count].innerHTML;
            hargaPcs[count].innerHTML = totalHarga.toLocaleString();
            totalBelanja();
        }
        // fungsi hapus produk di keranjang
    
        function hapusProduk(){
            btnHapus.classList.remove('hidden');
        }
        // fungsi checlist produk yg ingin di beli
        
        function checklistProduk() {
            checkProduk.forEach((e) => {
                e.addEventListener('change', () => {
                    totalBelanja();
                    kirimJmlProduk();
                    hapusProduk();
                    alertCheckbox.classList.add('hidden');
                });
            });
        
            // fungsi untuk cek produk sudah dipilih sebelum beli
            tombolCheckout.addEventListener('click', (event) => {
                const isAnyChecked = Array.from(checkProduk).some(e => e.checked);
        
                if (isAnyChecked) {
                    tombolCheckout.type = 'submit';
                } else {
                    tombolCheckout.type = 'button';
                    alertCheckbox.classList.remove('hidden');
                    event.preventDefault();  // Prevent the default action of the button
                }
            });
        }
        

        

        
        checklistProduk();
        const stokProduk = document.querySelectorAll('.stok-produk');
        const peringatanStok = document.querySelectorAll('.alert-stok');
        // event listener untuk tombol tambah jml produk
        incrementButtons.forEach((plus, count) => {
            plus.addEventListener('click', () => {
                const stokValue = parseInt(stokProduk[count].innerHTML, 10);
                const counterValue = parseInt(counterProduk[count].innerHTML, 10);

               if(counterValue < stokValue){
                    counterProduk[count].innerHTML++;
                    console.log(stokProduk[count].innerHTML)
                    console.log(counterProduk[count].innerHTML)
                }else{
                    peringatanStok[count].classList.remove('hidden')
                }
                hitungTotalHarga(count);
                // kirimJmlProduk()
                jmlCheckout[count].value = counterProduk[count].innerText;
                
    
            })
        });
    
        // event listener untuk tombol kurang jml produk
        decrementButtons.forEach((min, count) => {
            min.addEventListener('click', () => {
                if (counterProduk[count].innerHTML > 1) { 
                    counterProduk[count].innerHTML--;
                    hitungTotalHarga(count);
                    kirimJmlProduk()
                    
    
                }
            })
        });
        
    });
    // mengubah action form pada halaman keranjang yaitu untuk hapus dan checkout
    const ubahForm = document.querySelector('#ubah-action');
    const btnHapus = document.querySelector('#hapus');
    const btnCheckout = document.querySelector('#checkout');
    const checboxAction = document.querySelectorAll('.checbox-checkout');
    const inputHapus = document.querySelectorAll('.input-hapus');
    
    // mengubah action pada form untuk hapus produk
    btnHapus.addEventListener('click', function(){
        ubahForm.action = '/hapus-produk';
        checboxAction.forEach((e, index) => {
    
            // digunakan untuk mengambil alih checbox yg tadinya untuk fitur checkout menjadi untuk fitur hapus
            e.type = 'hidden';
            inputHapus[index].type = 'checkbox'
        })
    })
    // mengubah action pada form untuk checkout produk
    btnCheckout.addEventListener('click', function(){
        ubahForm.action = '/checkout';
    })
    
    // membuat supaya agar input hapus produk memiliki nilai "checked " saat kita ceklist checkbox di halaman keranjang
    checboxAction.forEach((checkbox, index) => {
        checkbox.addEventListener('change', function() {
            inputHapus[index].checked = this.checked;
        });
    });
}else if(document.title === 'TeraPhone | Riwayat Transaksi'){
    //3. halaman transaksi
            
    const btnShowList = document.querySelectorAll('.btn-show-list-transaksi');
    const listTransaksi = document.querySelectorAll('.multi-transaksi');
    const jumlahTransaksi = document.querySelectorAll('.jumlah-transaksi');
    
    btnShowList.forEach((e , index)  => {
        e.addEventListener('click', function() {
            listTransaksi[index].classList.toggle('hidden');
            jumlahTransaksi[index].classList.toggle('hidden');

            if (listTransaksi[index].classList.contains('hidden')) {
                e.innerHTML = 'Tampilkan Semua ';
            } else {
                e.innerHTML = 'Sembunyikan';
            }
    })
    });
}




