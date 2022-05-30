var active;
function remove(){
    for (let index = 0; index < 6; index++) {
        if (document.getElementById("img-id" + index).classList.contains('view-img') && document.getElementById("content-" + index).classList.contains('view-content')) {
            document.getElementById("img-id" + index).classList.remove('view-img');
            document.getElementById("img-id" + index).classList.add('img');
            document.getElementById("content-" + index).classList.remove('view-content');
            document.getElementById('content-' + index).innerHTML = null;
        }
    }
}
function view(number){
    remove();
    if (active != number) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function(){
            if (this.readyState === 4 && this.status === 200) {
                var jsObject = JSON.parse(this.responseText);
                var data = jsObject[number];
                var text ="<li><ul><span>Processor: </span>"+ data.Processor +"</ul><ul>Storage / RAM: </span>" + data.Storage +"</ul><ul><span>Camera: </span>" + data.Camera +"</ul><ul><span>Screen: </span>" + data.Screen+"</ul><ul><span>Operating System: </span>" + data.Operating +"</ul><ul><span>Battery: </span>" + data.Battery +"</ul></li><a href='' target='_blank' >More</a>";
                document.getElementById('content-' + number).innerHTML = text;
                document.getElementById("content-" + number).classList.add('view-content');
                document.getElementById("img-id" + number).classList.remove('img');
                document.getElementById("img-id" + number).classList.add('view-img');
            }
        };
        xhr.open('GET', 'data.json', true);
        xhr.send();
        active = number;
    }
}