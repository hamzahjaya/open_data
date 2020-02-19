
  
    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(<?= base_url('assets/images/back.jpeg') ?>);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
            
            
            <div class="row justify-content-center mt-5">
              <div class="col-md-8 text-center">
                <!-- <h1>OPEN DATA KPU RI</h1> -->
              </div>
            </div>
            <div class="form-search-wrap mb-3"  data-aos-delay="200">
                <form method="post" action="<?= base_url('data/cari') ?>">
                    <div class="row align-items-center">
                        <div class="col-lg-12 mb-12 mb-xl-0 col-xl-10">
                            <input type="text" class="form-control rounded" name="cari" placeholder="Cari data">
                        </div>
                        <div class="col-lg-12 col-xl-2 ml-auto text-right">
                            <input type="submit" class="btn btn-primary btn-block rounded" value="Cari">
                        </div>

                    </div>
                </form>
            </div>
            
          </div>
        </div>
      </div>
    </div>  

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">

              <div class="row mb-3 align-items-stretch">
                  <?php foreach ($konten as $key => $value): ?>
                      <div class="col-md-12 col-lg-12 mb-12 mb-lg-12">
                          <div class="h-entry">
                              <h2 class="font-size-regular"><a href="<?= base_url('data/detail/'.$value['id_publikasi']) ?>" class="text-black"><?= $value['judul_publikasi'] ?></a></h2>
                              <p><?= $value['tagline'] ?></p>
                              <?php
                              foreach ($value['file'] as $key => $value1) {
                                  ?>
                                  <a href="<?= 'http://localhost:8080/data_admin/assets/file/'.$value1['nama_file'] ?>" target="_blank" class="btn btn-sm btn-dark">Unduh</a>
                                  <?php
                              }
                              ?>
                              <div class="meta mb-3">
                                  <!-- by Mark Spiker<span class="mx-1">&bullet;</span> Jan 18, 2019 <span class="mx-1">&bullet;</span>  -->
                                  <a href="<?= base_url('data/detail/'.$value['id_publikasi']) ?>">Lihat</a>
                              </div>
                          </div>
                      </div>
                  <?php endforeach ?>
              </div>

          </div>
          <div class="col-md-3 ml-auto">
            <div class="mb-5">
              <h3 class="h5 text-black mb-3"></h3>
              <ul class="list-unstyled">
                <?php foreach ($bagian as $key => $value): ?>
                  <li class="mb-2"><a href="<?= base_url('data/subbag/'.$value['id_biro'].'/'.$value['id_bagian'].'/'.$value['id_subbag']) ?>"><?= $value['nama_subbag'] ?></a></li>
                  
                <?php endforeach ?>
       
              </ul>
            </div>
          </div>

        </div>
      </div>
    </div>

    
    