/**
 * Created by Kamran on 29-Jan-16.
 */
var width = window.width || document.documentElement.clientWidth || document.body.clientWidth || document.body.offsetWidth;
var height = window.height || document.documentElement.clientHeight || document.body.clientHeight || document.body.offsetHeight;

document.getElementById("window-width").innerHTML = width + 'px';
document.getElementById("window-height").innerHTML = height + 'px';