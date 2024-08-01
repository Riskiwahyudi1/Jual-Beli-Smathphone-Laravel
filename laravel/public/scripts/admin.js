if (document.title === 'TeraPhone | Admin Produk'){
    const titleStatus = document.getElementById('title-status');
    const statusProduk = document.getElementById('status-produk').value;

    const str_replace = (search, replace, subject) => subject.split(search).join(replace);

    const ucwords = (str) => str.replace(/\b[a-z]/g, (letter) => letter.toUpperCase());

    titleStatus.innerHTML = ucwords(str_replace('-', ' ', statusProduk));

}else if (document.title === 'TeraPhone | Admin Data User'){

    const titleRole = document.getElementById('title-role');
    const roleStatus = document.getElementById('role-user').value;

    const str_replace = (search, replace, subject) => subject.split(search).join(replace);

    const ucwords = (str) => str.replace(/\b[a-z]/g, (letter) => letter.toUpperCase());

    titleRole.innerHTML = ucwords(str_replace('-', ' ', roleStatus));
}