<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Pelanggan extends CI_Controller {


    public $input;
	public $MSudi;
	function __construct()
	{
		parent::__construct();
		$this->load->model('MSudi');

	}


    public function index()
    {
        if($this->session->userdata('akses')=='pelanggan'){

            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['content'] = 'pelanggan/dashboard'; // Assuming you have a dashboard view
            $data['DataProduk'] = $this->MSudi->get_available_products(); // Mendapatkan produk yang tersedia
            $jumlahProduk = $this->MSudi->hitungJumlahProduk();

            // Mengirim data ke view
            $data['jumlahProduk'] = $jumlahProduk;
        
            // Memuat view dashboard dengan data
            $this->load->view('pelanggan/page', $data);
        }   
        else
        {
            echo "Anda tidak berhak mengakses halaman ini";
        }
       
        
    }

    public function produk()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('MSudi');
        
        $cari = $this->input->post('txt_cari');
        $data['DataProduk'] = $this->MSudi->DataProduk($cari)->result();
        $data['content'] = 'pelanggan/produk'; // Assuming you have a produk view
        $this->load->view('pelanggan/page', $data);
    }

    

    // public function kategori()
    // {
    //     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    //     $this->load->model('MSudi');
        
    //     $cari = $this->input->post('txt_cari');
    //     $data['DataKategori'] = $this->MSudi->DataKategori($cari)->result();
    //     $data['DataKategori'] = $this->MSudi->GetData('kategori');
    //     $data['content'] = 'pelanggan/kategori'; // Assuming you have a produk view
    //     $this->load->view('pelanggan/page', $data);
    // }

    // public function addDataKategori()
    // {
    //     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    //         $add['IDKategori'] = $this->input->post('IDKategori');
    //         $add['NamaKategori'] = $this->input->post('NamaKategori');
    //         $add['tgl_input'] = $this->input->post('tgl_input');
    
    //         $this->MSudi->AddData('kategori', $add);
    
    //         redirect(site_url('pelanggan/kategori'));
    // }

    // public function deleteDataKategori($IDKategori)
    // {
    //     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    //         $this->load->model('MSudi');
    //         $this->MSudi->DeleteData('kategori', 'IDKategori', $IDKategori);

    //     // Redirect ke halaman master setelah penghapusan
    //         redirect(site_url('pelanggan/kategori'));
       
    // }

    // public function updateDataKategori()
    // {
    //     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    //     $a = $this->input->post('IDKategori');
    //     $update['NamaKategori'] = $this->input->post('NamaKategori');
    //     $update['tgl_input'] = $this->input->post('tgl_input');

    //     $this->MSudi->UpdateData('kategori', 'IDKategori', $a, $update);

    //     redirect(site_url('pelanggan/kategori'));
       
    // }


//     public function transaksi()
//     {
//         $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
//         $this->load->model('MSudi');
//         $data['DataProduk'] = $this->MSudi->GetData('produk');
//         $data['DataTransaksi'] = $this->MSudi->GetData('transaksi');
//         $data['content'] = 'pelanggan/transaksi'; // Assuming you have a transaksi view
//         $this->load->view('pelanggan/page', $data);

        
//     }

   

//     public function tambah_ke_transaksi()
//     {
//         $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

//         // Mengambil data dari formulir POST
//         $id_produk = $this->input->post('ProdukID');
//         $nama_produk = $this->input->post('NmProduk');
//         $harga = $this->input->post('Harga');
//         $quantity = $this->input->post('Stok');


//         // Hitung total harga berdasarkan quantity
//         $total_harga = $harga * $quantity;

//         // Logika tambahkan data ke dalam tabel transaksi (Anda dapat menyimpannya ke dalam database)
//         $data_transaksi = array(
//             'TanggalTransaksi' => date('Y-m-d H:i:s'), // Gunakan timestamp sesuai kebutuhan Anda
//             'Harga' => $total_harga,
//             'ProdukID' => $id_produk,
//             'quantity' => $quantity
//             // Anda mungkin perlu menambahkan kolom lain sesuai dengan struktur tabel transaksi Anda
//         );

//         // Simpan data transaksi ke dalam database (disesuaikan dengan model dan metode penyimpanan data di database Anda)
//         $this->load->model('MSudi'); 
//         $this->MSudi->InsertData('transaksi', $data_transaksi);
//         $this->MSudi->update_stok_produk($id_produk, $quantity);

//         // Redirect kembali ke halaman produk atau halaman yang sesuai
//         redirect(site_url('pelanggan/transaksi'));
//     }

//     public function simpan_pelanggan()
// {
//     // Load necessary models and libraries
//     $this->load->model('MSudi');

//     // Validasi input
//     $this->form_validation->set_rules('NamaPelanggan', 'Nama Pelanggan', 'required');

