import { DateRangePicker, Datepicker } from 'flowbite-datepicker';

function InitDatepicker(el) {
    console.log(el)
    var dp = new Datepicker(el)
}

function InitDaterangePicker(el) {
    const options = {
        format: "dd-mm-yyyy"
    };
    var drp = new DateRangePicker(el, options)
}


export {
    InitDatepicker,
    InitDaterangePicker,
}
