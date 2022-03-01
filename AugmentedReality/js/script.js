
function resizeCanvas(origCanvas, width, height) {
    let resizedCanvas = document.createElement("canvas");
    let resizedContext = resizedCanvas.getContext("2d");

    resizedCanvas.height = height;
    resizedCanvas.width = width;

    resizedContext.drawImage(origCanvas, 0, 0, width, height);

    return resizedCanvas.toDataURL();
}

function resizeCanvasModel(origCanvas, width, height) {
    let resizedCanvas = document.createElement("canvas");
    let resizedContext = resizedCanvas.getContext("2d");
    var w, h, offsetX;
    if (screen.width < screen.height) {
        w = height * (height / width);
        h = width * (height / width);
        offsetX = -(height - width);
    }
    else {
        w = width;
        h = height;
        offsetX = 0;
    }
    resizedCanvas.height = height;
    resizedCanvas.width = width;

    resizedContext.drawImage(origCanvas, offsetX-30, 0, w, h);
    return resizedCanvas.toDataURL();
}

function saveUrlAsFile(url, fileName) {
    fileName += Math.floor((Math.random() * 1000000)).toString();
    fileName += ".png";
    var link = document.createElement("a");
    link.setAttribute("href", url);
    link.setAttribute("download", fileName);
    link.click();
}

$(function() {
    document.getElementById("do_capture").onclick = function () {
        var img = document.getElementById("view_img");
        var imageOfVideo = new Image();
        var loader = document.getElementsByClassName("loader")[0];
        loader.style.display = "block";
        var imageOfCanvas = new Image();
        var view_modal = document.getElementsByClassName("view_modal")[0];
        var body = document.getElementsByTagName("body")[0];
        //imageOfVideo.src = 'data:image/png;base64,iVBORw0K...';
        var videoTag = $("video");
        html2canvas(document.getElementsByTagName("video")[0], {
            width: videoTag.width(),
            height: videoTag.height()
        }).then(function (canvas) {
            // resize image of video and get toDataURL code
            var video_image = resizeCanvas(canvas, videoTag.width(), videoTag.height());
            // video_image = video_image.replace("data:image/png;base64,", "");
            video_image = video_image.split(' ').join('+');
            imageOfVideo.src = video_image;
            // console.log("videoTag.width(): " + videoTag.width());
            // console.log("videoTag.height(): " + videoTag.height());



            // getting canvas of model
            var model_canvas = document.querySelector("a-scene").components.screenshot.getCanvas("perspective");

            // resize image of model and get toDataURL code
            var model_image = resizeCanvasModel(model_canvas, videoTag.width(), videoTag.height());
            // model_image = model_image.replace("data:image/png;base64,", "");
            model_image = model_image.split(' ').join('+');
            imageOfCanvas.src = model_image;
            // console.log("model_canvas width: " + model_canvas.width);
            // console.log("model_canvas height: " + model_canvas.height);

            img.onload = function () {  // убираем значок загрузки
                loader.style.display = "none";
            }


            mergeImages([video_image, model_image])  // слияние 2 фото в один и вывод в главную страницу
                .then(b64 => img.src = b64);

        });

        //view image MODAL

        //change to block from none
        img.style.display = "block";
        view_modal.style.display = "block";
        body.style.overflowY = "hidden";

        //hide modal
        window.onclick = function(event) {
            if (event.target == view_modal) {
                view_modal.style.display = "none";
                body.style.overflowY = "auto";
                img.src = '';
            }
        }

        $('span#download').on('click',function(e){
            var viewImg = $("#view_img");
            var viewImgSrc = document.querySelector('img#view_img').src;
            viewImgSrc = viewImgSrc.replace("data:image/png;base64,", "");
            viewImgSrc = viewImgSrc.split(' ').join('+');
            loader.style.display = 'block';
            var downloadBtn = $('span#download');
            downloadBtn.css("cursor", "not-allowed");

            $.post("file.php", {viewImgSrc: viewImgSrc}, function (result_data) {
                downloadBtn.css("cursor", "pointer");
                loader.style.display = 'none';
                if(!result_data) {
                    Swal.fire(
                        'Успешно!',
                        'Ваша фото сохранена в базу данных',
                        'success'
                    );
                    saveUrlAsFile(viewImg.attr('src'), 'AR_image_');
                }
                else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Упс...',
                        text: 'Что-то пошло не так, попробуйте заново!'
                    })
                }
                // console.log(result_data);
            });
        });
    }
});