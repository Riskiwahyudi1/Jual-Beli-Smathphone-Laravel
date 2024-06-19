
  if(document.title === 'TeraPhone | Home Penjual'){
    
            
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




