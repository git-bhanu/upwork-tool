require('./bootstrap');
require('alpinejs');
import flatpickr from "flatpickr";

let flatpickerEl = document.querySelectorAll('.flatpickr');
import 'flatpickr/dist/flatpickr.css';

for (let i = 0, len = flatpickerEl.length; i < len; i++) {
    console.log(flatpickerEl[i]);
}

flatpickerEl.forEach((el) => {
     flatpickr(el, {
         mode: "range",
         dateFormat: "Y-m-d",
         disable: [
         ]
     })
});
