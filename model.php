<?php
class Model {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;port=4306;dbname=binus_dim', 'root', '');
    }

//------------tabel HakAkses-----------------------------	
	public function getHakAkses() {
        $query = $this->db->query('SELECT * FROM hakakses');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getHakAksesById($id) {
        $stmt = $this->db->prepare('SELECT * FROM hakakses WHERE idAkses = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insertHakAkses($data) {
        $stmt = $this->db->prepare('INSERT INTO hakakses (idAkses, namaAkses, keterangan) VALUES (?, ?, ?)');
        $stmt->execute([$data['idAkses'], $data['namaAkses'], $data['keterangan']]);
    }
	
	public function updateHakAkses($data) {
        $stmt = $this->db->prepare('UPDATE hakakses SET idAkses = ?, namaAkses = ?, keterangan = ? WHERE idAkses = ?');
        $stmt->execute([$data['idAkses_new'], $data['namaAkses'], $data['keterangan'], $data['idAkses']]);
    }

    public function deleteHakAkses($idAkses) {
        $stmt = $this->db->prepare('DELETE FROM hakakses WHERE idAkses = ?');
        $stmt->execute([$idAkses]);
    }
	
//------------tabel pengguna-----------------------------	
	public function getPengguna() {
        $query = $this->db->query('SELECT * FROM pengguna');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPenggunaById($id) {
        $stmt = $this->db->prepare('SELECT * FROM pengguna WHERE idPengguna = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insertPengguna($data) {
        $stmt = $this->db->prepare('INSERT INTO pengguna (idPengguna, namaPengguna, password, namaDepan, namaBelakang, noHp, alamat, idAkses) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
		$stmt->execute([$data['idPengguna'], $data['namaPengguna'], $data['password'], $data['namaDepan'], $data['namaBelakang'], $data['noHp'], $data['alamat'], $data['idAkses']]);
    }
	
	public function updatePengguna($data) {
        $stmt = $this->db->prepare('UPDATE pengguna SET idPengguna = ?, namaPengguna = ?, password = ?, namaDepan = ?, namaBelakang = ?, noHp = ?, alamat = ?, idAkses = ? WHERE idPengguna = ?');
        $stmt->execute([$data['idPengguna_new'], $data['namaPengguna'], $data['password'], $data['namaDepan'], $data['namaBelakang'], $data['noHp'], $data['alamat'], $data['idAkses'], $data['idPengguna']]);
    }

    public function deletePengguna($idPengguna) {
        $stmt = $this->db->prepare('DELETE FROM pengguna WHERE idPengguna = ?');
        $stmt->execute([$idPengguna]);
    }
	
//------------tabel Barang-----------------------------
    public function getBarang() {
        $query = $this->db->query('SELECT * FROM barang');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBarangById($id) {
        $stmt = $this->db->prepare('SELECT * FROM barang WHERE idBarang = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insertBarang($data) {
        $stmt = $this->db->prepare('INSERT INTO barang (idBarang, idPengguna, keterangan, namaBarang, satuan) VALUES (?, ?, ?, ?, ?)');
        $stmt->execute([$data['idBarang'], $data['idPengguna'], $data['keterangan'], $data['namaBarang'], $data['satuan']]);
    }
	
	public function updateBarang($data) {
        $stmt = $this->db->prepare('UPDATE barang SET idBarang = ?, idPengguna = ?, keterangan = ?, namaBarang = ?, satuan = ? WHERE idBarang = ?');
        $stmt->execute([$data['idBarang_new'], $data['idPengguna'], $data['keterangan'], $data['namaBarang'], $data['satuan'], $data['idBarang']]);
    }

    public function deleteBarang($idBarang) {
        $stmt = $this->db->prepare('DELETE FROM barang WHERE idBarang = ?');
        $stmt->execute([$idBarang]);
    }
	
//------------tabel penjualan-----------------------------	
	public function getPenjualan() {
        $query = $this->db->query('SELECT * FROM penjualan');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPenjualanById($id) {
        $stmt = $this->db->prepare('SELECT * FROM penjualan WHERE idPenjualan = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insertPenjualan($data) {
        $stmt = $this->db->prepare('INSERT INTO penjualan (idPenjualan, jumlahPenjualan, hargaJual, idBarang) VALUES (?, ?, ?, ?)');
		$stmt->execute([$data['idPenjualan'], $data['jumlahPenjualan'], $data['hargaJual'], $data['idBarang']]);
    }
	
	public function updatePenjualan($data) {
        $stmt = $this->db->prepare('UPDATE penjualan SET idPenjualan = ?, jumlahPenjualan = ?, hargaJual = ?, idBarang = ? WHERE idPenjualan = ?');
        $stmt->execute([$data['idPenjualan_new'], $data['jumlahPenjualan'], $data['hargaJual'], $data['idBarang'], $data['idPenjualan']]);
    }

    public function deletePenjualan($idPenjualan) {
        $stmt = $this->db->prepare('DELETE FROM penjualan WHERE idPenjualan = ?');
        $stmt->execute([$idPenjualan]);
    }

//------------tabel pembelian-----------------------------	
	public function getPembelian() {
        $query = $this->db->query('SELECT * FROM pembelian');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPembelianById($id) {
        $stmt = $this->db->prepare('SELECT * FROM pembelian WHERE idPembelian = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insertPembelian($data) {
        $stmt = $this->db->prepare('INSERT INTO pembelian (idPembelian, jumlahPembelian, hargaBeli, idBarang) VALUES (?, ?, ?, ?)');
		$stmt->execute([$data['idPembelian'], $data['jumlahPembelian'], $data['hargaBeli'], $data['idBarang']]);
    }
	
	public function updatePembelian($data) {
        $stmt = $this->db->prepare('UPDATE pembelian SET idPembelian = ?, jumlahPembelian = ?, hargaBeli = ?, idBarang = ? WHERE idPembelian = ?');
        $stmt->execute([$data['idPembelian_new'], $data['jumlahPembelian'], $data['hargaBeli'], $data['idBarang'], $data['idPembelian']]);
    }

    public function deletePembelian($idPembelian) {
        $stmt = $this->db->prepare('DELETE FROM pembelian WHERE idPembelian = ?');
        $stmt->execute([$idPembelian]);
    }	

//---------------DASHBOARD-----------------
	public function calculateProfit() {
		$query = $this->db->
		query('
		SELECT
			SUM(keuntungan) AS totalKeuntungan
		FROM (
			SELECT
				barang.idBarang,
				barang.namaBarang,
				SUM(pembelian.jumlahPembelian * pembelian.hargaBeli) AS totalHargaBeli,
				SUM(penjualan.jumlahPenjualan * penjualan.hargaJual) AS totalHargaJual,
				(SUM(penjualan.jumlahPenjualan * penjualan.hargaJual) - SUM(pembelian.jumlahPembelian * pembelian.hargaBeli)) AS keuntungan
			FROM
				barang
			LEFT JOIN
				pembelian ON barang.idBarang = pembelian.idBarang
			LEFT JOIN
				penjualan ON barang.idBarang = penjualan.idBarang
			GROUP BY
				barang.idBarang, barang.namaBarang
		) AS subQuery;
		');
        return $query->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function calculateTotalPurchase() {
		$query = $this->db->
		query('
		SELECT
			SUM(jumlahPembelian * hargaBeli) AS totalPembelian
		FROM
			pembelian;
		');
        return $query->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function calculateTotalSelling() {
		$query = $this->db->
		query('
		SELECT
			SUM(jumlahPenjualan * hargaJual) AS totalPenjualan
		FROM
			penjualan;
		');
        return $query->fetchAll(PDO::FETCH_ASSOC);
	}
	

}
?> 



<?php
//CODE DIBAWAH DIPAKAI JIKA MENGGUNAKAN MYSQLI, TIDAK MENGGUNAKAN PDO

/* class Model {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli("localhost", "root", "", "binus_dim");

        // Check koneksi
        if ($this->conn->connect_error) {
            die("Koneksi Gagal: " . $this->conn->connect_error);
        }
    }
	
	public function executeQuery($query, $params = null) {
        $stmt = $this->conn->prepare($query);

        if ($params !== null) {
            // Binding parameters jika diperlukan
            $types = str_repeat('s', count($params));
            $stmt->bind_param($types, ...$params);
        }

        $stmt->execute();
        $this->lastQuery = $query; // Menyimpan query terakhir
        $stmt->close();
    }

    public function getLastQuery() {
        return $this->lastQuery;
    }

    public function getBarang() {
        $result = $this->conn->query('SELECT * FROM barang');
        $data = array();

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

    public function getBarangById($id) {
        $stmt = $this->conn->prepare('SELECT * FROM barang WHERE idBarang = ?');
        $stmt->bind_param('s', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        $stmt->close();

        return $data;
    }

    public function insertBarang($data) {
        $stmt = $this->conn->prepare('INSERT INTO barang (idPengguna, keterangan, namaBarang, satuan) VALUES (?, ?, ?, ?)');
        $stmt->bind_param('ssss', $data['idPengguna'], $data['keterangan'], $data['namaBarang'], $data['satuan']);
        $stmt->execute();
        $stmt->close();
    }

    public function updateBarang($idBarang, $data) {
        $stmt = $this->conn->prepare('UPDATE barang SET idPengguna = ?, keterangan = ?, namaBarang = ?, satuan = ? WHERE idBarang = ?');
        $stmt->bind_param('sssss', $data['idPengguna'], $data['keterangan'], $data['namaBarang'], $data['satuan'], $idBarang);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteBarang($idBarang) {
        $stmt = $this->conn->prepare('DELETE FROM barang WHERE idBarang = ?');
        $stmt->bind_param('s', $idBarang);
        $stmt->execute();
        $stmt->close();
    }
} */

?>

