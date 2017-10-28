var mycode, cheight;
var i, iz,
        wheelGroup,
        myEntity,
        test,
        getWheel,
        dropWheel,
        stopE;
var scaletocanvas;
var mockup_img, pattern_img
var status = 0;
var startPosX, startPosY;
var per_width,per_height;
var per_scale;
var origin_width, origin_height;

var fabriccanvas = document.createElement('canvas');
var ctx=fabriccanvas.getContext("2d");
fabriccanvas.width =document.getElementById('mockup-image').offsetWidth;//document.getElementById('mockup-image').clientWidth;
fabriccanvas.height = window.innerHeight -document.getElementById("theader").offsetHeight-document.getElementById("bfooter").offsetHeight-50-55-75;
fabriccanvas.style.position = "absolute";
// ctx.globalCompositeOperation = 'multiply';
fabriccanvas.id = 'fabriccanvas';
var fabric_canvas; 
// alert(c.width);
// console.log(document.getElementById('mockup-image').parentElement);

document.getElementById('mockup-image').style.height = (window.innerHeight -document.getElementById("theader").offsetHeight-document.getElementById("bfooter").offsetHeight-50-55-75) +"px";
document.getElementsByClassName('img-container')[0].style.height = (window.innerHeight -document.getElementById("theader").offsetHeight-document.getElementById("bfooter").offsetHeight-50-55-75) +"px";
var loader1 = document.createElement('div');
loader1.className="loader1";
$("#loader_parent").append(loader1);
$(".loader1").css("left",window.innerWidth/2-40);
$(".loader1").css("top",window.innerHeight/2+5);
$(".loader1").show();
$(".loader1").css("zIndex", 1000);



var product_file = "../img/temp/temp.png";

var back_img = document.createElement("img");
back_img.id ="back_img";
back_img.src = product_file;
back_img.style.position = "absolute";
back_img.style.left = (parseInt((document.getElementById('mockup-image').offsetLeft+document.getElementById('mockup-image').offsetWidth/2-200))+50)+"px";
back_img.style.top = (document.getElementById('mockup-image').offsetTop+ (window.innerHeight -document.getElementById("theader").offsetHeight-document.getElementById("bfooter").offsetHeight-50-55-75) / 2 - 150) +"px";
back_img.style.display = "none";
back_img.style.width = "300px"; //(window.innerHeight -document.getElementById("theader").offsetHeight-document.getElementById("bfooter").offsetHeight-50-55-75) +"px";


var shadow_img = document.createElement("img");
shadow_img.id ="shadow_img";
shadow_img.src = "../img/temp/temp-shadow.png";
shadow_img.style.position = "absolute";
shadow_img.style.left = back_img.style.left;
shadow_img.style.top = back_img.style.top;
shadow_img.style.width = "300px"; //(window.innerHeight -document.getElementById("theader").offsetHeight-document.getElementById("bfooter").offsetHeight-50-55-75) +"px";
shadow_img.style.display = "none";

var texture_dark_img = document.createElement("img");
texture_dark_img.id ="texture_dark_img";
texture_dark_img.src = "../img/temp/temp-texture-dark.png";
texture_dark_img.style.position = "absolute";
texture_dark_img.style.left = back_img.style.left;
texture_dark_img.style.top = back_img.style.top;
texture_dark_img.style.width = "300px"; //(window.innerHeight -document.getElementById("theader").offsetHeight-document.getElementById("bfooter").offsetHeight-50-55-75) +"px";
texture_dark_img.style.display = "none";

var texture_white_img = document.createElement("img");
texture_white_img.id ="texture_white_img";
texture_white_img.src = "../img/temp/temp-texture-white.png";
texture_white_img.style.position = "absolute";
texture_white_img.style.left = back_img.style.left;
texture_white_img.style.top = back_img.style.top;
texture_white_img.style.width = "300px"; //(window.innerHeight -document.getElementById("theader").offsetHeight-document.getElementById("bfooter").offsetHeight-50-55-75) +"px";
texture_white_img.style.display = "none";

// var template_img = document.createElement("img");
// template_img.id ="swan";
// template_img.src = "../img/SampleUpload.jpg";
// template_img.style= "position: fixed;visibility: hidden;";
// template_img.class = "demeo14";

// document.getElementById('mockup-image').append(template_img);
// document.getElementById('mockup-image').append(back_img);
var c = document.createElement('canvas');
var ctx=c.getContext("2d");
c.width = 400;//document.getElementById('mockup-image').clientWidth;
c.height = window.innerHeight -document.getElementById("theader").offsetHeight-document.getElementById("bfooter").offsetHeight-50-55-75;
c.style.position = "absolute";
c.style.opacity = 0.5;
// ctx.globalCompositeOperation = 'multiply';
c.id = 'mycanvas';
c.style.left = (document.getElementById('mockup-image').offsetLeft+document.getElementById('mockup-image').offsetWidth/2-200)+"px";
c.style.top = document.getElementById('mockup-image').offsetTop+"px";

