/*
Template Name:  - Admin & Dashboard Template
Author: STH
Website: https://STH.com/
Contact: STH@gmail.com
File: Project overview init js
*/

// favourite btn
var favouriteBtn = document.querySelectorAll(".favourite-btn");
if (favouriteBtn) {
    Array.from(document.querySelectorAll(".favourite-btn")).forEach(function (item) {
        item.addEventListener("click", function (event) {
            this.classList.toggle("active");
        });
    });
}
