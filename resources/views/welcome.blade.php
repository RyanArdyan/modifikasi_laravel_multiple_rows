<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kitabisa</title>

    {{-- bootstrap.min.css --}}
    {{-- assets() akan memanggil folder public --}}
    <link rel="stylesheet" href="{{ asset('bootstrap_5/css/bootstrap.min.css') }}">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                {{-- judul --}}
                <h3>Kitabisa.com</h3>

                {{-- table --}}
                <table id="table" class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Pekerjaan</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            {{-- contenteditable="true" berarti value td nya dapat di edit --}}
                            <td>
                                {{-- aku tidak perlu attribute name jadi aku akan mengambil value-value lewat class --}}
                                <input type="text" class="nama">
                            </td>
                            <td>
                                <input type="text" class="alamat">
                            </td>
                            <td>
                                <input type="text" class="pekerjaan">
                            </td>
                            <td>
                                <button class="btn btn-danger" id="hapus">-</button>
                            </td>
                        </tr>
                    
                    </tbody>
                </table>
                        
                {{-- tombol tambah --}}
                <button class="btn btn-success" id="tambah">+</button>
                <button id="simpan" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>

    {{-- bootstrap.bundle.min.js --}}
    <script src="{{ asset('bootstrap_5/js/bootstrap.bundle.min.js') }}"></script>
    {{-- jquery.min.js --}}
    <script src="{{ asset('js/jquery-3.6.4.min.js') }}"></script>
    {{-- sweetalert 2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- script --}}
    <script>
        // jika document siap maka jalankan fungsi berikut
        $(document).ready(function() {
            // jadi nanti value nya akan di tambah jika aku menambah baris baru
            // berisi angka 1
            let baris = 1;

            // jika #tambah di click maka jalankan fungsi berikut
            $("#tambah").on("click", function() {
                // jadi nanti value nya akan di tambah jika aku click tombol +
                // panggil variable baris lalu value nya di tambah 1
                baris += 1;
                // jadi nanti akan ada id="baris1", id="baris2", dst.
                // .baris_baru aku gunakan agar setelah aku click tombol simpan maka semua data disimpan lalu aku hapus .baris_baru dan turunannya
                var html = `<tr id="baris${baris}" class="baris_baru">`;
                    // berisi panggil value variable html lalu isinya ditambah
                    // aku tidak perlu attribute name jadi aku akan mengambil value-value lewat class
                    html += `<td><input type="text" class="nama"></td>`;
                    html += `<td><input type="text" class="alamat"></td>`;
                    html += `<td><input type="text" class="pekerjaan"></td>`;
                    // attribute data-rows bersi baris2, baris3, dst.
                    html += "<td><button class='btn btn-danger' data-row='baris"+ baris +"' id='hapus'>-</button></td>"
                    html += "</tr>";
                
                // panggil element tbody lalu tambahkan value variable html sebagai anak terakhir
                $("tbody").append(html);
            });

            // aku perlu $(document) karena tombol hapus nya ditambah setelah aku click tombol + atau tambah
            // jika document di click, yang id nya adalah #hapus maka jalankan fungsi berikut
            $(document).on('click', '#hapus', function() {
                // berisi panggil #hapus lalu panggil value dari attribute data-row nya, anggaplah berisi baris2
                let hapus = $(this).data('row');
                // anggaplah panggil #baris2 lalu hapus
                $('#' + hapus).remove();
            });

            // jika #simpan di click maka jalankan fungsi berikut
            $("#simpan").on("click", function() {
                // berisi array agar aku bisa menyimpan banyak nama
                let nama = [];
                let pekerjaan = [];
                let alamat = [];

                // lakukan pengulangan terhdapat semua .nama
                // setiap .nama, jalankan fungsi berikut
                $(".nama").each(function() {
                    // mulai pengulangan
                    // berisi panggil value dari .nama
                    let value_dari_class_nama = $(this).val();
                    // jika value dari .nama sama dengan kosong maka
                    if (value_dari_class_nama === "") {
                        // tampilkan peringatan menggunakan sweetalert "Nama wajib diisi"
                        Swal.fire('Nama wajib diisi.');
                    }
                    // lain jika panjang value dari .nama lebih kecil dari 3
                    else if (value_dari_class_nama.length < 3) {
                        // tampilkan peringatan menggunakan sweetalert "Nama minimal 3 huruf"
                        Swal.fire('Nama minimal 3 huruf');
                    }
                    // lain jika panjang value_dari_class_nama melebihi 30
                    else if (value_dari_class_nama.length > 30) {
                        // tampilkan peringatan menggunakan sweetalert "Maksimal nama adalah 30 huruf"
                        Swal.fire('Maksimal nama adalah 30 huruf')
                    };

                    // panggil array nama, dorong setiap value pada .nama
                    nama.push($(this).val());
                });

                // lakukan pengulangan
                // setiap .pekerjaan, jalankan fungsi berikut
                $(".pekerjaan").each(function() {
                    // mulai pengulangan
                    // berisi panggil value dari .pekerjaan
                    let value_dari_class_pekerjaan = $(this).val();
                    // jika value dari .pekerjaan sama dengan kosong maka
                    if (value_dari_class_pekerjaan === "") {
                        // tampilkan peringatan menggunakan sweetalert "pekerjaan wajib diisi"
                        Swal.fire('pekerjaan wajib diisi.');
                    }
                    // lain jika panjang value dari .pekerjaan lebih kecil dari 3
                    else if (value_dari_class_pekerjaan.length < 3) {
                        // tampilkan peringatan menggunakan sweetalert "pekerjaan minimal 3 huruf"
                        Swal.fire('pekerjaan minimal 3 huruf');
                    }
                    // lain jika panjang value_dari_class_pekerjaan melebihi 30
                    else if (value_dari_class_pekerjaan.length > 30) {
                        // tampilkan peringatan menggunakan sweetalert "Maksimal pekerjaan adalah 30 huruf"
                        Swal.fire('Maksimal pekerjaan adalah 30 huruf')
                    };

                    // oanggil array pekerjaan, dorong setiap text pada .pekerjaan
                    pekerjaan.push($(this).val());
                });

                // lakukan pengulangan
                // setiap .alamat, jalankan fungsi berikut
                $(".alamat").each(function() {
                    // mulai pengulangan
                    // berisi panggil value dari .alamat
                    let value_dari_class_alamat = $(this).val();
                    // jika value dari .alamat sama dengan kosong maka
                    if (value_dari_class_alamat === "") {
                        // tampilkan peringatan menggunakan sweetalert "alamat wajib diisi"
                        Swal.fire('alamat wajib diisi.');
                    }
                    // lain jika panjang value dari .alamat lebih kecil dari 3
                    else if (value_dari_class_alamat.length < 3) {
                        // tampilkan peringatan menggunakan sweetalert "alamat minimal 3 huruf"
                        Swal.fire('alamat minimal 3 huruf');
                    }
                    // lain jika panjang value_dari_class_alamat melebihi 30
                    else if (value_dari_class_alamat.length > 30) {
                        // tampilkan peringatan menggunakan sweetalert "Maksimal alamat adalah 30 huruf"
                        Swal.fire('Maksimal alamat adalah 30 huruf')
                    };


                    // array alamat, dorong setiap text pada .alamat
                    alamat.push($(this).val());
                });

                // lakukan ajax untuk mengirim semua value input
                $.ajax({
                    // url panggil route home.simpan
                    url: "{{ route('home.simpan') }}",
                    // tipe memanggil route tipe post / kirim
                    type: 'POST',
                    // kirimkan aata berupa object
                    data: {
                        // key nama berisi array nama
                        nama: nama,
                        pekerjaan: pekerjaan,
                        alamat: alamat,
                        "_token": "{{ csrf_token() }}"
                    }
                })
                    // jika selesai dan berhasil maka jalankan fungsi berikut
                    .done(function() {
                        // panggil semua input, lalu value nya dikosongkan
                        $("input").val("");
                        // panggil setiap .baris_baru lalu hapus element dan turunannya 
                        $(".baris_baru").each(function() {
                            // panggil .baris_baru lalu hapus element dan turunannya
                            $(this).remove();
                        });
                    })
            });
        });
    </script>
</body>

</html>
