import './bootstrap';
import 'flowbite';
import InitGantt from './components/frappe-gantt';
import {InitDatepicker, InitDaterangePicker} from './components/datepicker';
import Alpine from 'alpinejs';
import Swal from 'sweetalert2';

window.Alpine = Alpine;


window.InitGantt = InitGantt
window.InitDatepicker = InitDatepicker
window.InitDaterangePicker = InitDaterangePicker
window.ToastDelayed = function(toast) {
    setTimeout(() => {
        if (toast) {
            toast.classList.add('opacity-0', 'transition-opacity', 'duration-500'); // Fade out effect
            setTimeout(() => toast.remove(), 500); // Remove after fade-out
        }
    }, 4000);
}

window.InitSwal = function(event) {
    event.preventDefault()
    console.log(this, event)
    alert(this)
    Swal.fire(
        "Are you sure?",
        "Action can't be undone"
    ).then(res => {
        alert(res)
    })
}

Alpine.start();
