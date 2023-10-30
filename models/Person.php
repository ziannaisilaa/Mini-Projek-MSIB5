<?php
class Person{
    //member1 variabel
	private $koneksi;
	//member2 konstruktor
	public function __construct(){
		global $dbh; //memanggil variabel di file lain
		$this->koneksi = $dbh;
	}
    //member3 fungsionalitas
    public function index(){
        //$sql = "SELECT * FROM produk";
        $sql = "SELECT person.*,
        agama.nama_agama AS Agama
        FROM person
        INNER JOIN agama ON agama.id = person.idagama
        ORDER BY person.id DESC";
        //$rs = $this->koneksi->query($sql);
        //PDO prepare statement
		$ps = $this->koneksi->prepare($sql);
		$ps->execute();
		$rs = $ps->fetchAll();
		return $rs;
    }

    public function simpan($data){
        $sql = "INSERT INTO person (
            idagama,
            nama,
            gender,
            tempat_lahir,
            tgl_lahir,
            no_hp,
            email,
            media_sosial,
            prodi,
            kampus,
            mentor,
            foto)
                VALUES (
                    ?,
                    ?,
                    ?,
                    ?,
                    ?,
                    ?,
                    ?,
                    ?,
                    ?,
                    ?,
                    ?,
                    ?)";
        //PDO prepare statement
		$ps = $this->koneksi->prepare($sql);
		$ps->execute($data);
    }

    public function getPerson($id){
        $sql = "SELECT person.*,
        agama.nama_agama AS Agama  
        FROM person
        INNER JOIN agama ON agama.id = person.idagama
        WHERE person.id = ?";
        //PDO prepare statement
		$ps = $this->koneksi->prepare($sql);
		$ps->execute([$id]);
		$rs = $ps->fetch();
		return $rs;
    }

    public function ubah($data){
        $sql = "UPDATE person SET idagama=?, nama=?,gender=?,tempat_lahir=?,tgl_lahir=?,no_hp=?,email=?,media_sosial=?,prodi=?,kampus=?,mentor=?,foto=?
        WHERE id = ?";
        //PDO prepare statement
		$ps = $this->koneksi->prepare($sql);
		$ps->execute($data);
    }

    public function hapus($id){
        $sql = "DELETE FROM person WHERE id = ?";
        //PDO prepare statement
		$ps = $this->koneksi->prepare($sql);
		$ps->execute([$id]);
    }
    
    public function cari($keyword) {
        $keyword = '%' . $keyword . '%'; // Add wildcards to the keyword for a partial match
    
        $sql = "SELECT person.*, agama.nama_agama AS Agama
                FROM person
                INNER JOIN agama ON agama.id = person.idagama 
                WHERE person.nama LIKE :keyword OR 
                      agama.nama_agama LIKE :keyword OR 
                      person.kampus LIKE :keyword";
    
        // Prepare the statement
        $stmt = $this->koneksi->prepare($sql);
    
        // Bind the keyword parameter
        $stmt->bindParam(':keyword', $keyword, PDO::PARAM_STR);
    
        // Execute the statement
        $stmt->execute();
    
        // Fetch the results
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $rs;
    }
    
    public function filter($agama){
        $sql = "SELECT person.*, agama.nama_agama AS Agama
                FROM person INNER JOIN agama
                ON agama.id = person.idagama 
                WHERE agama.id = ?
                ORDER BY person.id DESC";
        //$rs = $this->koneksi->query($sql);
        //PDO prepare statement
		$ps = $this->koneksi->prepare($sql);
		$ps->execute([$agama]);
		$rs = $ps->fetchAll();
		return $rs;
    }
}