var back_img_canvas = document.createElement('canvas');
var ctx2=back_img_canvas.getContext("2d");
back_img_canvas.width = 300;//document.getElementById('mockup-image').clientWidth;
back_img_canvas.height = 300;
back_img_canvas.style.position = "absolute";
// ctx.globalCompositeOperation = 'multiply';
// back_img_canvas.id = 'back_img';
back_img_canvas.style.left = (document.getElementById('mockup-image').offsetLeft+document.getElementById('mockup-image').offsetWidth/2-200)+"px";
back_img_canvas.style.top = document.getElementById('mockup-image').offsetTop+"px";




var c1 = document.createElement('canvas');
var ctx1=c1.getContext("2d");
c1.id = 'mycanvas1';
c1.width = 1;//document.getElementById('mockup-image').clientWidth;
c1.height = 1;

$("#mockup-image").click(function() {
    if(status == 0) {
        // console.log(test.topLeftPivot);
        origin_width = document.getElementById("back_img").naturalWidth;
        origin_height = document.getElementById("back_img").naturalHeight;

        c1.width = 400;//document.getElementById('mockup-image').clientWidth;
        c1.height = window.innerHeight -document.getElementById("theader").offsetHeight-document.getElementById("bfooter").offsetHeight-50-55-75;
        c1.style.position = "absolute";
        // c1.style.opacity = 0.5;
        // ctx.globalCompositeOperation = 'multiply';
        
        c1.style.display ="none";
        // alert(c.width);
        // console.log(document.getElementById('mockup-image').parentElement);
        c1.style.left = c.style.left;
        c1.style.top = c.style.top;

        c.style.display = "none";
        back_img.style.display="none";
        c1.style.display="inline-block";

        var clip_left_x = Math.min(test.topLeft.local.x,test.bottomLeft.local.x,test.bottomRight.local.x,test.topRight.local.x);
        var clip_left_y = Math.min(test.topLeft.local.y,test.bottomLeft.local.y,test.bottomRight.local.y,test.topRight.local.y);
        var clip_right_x = Math.max(test.topLeft.local.x,test.bottomLeft.local.x,test.bottomRight.local.x,test.topRight.local.x);
        var clip_right_y = Math.max(test.topLeft.local.y,test.bottomLeft.local.y,test.bottomRight.local.y,test.topRight.local.y);
        console.log(clip_left_x+","+clip_left_y+","+clip_right_x+","+clip_right_y);
        
        ctx1.clearRect(0,0, 400,400);
        ctx1.globalCompositeOperation = "normal";
        ctx1.drawImage(back_img,0,0,origin_width,origin_height,c1.width/2-150,c1.height/2-150,300,300);
        console.log(back_img);
        ctx1.globalCompositeOperation = "source-atop";
        ctx1.drawImage(c,0,0);
        ctx1.globalCompositeOperation = 'destination-over';
        ctx1.drawImage(shadow_img, 0, 0 ,origin_width,origin_height,c1.width/2-150,c1.height/2-150, 300,300);

        if(blend_mode == 'normal')
            ctx1.globalCompositeOperation = 'source-atop';
        else
            ctx1.globalCompositeOperation = 'screen';
        // ctx1.globalCompositeOperation = 'source-atop';
        console.log(texture_dark_img.naturalWidth !=0);
        if(texture_dark_img.naturalWidth !=0)
            ctx1.drawImage(texture_dark_img,0, 0 ,origin_width,origin_height,c1.width/2-150,c1.height/2-150, 300,300);
        ctx1.globalCompositeOperation = 'multiply';
        if(texture_white_img.naturalWidth !=0)
            ctx1.drawImage(texture_white_img,0, 0 ,origin_width,origin_height,c1.width/2-150,c1.height/2-150, 300,300);
    } else {

    }

});


/*global require, requirejs, define */
// http://requirejs.org/docs/api.html#config 
$("#name").val(product_name);

var waitForFinalEvent = (function () {
  var timers = {};
  
  return function (callback, ms, uniqueId) {
    if (!uniqueId) {
      uniqueId = "Don't call this twice without a uniqueId";
    }
    if (timers[uniqueId]) {
      clearTimeout (timers[uniqueId]);
    }
    timers[uniqueId] = setTimeout(callback, ms);
  };
})();

