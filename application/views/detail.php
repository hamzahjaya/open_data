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
                        <a href="<?= base_url('/data_admin/assets/file/'.$value1['nama_file']) ?>" target="_blank" class="btn btn-sm btn-dark"><?= $value1['nama_format'] ?></a>
                        <?php
                    }
                    ?>
                  <div class="meta mb-3">
                    <!-- by Mark Spiker<span class="mx-1">&bullet;</span> Jan 18, 2019 <span class="mx-1">&bullet;</span>  -->
                  </div>
                </div> 
              </div>               
              <?php endforeach ?>
            </div>

          </div>

        </div>
      </div>
    </div>

    
    