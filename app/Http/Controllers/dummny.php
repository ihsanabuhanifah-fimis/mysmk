                            $attemp_sekarang = $jml_ujian +1;
                            if($jml_nilaisaya < $attemp){
                                $attemp=$request["attemp"];
                                $jwbpg[0]=['k'=> "lk"];
                                $jwbisi[0]=['k'=> "lk"];
                                $jwbtruefalse[0]=['k'=> "lk"];
                                $jawaban_soal_pg=json_encode($jwbpg);
                                $jawaban_soal_isi=json_encode($jwbisi);
                                $jawaban_soal_truefalse=json_encode($jwbtruefalse);
    
    
                                if(Hash::check($attemp_sekarang,$attemp)){
                                    $nilai = new Penilaian_siswa();
                                    $nilai -> id_cikgu = $banksoal[0]->id_cikgu;
                                    $nilai -> id_penilaian = $banksoal[0]->id;
                                    $nilai -> id_subject = $banksoal[0]->id_subject;
                                    $nilai -> id_rombel = $banksoal[0]->id_rombel;
                                    $nilai -> nis = $nis->nis;
                                    $nilai-> nilai = 0;
                                    $nilai -> tanggal= NOW();
                                    $nilai-> status=2;
                                    $nilai-> sisa_waktu =$banksoal[0]->durasi;
                                    $nilai -> jawab_soal1 = $jawaban_soal_pg;
                                    $nilai -> jawab_soal2 = $jawaban_soal_isi;
                                    $nilai -> jawab_soal3 = $jawaban_soal_truefalse;
                                    $nilai ->attemp = $attemp_sekarang;
                                    $nilai -> save();
                                            
                                    $idujian=DB::table('penilaian_siswas')
                                    ->where('id_penilaian',$banksoal[0]->id)
                                    ->where('nis',$nis->nis)
                                    ->where('attemp',$attemp_sekarang)
                                    ->get();
    
                               
    
                                    $jwb_soal1=json_decode($jawaban_soal_pg);
                                    $jwb_soal2=json_decode($jawaban_soal_isi);
                                    $jwb_soal3=json_decode($jawaban_soal_truefalse);
                                    return view('siswa.ujian',['attemp'=>$idujian,'jwb_soal1'=>$jwb_soal1,'jwb_soal2'=>$jwb_soal2,'jwb_soal3'=>$jwb_soal3,'banksoals'=>$banksoal,'soals1'=>$soals1,'soals2'=>$soals2,'soals3'=>$soals3]);
                            }else{
                                return "Anda sudah mengerjakan tugas ini";
                            }
                            
                        }else{
                            return "Mohon maaf anda tidak memiliki akses. Silahkan hubungi guru pengampu";