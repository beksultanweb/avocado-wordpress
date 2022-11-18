// Date
var elements = document.querySelectorAll('#date');
elements.forEach(el => el.oninput = function () {
    if(this.value.length > 4) {
        this.value = this.value.slice(0, 4);
    }
    if(this.value > 2022) {
        this.value = 2022
    }
})
// Sea
var distances = document.querySelectorAll('#sea');
distances.forEach(el => el.oninput = function () {
    if(this.value.length > 4) {
        this.value = this.value.slice(0, 4);
    }
})
// Price
var prices = document.querySelectorAll('#price');
prices.forEach(el => el.oninput = function () {
    // for(let i = 0; i < this.value.length; i++){
    //     if(this.value.length === 4 || this.value.length === 7 || this.value.length === 10) {
    //         console.log(this.value[i]);
    //     }
    // }
    this.value = this.value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, " ")
})

function validateForm() {
    let maxprice = document.querySelector('input[name="maxprice"]'),
        minprice = document.querySelector('input[name="minprice"]');
    if(maxprice.value != "" && minprice.value == "") minprice.value = 0;
    if(maxprice.value == 0) {
        maxprice.value = ""
        minprice.value = ""
    }

    let maxdate = document.querySelector('input[name="maxdate"]'),
        mindate = document.querySelector('input[name="mindate"]');
    if(maxdate.value != "" && mindate.value == "") mindate.value = 1800;
    if(maxdate.value == 0) {
        maxdate.value = ""
        mindate.value = ""
    }
}