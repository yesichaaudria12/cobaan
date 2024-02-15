 <!--Content right-->

 <?php

  function hariIndo($hariInggris)
  {
    switch ($hariInggris) {
      case 'Sunday':
        return 'Minggu';
      case 'Monday':
        return 'Senin';
      case 'Tuesday':
        return 'Selasa';
      case 'Wednesday':
        return 'Rabu';
      case 'Thursday':
        return 'Kamis';
      case 'Friday':
        return 'Jumat';
      case 'Saturday':
        return 'Sabtu';
      default:
        return 'hari tidak valid';
    }
  }

  $hariBahasaInggris = date('l');
  $hari = hariIndo($hariBahasaInggris);

  ?>

 <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
 <script type="text/javascript" src="jamServer.js"></script>
 <div class="col-sm-9 col-xs-12 content pt-3 pl-0">
   <?php if ($this->session->flashdata('flash')) : ?>
     <div class="alert alert-info alert-dismissible fade show" role="alert">
       <p><strong><i class="fa fa-info"></i> <?= $this->session->flashdata('flash'); ?></strong></p>
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
       <?= $this->session->unset_userdata('flash'); ?>
     </div>
   <?php endif ?>
   <?php if ($this->session->flashdata('s_absenggl')) : ?>
     <div class="alert alert-danger alert-dismissible fade show" role="alert">
       <p><strong><i class="fa fa-info"></i> <?= $this->session->flashdata('s_absenggl'); ?></strong></p>
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
       <?= $this->session->unset_userdata('s_absenggl'); ?>
     </div>
   <?php endif ?>
   <div class="mt-4 mb-4 p-3 bg-white border shadow-sm lh-sm">
     <div class="row border-bottom mb-4">
       <div class="col-sm-8 pt-2">
         <h6 class="mb-4 bc-header"><?= $title ?></h6>
       </div>
       <?php if ($absen['id_pegawai'] == 'peg') : ?>
         <div class="col-sm-4 text-right pb-3">
           <button class="btn btn-round btn-theme" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Ajukan Cuti</button>
         </div>
       <?php endif ?>

     </div>

     <div class="table-responsive">
       <table id="" class="table table-striped table-bordered">
         <thead>
           <tr>
             <th>#</th>
             <th>TANGGAL</th>
             <th>ABSEN MASUK</th>
             <?php if ($cek_lembur['id_pegawai'] != $absen['id_pegawai']) : ?>
               <?php if ($absen['keterangan'] == 1 || $absen['keterangan'] == 2 && $absen['id_lembur'] == null) : ?>
                 <th>ABSEN PULANG</th>
               <?php endif ?>
             <?php endif ?>
             <?php if ($cek_lembur['id_pegawai'] == $absen['id_pegawai']) : ?>
               <th>ABSEN LEMBUR</th>
             <?php endif ?>
           </tr>
         </thead>
         <tbody>
           <?php $tgl_skrng = date('d-F-Y'); ?>
           <tr>
             <td>#</td>
             <td><?= $hari ?>, <?= $tgl_skrng ?></td>
             <?php if ($absen['keterangan'] == 4 || $absen['keterangan'] == 5) : ?>
               <td colspan="2" class="text-center"><span class="badge badge-primary">ANDA HARI INI IZIN</span></td>
             <?php else : ?>
               <td>
                 <?php if ($absen['keterangan'] == null || $absen['keterangan'] == '' || $absen['keterangan'] < 1) : ?>
                   <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalMasuk"><i class="fa fa-check"></i>Absen Masuk</button>
                 <?php else : ?>
                   <?php if ($absen['status'] == 0) : ?>
                     <span class="badge badge-danger">Menunggu Konfirmasi</span>
                   <?php elseif ($absen['status'] >= 1) : ?>
                     <span class="badge badge-primary">Absen Masuk Terkonfirmasi</span>
                   <?php else : ?>
                   <?php endif ?>
                 <?php endif ?>
               </td>


               <?php if ($cek_lembur['id_pegawai'] != $absen['id_pegawai']) : ?>
                 <?php if ($absen['keterangan'] == 1 || $absen['keterangan'] == 2 && $absen['id_lembur'] == null) : ?>
                   <td>
                     <?php if ($absen['keterangan'] <= 1 && $absen['id_lembur'] == null && $absen['status'] <= 1 && $absen['status'] != 2) : ?>
                       <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalPulang"><i class="fa fa-check"></i> Absen Pulang</button>
                     <?php elseif ($absen['keterangan'] == null || $absen['keterangan'] == '') : ?>
                       <span class="badge badge-danger">Belum Waktu</span>
                     <?php else : ?>
                       <?php if ($absen['status'] == 1 && $absen['keterangan'] == 2) : ?>
                         <span class="badge badge-success">Menunggu Konfirmasi</span>
                       <?php elseif ($absen['status'] == 2 && $absen['keterangan'] == 2) : ?>
                         <span class="badge badge-primary">Absen Pulang Terkonfirmasi</span>
                       <?php else : ?>
                       <?php endif ?>
                     <?php endif ?>
                   </td>
                 <?php endif ?>
               <?php endif ?>
               <!--  -->
               <?php if ($cek_lembur['id_pegawai'] == $absen['id_pegawai']) : ?>
                 <td>
                   <?php if ($absen['keterangan'] != 3 &&  $absen['keterangan'] != '') : ?>
                     <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalLembur"><i class="fa fa-check"></i> Absen Lembur</button>
                   <?php elseif ($absen['keterangan'] == null || $absen['keterangan'] == '') : ?>
                     <span class="badge badge-danger">Belum Waktu</span>
                   <?php elseif ($absen['keterangan'] == 1 || $absen['keterangan'] == 2) : ?>
                     <span class="badge badge-danger">Anda Tidak Lembur Hari Ini</span>
                   <?php else : ?>
                     <?php if ($absen['status'] <= 2 && $absen['keterangan'] == 3) : ?>
                       <span class="badge badge-success">Menunggu Konfirmasi</span>
                     <?php elseif ($absen['status'] == 3 && $absen['keterangan'] == 3) : ?>
                       <span class="badge badge-primary">Absen Lembur Terkonfirmasi</span>
                     <?php else : ?>
                     <?php endif ?>
                   <?php endif ?>
                 </td>
               <?php endif ?>
             <?php endif ?>
           </tr>
         </tbody>
       </table>
     </div>
     <div class="modal fade" id="myModalMasuk" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
       <div class="modal-dialog modal-m">
         <div class="modal-content">
           <div class="modal-header text-center">
             <h5 class="modal-title text-secondary"><strong> Absen Masuk</strong></h5>
             <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
           </div>
           <div class="modal-body text-justify ">
             <?php echo form_open_multipart('pegawai/ambilabsen'); ?>
             <div class="card-body">
               <div class="row">
                 <div class="col-md-12">
                   <table style="width: 100%;">
                     <tr>
                       <td colspan="3" class="text-center">
                         <h2> <?= strtoupper($hari) ?>, <?= strtoupper($tgl_skrng)  ?>
                           <h4><span name="waktu " id="jamServer" class="mt-0">
                               <?php date_default_timezone_set('Asia/Jakarta');
                                echo  date('H:i:s'); ?>
                             </span>
                           </h4>
                         </h2>


                       </td>
                     </tr>
                     <tr>
                       <td colspan="3" class="text-center"></td>
                     </tr>
                     <tr>
                       <td width="20%">Nama</td>
                       <td>: </td>
                       <td><b><?= $pegawai['nama_pegawai'] ?></b></td>
                     </tr>
                     <tr>
                       <td>Jabatan</td>
                       <td>: </td>
                       <td><b><?= $pegawai['namjab'] ?></b></td>
                     </tr>
                   </table><br>
                   <input type="text" name="lat" class="form-control" value="" id="lat">
                   <input type="text" name="long" class="form-control" value="" id="long">
                   <input type="hidden" name="id_peg" class="form-control" value="<?= $pegawai['id_pegawai'] ?>" id="long">
                   <input type="hidden" name="keterangan" class="form-control" value="1" id="keterangan">
                   <div class="form-group">
                     <label class="">Upload Foto Selfie</label>
                     <div class="">
                       <input type="file" name="userfotoselfie" class="form-control" id="userfotoselfie" required>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>
           <!-- /.card-body -->
           <div class="modal-footer">
             <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
             <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
           </div>
           </form>
         </div>

       </div>
     </div>



     <div class="modal fade" id="myModalPulang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
       <div class="modal-dialog modal-m">
         <div class="modal-content">
           <div class="modal-header text-center">
             <h5 class="modal-title text-secondary"><strong> Absen Pulang </strong></h5>
             <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
           </div>
           <div class="modal-body text-justify ">
             <?php echo form_open_multipart('pegawai/ambilabsen-pulang'); ?>
             <div class="card-body">
               <div class="row">
                 <div class="col-md-12">
                   <table style="width: 100%;">
                     <tr>
                       <td colspan="3" class="text-center">
                         <h2> <?= strtoupper($hari) ?>, <?= strtoupper($tgl_skrng)  ?>
                           <h4><span name="waktu " id="jamServer" class="mt-0">
                               <?php date_default_timezone_set('Asia/Jakarta');
                                echo  date('H:i:s'); ?>
                             </span>
                           </h4>
                         </h2>


                       </td>
                     </tr>
                     <tr>
                       <td colspan="3" class="text-center"></td>
                     </tr>
                     <tr>
                       <td width="20%">Nama</td>
                       <td>: </td>
                       <td><b><?= $pegawai['nama_pegawai'] ?></b></td>
                     </tr>
                     <tr>
                       <td>Jabatan</td>
                       <td>: </td>
                       <td><b><?= $pegawai['namjab'] ?></b></td>
                     </tr>
                   </table><br>
                   <input type="text" name="lat" class="form-control" value="" id="lat_pul">
                   <input type="text" name="long" class="form-control" value="" id="long_pul">
                   <input type="hidden" name="id_peg" class="form-control" value="<?= $pegawai['id_pegawai'] ?>" id="long">
                   <input type="hidden" name="keterangan" class="form-control" value="2" id="keterangan">
                   <input type="text" name="id_presents" class="form-control" value="<?= $absen['id_presents'] ?>" id="id_presents">
                   <div class="form-group">
                     <label class="">Upload Foto Selfie</label>
                     <div class="">
                       <input type="file" name="userfotoselfie" class="form-control" id="userfotoselfie" required>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>
           <!-- /.card-body -->
           <div class="modal-footer">
             <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
             <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
           </div>
           </form>
         </div>

       </div>
     </div>

     <div class="modal fade" id="myModalLembur" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
       <div class="modal-dialog modal-m">
         <div class="modal-content">
           <div class="modal-header text-center">
             <h5 class="modal-title text-secondary"><strong> Absen Lembur </strong></h5>
             <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
           </div>
           <div class="modal-body text-justify ">
             <?php echo form_open_multipart('pegawai/ambilabsen-lembur'); ?>
             <div class="card-body">
               <div class="row">
                 <div class="col-md-12">
                   <table style="width: 100%;">
                     <tr>
                       <td colspan="3" class="text-center">
                         <h2> <?= strtoupper($hari) ?>, <?= strtoupper($tgl_skrng)  ?>
                           <h4><span name="waktu " id="jamServer" class="mt-0">
                               <?php date_default_timezone_set('Asia/Jakarta');
                                echo  date('H:i:s'); ?>
                             </span>
                           </h4>
                         </h2>


                       </td>
                     </tr>
                     <tr>
                       <td colspan="3" class="text-center"></td>
                     </tr>
                     <tr>
                       <td width="20%">Nama</td>
                       <td>: </td>
                       <td><b><?= $pegawai['nama_pegawai'] ?></b></td>
                     </tr>
                     <tr>
                       <td>Jabatan</td>
                       <td>: </td>
                       <td><b><?= $pegawai['namjab'] ?></b></td>
                     </tr>
                   </table><br>
                   <input type="text" name="lat" class="form-control" value="" id="lat_lem">
                   <input type="text" name="long" class="form-control" value="" id="long_lem">
                   <input type="hidden" name="id_peg" class="form-control" value="<?= $pegawai['id_pegawai'] ?>">
                   <input type="hidden" name="keterangan" class="form-control" value="3" id="keterangan">
                   <input type="text" name="id_presents" class="form-control" value="<?= $absen['id_presents'] ?>" id="id_presents">
                   <div class="form-group">
                     <label class="">Upload Foto Selfie</label>
                     <div class="">
                       <input type="file" name="userfotoselfie" class="form-control" id="userfotoselfie" required>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>
           <!-- /.card-body -->
           <div class="modal-footer">
             <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
             <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
           </div>
           </form>
         </div>

       </div>
     </div>
   </div>
   <!-- modal -->
   <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
     <div class="modal-dialog modal-lg">
       <div class="modal-content">
         <div class="modal-header text-center">
           <h5 class="modal-title text-secondary"><strong>Ajukan Cuti</strong></h5>
           <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
         </div>
         <div class="modal-body text-justify ">
           <?php echo form_open_multipart('pegawai/cuti-pegawai'); ?>
           <div class="card-body">
             <div class="row">
               <div class="col-md-6">
                 <input type="hidden" name="id_peg" class="form-control " value="<?= $pegawai['id_pegawai'] ?>" required>
                 <div class="form-group">
                   <label>Jenis Izin</label>
                   <div>
                     <select class="form-control" id="jenisizin" name="jenisizin">
                       <option value="">-pilih-</option>
                       <option value="4">Izin Sakit</option>
                       <option value="5">Izin Tidak Masuk</option>
                     </select>
                   </div>
                 </div>
                 <div class="form-group" name="suratsakit" id="suratsakit" hidden>
                   <label class="">Upload Surat Keterangan Sakit</label>
                   <div class="">
                     <input type="file" name="suratsakit" class="form-control" id="suratsakit">
                   </div>
                 </div>
                 <div class="form-group">
                   <label>Keterangan</label>
                   <div>
                     <input type="text" name="penjelasan" class="form-control " value="">
                   </div>
                 </div>
               </div>
               <div class="col-md-6">
                 <div class="col-md-12 ">
                   Ket.<br>
                   -Silahkan pilih jenis izin anda*<br>
                   -upload bukti keterangan dokter untuk "Izin Sakit"*<br>
                   -Silahkan isi keterangan alasan<br>
                 </div>
               </div>
             </div>

           </div>
           <!-- /.card-body -->
           <div class="modal-footer">
             <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
             <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
           </div>
           </form>
         </div>

       </div>
     </div>
   </div>



   <script>
     // var x = document.getElementById("demo");
     getLocation();

     function getLocation() {
       if (navigator.geolocation) {
         navigator.geolocation.getCurrentPosition(showPosition);
       } else {
         alert("Tidak support browser");
       }
     }

     function showPosition(position) {
       //  x.innerHTML = "Latitude:" + position.coords.latitude +
       //      "<br>Longitude: " + position.coords.longitude;
       $('#lat').val(position.coords.latitude);
       $('#long').val(position.coords.longitude);
       $('#lat_pul').val(position.coords.latitude);
       $('#long_pul').val(position.coords.longitude);
       $('#lat_lem').val(position.coords.latitude);
       $('#long_lem').val(position.coords.longitude);
     }
   </script>
   <script type="text/javascript">
     var serverClock = jQuery("#jamServer");
     if (serverClock.length > 0) {
       showServerTime(serverClock, serverClock.text());
     }

     function showServerTime(obj, time) {
       var parts = time.split(":"),
         newTime = new Date();

       newTime.setHours(parseInt(parts[0], 10));
       newTime.setMinutes(parseInt(parts[1], 10));
       newTime.setSeconds(parseInt(parts[2], 10));

       var timeDifference = new Date().getTime() - newTime.getTime();

       var methods = {
         displayTime: function() {
           var now = new Date(new Date().getTime() - timeDifference);
           obj.text([
             methods.leadZeros(now.getHours(), 2),
             methods.leadZeros(now.getMinutes(), 2),
             methods.leadZeros(now.getSeconds(), 2)
           ].join(":"));
           setTimeout(methods.displayTime, 500);
         },

         leadZeros: function(time, width) {
           while (String(time).length < width) {
             time = "0" + time;
           }
           return time;
         }
       }
       methods.displayTime();
     }
   </script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
   <script type='text/javascript'>
     $(window).load(function() {
       $("#jenisizin").change(function() {
         // console.log($("#instansi option:selected").val());
         if ($("#jenisizin option:selected").val() == '') {
           $('#suratsakit').prop('hidden', 'true');

         } else if ($("#jenisizin option:selected").val() == '4') {
           $('#suratsakit').prop('hidden', false);
         } else if ($("#jenisizin option:selected").val() == '5') {
           $('#suratsakit').prop('hidden', 'true');
         }
       });
     });
   </script>