<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MSudi extends CI_Model
{
    function AddData($tabel, $data=array())
    {
        $this->db->insert($tabel,$data);
    }
    

    function UpdateData($tabel,$fieldid,$fieldvalue,$data=array())
    {
        $this->db->where($fieldid,$fieldvalue)->update($tabel,$data);
    }

    function DeleteData($tabel,$fieldid,$fieldvalue)
    {
        $this->db->where($fieldid,$fieldvalue)->delete($tabel);
    }

    function GetData($tabel)
    {
        $query= $this->db->get($tabel);
        return $query->result();
    }

    function GetDataWhere($tabel,$id,$nilai)
    {
        $this->db->where($id,$nilai);
        $query= $this->db->get($tabel);
        return $query;
    }

    public function GetDataTransaksi()
{
    $this->db->select('transaksi.*, pelanggan.NamaPelanggan, produk.NmProduk');
    $this->db->from('transaksi');
    $this->db->join('pelanggan', 'transaksi.PelangganID = pelanggan.PelangganID', 'left');
    $this->db->join('produk', 'transaksi.ProdukID = produk.ProdukID', 'left');
    $query = $this->db->get();
    return $query->result();
}

    
    
    
public function GetDataDetailPenjualan()
{
    $this->db->select('detailpenjualan.DetailID, transaksi.TanggalTransaksi, produk.NmProduk, detailpenjualan.JumlahProduk, detailpenjualan.Subtotal');
    $this->db->from('detailpenjualan');
    $this->db->join('transaksi', 'transaksi.TransaksiID = detailpenjualan.TransaksiID');
    $this->db->join('produk', 'produk.ProdukID = detailpenjualan.ProdukID');
    $query = $this->db->get();
    return $query->result();
}


    function DataPelanggan($cari)
    {
        $query = $this->db->query("Select * From pelanggan where NamaPelanggan  like '%$cari%'");
        return $query;
    }


    function DataUser($cari)
    {
        $query = $this->db->query("Select * From User where name  like '%$cari%'");
        return $query;
    }


    function DetailPenjualan($cari)
    {
        $query = $this->db->query("Select * From detailpenjualan where TransaksiID like '%$cari%'");
        return $query;
    }

    function DataProduk($cari)
    {
        $query = $this->db->query("Select * From produk where NmProduk like '%$cari%'");
        return $query;
    }

    

	public function InsertData($table, $data)
    {
        // Implementasi logika penyimpanan data di sini
        $this->db->insert($table, $data);
    }

    public function hapus_transaksi_by_pelanggan($pelanggan_id) {
        $this->db->where('PelangganID', $pelanggan_id);
        $this->db->delete('transaksi'); 
    }

	public function get_transaksi_belum_selesai_by_pelanggan($pelanggan_id) {
        $this->db->where('PelangganID', $pelanggan_id);
        $this->db->where('status', 'belum selesai');
        $query = $this->db->get('transaksi');

        return $query->result();
    }

    public function update_status_transaksi($transaksi_id) {
        $this->db->where('TransaksiID', $transaksi_id);
        $this->db->update('transaksi', array('status' => 'selesai'));
    }

    public function update_status_transaksi_selesai($pelanggan_id) {
        $dataTransaksiBelumSelesai = $this->get_transaksi_belum_selesai_by_pelanggan($pelanggan_id);

        foreach ($dataTransaksiBelumSelesai as $transaksi) {
            // Tandai transaksi sebagai 'selesai'
            $this->update_status_transaksi($transaksi->TransaksiID);

            // Pindahkan data transaksi ke tabel detail_penjualan
            $this->pindah_ke_detail_penjualan($transaksi);
        }
    }

    public function pindah_ke_detail_penjualan($transaksi) {
        // Struktur kolom di tabel detail_penjualan harus disesuaikan dengan kebutuhan aplikasi kamu
        $dataDetailPenjualan = array(
            'PenjualanID' => date('Y-m-d'),
            'TransaksiID' => $transaksi->TransaksiID,
            'ProdukID' => $transaksi->ProdukID,
            'JumlahProduk' => $transaksi->quantity,
            'Subtotal' => $transaksi->quantity * $transaksi->Harga
        );

        // Masukkan data ke tabel detail_penjualan
        $this->db->insert('detailpenjualan', $dataDetailPenjualan);

        // Hapus data dari tabel penjualan
        $this->hapus_transaksi($transaksi->TransaksiID);
    }

    public function GetDataDetailPenjualanById($DetailID) {
        // Query untuk mengambil detail penjualan berdasarkan ProdukID
        $this->db->select('*');
        $this->db->from('detailpenjualan');
        $this->db->where('DetailID', $DetailID);
        $query = $this->db->get();
    
        // Mengembalikan hasil query dalam bentuk array objek
        return $query->result();
    }
    


    public function hapus_transaksi($transaksi_id) {
        $this->db->where('TransaksiID', $transaksi_id);
        $this->db->delete('transaksi');
    }

    public function getProdukInfoById($produkID) {
        // Kueri untuk mendapatkan informasi produk berdasarkan ProdukID
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->where('ProdukID', $produkID);
        $query = $this->db->get();
    
        // Periksa apakah kueri berhasil
        if ($query->num_rows() > 0) {
            return $query->row(); // Mengembalikan satu baris hasil kueri
        } else {
            return null; // Produk tidak ditemukan
        }
    }

    public function get_transaksi_by_pelanggan($pelanggan_id) {
        return $this->db->get_where('transaksi', array('PelangganID' => $pelanggan_id))->result();
    }

    public function get_penjualan_by_pelanggan($pelanggan_id)
    {
        $this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->where('PelangganID', $pelanggan_id);

        $query = $this->db->get();

        return $query->result();
    }

    public function get_pelanggan_by_id($pelanggan_id) {
        return $this->db->get_where('pelanggan', array('PelangganID' => $pelanggan_id))->row();
    }

    public function DataKategori($cari = null)
{
    if ($cari) {
        $this->db->like('NamaKategori', $cari);
    }

    return $this->db->get('kategori')->result();
}

public function getDataPelangganByID($pelangganID) {
    // Query untuk mengambil data pelanggan berdasarkan ID pelanggan
    $this->db->select('*');
    $this->db->from('pelanggan');
    $this->db->where('PelangganID', $pelangganID);
    $query = $this->db->get();
    
    // Mengembalikan hasil query dalam bentuk objek
    return $query->row(); // Mengembalikan satu baris data pelanggan
}

public function getPdfDetailPenjualan() {
    return $this->db->get('detailPenjualan')->result();
}


public function getProdukWithKategori()
{
    $this->db->select('produk.*, kategori.NamaKategori');
    $this->db->from('produk');
    $this->db->join('kategori', 'kategori.KategoriID = produk.KategoriID', 'left');
    return $this->db->get()->result();
}


        // untuk mengurangi stok
        public function update_stok_produk($id_produk, $quantity)
    {
        // Mengambil stok produk saat ini dari database
        $stok_sekarang = $this->db->select('Stok')->where('ProdukID', $id_produk)->get('produk')->row()->Stok;

        // Menghitung stok baru
        $stok_baru = $stok_sekarang - $quantity;

        // Memperbarui stok di database
        $this->db->where('ProdukID', $id_produk)->update('produk', ['Stok' => $stok_baru]);
    }

   
    public function getAllUsers() {
        return $this->db->get('user')->result();
    }

    public function addUser($userData) {
        $this->db->insert('user', $userData);
    }

    public function getPenjualanInfo()
    {
        $this->db->select('transaksi.*, pelanggan.NamaPelanggan');
        $this->db->from('transaksi');
        $this->db->join('pelanggan', 'transaksi.PelangganID = pelanggan.PelangganID', 'left');
        $query = $this->db->get();
                return $query->result();
    }
    public function getDataPenjualan()
    {
        // Modify the query to select the actual column names
        // $this->db->select('PenjualanID, TanggalPenjualan, Harga, NamaPelanggan, NmProduk');
        $this->db->join('pelanggan', 'penjualan.PelangganID = pelanggan.PelangganID');
        return $this->db->get('penjualan');
    }

    public function getDataProduk() {
        return $this->db->get('produk')->result();
    }

    // Fungsi untuk mengambil data pelanggan
    public function getDataPelanggan() {
        return $this->db->get('pelanggan');
    }


    public function get_available_products() {
        $this->db->where('Stok >', 0); // Hanya ambil produk dengan stok lebih dari 0
        return $this->db->get('produk')->result();
    }

    public function hitungJumlahProduk()
{
    // Menghitung jumlah baris (jumlah produk)
    $jumlahProduk = $this->db->count_all('produk');

    return $jumlahProduk;
}


public function getStokProduk($produkID) {
    // Ambil stok produk berdasarkan ProdukID dari tabel produk
    $this->db->select('Stok');
    $this->db->where('ProdukID', $produkID);
    $query = $this->db->get('produk');
    $result = $query->row();
    return $result->Stok;
}
public function getAllProduk() {
    // Ambil semua data produk dari tabel produk
    $query = $this->db->get('produk');
    return $query->result();
}

public function getKategori()
{
    // Ambil data kategori dari tabel kategori
    return $this->db->get('kategori')->result();
}


public function getAllKategori() {
    // Ambil semua data kategori dari tabel kategori
    $query = $this->db->get('kategori');
    return $query->result();
}


public function get_detail_penjualan_by_date($selectedDate) 
{
    $this->db->select('*');
    $this->db->from('detailpenjualan');
    $this->db->where('PenjualanID', $selectedDate);
    $query = $this->db->get();

    return $query->result();
}

public function getDataPelangganWithSubtotalAndKembalian() {
    // Query untuk mengambil data pelanggan dengan subtotal dan kembalian
    $query = $this->db->query("
       SELECT p.*, 
       (SELECT SUM(t.Subtotal) FROM transaksi t WHERE t.PelangganID = p.PelangganID) AS Subtotal, 
       (SELECT SUM(t.Kembalian) FROM transaksi t WHERE t.PelangganID = p.PelangganID) AS Kembalian 
FROM pelanggan p

        LEFT JOIN transaksi t ON p.PelangganID = t.PelangganID
        GROUP BY p.PelangganID
    ");
    // Mengembalikan hasil query sebagai array of objects
    return $query->result();
}

public function getPdfDetailPenjualanByDate($startDate, $endDate) {
    // Lakukan query database untuk mendapatkan detail penjualan berdasarkan rentang tanggal
    $this->db->select('*');
    $this->db->from('detailpenjualan');
    $this->db->where('PenjualanID >=', $startDate);
    $this->db->where('PenjualanID <=', $endDate);
    $query = $this->db->get();

    // Mengembalikan hasil query
    return $query->result();
}







}

    
    
    


  