<div class="container-fluid p-0">
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3>Approval Registrasi Akun Admin</h3>
        </div>
    </div>

    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="message"></div>
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="antri-tab" data-bs-toggle="tab" data-bs-target="#antri" type="button" role="tab" aria-controls="antri" aria-selected="true">Antrian</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="terima-tab" data-bs-toggle="tab" data-bs-target="#terima" type="button" role="tab" aria-controls="terima" aria-selected="false">Terima</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="tolak-tab" data-bs-toggle="tab" data-bs-target="#tolak" type="button" role="tab" aria-controls="tolak" aria-selected="false">Tolak</button>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="antri" role="tabpanel" aria-labelledby="antri-tab">
              <div class="container mt-3">
                <div class="table-responsive antradm">
                  
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="terima" role="tabpanel" aria-labelledby="terima-tab">
              <div class="container mt-3">
                <div class="table-responsive trmadm">
                  
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="tolak" role="tabpanel" aria-labelledby="tolak-tab">
              <div class="container mt-3">
              <div class="table-responsive tlkadm">
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

<?php require 'btn/approv_acc.php'; ?>