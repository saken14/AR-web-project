<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AR</title>
    <link rel="stylesheet" href="style.css?v=<?=time()?>">

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://aframe.io/releases/1.2.0/aframe.min.js"></script>
    <script src="https://cdn.rawgit.com/jeromeetienne/AR.js/1.6.2/aframe/build/aframe-ar.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.js" integrity="sha512-sn/GHTj+FCxK5wam7k9w4gPPm6zss4Zwl/X9wgrvGMFbnedR8lTUSLdsolDRBRzsX6N+YgG6OWyvn9qaFVXH9w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/merge-images"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/script.js?v=<?=time()?>"></script>
</head>
<body id="content_block">
    <a-scene embedded arjs='sourceType: webcam; debugUIEnabled: false;'>

        <a-marker preset='custom' type='pattern' url='markers/pattern-slonworks-logo.patt'>

<!--        <a-box position='0 1 0' material='opacity: 0.5; color: #F70087;'></a-box>-->

            <a-entity scale="1.3 1.3 1.3" rotation="0 0 0" position="0.15 -0.2" gltf-model="models/elephpant/scene.gltf"></a-entity>

        </a-marker>



        <a-marker preset='custom' type='pattern' url='markers/pattern-slonworks-logo-bw.patt'>

<!--        <a-box position='0 1 0' material='opacity: 0.5; color: #F70087;'></a-box>-->

            <a-entity scale="1.3 1.3 1.3" rotation="0 0 0" position="0.15 -0.2" gltf-model="models/elephpant/scene.gltf"></a-entity>

        </a-marker>



        <a-marker preset='custom' type='pattern' url='markers/pattern-apple.patt'>

            <!--        <a-box position='0 1 0' material='opacity: 0.5; color: #F70087;'></a-box>-->

            <a-entity scale="1.3 1.3 1.3" rotation="0 0 0" position="0.15 -0.2" gltf-model="models/elephpant/scene.gltf"></a-entity>

        </a-marker>


      <a-entity camera>
          <a-entity cursor="rayOrigin: mouse;fuse: false;"></a-entity>
      </a-entity>

    </a-scene>

    <div id="do_capture" class="do_capture_wrapper">
        <img class="do_capture_img" src="data:image/svg+xml;base64,PHN2ZyBmaWxsPSIjZmZmZmZmIiBoZWlnaHQ9IjI0IiB2aWV3Qm94PSIwIDAgMjQgMjQiIHdpZHRoPSIyNCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KICAgIDxjaXJjbGUgY3g9IjEyIiBjeT0iMTIiIHI9IjMuMiIvPgogICAgPHBhdGggZD0iTTkgMkw3LjE3IDRINGMtMS4xIDAtMiAuOS0yIDJ2MTJjMCAxLjEuOSAyIDIgMmgxNmMxLjEgMCAyLS45IDItMlY2YzAtMS4xLS45LTItMi0yaC0zLjE3TDE1IDJIOXptMyAxNWMtMi43NiAwLTUtMi4yNC01LTVzMi4yNC01IDUtNSA1IDIuMjQgNSA1LTIuMjQgNS01IDV6Ii8+CiAgICA8cGF0aCBkPSJNMCAwaDI0djI0SDB6IiBmaWxsPSJub25lIi8+Cjwvc3ZnPgo=">
    </div>

    <div class='view_modal'>
        <div class='view_modal_content'>
            <div class='to_center_img_view'>
                <img id='view_img' src=''>
                <div class="loader"></div>
            </div>

                <span class='del_img' id='download'>Download</span>
        </div>
    </div>
</body>


</html>