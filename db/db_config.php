<?php
	class database extends PDO{
		protected $dsn = 'mysql:host=localhost;dbname=db_spk_kredit';
		protected $dsu = 'root';
		protected $dsp = '';
		private $cmd = '';

		function __construct(){
			try {
				$this->db = new PDO($this->dsn,$this->dsu,$this->dsp);
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}

		//core query
		function select($c,$t){
			$this->cmd = "select $c from $t";
			return $this;
		}

		function insert($t,$v){
			$this->cmd = "insert into $t values($v)";
			return $this;
		}

		function update($t,$v){
			$this->cmd = "update $t set $v";
			return $this;
		}

		function truncate($table){
			$this->cmd = "truncate $table";
			return $this;
		}

		function delete($t){
			$this->cmd = "delete from $t";
			return $this;
		}

		function alter($t,$act,$c,$format){
			$this->cmd = "alter table $t $act $c $format";
			return $this;
		}
		//additional query
		function where($params){
			$this->cmd .= " where $params";
			return $this;
		}

		function group_by($c){
			$this->cmd .= " group by $c";
			return $this;
		}

		function order_by($c,$t){
			$this->cmd .= " order by $c $t";
			return $this;
		}

		function like($c){
			$this->cmd .= " like '%$c%'";	
			return $this;
		}

		//executable
		function get(){
			// echo $this->cmd;
			$q = $this->db->prepare($this->cmd);
			$q->execute();
			return $q->fetchAll();
		}
		function count(){
			//echo $this->cmd;
			$q = $this->db->prepare($this->cmd);
			$q->execute();
			return $q->rowCount();	
		}

		//proses normalisasi
		function rumus($data,$kemampuan){          

            foreach($this->select('type','kriteria')->where("kriteria='$kemampuan'")->get() as $crt){
                if($crt[0]=='Benefit'){
					foreach ($this->select("max(sub_kriteria.nilai)",'hasil_tpa,sub_kriteria')->where('hasil_tpa.'.$kemampuan.'=sub_kriteria.id_subkriteria')->get() as $nm) {
                        $nilai_max = $nm[0];
                    }
                    return $rumus = $data / $nilai_max;
                    // foreach ($this->select("max($kemampuan)",'hasil_tpa')->get() as $nm) {
                    //     $nilai_max = $nm[0];
                    // }
                    // return $rumus = $data / $nilai_max;
                } else {
					foreach ($this->select("min(sub_kriteria.nilai)",'hasil_tpa,sub_kriteria')->where('hasil_tpa.'.$kemampuan.'=sub_kriteria.id_subkriteria')->get() as $nm) {
                        $nilai_min = $nm[0];
                    }
                    return $rumus = $nilai_min / $data;
                	// foreach ($this->select("min($kemampuan)",'hasil_tpa')->get() as $nm) {
                    //     $nilai_min = $nm[0];
                    // }
                    // return $rumus = $nilai_min / $data;
                }
            }    
        }

		//Hasil Ranking
		function ranking($id,$namaz, $hasilz, $tglz, $mingguz, $bulanz, $tahunz, $keteranganz) {
			if ($this->insert('hasil_akhir',"'','$id','$namaz','$hasilz','$tglz','$mingguz','$bulanz','$tahunz','$keteranganz'")->count()){
				// echo $nama." ".$hasil;
			}
		}

		//nilaigap
		function match($id_kr,$id_subkriteria,$nilai_gap,$nilai_bobot,$tanggal_lap,$kriteriaz,$nama){
			if ($this->insert('match_',"'','$id_kr','$id_subkriteria','$nilai_gap','$nilai_bobot','$tanggal_lap','$kriteriaz','$nama'")->count()){
				// echo "banding disimpan";
			}
		}

        //proses hasil 
        function bobot($kemampuan){
        	foreach ($this->select('bobot','kriteria')->where("kriteria='$kemampuan'")->get() as $bb) {
        		return $bb[0];
            }	
		}
		
		function totaladmin(){
        	foreach ($this->select('count(*)','admin')->get() as $bb) {
        		return $bb[0];
            }	
		}

		function totalkaryawan(){
        	foreach ($this->select('count(*)','kreditur')->get() as $bb) {
        		return $bb[0];
            }	
		}

		function totalkriteria(){
        	foreach ($this->select('count(*)','kriteria')->get() as $bb) {
        		return $bb[0];
            }	
		}

		function totalsubkriteria(){
        	foreach ($this->select('count(*)','sub_kriteria')->get() as $bb) {
        		return $bb[0];
            }	
		}

		function getnamesubkriteria($subkriteria)
		{
			foreach ($this->select('subkriteria','sub_kriteria')->where("id_subkriteria='$subkriteria'")->get() as $value) {
        		return $value[0];
            }
		}
		
		function getnilaiprofilekreditur($nilaiprofilek)
		{
			foreach ($this->select('nilai_kreditur','profile_kreditur')->where("id_calon_kr='$nilaiprofilek'")->get() as $value) {
        		return $value[0];
            }
		}

		function getidsubkriteria($subkriteriaz)
		{
			foreach ($this->select('id_subkriteria','sub_kriteria')->where("id_subkriteria='$subkriteriaz'")->get() as $value) {
        		return $value[0];
            }
		}

		function getnamekriteria($typeKr)
		{
			foreach ($this->select('nama_kriteria','kriteria')->where("id_kriteria='$typeKr'")->get() as $value) {
        		return $value[0];
            }
		}

		function gettypekriteria($typeKr)
		{
			foreach ($this->select('bobot','kriteria')->where("id_kriteria='$typeKr'")->get() as $value) {
        		return $value[0];
            }
		}



		function weekOfMonth($qDate) {
			$dt = strtotime($qDate);
			$day  = date('j',$dt);
			$month = date('m',$dt);
			$year = date('Y',$dt);
			$totalDays = date('t',$dt);
			$weekCnt = 1;
			$retWeek = 0;
			for($i=1;$i<=$totalDays;$i++) {
				$curDay = date("N", mktime(0,0,0,$month,$i,$year));
				if($curDay==7) {
					if($i==$day) {
						$retWeek = $weekCnt+1;
					}
					$weekCnt++;
				} else {
					if($i==$day) {
						$retWeek = $weekCnt;
					}
				}
			}
			return $retWeek;
		}


		//nambah ini
		function join($params){
			$this->cmd .= " inner join $params";
			return $this;
		}
		function getnilaiprofilekreditur2($nilaiprofilek,$idkriteria)
		{
			foreach ($this->select('nilai_kreditur','profile_kreditur')->where("id_calon_kr='$nilaiprofilek' and id_kriteria='$idkriteria'")->get() as $value) {
        		return $value[0];
            }
		}

		function getketerangan($idkriteria,$nilai){
			if ($idkriteria == "67"){                                    
				switch ($nilai) {
				case "1":
				  return "2.500.000 – 3.499.000";
				  break;
				case "2":
				  return "3.500.000 – 5.499.000 ";
				  break;
				case "3":
				  return "5.500.000 – 7.999.000";
				  break;
				  case "4":
					return "8.000.000 – 15.000.000 ";
					break;
				default:
				  return "15.000.000 – 50.000.000";
			  } 
			 }else if ($idkriteria == "68") { 
			
				switch ($nilai) {
				case "2":
				  return "46 - 55";
				  break;
				case "3":
				  return "24 - 26";
				  break;
				case "4":
				  return "36 - 45";
				  break;
				case "5":
					return "27 - 35 ";
					break;
				default:
				  return "17 - 23";
			  }

			} else if ($idkriteria == "69") {
			
				switch ($nilai) {
				case "1":
				  return "Kost";
				  break;
				case "2":
				  return "Kontrak";
				  break;
				case "3":
				  return "Milik Keluarga";
				  break;
				 case "4":
					return "Milik Sendiri";
					break;
  
				default:
				  return "Milik Orang Tua";
			  }

			 } else if ($idkriteria == "72") { 

				switch ($nilai) {
				case "1":
				  return "7 Tahun";
				  break;
				case "2":
				  return "6 Tahun";
				  break;
				case "3":
				  return "4 - 5 Tahun";
				  break;
				  case "3":
					return "2 - 3 Tahun";
					break;

				default:
				  return "1 Tahun";
			  }
			 } else if ($idkriteria == "73") {

				switch ($nilai) {
				case "1":
				  return "Pensiunan";
				  break;
				case "2":
				  return "Profesional";
				  break;
				case "3":
				  return "Wiraswasta";
				  break;
				case "3":
					return "Karyawan Swasta";
					break;

				default:
				  return "Pns";
			  }

			 }
		}

		function getKeterenganValue($idkriteria)
		{
			$gaji = array (
				array("value"=>"1", "keterangan"=>"2.500.000 – 3.499.000 "),
				array("value"=>"2", "keterangan"=>"3.500.000 – 5.499.000"),
				array("value"=>"3", "keterangan"=>"5.500.000 – 7.999.000 "),
				array("value"=>"4", "keterangan"=>"8.000.000 – 15.000.000 "),
				array("value"=>"5", "keterangan"=>"15.000.000 – 50.000.000 "),
				
			  );
			  $usia = array (
				array("value"=>"1", "keterangan"=>"17 – 23 "),
				array("value"=>"2", "keterangan"=>"46 – 55"),
				array("value"=>"3", "keterangan"=>"24 – 26"),
				array("value"=>"4", "keterangan"=>"36 – 45"),
				array("value"=>"5", "keterangan"=>"27 – 35 "),
				
			  );
			  $tempatTinggal = array (
				array("value"=>"1", "keterangan"=>"Kost"),
				array("value"=>"2", "keterangan"=>"Kontrak"),
				array("value"=>"3", "keterangan"=>"Milik Keluarga"),
				array("value"=>"4", "keterangan"=>"Milik Sendiri"),
				array("value"=>"5", "keterangan"=>"Milik Orang Tua "),
				
			  );
			  $umurMotor = array (
				array("value"=>"1", "keterangan"=>"7 Tahun "),
				array("value"=>"2", "keterangan"=>"6 Tahun "),
				array("value"=>"3", "keterangan"=>"4 – 5 Tahun"),
				array("value"=>"4", "keterangan"=>"2 – 3 Tahun "),
				array("value"=>"5", "keterangan"=>"1 Tahun"),
				
			  );
			  $pekerjaan = array (
				array("value"=>"1", "keterangan"=>"Pensiunan"),
				array("value"=>"2", "keterangan"=>"Profesional"),
				array("value"=>"3", "keterangan"=>"Wiraswasta"),
				array("value"=>"4", "keterangan"=>"Karyawan Swasta"),
				array("value"=>"5", "keterangan"=>"PNS"),
				
			  );
			if ($idkriteria == "67"){    
				return  $gaji;                           
			 }else if ($idkriteria == "68") { 
				return  $usia;                           
			} else if ($idkriteria == "69") {
				return  $tempatTinggal;                           
			 } else if ($idkriteria == "72") { 
				return  $umurMotor;                           
			 } else if ($idkriteria == "73") {
				return  $pekerjaan;                           

			 }
			  
		}
		
		
		
	}
	$db = new database();
?>