/*
$(window).resize(function() {
  waitForFinalEvent(function(){
        // location.reload(true);
        // scrawl.work.doAnimation=false;
        // scrawl.work.orderAnimations =false;
        $(".loader1").css("left",window.innerWidth/2-40);
        $(".loader1").css("top",window.innerHeight/2-40);
        document.getElementById('mockup-image').innerHTML = "";

        
        c = document.createElement('canvas');
        ctx=c.getContext("2d");
        c.width = document.getElementById('mockup-image').clientWidth;
        c.height = parseInt(document.getElementById('mockup-image').style.height);
        c.style.position = "absolute";
        c.style.opacity = 0.5;
        c.id = 'mycanvas';
        c.style.left = (document.getElementById('mockup-image').offsetLeft+document.getElementById('mockup-image').offsetWidth/2-200)+"px";
        c.style.top = document.getElementById('mockup-image').offsetTop+"px";

        c_div = document.createElement('div');
        c_div.append(c);

        back_img.style.left = (document.getElementById('mockup-image').offsetLeft+document.getElementById('mockup-image').offsetWidth/2-150) +"px";
        back_img.style.top = (document.getElementById('mockup-image').offsetTop+ c.height / 2 - 150) +"px";
        back_img.style.width = "300px"; //(window.innerHeight -document.getElementById("theader").offsetHeight-document.getElementById("bfooter").offsetHeight-50-55-75) +"px";

        document.getElementById('mockup-image').append(back_img);
        document.getElementById('mockup-image').append(c_div);
        
        var tags = document.getElementsByTagName('script');
        for (var i = tags.length; i >= 0; i--){ //search backwards within nodelist for matching elements to remove
            if (tags[i] && tags[i].getAttribute('src') != null && tags[i].getAttribute('src').indexOf('scrawl') != -1)
                 tags[i].parentNode.removeChild(tags[i]); //remove element by calling parentNode.removeChild()
        }
        // init_canvas();

    //     scrawl.loadExtensions({
    // path: 'https://scrawl.rikweb.org.uk/source_5-0-0/',
    // minified: false,
    // extensions: ['images', 'wheel', 'frame'],
    // callback: function() {
    //     // window.addEventListener('load', function() {
    //     scrawl=scrawl.init();
    //     mycode();
    //     // }, false);
    // },
    // });
        // scrawl.render();
    // back_img.style.marginTop = (startPosY-300)+"px";

       
    }, 300, "some unique string");
});*/

mycode = function() {
    'use strict';
    
    

    // import images
    scrawl.getImagesByClass('demo114');
    var ratio = art_width / art_height;
    
    if(ratio > 1) {
        per_scale = 300 / art_width;
    } else {
        per_scale = 300 / art_height;
    }
    per_width = art_width * per_scale;
    per_height = art_height * per_scale;
    console.log(per_height);
    console.log(per_width);
    startPosX = c.width / 2 - per_width/2-50;
    console.log(c.width);
    startPosY = c.height / 2 - per_height/2-50;
    // display and control entitys
    wheelGroup = scrawl.makeGroup({
        name: 'wheelGroup',
    });
    scrawl.makeWheel({
        name: 'topLeft',
        order: 20,
        startX: startPosX+50,
        startY: startPosY+50,
        fillStyle: '#f96736',
        group: 'wheelGroup',
        radius: 8
    }).clone({
        name: 'topRight',
        fillStyle: '#f96736',
        startX: startPosX+per_width+50,
        startY: startPosY+50
    }).clone({
        name: 'bottomRight',
        startX: startPosX+per_width+50,
        startY: startPosY+per_height+50
    }).clone({
        name: 'bottomLeft',
        startX: startPosX+50,
        startY: startPosY+per_height+50
    });

    test = scrawl.makeFrame({
        name: 'test',
        topLeftPivot: 'topLeft',
        topRightPivot: 'topRight',
        bottomRightPivot: 'bottomRight',
        bottomLeftPivot: 'bottomLeft',
        source: 'swan'
    });

    // display/control event listeners
    stopE = function(e) {
        if (e) {
        e.stopPropagation();
        e.preventDefault();
        }
    };
    getWheel = function(e) {
        var here = scrawl.pad.mycanvas.getMouse();
        stopE(e);
        myEntity = wheelGroup.getEntityAt(here);
        if (myEntity) {
        myEntity.pickupEntity(here);
        }
    };
    dropWheel = function(e) {
        stopE(e);
        if (myEntity) {
        myEntity.dropEntity();
        myEntity = false;
        }
    };
    scrawl.addListener('down', getWheel, scrawl.canvas.mycanvas);
    scrawl.addListener(['up', 'leave'], dropWheel, scrawl.canvas.mycanvas);

    // animation loop
    scrawl.makeAnimation({
        fn: function() {
            scrawl.render();
        },
    });
    
    };
