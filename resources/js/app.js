require('./bootstrap');

window.moment = require('moment');

const Swal = require('sweetalert2');

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

window.Toast = Toast;

window.addEventListener('confirm-dialog', function(event){
    Swal.fire({
        title: event.detail.title,
        text: event.detail.text,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: event.detail.confirmButtonText
    }).then((result) => {
        if (result.isConfirmed) {
           Livewire.emit('destroy', event.detail.data)
        }
    })
})

window.addEventListener('show-toast', function(event){
    Toast.fire({
        icon: event.detail.icon,
        title: event.detail.title
    })
})

window.addEventListener('show-modal', function(event){
    $('#'+event.detail.id).modal('show');
})

window.addEventListener('hide-modal', function(event){
    $('#'+event.detail.id).modal('hide');
})
