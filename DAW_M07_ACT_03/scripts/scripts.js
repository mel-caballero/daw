function aparcarDisplay() {
  let aparcar = document.getElementById('aparcar');
  let retirar = document.getElementById('retirar');

  if (aparcar.checked) {
    document.getElementById('aparcarSmall').disabled = false;
    document.getElementById('aparcarBig').disabled = false;
    document.getElementById('retirarSmall').disabled = true;
    document.getElementById('retirarBig').disabled = true;
    document.getElementById('retirarSmall').checked = false;
    document.getElementById('retirarBig').checked = false;
    document.getElementById('plaza').disabled = true;
  } else if (retirar.checked) {
    document.getElementById('retirarSmall').disabled = false;
    document.getElementById('retirarBig').disabled = false;
    document.getElementById('plaza').disabled = false;
    document.getElementById('aparcarSmall').disabled = true;
    document.getElementById('aparcarBig').disabled = true;
    document.getElementById('aparcarSmall').checked = false;
    document.getElementById('aparcarBig').checked = false;
  } else {
    document.getElementById('aparcarSmall').disabled = true;
    document.getElementById('aparcarBig').disabled = true;
    document.getElementById('retirarSmall').disabled = true;
    document.getElementById('retirarBig').disabled = true;
    document.getElementById('aparcarSmall').checked = false;
    document.getElementById('aparcarBig').checked = false;
    document.getElementById('retirarSmall').checked = false;
    document.getElementById('retirarBig').checked = false;
    document.getElementById('plaza').disabled = true;
  }
}