function init_canvas() {
    
    // back_img.style.marginTop = (startPosY-300)+"px";
    

    scrawl.loadExtensions({
    path: 'https://scrawl.rikweb.org.uk/source_5-0-0/',
    minified: false,
    extensions: ['images', 'wheel', 'frame'],
    callback: function() {
        // window.addEventListener('load', function() {
        scrawl=scrawl.init();
        mycode();
        // }, false);
    },
    });
}

function uploadFile() {
  var url = 'upload.php';
  var xhr = new XMLHttpRequest();
  var fd = new FormData();
  xhr.open("POST", url, true);
  xhr.onreadystatechange = function() {
    if(xhr.readyState == 4 && xhr.status == 200) {
        var text= xhr.responseText;
        console.log(text);
        $(".loader").hide();
        $("#modal_id").click();
    }
  }
//   fd.append("product_file", $("#product_file")[0].files[0]);
//   fd.append("mask_file", $("#mask_file")[0].files[0]);
//   fd.append("shadow_file", $("#shadow_file")[0].files[0]);
//   fd.append("texture-dark_file", $("#texture-dark_file")[0].files[0]);
//   fd.append("texture-white_file", $("#texture-white_file")[0].files[0]);
//   console.log($("#product_file").val());
//   console.log($("#product_file")[0].files[0]);
//   console.log($("#shadow_file").val());
//   console.log($("#shadow_file")[0].files[0]);
  fd.append("product_name",product_name);
//   console.log(document.getElementById("pr-name"));
//   fd.append("mask_name",$("#mask-name").val());
//   fd.append("shadow_name",$("#shadow-name").val());
//   fd.append("texture-dark_name",$("#texture-dark-name").val());
//   fd.append("texture-white_name",$("#texture-white-name").val());
  fd.append("width",art_width);
  fd.append("height",art_height);
  fd.append("x",upload_x);
  fd.append("y",upload_y);
  fd.append("blend_mode",blend_mode);
  fd.append("opacity",opacity);
  fd.append("userid", user);
  fd.append("adminid", admin);
  fd.append("mockup_list",mockup_list);
  console.log(test);
  fd.append("top_left_x", test.topLeft.local.x);
  fd.append("top_left_y", test.topLeft.local.y);
  fd.append("top_right_x", test.topRight.local.x);
  fd.append("top_right_y", test.topRight.local.y);
  fd.append("bottom_left_x", test.bottomLeft.local.x);
  fd.append("bottom_left_y", test.bottomLeft.local.y);
  fd.append("bottom_right_x", test.bottomRight.local.x);
  fd.append("bottom_right_y", test.bottomRight.local.y);
  fd.append("position_x", pattern_img.left - mockup_img.left);
  fd.append("position_y", pattern_img.top - mockup_img.top);
  fd.append("size_x", pattern_img.scaleX * pattern_img.width);
  fd.append("size_y", pattern_img.scaleY * pattern_img.height);
  fd.append("cheight", cheight);
  xhr.send(fd);
}

