var modalDelete = document.getElementById('modalDelete')
modalDelete.addEventListener('show.bs.modal', function (event) {
  var button = event.relatedTarget;
  var id = button.getAttribute('data-id');
  var nombre = button.getAttribute('data-nombre');
  var modalTitle = modalDelete.querySelector('.modal-title');
  modalTitle.textContent = 'Se va a eliminar ' + nombre;
  var action = $('#formDelete').attr('action').slice(0,-1);
  action += id;
  $('#formDelete').attr('action', action);
})



