var pathArray = window.location.pathname.split('/');
// console.log(pathArray.length);

var str = "../";
$path = window.location.protocol + "/" + "/" +
    window.location.host + "/" +
    pathArray[1] + "/";  // public
// console.log($path);

var socialMedia = {
    facebook: 'http://facebook.com/kamran.nafisspour',
    twitter: 'http://twitter.com/kamy333',
    flickr: 'http://flickr.com/planetotheweb',
    youtube: 'http://youtube.com/planetoftheweb',
    linkedin: 'https://www.linkedin.com/nhome/'
};

var socialList = function () {
    var output = '<ul>',
        myList = document.querySelectorAll('.socialmediaicons');
    for (var key in arguments[0]) {
        output += '<li><a href="' + socialMedia[key] + '">' +
            '<img src="' + $path + 'img/social_media/' + key + '.png" alt="icon for ' + key + '">' +
            '</a></li>';
    }
    output += '</ul>';


    for (var i = myList.length - 1; i >= 0; i--) {
        myList[i].innerHTML = output;
    }
}(socialMedia);