function init_this(url) {
        var image = document.getElementById('image');
        image.parentNode.innerHTML = `<img id="image" src="" alt="Picture" style="width:600px;">`;
        image = document.getElementById('image');
        
        var cropper;


        var crop_width, crop_height;
        var img_ratio = document.getElementById("image").naturalWidth / document.getElementById("image").naturalHeight;
        $(image).removeClass("cropper-hidden");
        var crop_tool_image;
        var crop_tool_scale
        console.log(url);
        $("#crop_dimension").text("("+art_width+"px x "+art_height+"px)");
        $("#do_modal_crop").click();
        image.src = url;
        image.onload = function() {
            setTimeout(function () {
              
                cropper = new Cropper(image, {
                dragMode: 'move',
                autoCropArea: 0,
                strict: false,
                restore: false,
                guides: false,
                center: false,
                highlight: false,
                cropBoxMovable: false,
                cropBoxResizable: false,
                toggleDragModeOnDblclick: false,
                ready: function() {
                    crop_tool_image = document.getElementsByClassName("cropper-canvas")[0];
                    crop_tool_scale = document.getElementById("image").naturalWidth / crop_tool_image.offsetWidth;
                    var crop_width, crop_height;
                    if(document.getElementById("image").naturalWidth > art_width && document.getElementById("image").naturalHeight > art_height){
                        crop_width = art_width / crop_tool_scale;
                        crop_height = art_height / crop_tool_scale;
                    } else {
                        if(document.getElementById("image").naturalWidth/ art_width * art_height>document.getElementById("image").naturalHeight) {
                            
                            crop_height = document.getElementById("image").naturalHeight * 0.7 / crop_tool_scale;
                            crop_width = crop_height * art_width / art_height;
                        } else {
                            crop_width = document.getElementById("image").naturalWidth * 0.7 / crop_tool_scale;
                            crop_height = crop_width / art_width * art_height;
                        }
                    }
                    console.log(crop_width+","+crop_height);
                    cropper.setCropBoxData({left:document.getElementsByClassName("cropper-wrap-box")[0].offsetWidth/2- crop_width/2, top:document.getElementsByClassName("cropper-wrap-box")[0].offsetHeight/2- crop_height/2, width: crop_width, height:crop_height});
                    
                    // var transform = crop_tool_image.style.transform;
                    // var translate;
                    // if(transform != "") {
                    //     translate = transform.split("translateX(");
                        
                    //     if(translate.length >1 ) {
                    //         translate_x = parseFloat(translate[1].split("px)")[0]);
                    //     } else {
                    //         translate_y = parseFloat(translate[0].split("translateY(")[1].split("px)")[0]);
                    //     }
                    //     console.log(translate_x);
                    //     console.log(translate_y);
                    // }
                },
                crop: function (e) {
                    data = e.detail;
                    // var cropper = this.cropper;
                    // var imageData = cropper.getImageData();
                    // var previewAspectRatio = data.width / data.height;

                    //   var previewImage = elem.getElementsByTagName('img').item(0);
                    //   var previewWidth = elem.offsetWidth;
                    //   var previewHeight = previewWidth / previewAspectRatio;
                    //   var imageScaledRatio = data.width / previewWidth;

                    //   elem.style.height = previewHeight + 'px';
                    //   previewImage.style.width = imageData.naturalWidth / imageScaledRatio + 'px';
                    //   previewImage.style.height = imageData.naturalHeight / imageScaledRatio + 'px';
                    //   previewImage.style.marginLeft = -data.x / imageScaledRatio + 'px';
                    //   previewImage.style.marginTop = -data.y / imageScaledRatio + 'px';
                        // console.log(e);
                    }
                });
            },300);
        }

    }

function uploadDemoFile(file) {
    var _URL = window.URL || window.webkitURL;
    console.log(c);
    // $("#mycanvas").hide();
    scrawl.work.doAnimation=false;
    
    // $("#back_img").hide();
    document.getElementById("mycanvas").style.display = "none";
    document.getElementById("mycanvas1").style.display = "none";
    document.getElementById("back_img").style.display = "none";
    $(".loader1").hide();
    $("#product_list").prop("disabled", false);
    var mockup_img_width = 300, mockup_img_height = 300;
    $("#fabriccanvas").show();
    fabric_canvas = new fabric.Canvas('fabriccanvas');
    
    console.log(document.getElementById("fabriccanvas"));
    document.getElementById("fabriccanvas").width = document.getElementById("fabriccanvas").width/window.devicePixelRatio; 
    document.getElementById("fabriccanvas").height = document.getElementById("fabriccanvas").height/window.devicePixelRatio;
    $(".canvas-container").css("margin","auto");
    fabric.Image.fromURL('../img/temp/temp.png', function(img) {
        // mockup_img = img.set({ left: 0, top:0, angle: 0, scaleX:mockup_img_width/img.width, scaleY:mockup_img_height/img.height, selectable: true });
        mockup_img = img.set({ left: fabric_canvas.width/2-mockup_img_width/2, top: fabric_canvas.height/2-mockup_img_height/2, angle: 0, scaleX:mockup_img_width/img.width, scaleY:mockup_img_height/img.height, selectable: false });
        console.log(window.devicePixelRatio);
        fabric_canvas.add(mockup_img);
        // fabric.Image.fromURL(_URL.createObjectURL(file), function(img) {
        //     fabric_canvas.remove(pattern_img);

        //     pattern_img_width = img.width;
        //     pattern_img_height = img.height;
    
        //     pattern_img = img.set({ left: mockup_img.left + 20, top: mockup_img.top + 50, angle: 0, scaleX: 150/img.width, scaleY: 150/img.width, opacity: 0.7});
        //     // if(total_data[$("#product_list option:selected").text()].blend_mode)
        //     //     pattern_img.globalCompositeOperation = total_data[$("#product_list option:selected").text()].blend_mode;
        //     // else
        //         pattern_img.globalCompositeOperation = 'multiply';
        //     pattern_img['cornerStyle'] = 'circle';
        //     pattern_img['hasRotatingPoint'] = false;
        //     pattern_img['transparentCorners'] = false;
        //     pattern_img['cornerSize'] = 7;
        //     pattern_img['cornerColor'] = '#f96736';
        //     pattern_img['borderColor'] = '#f96736';
        //     console.log(mockup_img);
        //     // fabric_canvas.setActiveObject(mockup_img);
        //     fabric_canvas.add(pattern_img);
                
    
        // });
        init_this(_URL.createObjectURL(file));
    });
}
var readURL = function(input) {
    $(".loader1").show();
    $("#product_list").prop("disabled", true);
    if (input.files && input.files[0]) {
        var file, img;
        if ((file = input.files[0])) {
            uploadDemoFile(file);
        
        }
    }
}

