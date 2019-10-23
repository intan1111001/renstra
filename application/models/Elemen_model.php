<?php 
class Elemen_model extends CI_Model 
 
    { 
    public $table = 'elemen'; 
 
    public $id = 'id'; 
 
    public $order = 'DESC'; 
 
    function __construct() 
        { 
        parent::__construct(); 
        } 
 
    // get all 
 
    function get_all($filter = "") 
        { 
            $strSql = 'select * FROM elemen WHERE isdelete = 0 order by id';
            $query = $this->db->query($strSql);
            $data = $query->result();
            return $data;
        } 

        
    function get_id_indikator() 
    { 
        $strSql = 'select i.id  FROM elemen e LEFT JOIN indikator i ON e.id = i.elemen_id where e.isdelete = 0 and i.isdelete = 0 and iskualitatif = "0" order by id';
        $query = $this->db->query($strSql);
        $data = $query->result_array();
        return $data;
    }
 
    // get data by id 
 
    function get_by_id($id) 
        { 
        $this->db->where($this->id, $id); 
        return $this->db->get($this->table)->row(); 
        } 
 
    // insert data 
 
    function insert($data) 
        { 
        $this->db->insert($this->table, $data); 
        } 
 
    // update data 
 
    function update($id, $data) 
        { 
        $this->db->where($this->id, $id); 
        $this->db->update($this->table, $data); 
        } 
 
    // delete data 
 
    function delete($id) 
        { 
        $this->db->where($this->id, $id); 
        $this->db->delete($this->table); 
        } 

    function getdatasurvei($id,$id_survei){

        $sql = "select e.id id_elemen, e.capaian, e.jenis, i.id indikator_id, i.iskualitatif, i.jenis indikator_jenis   FROM elemen e LEFT JOIN indikator i ON e.id = i.elemen_id where i.id = $id";
        $query = $this->db->query($sql);
        $capaian = $query->result();
        $filter1="";
        $filter2="";
        if($id_survei != null){
            $filter1 = "AND t.survei_id = ".$id_survei;
            $filter2 = "AND d.survei_id = ".$id_survei;

        }
        $sql = "select s.id, indikator_id, s.jenis, COALESCE(dilakukan,-1) AS dilakukan FROM elemen e JOIN indikator i ON e.id = i.elemen_id JOIN subindikator s ON i.id = s.indikator_id 
        LEFT JOIN tindakan t ON t.subindikator_id = s.id $filter1 where i.id = $id";
        $query = $this->db->query($sql);
        $subindikator = $query->result();

        $sql = "select k.id,subindikator_id, k.jenis, COALESCE(ketersediaan,-1) ketersediaan,COALESCE(kesesuaian,-1) kesesuaian,keterangan,file  FROM elemen e JOIN indikator i ON e.id = i.elemen_id JOIN subindikator s ON i.id = s.indikator_id JOIN komponen k ON k.subindikator_id = s.id  
        LEFT JOIN dokpendukung d ON d.komponen_id = k.id $filter2
        where i.id = $id";
        $query = $this->db->query($sql);
        $komponen = $query->result();

        $data_final['capaian'] = $capaian;
        $data_final['subindikator'] = $subindikator;
        $data_final['komponen'] = $komponen;
        return $data_final;
    }

    function getdataallsurvei($id){

        $sql = "select e.id id_elemen, e.capaian, e.jenis, i.id indikator_id, i.iskualitatif, i.jenis indikator_jenis   FROM elemen e LEFT JOIN indikator i ON e.id = i.elemen_id where i.id = $id";
        $query = $this->db->query($sql);
        $capaian = $query->result();

        $sql = "select s.id, indikator_id, s.jenis, ROUND((COUNT(IF(dilakukan = 1, 1, NULL))/COUNT(dilakukan)*100),2) ya,  ROUND((COUNT(IF(dilakukan <> 1, 1, NULL))/COUNT(dilakukan)*100),2) tidak
         FROM elemen e JOIN indikator i ON e.id = i.elemen_id JOIN subindikator s ON i.id = s.indikator_id 
        LEFT JOIN tindakan t ON t.subindikator_id = s.id 
        where i.id = $id  GROUP BY ID";
        $query = $this->db->query($sql);
        $subindikator = $query->result();

        $sql = "select k.id,i.id indikator_id,subindikator_id, k.jenis, ROUND((COUNT(IF(ketersediaan = 1, 1, NULL))/COUNT(ketersediaan)*100),2) ya_ketersediaan,  ROUND((COUNT(IF(ketersediaan <> 1, 1, NULL))/COUNT(ketersediaan)*100),2) tidak_ketersediaan ,
        ROUND((COUNT(IF(kesesuaian = 1, 1, NULL))/COUNT(kesesuaian)*100),2) ya_kesesuaian,  ROUND((COUNT(IF(kesesuaian <> 1, 1, NULL))/COUNT(kesesuaian)*100),2) tidak_kesesuaian 
         FROM elemen e JOIN indikator i ON e.id = i.elemen_id JOIN subindikator s ON i.id = s.indikator_id JOIN komponen k ON k.subindikator_id = s.id 
         LEFT JOIN dokpendukung d ON d.komponen_id = k.id    
        where i.id = $id  GROUP BY ID";
        $query = $this->db->query($sql);
        $komponen = $query->result();

        $data_final['capaian'] = $capaian;
        $data_final['subindikator'] = $subindikator;
        $data_final['komponen'] = $komponen;
        return $data_final;
        }

        function getdetaildilakukan($indikator_id,$dilakukan, $subindikator_id){

            $sql = "SELECT s.id,ss.unit, un.nama_unit, s.jenis
            FROM elemen e 
            JOIN indikator i ON e.id = i.elemen_id 
            JOIN subindikator s ON i.id = s.indikator_id 
            JOIN tindakan t ON t.subindikator_id = s.id 
            JOIN survei ss ON t.survei_id = ss.id 
            JOIN simpeg_0511.m_unit un ON un.kode_unit = ss.unit 
            WHERE i.id = $indikator_id AND dilakukan = $dilakukan AND s.id = $subindikator_id AND ss.status != 0 AND t.dilakukan IS NOT NULL 
            GROUP BY ID,ss.unit ORDER BY un.nama_unit";
            $query = $this->db->query($sql);
            $capaian = $query->result();

        
            return $capaian;
            }


            function getdokpendukung($indikator_id,$ketersediaan = null, $kesesuaian = null, $subindikator_id, $komponen_id){
                $filter = "";
                if($ketersediaan <> "null"){
                    $filter = "AND ketersediaan = $ketersediaan ";
                }

                if($kesesuaian <> "null"){
                    $filter = "AND kesesuaian = $kesesuaian ";
                }
                
                $sql = "SELECT k.id,subindikator_id,  ss.unit, un.nama_unit 
                FROM elemen e 
                JOIN indikator i ON e.id = i.elemen_id 
                JOIN subindikator s ON i.id = s.indikator_id 
                JOIN komponen k ON k.subindikator_id = s.id  
                JOIN dokpendukung d ON d.komponen_id = k.id 
                JOIN survei ss ON d.survei_id = ss.id 
                JOIN simpeg_0511.m_unit un ON un.kode_unit = ss.unit 
                WHERE i.id = $indikator_id 
                $filter                
                AND subindikator_id = $subindikator_id AND ss.status != 0
                AND k.id = $komponen_id
                GROUP BY ID,ss.unit ORDER BY un.nama_unit";
                $query = $this->db->query($sql);
                $capaian = $query->result();

            
                return $capaian;
            }
    }
