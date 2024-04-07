<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Petugas extends CI_Controller
{


    public $input;
    public $MSudi;
    function __construct()
    {
        parent::__construct();
        $this->load->model('MSudi');
    }


    public function index()
    {
        if ($this->session->userdata('akses') == 'petugas') {

            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['content'] = 'petugas/dashboard'; // Assuming you have a dashboard view
            $jumlahProduk = $this->MSudi->hitungJumlahProduk();
            $data['jumlahProduk'] = $jumlahProduk; // Mendefinisikan variabel $jumlahProduk

            $data['DataProduk'] = $this->MSudi->getAllProduk(); // Mengambil data produk

            // Get data kategori
            $data['DataKategori'] = $this->MSudi->getKategori();
            $data['jumlahKategori'] = count($data['DataKategori']);

            // Memuat view dashboard dengan data
            $this->load->view('petugas/page', $data);
        } else {
            echo "Anda tidak berhak mengakses halaman ini";
        }
    }



    public function pelanggan()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $cari = $this->input->post('txt_cari');
        $data['DataPelanggan'] = $this->MSudi->DataPelanggan($cari)->result();


        $data['content'] = 'petugas/pelanggan';
        $this->load->view('petugas/page', $data);
    }


    public function deleteDataPelanggan($PelangganID)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('MSudi');
        $this->MSudi->DeleteData('pelanggan', 'PelangganID', $PelangganID);

        // Redirect ke halaman master setelah penghapusan
        redirect(site_url('petugas/pelanggan'));
    }



    public function produk()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('MSudi');
        $data['DataProduk'] = $this->MSudi->GetData('produk');
        $data['DataKategori'] = $this->MSudi->GetData('kategori');
        $cari = $this->input->post('txt_cari');
        $data['DataProduk'] = $this->MSudi->DataProduk($cari)->result();
        $data['content'] = 'petugas/produk';

        $this->load->view('petugas/page', $data);
    }


    public function lihatStokProduk($produkID)
    {
        // Panggil fungsi getStokProduk dari model MSudi untuk mendapatkan stok produk berdasarkan ProdukID
        $stokProduk = $this->MSudi->getStokProduk($produkID);

        // Gunakan data stok produk yang diperoleh untuk keperluan Anda, misalnya, tampilkan di view
        $data['stokProduk'] = $stokProduk;

        // Load view untuk menampilkan stok produk
        $this->load->view('view_stok_produk', $data);
    }

    public function addDataProduk()
    {
        $add['ProdukID'] = $this->input->post('ProdukID');
        $add['NmProduk'] = $this->input->post('NmProduk');
        $add['KategoriID'] = $this->input->post('KategoriID');
        $add['Harga'] = $this->input->post('Harga');
        $add['Stok'] = $this->input->post('Stok');

        // Call the model method to insert data into the database
        $this->MSudi->AddData('produk', $add);

        // Redirect to the specified page after successful data insertion
        redirect(site_url('petugas/produk'));
    }





    public function updateDataProduk()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $a = $this->input->post('ProdukID');
        $update['NmProduk'] = $this->input->post('NmProduk');
        $update['Harga'] = $this->input->post('Harga');
        $update['Stok'] = $this->input->post('Stok');

        $this->MSudi->UpdateData('produk', 'ProdukID', $a, $update);

        redirect(site_url('petugas/produk'));
    }

    public function deleteDataProduk($ProdukID)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('MSudi');
        $this->MSudi->DeleteData('produk', 'ProdukID', $ProdukID);

        // Redirect ke halaman master setelah penghapusan
        redirect(site_url('petugas/produk'));
    }




    public function transaksi()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('MSudi');
        $data['DataProduk'] = $this->MSudi->GetData('produk');
        $data['DataTransaksi'] = $this->MSudi->GetData('transaksi');
        $data['content'] = 'petugas/transaksi'; // Assuming you have a transaksi view
        $this->load->view('petugas/page', $data);
    }
    public function keranjang()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('MSudi');
        $data['DataProduk'] = $this->MSudi->GetData('produk');
        $data['DataTransaksi'] = $this->MSudi->GetData('transaksi');
        $data['DataKeranjang'] = $this->MSudi->GetData('keranjang');
        $data['content'] = 'petugas/keranjang'; // Assuming you have a transaksi view
        $this->load->view('petugas/page', $data);
    }

    public function deletekeranjang($TransaksiID)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('MSudi');
        $this->MSudi->DeleteData('transaksi', 'TransaksiID', $TransaksiID);

        // Redirect ke halaman master setelah penghapusan
        redirect(site_url('petugas/keranjang'));
    }

    public function tambah_ke_transaksi()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // Mengambil data dari formulir POST
        $id_produk = $this->input->post('ProdukID');
        $nama_produk = $this->input->post('NmProduk');
        $harga = $this->input->post('Harga');
        $quantity = $this->input->post('Stok');
        $pelanggan = $this->input->post('PelangganID');


        // Hitung total harga berdasarkan quantity
        $total_harga = $harga * $quantity;

        // Logika tambahkan data ke dalam tabel transaksi (Anda dapat menyimpannya ke dalam database)
        $data_transaksi = array(
            'TanggalTransaksi' => date('Y-m-d H:i:s'), // Gunakan timestamp sesuai kebutuhan Anda
            'Harga' => $total_harga,
            'ProdukID' => $id_produk,
            'quantity' => $quantity,
            'PelangganID' => $pelanggan
            // Anda mungkin perlu menambahkan kolom lain sesuai dengan struktur tabel transaksi Anda
        );

        // Simpan data transaksi ke dalam database (disesuaikan dengan model dan metode penyimpanan data di database Anda)
        $this->load->model('MSudi');
        $this->MSudi->InsertData('transaksi', $data_transaksi);
        $this->MSudi->update_stok_produk($id_produk, $quantity);

        // Redirect kembali ke halaman produk atau halaman yang sesuai
        redirect(site_url('petugas/transaksi'));
    }

    public function simpan_pelanggan()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('MSudi');

        // Validasi input
        $this->form_validation->set_rules('NamaPelanggan', 'Nama Pelanggan', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kembalikan ke halaman sebelumnya atau tampilkan pesan kesalahan
            redirect('halaman_sebelumnya');
        } else {
            // Jika validasi berhasil, simpan data
            $dataPelanggan = array(
                'NamaPelanggan' => $this->input->post('NamaPelanggan'),
                'Alamat' => $this->input->post('Alamat'),
                'NomorTelepon' => $this->input->post('NomorTelepon')
            );

            $pelanggan_id = $this->MSudi->InsertData('pelanggan', $dataPelanggan);

            // Ambil ID produk dari formulir atau tempat lain sesuai dengan logika bisnis Anda
            $produk_id = $this->input->post('produk_id'); // Ganti 'produk_id' dengan nama yang sesuai

            // Tandai transaksi selesai dan tambahkan logika untuk menghapus data transaksi yang sudah selesai
            $this->tandai_transaksi_selesai($pelanggan_id, $produk_id);

            // Redirect to penjualan page
            redirect('petugas/keranjang');
        }
    }




    public function tandai_transaksi_selesai($pelanggan_id)
    {

        $this->MSudi->update_status_transaksi_selesai($pelanggan_id);
    }

    public function pindah_ke_detail_penjualan($transaksi)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // Struktur kolom di tabel detail_penjualan harus disesuaikan dengan kebutuhan aplikasi kamu
        $dataDetailPenjualan = array(
            'TransaksiID' => $transaksi->TransaksiID,
            'ProdukID' => $transaksi->ProdukID,
            'JumlahProduk' => $transaksi->quantity,
            'Subtotal' => $transaksi->quantity * $transaksi->Harga

        );

        // Masukkan data ke tabel detail_penjualan
        $this->db->insert('detailpenjualan', $dataDetailPenjualan);

        // Hapus data dari tabel transaksi
        $this->hapus_transaksi($transaksi->TransaksiID);
    }


    public function hapus_transaksi($transaksi_id)
    {
        $this->db->where('TransaksiID', $transaksi_id);
        $this->db->delete('transaksi');
    }


    public function export_pdf_detailpenjualan()
    {
        // Tangkap nilai startDate dan endDate dari form
        $startDate = $this->input->post('startDate');
        $endDate = $this->input->post('endDate');

        // Lakukan filter data menggunakan tanggal
        $this->load->model('MSudi');
        $data['detailPenjualan'] = $this->MSudi->getPdfDetailPenjualanByDate($startDate, $endDate);
        $data['DataProduk'] = $this->MSudi->GetData('produk');

        // Menambahkan data tanggal ke dalam array data
        $data['startDate'] = $startDate;
        $data['endDate'] = $endDate;

        // Load library Custompdf
        $this->load->library('Custompdf');
        $this->custompdf->setPaper('A4', 'landscape');
        $this->custompdf->filename = "laporan.pdf";

        // Load view dengan data yang sudah difilter
        $this->custompdf->load_view('nama_view', $data);
    }



    public function your_method()
    {
        // Now you can use the CustomPdf library
        $this->custompdf->your_custom_method();
    }



    public function user()
    {
        // $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('MSudi');
        $data['DataUser'] = $this->MSudi->GetData('user');
        $cari = $this->input->post('txt_cari');
        $data['DataUser'] = $this->MSudi->DataUser($cari)->result();

        // Modify your query to include user_role information
        $this->db->select('user.*, user_role.role');
        $this->db->from('user');
        $this->db->join('user_role', 'user.role_id = user_role.id', 'left');

        $data['DataUser'] = $this->db->get()->result();

        $data['content'] = 'petugas/user/index';
        $this->load->view('petugas/page', $data);
    }

    public function add()
    {
        // Handle form submission
        if ($this->input->post()) {
            // ... (your existing code)

            $userData = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => $this->input->post('role_id')
            );

            // Upload foto jika ada
            if (!empty($_FILES['photo']['name'])) {
                // ... (your existing code for uploading photo)
            }

            // Insert user data to the database
            $this->MSudi->addUser($userData);

            // Set flash data for success message
            $this->session->set_flashdata('success_message', 'User successfully added.');

            // Redirect to users page after successful insertion
            redirect(site_url('petugas/user/index'));
        }

        // Load the view for the add form
        $data['content'] = 'petugas/user/add';
        $this->load->view('petugas/page', $data);
    }

    // public function updateUser()
    // {
    //     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    //     $a = $this->input->post('id');
    //     $update['name'] = $this->input->post('name');
    //     $update['email'] = $this->input->post('email');
    //     $update['password'] = $this->input->post('password');
    //     $update['role'] = $this->input->post('role');

    //     $this->MSudi->UpdateData('user', 'id', $a, $update);

    //     redirect(site_url('petugas/user'));
    // }
    public function deleteDataUser($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('MSudi');
        $this->MSudi->DeleteData('user', 'id', $id);

        // Redirect ke halaman master setelah penghapusan
        redirect(site_url('petugas/user'));
    }
   


    public function detailpenjualan()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // Load model
        $this->load->model('MSudi');

        // Get data detail penjualan from model
        $data['DataDetailPenjualan'] = $this->MSudi->GetData('detailpenjualan');
        $data['DataProduk'] = $this->MSudi->GetData('produk');


        // Set view
        $data['content'] = 'petugas/detailpenjualan';
        $this->load->view('petugas/page', $data);
    }

    public function deleteDetail($DetailID)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('MSudi');
        $this->MSudi->DeleteData('detailpenjualan', 'DetailID', $DetailID);

        // Redirect ke halaman master setelah penghapusan
        redirect(site_url('petugas/detailpenjualan'));
    }



    public function penjualan()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // Load model
        $this->load->model('MSudi');

        // Use GetDataTransaksi() to get penjualan information
        $data['DataPenjualan'] = $this->MSudi->GetData('penjualan');
        $data['DataPelanggan'] = $this->MSudi->GetData('pelanggan');
        $data['DataProduk'] = $this->MSudi->GetData('produk');

        // Set view
        $data['content'] = 'petugas/penjualan';
        $this->load->view('petugas/page', $data);
    }

    public function kategori()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('MSudi');

        $cari = $this->input->post('txt_cari');
        $data['DataKategori'] = $this->MSudi->DataKategori($cari);

        $data['DataProduk'] = $this->MSudi->getProdukWithKategori();

        $data['content'] = 'petugas/kategori';
        $this->load->view('petugas/page', $data);
    }


    public function addDataKategori()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $add['NamaKategori'] = $this->input->post('NamaKategori');
        $add['TanggalKategori'] = $this->input->post('TanggalKategori');


        $this->MSudi->AddData('kategori', $add);

        redirect(site_url('petugas/kategori'));
    }

    public function updateDataKategori()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $a = $this->input->post('KategoriID');
        $update['NamaKategori'] = $this->input->post('NamaKategori');
        $update['TanggalKategori'] = $this->input->post('TanggalKategori');

        $this->MSudi->UpdateData('kategori', 'KategoriID', $a, $update);

        redirect(site_url('petugas/kategori'));
    }

    public function deleteDataKategori($KategoriID)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('MSudi');
        $this->MSudi->DeleteData('kategori', 'KategoriID', $KategoriID);

        // Redirect ke halaman master setelah penghapusan
        redirect(site_url('petugas/kategori'));
    }

    public function filter_detail_penjualan()
    {
        $tanggal = $this->input->post('tanggal');

        // Sesuaikan query Anda untuk mengambil data berdasarkan rentang tanggal yang dipilih
        $data['DataDetailPenjualan'] = $this->MSudi->get_data_by_date($tanggal);

        // Load view dengan data yang diperbarui
        $this->load->view('nama_view', $data);
    }

    // Assuming you have a controller method like this



}