$(".file-upload").on('change', function(){ 
    // console.log(this);
    readURL($(".file-upload")[0]);
});

function save_result() {
    if(status==0){
        $("#modal_id_instruction").click();
        
    }else {
        uploadFile();
    }
}


        
    // }).on('hidden.bs.modal', function () {
    //     cropBoxData = cropper.getCropBoxData();
    //     canvasData = cropper.getCanvasData();
    //     cropper.destroy();
    // });
// $("#do_modal_crop").click();
back_img.onload = function() {
    ctx2.drawImage(back_img, 0,0, back_img.naturalWidth, back_img.naturalHeight, 0,0,300,300);

    var back_img1 = document.createElement("img");
    back_img1.id ="back_img1";
    back_img1.src = back_img_canvas.toDataURL();
    back_img1.style.position = "absolute";
    back_img1.style.left = (parseInt((document.getElementById('mockup-image').offsetLeft+document.getElementById('mockup-image').offsetWidth/2-200))+50)+"px";
    back_img1.style.top = (document.getElementById('mockup-image').offsetTop+ (window.innerHeight -document.getElementById("theader").offsetHeight-document.getElementById("bfooter").offsetHeight-50-55-75) / 2 - 150) +"px";
    back_img1.style.width = "300px"; //(window.innerHeight -document.getElementById("theader").offsetHeight-document.getElementById("bfooter").offsetHeight-50-55-75) +"px";

    document.getElementById('mockup-image').append(back_img);
    document.getElementById('mockup-image').append(back_img1);
    document.getElementById('mockup-image').append(c);
    document.getElementById('mockup-image').append(c1);
    document.getElementById('mockup-image').append(fabriccanvas);
    $("#fabriccanvas").hide();
    $("#mycanvas").click(function(e) {
        e.stopPropagation();
        console.log("mycanvas");
    });

    $("#mycanvas1").click(function(e) {
        if(status == 0) {
            console.log("mycanvas1");
            e.stopPropagation();
            c.style.display = "inline-block";
            back_img.style.display="inline-block";
            c1.style.display="none";
        }
    });
    $("#mycanvas1").mouseover(function(e) {
        e.stopPropagation();
    })
    back_img1.onload = function() {
        $(".loader1").hide();
    }
    $("#crop_spinner").css("left", $("#crop_spinner")[0].parentNode.offsetWidth/2-40);
    $("#crop_spinner").css("top", $("#crop_spinner")[0].parentNode.offsetHeight/2-40);
    $("#crop_spinner").show();
    var temp_canvas = document.createElement('canvas');
    console.log(back_img.naturalHeight);
    // crop_tool_image = document.getElementsByClassName("cropper-canvas")[0];
    crop_tool_scale = 1;//document.getElementById("image").naturalWidth / back_img.naturalWidth;
    var crop_width, crop_height;
    if(document.getElementById("image").naturalWidth > art_width && document.getElementById("image").naturalHeight > art_height){
        crop_width = art_width / crop_tool_scale;
        crop_height = art_height / crop_tool_scale;
    } else {
        if(document.getElementById("image").naturalWidth/ art_width * art_height>document.getElementById("image").naturalHeight) {
            
            crop_height = document.getElementById("image").naturalHeight * 0.7 / crop_tool_scale;
            crop_width = crop_height * art_width / art_height;
        } else {
            crop_width = document.getElementById("image").naturalWidth * 0.7 / crop_tool_scale;
            crop_height = crop_width / art_width * art_height;
        }
    }
    console.log(crop_width+","+crop_height);
    // temp_canvas.width = data.width;
    // temp_canvas.height = data.height;
    
    scaletocanvas = Math.max(crop_height/document.getElementById("image").naturalHeight, crop_width/document.getElementById("image").naturalWidth);
    temp_canvas.width = back_img.naturalWidth * scaletocanvas;
    temp_canvas.height = back_img.naturalHeight* scaletocanvas;
    console.log(scaletocanvas);
    var ctx=temp_canvas.getContext("2d");
    var template_img = document.getElementById("image");
    template_img.onload = function() { 
        
        console.log(crop_width*scaletocanvas+","+crop_height*scaletocanvas);
        console.log(art_width+","+art_height);
        ctx.drawImage(template_img,(template_img.naturalWidth-crop_width)/2, (template_img,template_img.naturalHeight-crop_height)/2, crop_width, crop_height,0,0,temp_canvas.width,temp_canvas.height);
        // document.body.append(temp_canvas);
        document.getElementById("swan").src = temp_canvas.toDataURL(); 
        document.getElementById("swan").onload = function() {
            init_canvas();
            $("#crop_spinner").hide();
        }
    }
    template_img.src="../img/SampleUpload.jpg";
    // ctx.drawImage(template_img,data.x, data.y, data.width, data.height,0,0,data.width,data.height);
    
}