//     if ($this->form_validation->run() == FALSE) {
//         // Jika validasi gagal, kembalikan ke halaman sebelumnya atau tampilkan pesan kesalahan
//         redirect('halaman_sebelumnya');
//     } else {
//         // Jika validasi berhasil, simpan data pelanggan
//         $dataPelanggan = array(
//             'NamaPelanggan' => $this->input->post('NamaPelanggan'),
//             'Alamat' => $this->input->post('Alamat'),
//             'NomorTelepon' => $this->input->post('NomorTelepon')
//         );

//         $pelanggan_id = $this->MSudi->InsertData('pelanggan', $dataPelanggan);

//         // Ambil data transaksi yang sesuai dengan pelanggan
//         $transaksiData = $this->MSudi->get_transaksi_by_pelanggan($pelanggan_id);

//         // Loop through each transaction and insert into penjualan
//         foreach ($transaksiData as $transaksi) {
//             $penjualanData = array(
//                 'TanggalPenjualan' => $transaksi->TanggalTransaksi,
//                 'Harga' => $transaksi->Harga,
//                 'PelangganID' => $transaksi->PelangganID,
//                 'ProdukID' => $transaksi->ProdukID
//             );

//             // Insert into penjualan table
//             $this->MSudi->InsertData('penjualan', $penjualanData);

//             // Tambahkan logika untuk menghapus data transaksi yang sudah selesai
//             $this->MSudi->hapus_transaksi_by_pelanggan($pelanggan_id);
//         }

//         redirect('pelanggan/transaksi');
//     }
// }



// public function tandai_transaksi_selesai($pelanggan_id) {

//     $this->MSudi->update_status_transaksi_selesai($pelanggan_id);
// }

// public function pindah_ke_detail_penjualan($transaksi) {
//     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

//     $jumlah_produk = $transaksi->quantity;

//     // Check if $jumlah_produk is NULL or less than or equal to 0
//     if ($jumlah_produk === NULL || $jumlah_produk <= 0) {
//         $jumlah_produk = 1; // Set a default value if it's NULL or less than or equal to 0
//     }
    
//     $dataDetailPenjualan = array(
//         'TransaksiID' => $transaksi->TransaksiID,
//         'PenjualanID' => 2,
//         'ProdukID' => $transaksi->ProdukID,
//         'JumlahProduk' => $jumlah_produk,
//         'Subtotal' => $jumlah_produk * $transaksi->Harga
//     );
    
//     // Masukkan data ke tabel detail_penjualan
//     $this->db->insert('detailpenjualan', $dataDetailPenjualan);
    
//     // Hapus data dari tabel transaksi
//     $this->hapus_transaksi($transaksi->TransaksiID);
    
// }


// public function hapus_transaksi($transaksi_id)
//  {
//     $this->db->where('TransaksiID', $transaksi_id);
//     $this->db->delete('transaksi');
// }


    public function detailPenjualan()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('MSudi');

        $cari = $this->input->post('txt_cari');
        $data['DataProduk'] = $this->MSudi->DataProduk($cari)->result();
        $data['DetailPenjualan'] = $this->MSudi->GetData('detailpenjualan');
        $data['DataTransaksi'] = $this->MSudi->GetData('transaksi');
        $data['content'] = 'pelanggan/detailpenjualan';
        $this->load->view('pelanggan/page', $data);
    }

    

    // public function kategori()
    // {
    //     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    
    //     // Load the model and fetch category data
    //     $this->load->model('MSudi');
    //     $data['categories'] = $this->MSudi->getDataKategori();

    //     // Set the view
    //     $data['content'] = 'pelanggan/kategori';
    //     $this->load->view('pelanggan/page', $data);
    // }
    
    

    // Add this method to your pelanggan controller
    public function export_pdf_detailpenjualan() {
        // Memuat library Dompdf
        $this->load->library('custompdf');
    
        // Mendapatkan data untuk PDF dari model
        $data['DetailPenjualan'] = $this->MSudi->GetData('detailpenjualan');
        $data['DataProduk'] = $this->MSudi->GetData('produk');
    
        // Memuat view PDF
        $this->custompdf->load_view('pelanggan/exportPdf', $data);
    }
    

    public function penjualan()
{
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->model('MSudi');

    $data['DataPelanggan'] = $this->MSudi->getDataPelanggan();
    $data['DataProduk'] = $this->MSudi->getDataProduk();
    $data['DataPenjualan'] = $this->MSudi->getDataPenjualan(); // Pastikan model mengembalikan data penjualan
    $data['content'] = 'pelanggan/penjualan';
    
    $this->load->view('pelanggan/page', $data);
}

    public function simpan_penjualan()
    {
        $dataPenjualan = array(
            'TanggalPenjualan' => $this->input->post('TanggalPenjualan'),
            'Harga' => $this->input->post('Harga'),
            'PelangganID' => $this->input->post('PelangganID'),
            'ProdukID' => $this->input->post('ProdukID')
        );

        $this->MSudi->insertData('penjualan', $dataPenjualan);

        redirect(site_url('pelanggan/penjualan'));
    }

   











}
