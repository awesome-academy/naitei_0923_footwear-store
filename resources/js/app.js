require("./bootstrap");
import Swiper from "swiper/bundle";
import Alpine from "alpinejs";
import { increaseCart, decreaseCart } from "./route";
window.Alpine = Alpine;

Alpine.start();

(function (global) {
    var increment = "increment";
    var decrement = "decrement";
    var $global = {};
    $global.increaseQuantity = function (id) {
        const uri = increaseCart.concat(id);
        updateQuantity(id, uri, increment);
    };
    $global.decreaseQuantity = function (id) {
        const uri = decreaseCart.concat(id);
        updateQuantity(id, uri, decrement);
    };
    const updateQuantity = (id, uri, action) => {
        const request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                const response = JSON.parse(this.responseText);
                document.getElementById(id).value = response.quantity;
                document.getElementById("fullprice-" + id).innerHTML =
                    response.quantity * response.price;
                const subTotal = document.getElementById("sub-total");
                if (action === "increment") {
                    subTotal.innerText =
                        parseFloat(subTotal.innerText) +
                        parseFloat(response.price);
                } else {
                    subTotal.innerText =
                        parseFloat(subTotal.innerText) -
                        parseFloat(response.price);
                }
            }
        };
        request.open("GET", uri, true);
        request.send(); // for POST only
    };
    global.$global = $global;
})(window);

var mySwiper = new Swiper(".swiper", {
    direction: "horizontal",
    slidesPerView: 5,
    spaceBetween: 10,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    scrollbar: {
        el: ".swiper-scrollbar",
    },
});
window.Swiper = Swiper;