function confirm_ok() {
    setTimeout(function() {
        window.location.href = "../home.php";
    }, 2000);
}

function getCropData1(e) {
    e.innerHTML = "Saving & Initializing...";
    status = 1;
    $("#crop_spinner").css("left", $("#crop_spinner")[0].parentNode.offsetWidth/2-40);
    $("#crop_spinner").css("top", $("#crop_spinner")[0].parentNode.offsetHeight/2-40);
    $("#crop_spinner").show();
    // process_crop_data(e);
    clip_left_x = Math.min(test.topLeft.local.x,test.bottomLeft.local.x,test.bottomRight.local.x,test.topRight.local.x);
    clip_left_y = Math.min(test.topLeft.local.y,test.bottomLeft.local.y,test.bottomRight.local.y,test.topRight.local.y);
    clip_right_x = Math.max(test.topLeft.local.x,test.bottomLeft.local.x,test.bottomRight.local.x,test.topRight.local.x);
    clip_right_y = Math.max(test.topLeft.local.y,test.bottomLeft.local.y,test.bottomRight.local.y,test.topRight.local.y);
    
    temp_canvas = document.createElement('canvas');
    temp_canvas.width = art_width;
    temp_canvas.height = art_height;
    var ctx3=temp_canvas.getContext("2d");
    var template_img = document.getElementById("image");

    console.log(data);
    ctx3.drawImage(template_img,data.x, data.y, data.width, data.height,0,0,temp_canvas.width,temp_canvas.height);
    
    canvas_pattern = document.createElement("canvas");
    canvas_pattern.id = "SSSS";
    // document.body.append(temp_canvas);
    var image = new Image();
    image.src = temp_canvas.toDataURL();
    image.onload = function() {
        canvas_pattern.width = (clip_right_x - clip_left_x)*data.width/400;
        canvas_pattern.height = (clip_right_y - clip_left_y)*data.height/c.height;
        var ctx_canvas = canvas_pattern.getContext("2d");
        var p = new Perspective(ctx_canvas, image);
        console.log(c.width+","+c.height);
        p.draw([
                [(test.topLeft.local.x-clip_left_x)*data.width/400, (test.topLeft.local.y-clip_left_y)*data.height/c.height],
                [(test.topRight.local.x-clip_left_x)*data.width/400, (test.topRight.local.y-clip_left_y)*data.height/c.height],
                [(test.bottomRight.local.x-clip_left_x)*data.width/400, (test.bottomRight.local.y-clip_left_y)*data.height/c.height],
                [(test.bottomLeft.local.x-clip_left_x)*data.width/400, (test.bottomLeft.local.y-clip_left_y)*data.height/c.height]
        ]);
        cheight = c.height;
        e.innerHTML = "Crop";
        // document.body.append(canvas_pattern);
        init_crop_canvas(canvas_pattern);
        $("#crop_spinner").hide();
        $("#modal_crop").modal("hide");
    }

    
}

function init_crop_canvas() {
   make_pattern_img();

}
function getProductImage() {
   
    fabric_canvas.remove(pattern_img);
    
    if(pattern_img) {
        pattern_img.globalCompositeOperation = 'source-atop';
        // pattern_img.opacity = 0.7;
        fabric_canvas.add(pattern_img);
        pattern_img.selectable = false;


    }
    
  
    fabric_canvas.renderAll();
    
    set_flag = false;

}

