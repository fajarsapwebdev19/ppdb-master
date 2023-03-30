// negara
function wng(ng) {
  if (ng == 0) {
    document.getElementById('country').style.display = 'none';

    document.getElementById('n').required = false;
  }
  else {
    document.getElementById('country').style.display = 'block';

    document.getElementById('n').required = true;
  }
}

// kps
function kps(k) {
  if (k == 0) {
    document.getElementById('kps').style.display = 'block';

    document.getElementById('no_kps').required = true;
  }
  else {
    document.getElementById('kps').style.display = 'none';

    document.getElementById('no_kps').required = false;
  }
}

// kip
function pkip(pip) {
  if (pip == 0) {
    document.getElementById('pip').style.display = 'block';

    document.getElementById('kip').required = true;

    document.getElementById('nama_kip').required = true;

    document.getElementById('al_kip').required = true;
  }
  else {
    document.getElementById('pip').style.display = 'none';

    document.getElementById('kip').required = false;

    document.getElementById('nama_kip').required = false;

    document.getElementById('al_kip').required = false;
  }
}

// data wali
function wali(w) {
  if (w == 0) {
    document.getElementById("wali").style.display = 'block';

    document.getElementById('nm_w').required = true;

    document.getElementById('nik_w').required = true;

    document.getElementById('tl_w').required = true;

    document.getElementById('pnd_w').required = true;

    document.getElementById('pkr_w').required = true;

    document.getElementById('pg_w').required = true;
  }
  else {
    document.getElementById("wali").style.display = 'none';

    document.getElementById('nm_w').required = false;

    document.getElementById('nik_w').required = false;

    document.getElementById('tl_w').required = false;

    document.getElementById('pnd_w').required = false;

    document.getElementById('pkr_w').required = false;

    document.getElementById('pg_w').required = false;
  }
}

// jarak rumah ke sekolah
function j_skl(tempuh)
{
  if(tempuh==1)
  {
    document.getElementById('kilo').style.display = 'none';
    document.getElementById('sebut').required = false;
  }
  else
  {
    document.getElementById('kilo').style.display = 'block';
    document.getElementById('sebut').required = true;
  }
}