function make_pattern_img() {//parseFloat(total_data[$("#product_list option:selected").text()].top_right_x
        $("#save-button span").text(" Save");
        var temp_image = document.createElement('img');
        temp_image.src = canvas_pattern.toDataURL();
        fabric.Image.fromURL(canvas_pattern.toDataURL(), function(img) {
            fabric_canvas.remove(pattern_img);
            // document.getElementById("c").style.maskImage = "";
            // document.getElementById("c").style.webkitMaskImage = "";
            // document.getElementById("c").classList.remove("mask-class");
            
            console.log(img.width);           
            // if(total_data[$("#product_list option:selected").text()].opacity)
            //     pattern_img = img.set({ left: mockup_img.left + 20, top: mockup_img.top + 50, angle: 0, scaleX: 150/img.width, scaleY: 150/img.width, opacity: parseInt(total_data[$("#product_list option:selected").text()].opacity)/100});
            // else
            //     pattern_img = img.set({ left: mockup_img.left + 20, top: mockup_img.top + 50, angle: 0, scaleX: 150/img.width, scaleY: 150/img.width, opacity: 0.7});
            // if(total_data[$("#product_list option:selected").text()].blend_mode)
            //     pattern_img.globalCompositeOperation = total_data[$("#product_list option:selected").text()].blend_mode;
            // else
            var ratio = art_width / art_height;
            console.log(ratio);
            var clip_left_x = Math.min(test.topLeft.local.x,test.bottomLeft.local.x,test.bottomRight.local.x,test.topRight.local.x);
            var clip_left_y = Math.min(test.topLeft.local.y,test.bottomLeft.local.y,test.bottomRight.local.y,test.topRight.local.y);
            var clip_right_x = Math.max(test.topLeft.local.x,test.bottomLeft.local.x,test.bottomRight.local.x,test.topRight.local.x);
            var clip_right_y = Math.max(test.topLeft.local.y,test.bottomLeft.local.y,test.bottomRight.local.y,test.topRight.local.y);
            pattern_img = img.set({ left: mockup_img.left+50, top: mockup_img.top, angle: 0, scaleX: (clip_right_x-clip_left_x)/img.width, scaleY: (clip_right_y-clip_left_y)/img.height, opacity: 0.7});
            // pattern_img = img.set({ left: mockup_img.left + 20, top: mockup_img.top + 50, angle: 0, scaleX: (clip_right_x-clip_left_x)/img.width, scaleY: (clip_right_y-clip_left_y)/img.height, opacity: 0.7});
            // pattern_img = img.set({ left: mockup_img.left + 20, top: mockup_img.top + 50, angle: 0, scaleX: (clip_right_x-clip_left_x)/img.width, scaleY: (clip_right_x-clip_left_x)/ratio/img.height, opacity: 0.7});
            pattern_img.globalCompositeOperation = 'multiply';
            pattern_img['cornerStyle'] = 'circle';
            pattern_img['hasRotatingPoint'] = false;
            pattern_img['transparentCorners'] = false;
            pattern_img['cornerSize'] = 7;
            pattern_img['cornerColor'] = '#f96736';
            pattern_img['borderColor'] = '#f96736';
            fabric_canvas.add(pattern_img);
            fabric_canvas.setActiveObject(pattern_img);
            set_flag = true;
            fabric_canvas.on('mouse:down', function(e) { 
                // e.target should be the circle
                if((e.target == null) && (pattern_img) && (set_flag)) {
                    getProductImage();
                }
                var xx= e.e.layerX;
                var yy = e.e.layerY;
                if(xx > mockup_img.left && xx < mockup_img.left + mockup_img.width*mockup_img.scaleX && yy > mockup_img.top && yy < mockup_img.top + mockup_img.height*mockup_img.scaleY){

                    if(pattern_img){
                        // canvas1.remove(square1);
                        // canvas1.remove(square);
                        // canvas1.add(square1);
                        // canvas1.add(square);
                        // document.getElementById("c").style.maskImage = "";
                        // document.getElementById("c").style.webkitMaskImage = "";
                        // document.getElementById("c").classList.remove("mask-class");
                        // canvas1.remove(pattern_img);
                        // if(total_data[$("#product_list option:selected").text()].blend_mode)
                        //     pattern_img.globalCompositeOperation = total_data[$("#product_list option:selected").text()].blend_mode;
                        // else
                            pattern_img.globalCompositeOperation = 'multiply';
                        // canvas1.add(pattern_img);
                        pattern_img.selectable = true;
                        fabric_canvas.setActiveObject(pattern_img);
                        set_flag = true;
                    }
                }
            });

            fabric_canvas.on('object:scaling', function(){
                var obj = fabric_canvas.getActiveObject();
            });
        });
        
    }


function instruction_ok() {
    // console.log($(".file-upload")[0]);
    $(".file-upload").click();
}